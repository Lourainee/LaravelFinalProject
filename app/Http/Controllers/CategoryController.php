<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::withCount('tasks')->paginate(12);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'color' => 'required|regex:/^#[A-Fa-f0-9]{6}$/',
        ], [
            'name.required' => 'Category name is required',
            'name.unique' => 'This category name already exists',
            'color.required' => 'Color is required',
            'color.regex' => 'Color must be a valid hex code (e.g., #3B82F6)',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'color' => 'required|regex:/^#[A-Fa-f0-9]{6}$/',
        ], [
            'name.required' => 'Category name is required',
            'name.unique' => 'This category name already exists',
            'color.required' => 'Color is required',
            'color.regex' => 'Color must be a valid hex code',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
