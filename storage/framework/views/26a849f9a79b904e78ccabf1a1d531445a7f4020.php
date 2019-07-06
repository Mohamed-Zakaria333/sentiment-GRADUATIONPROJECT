<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/adding.blade.php */ ?>
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
          <li class="mt" >
            <a  class="active" href="<?php echo e(route('Adding')); ?>">
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
        <h1>Add new product </h1>
  <!--  //=============================================== -->
   <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </ul>
    </div>
   <?php endif; ?>
   <!-- //===================== -->
   <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success" role="alert">
    product added successfuly
     </div>
   <?php endif; ?>

















 <!--   //===================================================== -->

<form class="cf" action="<?php echo e(route('store-pro')); ?>" enctype="multipart/form-data" method="post">
  <?php echo e(csrf_field()); ?>

  <div class="half left cf">
    <input type="text" id="input-name" placeholder="product Name" name="pro_name">
    <input type="number" min="0" style="width:85%;margin-left: 18px;" placeholder="price" name="pro_price">
    <div style="align-items: left;width: 60%">
         <h4>select catagory</h4>

    </div>

    <select  style="width: 85%; height: 40px;border-radius: 8px;border-style: none;" name="pro_catagory">
           <optgroup label = "select Catagory">
    
    <option value ="ACCESSORIES">ACCESSORIES</option>
    <option value ="Appliances">Appliances</option>
    <option value ="Clothes">Clothes</option>
    <option value ="Computer_laptops">Computer_laptops</option>
    <option value ="Mobiles">Mobiles</option>
    <option value ="shoes">shoes</option>
    <option value ="Cameras_flashes">Cameras_flashes</option>
    </optgroup>
    </select>

     <input type="number" min="0" id="input-discount"  name="pro_amount" style="width:55%;margin-left: 18px;" placeholder="amount">
  </div>
  <div class="half right cf">
    <img class="img" id="pro-image" src="<?php echo e(url($slidingimages_admin_path)); ?>/upload.png" style="width:300px;height:200px">
    <label class="file">
     <input type="file" id="file-image"  name="file-image" aria-label="File browser example">
    <span class="file-custom"></span>
    </label>
  </div>
  <div class="half_right_cf1">
    <textarea type="text" id="input-message" name="pro_description" placeholder="description"></textarea>
  </div>  




















  
  <div class="half_right_cf2">
    <h2 style="text-align: left">features </h2>
    <input type="text" name="pro_returnPolicy" id="input-name" placeholder="Return Policy (optional)" style="margin-left: 0px;width: 100%">
     <input type="text" name="pro_feature1" id="input-name" placeholder="add faeture1 (optional)" style="margin-left: 0px;width: 100%">
      <input type="text" name="pro_feature2" id="input-name" placeholder="add faeture2 (optional)" style="margin-left: 0px;width: 100%">
       <input type="text" name="pro_feature3" id="input-name" placeholder="add faeture3 (optional)" style="margin-left: 0px;width: 100%">
        <input type="text" name="pro_feature4" id="input-name" placeholder="add faeture4 (optional)" style="margin-left: 0px;width: 100%">
         <input type="text" name="pro_feature5" id="input-name" placeholder="add faeture5 (optional)" style="margin-left: 0px;width: 100%">






         <label style="align-items: left">payment methods</label>
          <select multiple  style="margin-left: 0px;width: 100%" name="pro_paymentMethods[]" required="">
            <option value="Net banking">Net banking</option>
            <option value="Credit">Credit</option>
            <option value="Debit">Debit</option>
            <option value="ATM card">ATM card</option>
          </select>



          
      



  </div>



  <input type="submit" value="add" id="input-submit">
</form>



</section>  
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>