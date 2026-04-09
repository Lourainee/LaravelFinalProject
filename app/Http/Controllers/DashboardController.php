<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $totalTasks = $user->tasks()->count();
        $completedTasks = $user->tasks()->where('status', 'done')->count();
        $pendingTasks = $user->tasks()->where('status', 'pending')->count();
        $overdueTasks = $user->tasks()
            ->where('status', 'pending')
            ->where('due_date', '<', now()->toDateString())
            ->count();

        $recentTasks = $user->tasks()->orderBy('created_at', 'desc')->take(5)->get();
        $upcomingTasks = $user->tasks()
            ->where('status', 'pending')
            ->orderBy('due_date', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalTasks',
            'completedTasks',
            'pendingTasks',
            'overdueTasks',
            'recentTasks',
            'upcomingTasks'
        ));
    }
}
