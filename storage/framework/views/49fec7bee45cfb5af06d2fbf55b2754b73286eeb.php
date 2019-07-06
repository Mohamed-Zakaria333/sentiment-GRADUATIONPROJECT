<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/admin/Modifing.blade.php */ ?>
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
          <li class="mt" >
            <a   href="<?php echo e(route('Adding')); ?>">
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
    product modified successfuly
     </div>
   <?php endif; ?>
 <!--   //===================================================== -->

<form class="cf" action="<?php echo e(route('exe_modifing')); ?>" enctype="multipart/form-data" method="post" >
  <?php echo e(csrf_field()); ?>

  <div class="half left cf">
    <input type="text" id="input-name" placeholder="product Name" name="pro_name" value="<?php echo e($product->pro_name); ?>">
    <input type="text" id="input-salary" placeholder="price" name="pro_price" value="<?php echo e($product->pro_price); ?>">
       <select  style="width: 85%; height: 40px;border-radius: 8px;border-style: none;" name="pro_catagory"  id="selectcatagory" >
           <optgroup label = "select Catagory">
  
    <option value ="ACCESSORIES" >ACCESSORIES</option>
    <option value ="Appliances">Appliances</option>
    <option value ="clothes">Clothes</option>
    <option value ="Computer_laptops">Computer_laptops</option>
    <option value ="Mobiles">Mobiles</option>
    <option value ="shoes">shoes</option>
    <option value ="Cameras_flashes">Cameras_flashes</option>
    </optgroup>
    </select>
     <input type="number" id="input-discount"  name="pro_amount" style="width:55%;margin-left: 18px;" placeholder="amount" value="<?php echo e($product->pro_amount); ?>">
  </div>
  <div class="half right cf">
    <img class="img" id="pro-image" src="<?php echo e(url($uploaded_img_path)); ?>/<?php echo e($product->pro_imgPath); ?>" style="width:300px;height:200px">
    <label class="file">
     <input type="file" id="file-image"  name="file-image" aria-label="File browser example">
    <span class="file-custom"></span>
    </label>
  </div>
  <div class="half_right_cf1">
    <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
    <textarea type="text" id="input-message" name="pro_description" placeholder="pro_description" value="<?php echo e($product->description); ?>"><?php echo e($product->pro_description); ?></textarea>
  </div>  




















  
  <div class="half_right_cf2">
    <h2 style="text-align: left">features </h2>
    <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="<?php echo e($product->pro_returnPolicy); ?>">>
     <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="<?php echo e($product->pro_feature1); ?>">
      <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="<?php echo e($product->pro_feature2); ?>">
       <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="<?php echo e($product->pro_feature3); ?>">
        <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="<?php echo e($product->pro_feature4); ?>">
         <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="<?php echo e($product->pro_feature5); ?>">
             <label style="align-items: left">payment methods</label>
          <select multiple id="selectPaymentMetods" style="margin-left: 0px;width: 100%" name="pro_paymentMethods[]" required="">
            <option value="net banking" >Net banking</option>
            <option value="Credit">Credit</option>
            <option value="Debit">Debit</option>
            <option value="ATM card">ATM card</option>
          </select>



  </div>



  <input type="submit" value="Modify" id="input-submit">
</form>



</section>  
</section>
  <script type="text/javascript">
    function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#pro-image').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file-image").change(function() {
  readURL(this);
});
  </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
    <script type="text/javascript">



      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

      var pusher = new Pusher('PUSHER_APP_KEY', {
        cluster: 'eu',
        encrypted: true
      });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('user_comment');
        // 'App\\Events\\user_comment'
        channel.bind('user_comment', function(data) {

           alert(json.stringify(data));

        });
     
    </script>
<!-- //============================== -->
<script type="text/javascript">
  function SelectElement(id, valueToSelect)
{    
    var element = document.getElementById(id);
    element.value = valueToSelect;
}
  window.onload = SelectElement("selectcatagory", "<?php echo e($product->pro_catagory); ?>");

</script>
<!-- //============================== -->
<script type="text/javascript">
var paymentMethodsarr = "<?php echo e($product->pro_paymentMethods); ?>".split("|");
console.log(paymentMethodsarr);
// console.log(document.getElementById("selectPaymentMetods").length);
// console.log(document.getElementById("selectPaymentMetods").options);
// console.log(document.getElementById("selectPaymentMetods").options[0].value);
var y = document.getElementById("selectPaymentMetods");
for (i = 0; i < y.length; i++) {
  for (j = 0; j < paymentMethodsarr.length;j++)
  {
  if(paymentMethodsarr[j]==y.options[i].value)
  {
       y.options[i].selected =true;
  }
 } 
}
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>