<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/index.blade.php */ ?>
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
           <!-- //===================== -->
   <?php if($message = Session::get('suc')): ?>
    <div class="alert alert-primary" role="alert">
    product deleted successfuly
     </div>
   <?php endif; ?>
 <!--   //===================================================== -->
        
           


                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="pro1">
                  <img class="img" src="<?php echo e(url($uploaded_img_path)); ?>/<?php echo e($product->pro_imgPath); ?>" style="width:300px;height:200px">
              
                <div class="modify" >
                <a href="<?php echo e(route('modifing',[$product->id])); ?>"><button class="product_btn"style="background-color: #e7c855"> Modify</button></a>
                </div>
                <div class="delete" >
                <a id="pro<?php echo e($product->id); ?>" ><button  onclick="desicion('pro<?php echo e($product->id); ?>','<?php echo e($product->id); ?>')"class="product_btn" style="background-color: #e5041e">delete</button></a>
                </div>
                </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
<script type="text/javascript">
        function desicion(ementId,pro_id) { 
       

       console.log(pro_id);

            var link=document.getElementById(ementId); 
            var result = confirm("do you want to delete this product"); 
            if (result == true) { 
               
                link.href = "<?php echo e(url('/Dashboard/products/delete_product/id=')); ?>"+pro_id;
            } else { 
               
                link.href = "<?php echo e(route('Editing')); ?>";
            } 
            
        } 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>