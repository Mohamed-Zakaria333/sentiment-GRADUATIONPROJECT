<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/website/product_details.blade.php */ ?>
<?php $__env->startSection('custom_iclude'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 id="posted_completed"class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" ">
				</h3>
			<!-- //tittle heading -->
				<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides"   style="list-style-type: none;">
								<li data-thumb="<?php echo e(url($img_path)); ?>/si1.jpg" >
									<div class="thumb-image">
										<img src="<?php echo e(url($uploaded_img_path)); ?>/<?php echo e($product->pro_imgPath); ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>

							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
                 
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo e($product->pro_name); ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo e($product->pro_price); ?></span>
						<del class="mx-2 font-weight-light">$1000</del>
						<label>Free delivery</label>
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
								<?php echo e($product->pro_description); ?>

							</li>
					
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<?php echo e($product->pro_returnPolicy); ?></p>
						<ul>
							<li class="mb-1">
								<?php echo e($product->pro_feature1); ?>

							</li>
							<li class="mb-1">
								<?php echo e($product->pro_feature2); ?>

							</li>
							<li class="mb-1">
								<?php echo e($product->pro_feature3); ?>

							</li>
							<li class="mb-1">
								<?php echo e($product->pro_feature4); ?>

							</li>
							<li class="mb-1">
								<?php echo e($product->pro_feature5); ?>

							</li>
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i><?php echo e($product->pro_paymentMethods); ?>

						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" />
									<input type="hidden" name="business" value=" " />
									<input type="hidden" name="item_name" value="Samsung Galaxy J7 Prime" />
									<input type="hidden" name="amount" value="200.00" />
									<input type="hidden" name="discount_amount" value="1.00" />
									<input type="hidden" name="currency_code" value="USD" />
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<input type="submit" name="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<!-- //Single Page -->
<!-- //================================================================================================ -->
  <div class="container1" style="width:74%">
  <div class="inner">
    <div class="rating">
      <span class="rating-num"><?php echo e($rating); ?></span>
      <div class="rating-stars">
        <span><i class="active icon-star"></i></span>
        <span><i class="active icon-star"></i></span>
        <span><i class="active icon-star"></i></span>
        <span><i class="active icon-star"></i></span>
        <span><i class="icon-star"></i></span>
      </div>
      <div class="rating-users">
        <i class="icon-user"></i> <?php echo e($comment_total); ?> total
      </div>
    </div>
    
    <div class="histo">
      <div class="five histo-rate">
        <span class="histo-star">
          <i class="active icon-star"></i> positive         </span>
        <span class="bar-block">
          <span id="bar-five" class="bar">
            <span><?php echo e($positive_num); ?></span>&nbsp;
          </span> 
        </span>
      </div>
      
      <div class="four histo-rate">
        <span class="histo-star">
          <i class="active icon-star"></i> netural          </span>
        <span class="bar-block">
          <span id="bar-four" class="bar">
            <span><?php echo e($netural_num); ?></span>&nbsp;
          </span> 
        </span>
      </div> 
      
      <div class="one histo-rate">
        <span class="histo-star">
          <i class="active icon-star"></i> negative          </span>
        <span class="bar-block">
          <span id="bar-three" class="bar">
            <span><?php echo e($negative_num); ?></span>&nbsp;
          </span> 
        </span>
      </div>
    </div>
  </div>
</div>
<!-- //===================================================================================== -->
<div class="comments">
		<div class="comment-wrap">
				<div class="photo">

                      <?php if(auth::check()): ?>
						<div class="avatar" style="background-image: url('<?php echo e(url($avatars_path)); ?>/<?php echo e(Auth::user()->avatar); ?>')"></div>
						<?php else: ?>
						

                         <div class="avatar" style="background-image: url('<?php echo e(url($avatars_path)); ?>/unauth.PNG')"></div>

						<?php endif; ?>
				</div>
				<div class="comment-block">
						<form action="<?php echo e(route('product_details',['id'=> $product->id])); ?>" method="post">
							<input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
								<textarea name="comment" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
								<input   style="float:right;padding:10px 30px 10px 30px;background-color: #065f9d;border-radius: 5px;color: white;margin-top:20px;"type="submit" value="post" id="btn_post">
							 
						</form>
				</div>
		</div>
        <?php $__currentLoopData = $product_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="comment-wrap">
				<div class="photo">

						<div class="avatar" style="background-image: url('<?php echo e(url($avatars_path)); ?>/<?php echo e($product_comment->user->avatar); ?>')">
							
         

						</div>
				</div>
				<div class="comment-block">
					<h6 style="color: orange"><?php echo e($product_comment->user->name); ?></h6>
					<p style="font-size: 12px;color: #0879c9"><?php echo e($product_comment->user->email); ?></p>
						<p class="comment-text"><?php echo e($product_comment->comment); ?></p>
						<div class="bottom-comment">
								<div class="comment-date"><?php echo e($product_comment->created_at); ?></div>

						</div>
				</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

</div>

	<!-- //Single Page -->
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('website_custom_scripts'); ?>

<script type="text/javascript">

	//alert('aboo el azaly');
	//document.getElementById("exampleModal").style.display = "block" ;
    //document.location.href = document.getElementById('go_login_form').href;
// data-toggle="modal" data-target="#exampleModal"
//console.log(1212+1212);


   
   // $(window).on('load',function(){


   //       //====================================
   	
   //       //====================================
   //  });

$(document).ready(function(){

  // jQuery methods go here...
     if(<?php echo e(Session::get('status')); ?>==0)
           {
           
           	
        $('#exampleModal').modal('show');
         // <?php echo e(Session::forget('status')); ?>

         // console.log(<?php echo e(Session::get('status')); ?>);
          }
});
       

</script>



	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>