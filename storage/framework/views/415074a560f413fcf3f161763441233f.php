

<?php $__env->startSection('title', 'Edit Category - TaskFlow'); ?>
<?php $__env->startSection('page-title', 'Edit Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <form action="<?php echo e(route('categories.update', $category)); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name *</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name', $category->name)); ?>" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color *</label>
                <div class="flex items-center gap-4">
                    <input type="color" id="color" name="color" value="<?php echo e(old('color', $category->color)); ?>" 
                        class="w-20 h-12 border border-gray-300 rounded cursor-pointer"
                        onchange="document.getElementById('color-text').value = this.value"
                        required>
                    <input type="text" id="color-text" name="color-text" value="<?php echo e(old('color', $category->color)); ?>" 
                        placeholder="#3B82F6"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900"
                        onchange="if(/^#[A-Fa-f0-9]{6}$/.test(this.value)) document.getElementById('color').value = this.value">
                </div>
                <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="flex gap-4 pt-4 border-t border-gray-200">
                <button type="submit" class="flex-1 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                    Update Category
                </button>
                <a href="<?php echo e(route('categories.index')); ?>" class="flex-1 px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition font-medium text-center">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pc\LaravelFinalProject\resources\views/categories/edit.blade.php ENDPATH**/ ?>