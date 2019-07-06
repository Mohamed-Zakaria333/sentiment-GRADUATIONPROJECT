<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/sendMail.blade.php */ ?>
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
            <a  href="<?php echo e(route('Adding')); ?>">
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
      <section class="wrapper" >
       <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success" role="alert" style="margin-top: 40px">
    message sended successfuly
     </div>
   <?php endif; ?>

<form class="cf" action="<?php echo e(route('Mailing_ss',['id'=>$user->id])); ?>"  method="post">
  <?php echo csrf_field(); ?>


  <div class="half_left_cf">
     <label style="float: left;font-size: 20px">from</label>
    <input type="email" id="input-email" value= "<?php echo e($source); ?>" readonly name="from">
     <label style="float: left;font-size: 20px">to</label>
    <input type="email" id="input-email" value="<?php echo e($user->email); ?>" readonly name="to">
     <label style="float: left;font-size: 20px">subject</label>
    <input type="text" id="input-discount" value="Replaying your comment on product    (<?php echo e($product->pro_name); ?>)" style="margin-left: 0px;width: 100%" name="subject">

    
  </div>
 
  <div class="half_right_cf1">
     <label style="float: left;font-size: 20px">message</label>
    <textarea name="message" type="text" id="input-message" style="font-size: 16px" name="content">Thank you for your interest in commenting on our product. We read your comment and focused on some things that might bother you and which we will improve in the near future</textarea>
  </div>  


<input type="hidden"  name="pro_id" value="<?php echo e($product->id); ?>">
<input type="hidden"  name="user_id" value="<?php echo e($user->id); ?>">
  <input type="submit" value="send_mail" id="input-submit"style="background-color: #2f323a;margin-bottom: 100px">
</form>



    </section>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>