@extends('layouts.app')

@section('title', 'Edit Task - TaskFlow')
@section('page-title', 'Edit Task')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Task Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea id="description" name="description" rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                    required>{{ old('description', $task->description) }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Minimum 10 characters</p>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select id="status" name="status" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('status') border-red-500 @enderror"
                        required>
                        <option value="pending" {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="done" {{ old('status', $task->status) === 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">Due Date * (April - December 2026)</label>
                    <input type="date" id="due_date" name="due_date" 
                        value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
                        min="2026-04-09" max="2026-12-31"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('due_date') border-red-500 @enderror"
                        required>
                    @error('due_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Categories</label>
                <div class="space-y-2">
                    @foreach($categories as $category)
                        <label class="flex items-center">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', $selectedCategories)) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
                            <span class="ml-3 text-gray-700">
                                <span class="inline-block w-3 h-3 rounded-full mr-2" style="background-color: {{ $category->color }}"></span>
                                {{ $category->name }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-4 pt-4 border-t border-gray-200">
                <button type="submit" class="flex-1 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                    Update Task
                </button>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                        Delete
                    </button>
                </form>
                <a href="{{ route('tasks.index') }}" class="flex-1 px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition font-medium text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
