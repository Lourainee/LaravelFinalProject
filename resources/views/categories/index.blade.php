@extends('layouts.app')

@section('title', 'Categories - TaskFlow')
@section('page-title', 'Categories')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-800">Task Categories</h1>
    <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
        New Category
    </a>
</div>

@if($categories->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition border-l-4" style="border-color: {{ $category->color }}">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $category->name }}</h3>
                    <div class="w-8 h-8 rounded" style="background-color: {{ $category->color }}"></div>
                </div>

                <p class="text-gray-600 text-sm mb-4">
                    <strong>{{ $category->tasks_count }}</strong> task{{ $category->tasks_count !== 1 ? 's' : '' }}
                </p>

                <div class="flex gap-2 pt-4 border-t border-gray-200">
                    <a href="{{ route('categories.edit', $category) }}" class="flex-1 px-3 py-2 bg-yellow-50 text-yellow-600 rounded hover:bg-yellow-100 transition text-center text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-3 py-2 bg-red-50 text-red-600 rounded hover:bg-red-100 transition text-sm font-medium">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $categories->links() }}
    </div>
@else
    <div class="bg-white rounded-lg shadow-md p-12 text-center">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
        </svg>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">No categories yet</h3>
        <p class="text-gray-600 mb-4">Create a category to organize your tasks</p>
        <a href="{{ route('categories.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
            Create Category
        </a>
    </div>
@endif
@endsection
