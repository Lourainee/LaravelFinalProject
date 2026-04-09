@extends('layouts.app')

@section('title', 'Dashboard - TaskFlow')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600">
        <p class="text-gray-600 text-sm font-medium">Total Tasks</p>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalTasks }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-600">
        <p class="text-gray-600 text-sm font-medium">Completed</p>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $completedTasks }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-600">
        <p class="text-gray-600 text-sm font-medium">Pending</p>
        <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $pendingTasks }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-600">
        <p class="text-gray-600 text-sm font-medium">Overdue</p>
        <p class="text-3xl font-bold text-red-600 mt-2">{{ $overdueTasks }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Tasks -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800">Recent Tasks</h3>
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                New Task
            </a>
        </div>

        @if($recentTasks->count() > 0)
            <div class="p-6 space-y-3">
                @foreach($recentTasks as $task)
                    <div class="p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800">{{ $task->title }}</h4>
                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($task->description, 60) }}</p>
                                @if($task->due_date)
                                    <p class="text-xs {{ $task->isOverdue() ? 'text-red-600 font-semibold' : 'text-gray-500' }} mt-1">
                                        Due: {{ $task->due_date->format('M d, Y') }}
                                    </p>
                                @endif
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{ $task->status === 'done' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-6 text-center text-gray-600">
                No tasks yet. <a href="{{ route('tasks.create') }}" class="text-blue-600 hover:underline font-medium">Create one!</a>
            </div>
        @endif
    </div>

    <!-- Upcoming Tasks -->
    <div class="bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Upcoming</h3>
        </div>

        @if($upcomingTasks->count() > 0)
            <div class="p-6 space-y-3">
                @foreach($upcomingTasks as $task)
                    <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <p class="font-medium text-gray-800 text-sm">{{ Str::limit($task->title, 25) }}</p>
                        @if($task->due_date)
                            <p class="text-xs text-gray-600 mt-1">{{ $task->due_date->format('M d') }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-6 text-center text-gray-600 text-sm">
                No upcoming tasks
            </div>
        @endif
    </div>
</div>
@endsection
