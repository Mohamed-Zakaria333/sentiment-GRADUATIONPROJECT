<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/website/layouts/master.blade.php */ ?>
<?php echo $__env->make('website.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- <?php $__env->startSection('custom'); ?>
<?php echo $__env->yieldContent('custom'); ?>
<?php $__env->stopSection(); ?> -->

                 <?php echo $__env->yieldContent('content'); ?>
                 <?php echo $__env->yieldContent('adver'); ?>
                 <?php echo $__env->yieldContent('search'); ?>


<?php echo $__env->make('website.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>