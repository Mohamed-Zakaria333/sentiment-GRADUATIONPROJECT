<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/layouts/master.blade.php */ ?>
<?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('sidebar'); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>