

<?php $__env->startSection('title', 'Dashboard - TaskFlow'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <!-- Stats Cards -->
    <div class="glass rounded-3xl p-6 shadow-2xl shadow-black/30 ring-1 ring-white/10">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-slate-400 text-sm font-medium">Total tasks</p>
                <p class="text-3xl font-semibold tracking-tight mt-2"><?php echo e($totalTasks); ?></p>
                <p class="text-xs text-slate-500 mt-2">All tasks in your workspace</p>
            </div>
            <div class="h-10 w-10 rounded-2xl bg-white/5 ring-1 ring-white/10 flex items-center justify-center text-sky-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="glass rounded-3xl p-6 shadow-2xl shadow-black/30 ring-1 ring-white/10">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-slate-400 text-sm font-medium">Completed</p>
                <p class="text-3xl font-semibold tracking-tight mt-2 text-emerald-200"><?php echo e($completedTasks); ?></p>
                <p class="text-xs text-slate-500 mt-2">Nice work—keep the streak</p>
            </div>
            <div class="h-10 w-10 rounded-2xl bg-emerald-400/10 ring-1 ring-emerald-300/20 flex items-center justify-center text-emerald-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <div class="glass rounded-3xl p-6 shadow-2xl shadow-black/30 ring-1 ring-white/10">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-slate-400 text-sm font-medium">Pending</p>
                <p class="text-3xl font-semibold tracking-tight mt-2 text-amber-200"><?php echo e($pendingTasks); ?></p>
                <p class="text-xs text-slate-500 mt-2">Tasks waiting on you</p>
            </div>
            <div class="h-10 w-10 rounded-2xl bg-amber-400/10 ring-1 ring-amber-300/20 flex items-center justify-center text-amber-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="glass rounded-3xl p-6 shadow-2xl shadow-black/30 ring-1 ring-white/10">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-slate-400 text-sm font-medium">Overdue</p>
                <p class="text-3xl font-semibold tracking-tight mt-2 text-rose-200"><?php echo e($overdueTasks); ?></p>
                <p class="text-xs text-slate-500 mt-2">Needs attention</p>
            </div>
            <div class="h-10 w-10 rounded-2xl bg-rose-400/10 ring-1 ring-rose-300/20 flex items-center justify-center text-rose-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Tasks -->
    <div class="lg:col-span-2 glass rounded-3xl shadow-2xl shadow-black/30 ring-1 ring-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold tracking-tight text-white">Task list</h3>
                <p class="text-sm text-slate-400">Your most recent activity</p>
            </div>
            <a href="<?php echo e(route('tasks.create')); ?>" class="px-4 py-2.5 bg-white/5 text-slate-100 rounded-2xl hover:bg-white/10 transition text-sm font-semibold ring-1 ring-white/10">
                New task
            </a>
        </div>

        <?php if($recentTasks->count() > 0): ?>
            <div class="p-6 space-y-3">
                <?php $__currentLoopData = $recentTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 bg-white/5 border border-white/10 rounded-2xl hover:bg-white/10 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 class="font-semibold text-slate-100"><?php echo e($task->title); ?></h4>
                                <p class="text-sm text-slate-400 mt-1"><?php echo e(Str::limit($task->description, 60)); ?></p>
                                <?php if($task->due_date): ?>
                                    <p class="text-xs <?php echo e($task->isOverdue() ? 'text-rose-300 font-semibold' : 'text-slate-500'); ?> mt-1">
                                        Due: <?php echo e($task->due_date->format('M d, Y')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <span class="px-3 py-1.5 rounded-full text-xs font-semibold ring-1
                                <?php echo e($task->status === 'done'
                                    ? 'bg-emerald-400/10 text-emerald-200 ring-emerald-300/20'
                                    : 'bg-amber-400/10 text-amber-200 ring-amber-300/20'); ?>">
                                <?php echo e(ucfirst($task->status)); ?>

                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="p-8 text-center text-slate-400">
                No tasks yet.
                <a href="<?php echo e(route('tasks.create')); ?>" class="text-sky-300 hover:text-white underline-offset-4 hover:underline font-medium">Create one</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Upcoming Tasks -->
    <div class="glass rounded-3xl shadow-2xl shadow-black/30 ring-1 ring-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/10">
            <h3 class="text-lg font-semibold tracking-tight text-white">Upcoming</h3>
            <p class="text-sm text-slate-400">Next due dates</p>
        </div>

        <?php if($upcomingTasks->count() > 0): ?>
            <div class="p-6 space-y-3">
                <?php $__currentLoopData = $upcomingTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 bg-white/5 rounded-2xl border border-white/10">
                        <p class="font-medium text-slate-100 text-sm"><?php echo e(Str::limit($task->title, 28)); ?></p>
                        <?php if($task->due_date): ?>
                            <p class="text-xs text-slate-400 mt-1"><?php echo e($task->due_date->format('M d')); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="p-8 text-center text-slate-400 text-sm">
                No upcoming tasks
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pc\LaravelFinalProject\resources\views/dashboard.blade.php ENDPATH**/ ?>