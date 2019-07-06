<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/productRequests.blade.php */ ?>
<?php $__env->startSection('sidebar'); ?>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?php echo e(url($avatars_path)); ?>/<?php echo e(Session::get('active_admin')[1]); ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><span style="margin-right: 10px"><?php echo e(Session::get('active_admin')[2]); ?></span><?php echo e(Session::get('active_admin')[3]); ?></h5>
          <li class="mt">
            <!-- mt -->
            <a  href="<?php echo e(route('Editing')); ?>">
              <!-- fa fa-dashboard -->
              <i class="fa fa-dashboard"></i>
              <span>Edit/Delete</span>
              </a>
          </li>
          <li class="mt">
            <a href="<?php echo e(route('Adding')); ?>">
              <i class="fa fa-desktop"></i>
              <span>ADD product</span>
              </a>
 
          </li>
          <li class="mt">
            <a href="<?php echo e(route('Analyting',[Config::get('first_analyting_product')])); ?>">
              <i class="fa fa-cogs"></i>
              <span>Comment analytic</span>
              </a>
 
          </li>
          <li class="mt">
            <a class ="active"href="<?php echo e(route('Requesting')); ?>">
              <i class="fa fa-book"></i>
              <span>Product Requests</span>
              </a>
 
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <!--  //========================================================== -->
    <section id="main-content">
      <section class="wrapper">
        <div class="alert alert-danger" role="alert" style="margin-top: 50px">
  there is no Requesting for products
     </div>

    </section>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>