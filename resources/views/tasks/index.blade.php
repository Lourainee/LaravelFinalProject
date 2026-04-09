@extends('layouts.app')

@section('title', 'Tasks - TaskFlow')
@section('page-title', 'Tasks')

@section('content')
<div class="mb-6 flex flex-col md:flex-row gap-4">
    <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
        Create Task
    </a>
    
    <!-- Search and Filter -->
    <form method="GET" action="{{ route('tasks.index') }}" class="flex gap-2 flex-1">
        <input type="text" name="search" placeholder="Search tasks..." value="{{ request('search') }}"
            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        
        <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit" class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium">
            Filter
        </button>
    </form>
</div>

@if($tasks->count() > 0)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Categories</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Due Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <a href="{{ route('tasks.edit', $task) }}" class="font-medium text-blue-600 hover:underline">
                                    {{ $task->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @if($task->categories->count() > 0)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($task->categories as $cat)
                                            <span class="px-2 py-1 text-xs text-white rounded" 
                                                style="background-color: {{ $cat->color }}">
                                                {{ $cat->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($task->due_date)
                                    <span class="{{ $task->isOverdue() ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                                        {{ $task->due_date->format('M d, Y') }}
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('tasks.toggle-status', $task) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 rounded-full text-xs font-medium transition
                                        {{ $task->status === 'done' ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-yellow-100 text-yellow-700 hover:bg-yellow-200' }}">
                                        {{ ucfirst($task->status) }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $tasks->links() }}
        </div>
    </div>
@else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">No tasks found</h3>
        <p class="text-gray-600 mb-4">Create your first task to get started</p>
        <a href="{{ route('tasks.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
            Create Task
        </a>
    </div>
@endif
@endsection
