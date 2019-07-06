<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/website/loginform.blade.php */ ?>
<?php $__env->startSection('custom_iclude'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>
	<?php $__env->startSection('website_custom_scripts'); ?>
<script type="text/javascript">

	//alert('aboo el azaly');
	//document.getElementById("exampleModal").style.display = "block" ;
    //document.location.href = document.getElementById('go_login_form').href;
// data-toggle="modal" data-target="#exampleModal"
//console.log(1212+1212);
//console.log(auth::check());


   $(window).on('load',function(){
        $('#exampleModal').modal('show');
    });


</script>




	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>