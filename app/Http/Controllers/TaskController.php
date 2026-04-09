<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = auth()->user()->tasks();

        // Filter by category if requested
        if ($request->has('category') && $request->category) {
            $query->whereHas('categories', function ($q) {
                $q->where('categories.id', request()->category);
            });
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $tasks = $query->orderBy('due_date', 'asc')->paginate(10);
        $categories = Category::all();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'due_date' => 'required|date|after_or_equal:2026-04-09|before_or_equal:2026-12-31',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ], [
            'title.required' => 'Task title is required',
            'description.required' => 'Task description is required',
            'description.min' => 'Description must be at least 10 characters',
            'due_date.required' => 'Due date is required',
            'due_date.after_or_equal' => 'Due date must be April 9, 2026 or later',
            'due_date.before_or_equal' => 'Due date must be December 31, 2026 or earlier',
        ]);

        $task = auth()->user()->tasks()->create($validated);

        // Attach categories if provided
        if (isset($validated['categories'])) {
            $task->categories()->attach($validated['categories']);
        }

        // Log activity
        ActivityLog::create([
            'user_id' => auth()->id(),
            'task_id' => $task->id,
            'action' => 'created',
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        
        $categories = Category::all();
        $selectedCategories = $task->categories->pluck('id')->toArray();

        return view('tasks.edit', compact('task', 'categories', 'selectedCategories'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'status' => 'required|in:pending,done',
            'due_date' => 'required|date|before_or_equal:2026-12-31',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ], [
            'title.required' => 'Task title is required',
            'description.required' => 'Task description is required',
            'description.min' => 'Description must be at least 10 characters',
            'due_date.required' => 'Due date is required',
            'due_date.before_or_equal' => 'Due date must be December 31, 2026 or earlier',
        ]);

        $task->update($validated);

        // Sync categories
        if (isset($validated['categories'])) {
            $task->categories()->sync($validated['categories']);
        } else {
            $task->categories()->detach();
        }

        // Log activity
        ActivityLog::create([
            'user_id' => auth()->id(),
            'task_id' => $task->id,
            'action' => 'updated',
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        // Log activity before deletion
        ActivityLog::create([
            'user_id' => auth()->id(),
            'task_id' => $task->id,
            'action' => 'deleted',
        ]);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }

    public function toggleStatus(Task $task)
    {
        $this->authorize('update', $task);

        $task->status = $task->status === 'pending' ? 'done' : 'pending';
        $task->save();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'task_id' => $task->id,
            'action' => 'updated',
        ]);

        return back()->with('success', 'Task status updated!');
    }
}
