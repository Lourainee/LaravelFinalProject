<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'TaskFlow'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }

        :root {
            --app-bg-from: #0b1220;
            --app-bg-via: #0a0f1c;
            --app-bg-to: #060814;
            --card: rgba(15, 23, 42, 0.65);
            --card-border: rgba(255, 255, 255, 0.10);
        }

        .app-bg {
            background: radial-gradient(1200px 600px at 20% 10%, rgba(99, 102, 241, 0.18), transparent 60%),
                        radial-gradient(1000px 500px at 80% 20%, rgba(56, 189, 248, 0.14), transparent 55%),
                        linear-gradient(135deg, var(--app-bg-from), var(--app-bg-via), var(--app-bg-to));
        }

        .glass {
            background: var(--card);
            border: 1px solid var(--card-border);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="app-bg text-slate-100">
    <?php if(auth()->guard()->check()): ?>
        <!-- Sidebar Navigation -->
        <div class="flex h-screen">
            <div class="w-72 glass shadow-2xl shadow-black/40 flex flex-col">
                <div class="p-6 border-b border-white/10">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-2xl bg-gradient-to-br from-indigo-500 to-sky-400 shadow-lg shadow-indigo-500/20 flex items-center justify-center font-bold">
                            TF
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold tracking-tight">TaskFlow</h1>
                            <p class="text-xs text-slate-400">Get things done, one task at a time</p>
                        </div>
                    </div>
                </div>
                
                <nav class="flex-1 p-4 space-y-2">
                    <a href="<?php echo e(route('dashboard')); ?>" 
                        class="block px-4 py-3 rounded-xl transition flex items-center gap-3
                        <?php echo e(request()->routeIs('dashboard') ? 'bg-white/10 text-white ring-1 ring-white/10' : 'hover:bg-white/5 text-slate-300'); ?>">
                        <span class="h-2 w-2 rounded-full <?php echo e(request()->routeIs('dashboard') ? 'bg-sky-400' : 'bg-slate-600'); ?>"></span>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="<?php echo e(route('tasks.index')); ?>" 
                        class="block px-4 py-3 rounded-xl transition flex items-center gap-3
                        <?php echo e(request()->routeIs('tasks.*') ? 'bg-white/10 text-white ring-1 ring-white/10' : 'hover:bg-white/5 text-slate-300'); ?>">
                        <span class="h-2 w-2 rounded-full <?php echo e(request()->routeIs('tasks.*') ? 'bg-indigo-400' : 'bg-slate-600'); ?>"></span>
                        <span class="font-medium">Tasks</span>
                    </a>
                    <a href="<?php echo e(route('categories.index')); ?>" 
                        class="block px-4 py-3 rounded-xl transition flex items-center gap-3
                        <?php echo e(request()->routeIs('categories.*') ? 'bg-white/10 text-white ring-1 ring-white/10' : 'hover:bg-white/5 text-slate-300'); ?>">
                        <span class="h-2 w-2 rounded-full <?php echo e(request()->routeIs('categories.*') ? 'bg-emerald-400' : 'bg-slate-600'); ?>"></span>
                        <span class="font-medium">Categories</span>
                    </a>
                </nav>

                <div class="p-4 border-t border-white/10 space-y-3">
                    <div class="px-3">
                        <p class="text-xs text-slate-400">Signed in as</p>
                        <p class="text-sm font-medium"><?php echo e(auth()->user()->name); ?></p>
                    </div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full px-4 py-2.5 bg-white/5 text-slate-200 rounded-xl hover:bg-white/10 transition font-medium ring-1 ring-white/10">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Bar -->
                <div class="px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-semibold tracking-tight"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h2>
                            <p class="text-sm text-slate-400">Focus, plan, execute.</p>
                        </div>
                        <div class="hidden sm:flex items-center gap-3">
                            <div class="glass rounded-2xl px-4 py-2 text-sm text-slate-200">
                                <?php echo e(now()->format('D, M j')); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flash Messages -->
                <div class="px-6 pt-4">
                    <?php if(session('success')): ?>
                        <div class="mb-4 p-4 glass rounded-2xl flex items-center">
                            <svg class="w-5 h-5 text-emerald-300 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-emerald-100"><?php echo e(session('success')); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="mb-4 p-4 glass rounded-2xl">
                            <ul class="list-disc list-inside text-rose-200">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Page Content -->
                <div class="flex-1 overflow-auto px-6 pb-6">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Guest Layout -->
        <div class="min-h-screen app-bg flex items-center justify-center p-4">
            <div class="w-full max-w-md">
                <div class="text-center mb-6">
                    <div class="mx-auto h-14 w-14 rounded-3xl bg-gradient-to-br from-indigo-500 to-sky-400 shadow-2xl shadow-indigo-500/25 flex items-center justify-center font-bold text-xl">
                        TF
                    </div>
                    <h1 class="mt-4 text-2xl font-semibold tracking-tight">TaskFlow</h1>
                    <p class="mt-1 text-sm text-slate-400">Nice to have you back</p>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    <?php endif; ?>

    <script>
        document.querySelectorAll('[data-bg]').forEach((el) => {
            const color = el.getAttribute('data-bg');
            if (color) el.style.backgroundColor = color;
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\pc\LaravelFinalProject\resources\views/layouts/app.blade.php ENDPATH**/ ?>