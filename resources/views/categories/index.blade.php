@extends('layouts.app')

@section('title', 'Categories - TaskFlow')
@section('page-title', 'Categories')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-semibold tracking-tight text-white">Categories</h1>
    <a href="{{ route('categories.create') }}" class="px-4 py-2.5 bg-white/5 text-slate-100 rounded-2xl hover:bg-white/10 transition font-semibold ring-1 ring-white/10">
        New Category
    </a>
</div>

@if($categories->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
            <div class="glass rounded-3xl shadow-2xl shadow-black/30 p-6 transition ring-1 ring-white/10 hover:bg-white/5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold tracking-tight text-white">{{ $category->name }}</h3>
                    <div class="w-9 h-9 rounded-2xl ring-1 ring-white/10" data-bg="{{ $category->color }}"></div>
                </div>

                <p class="text-slate-400 text-sm mb-4">
                    <strong>{{ $category->tasks_count }}</strong> task{{ $category->tasks_count !== 1 ? 's' : '' }}
                </p>

                <div class="flex gap-2 pt-4 border-t border-white/10">
                    <a href="{{ route('categories.edit', $category) }}" class="flex-1 px-3 py-2.5 bg-white/5 text-slate-200 rounded-2xl hover:bg-white/10 transition text-center text-sm font-semibold ring-1 ring-white/10">
                        Edit
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-3 py-2.5 bg-rose-400/10 text-rose-200 rounded-2xl hover:bg-rose-400/20 transition text-sm font-semibold ring-1 ring-rose-300/20">
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
    <div class="glass rounded-3xl shadow-2xl shadow-black/30 ring-1 ring-white/10 p-12 text-center">
        <svg class="w-16 h-16 text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
        </svg>
        <h3 class="text-lg font-semibold text-white mb-2">No categories yet</h3>
        <p class="text-slate-400 mb-4">Create a category to organize your tasks</p>
        <a href="{{ route('categories.create') }}" class="inline-block px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-sky-400 text-slate-950 rounded-2xl hover:opacity-95 transition font-semibold shadow-lg shadow-indigo-500/20">
            Create Category
        </a>
    </div>
@endif
@endsection
