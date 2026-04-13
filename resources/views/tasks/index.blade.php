@extends('layouts.app')

@section('title', 'Tasks - TaskFlow')
@section('page-title', 'Tasks')

@section('content')
<div class="mb-6 flex flex-col md:flex-row gap-4">
    <a href="{{ route('tasks.create') }}" class="px-4 py-2.5 bg-white/5 text-slate-100 rounded-2xl hover:bg-white/10 transition font-semibold ring-1 ring-white/10">
        Create Task
    </a>
    
    <!-- Search and Filter -->
    <form method="GET" action="{{ route('tasks.index') }}" class="flex gap-2 flex-1">
        <input type="text" name="search" placeholder="Search tasks..." value="{{ request('search') }}"
            class="flex-1 px-4 py-2.5 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none">
        
        <select name="category" class="px-4 py-2.5 bg-white/5 border border-white/10 rounded-2xl text-slate-100 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-sky-400 text-slate-950 rounded-2xl hover:opacity-95 transition font-semibold shadow-lg shadow-indigo-500/20">
            Filter
        </button>
    </form>
</div>

@if($tasks->count() > 0)
    <div class="glass rounded-3xl shadow-2xl shadow-black/30 ring-1 ring-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white/5 border-b border-white/10">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-200">Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-200">Categories</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-200">Due Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-200">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-slate-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b border-white/10 hover:bg-white/5 transition">
                            <td class="px-6 py-4">
                                <a href="{{ route('tasks.edit', $task) }}" class="font-semibold text-sky-300 hover:text-white underline-offset-4 hover:underline">
                                    {{ $task->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @if($task->categories->count() > 0)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($task->categories as $cat)
                                            <span class="px-2 py-1 text-xs text-white rounded-lg ring-1 ring-white/10" data-bg="{{ $cat->color }}">
                                                {{ $cat->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="text-slate-500 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($task->due_date)
                                    <span class="{{ $task->isOverdue() ? 'text-rose-300 font-semibold' : 'text-slate-300' }}">
                                        {{ $task->due_date->format('M d, Y') }}
                                    </span>
                                @else
                                    <span class="text-slate-500">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('tasks.toggle-status', $task) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 rounded-full text-xs font-semibold transition ring-1
                                        {{ $task->status === 'done'
                                            ? 'bg-emerald-400/10 text-emerald-200 hover:bg-emerald-400/20 ring-emerald-300/20'
                                            : 'bg-amber-400/10 text-amber-200 hover:bg-amber-400/20 ring-amber-300/20' }}">
                                        {{ ucfirst($task->status) }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-slate-200 hover:text-white font-semibold text-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-300 hover:text-rose-200 font-semibold text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-white/10">
            {{ $tasks->links() }}
        </div>
    </div>
@else
    <div class="glass rounded-3xl shadow-2xl shadow-black/30 ring-1 ring-white/10 p-12 text-center">
        <svg class="w-16 h-16 text-slate-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        <h3 class="text-lg font-semibold text-white mb-2">No tasks found</h3>
        <p class="text-slate-400 mb-4">Create your first task to get started</p>
        <a href="{{ route('tasks.create') }}" class="inline-block px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-sky-400 text-slate-950 rounded-2xl hover:opacity-95 transition font-semibold shadow-lg shadow-indigo-500/20">
            Create Task
        </a>
    </div>
@endif
@endsection
