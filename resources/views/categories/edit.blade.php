@extends('layouts.app')

@section('title', 'Edit Category - TaskFlow')
@section('page-title', 'Edit Category')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 @error('name') border-red-500 @enderror"
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color *</label>
                <div class="flex items-center gap-4">
                    <input type="color" id="color" name="color" value="{{ old('color', $category->color) }}" 
                        class="w-20 h-12 border border-gray-300 rounded cursor-pointer"
                        onchange="document.getElementById('color-text').value = this.value"
                        required>
                    <input type="text" id="color-text" name="color-text" value="{{ old('color', $category->color) }}" 
                        placeholder="#3B82F6"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900"
                        onchange="if(/^#[A-Fa-f0-9]{6}$/.test(this.value)) document.getElementById('color').value = this.value">
                </div>
                @error('color')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4 pt-4 border-t border-gray-200">
                <button type="submit" class="flex-1 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                    Update Category
                </button>
                <a href="{{ route('categories.index') }}" class="flex-1 px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition font-medium text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
