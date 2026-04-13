

<?php $__env->startSection('title', 'Login - TaskFlow'); ?>

<?php $__env->startSection('content'); ?>
<div class="glass rounded-3xl shadow-2xl shadow-black/40 p-8 ring-1 ring-white/10">
        <h2 class="text-2xl font-semibold tracking-tight text-white mb-2">Sign in</h2>
        <p class="text-slate-400 mb-6">Pick up where you left off and keep your tasks moving forward.</p>

        <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-200 mb-2">Email</label>
                <input id="email" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-rose-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        type="email"
                        name="email"
                        value="<?php echo e(old('email')); ?>"
                        required autofocus autocomplete="username" />
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-rose-300 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-200 mb-2">Password</label>
                <input id="password" class="block mt-1 w-full px-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-slate-100 placeholder:text-slate-500 focus:ring-2 focus:ring-sky-400 focus:border-transparent outline-none <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> ring-2 ring-rose-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-rose-300 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2">
                    <input id="remember_me" type="checkbox" class="rounded border-white/20 bg-white/5 text-sky-400 shadow-sm focus:ring-sky-400" name="remember">
                    <span class="text-sm text-slate-300">Remember me</span>
                </label>
                <a href="<?php echo e(route('password.request')); ?>" class="text-sm text-slate-300 hover:text-white underline-offset-4 hover:underline">
                    Forgot password?
                </a>
            </div>

            <button type="submit" class="w-full mt-6 px-4 py-3 bg-gradient-to-r from-indigo-500 to-sky-400 text-slate-950 font-semibold rounded-2xl hover:opacity-95 transition shadow-lg shadow-indigo-500/20">
                Sign in
            </button>
        </form>

        <p class="text-center text-slate-400 mt-6">
            Don’t have an account?
            <a href="<?php echo e(route('register')); ?>" class="text-sky-300 font-medium hover:text-white underline-offset-4 hover:underline">Create one</a>
        </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pc\LaravelFinalProject\resources\views/auth/login.blade.php ENDPATH**/ ?>