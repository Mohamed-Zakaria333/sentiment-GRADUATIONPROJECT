<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/notification.blade.php */ ?>
<?php $__env->startSection('sidebar'); ?>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="<?php echo e(url($avatars_path)); ?>/<?php echo e(Session::get('active_admin')[1]); ?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><span style="margin-right: 10px"><?php echo e(Session::get('active_admin')[2]); ?></span><?php echo e(Session::get('active_admin')[3]); ?></h5>
          <li class="mt">
            <!-- mt -->
            <a class="active" href="<?php echo e(route('Editing')); ?>">
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
            <a href="<?php echo e(route('Requesting')); ?>">
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
        <div style="margin-top: 50px">
  <div class="notification1 red" style="width: 80%">
    <div class="info">
      <h1 style="text-align: left"><a href="https://goo.gl/IiwBDn">ruandre</a> followed you</h1>
      <p>You have a new follower! Feel the fame flow through your vains!</p>
       <a href="https://goo.gl/Z83wbD" class="button">show request details</a>

    </div>
    <div class="icon">
      <i class="fa fa-truck" aria-hidden="true"></i>
    </div>
  </div>

  <div class="notification1 blue" style="width: 80%;">
    <div class="info" >
      <h1 style="text-align: left" ><a href="https://goo.gl/I8lNLu">Windows 10</a> preview is here</h1>
      <p>Windows 10 represents the first step of a whole new generation of Windows. Windows 10 unlocks new experiences for customers to work, play and connect.</p>
      <a href="https://goo.gl/Z83wbD" class="button">show</a><a href="#" class="button gray">Dismiss</a>
    </div>
    <div class="icon">
      <i class="fa fa-comments" ></i>
    </div>
  </div>
</div>
    </section>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>