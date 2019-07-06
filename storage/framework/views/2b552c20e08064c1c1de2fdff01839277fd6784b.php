<?php /* C:\xampp\htdocs\ec_projects\own\resources\views/website/checkout.blade.php */ ?>
<?php $__env->startSection('content'); ?>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>










































			<!-- //tittle heading -->
			<div class="checkout-right">
                     <?php if(session('cart')): ?>
           				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:

					<span><?php echo e(count(session('cart'))); ?> Products</span>
				</h4>




				<div class="table-responsive">
     <?php if($message = Session::get('success')): ?>
    <div class="alert alert-danger" role="alert">
    product remove from cart
     </div>
     <?php endif; ?>
 <?php if($message = Session::get('updated')): ?>
    <div class="alert alert-success" role="alert">
   cart updated successfuly
     </div>



     <?php endif; ?>




					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Product img</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								

								<th>total Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
                               <?php $total = 0 ?>
                               <?php if(session('cart')): ?>
                                



                               <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php $total += $details['price'] * $details['quantity'] ?>
							<tr class="rem1">
								<td class="invert-image">
                                 		<a href="single.html">
										<img src="<?php echo e(url($uploaded_img_path)); ?>/<?php echo e($details['photo']); ?>" alt=" " class="img-responsive" style="width: 100px;height: 100px">
									</a>






								</td>
                                 <td class="invert"><?php echo e($details['name']); ?></td>







								<td class="invert">
							       $<?php echo e($details['price']); ?>

								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<!-- <div class="entry value-minus">&nbsp;</div>
											<div class="entry value"  id="pro-amount"  >
												<span><?php echo e($details['quantity']); ?></span>
											</div> -->
											<form action="<?php echo e(url('cart_updating')); ?>" method="post">
												<?php echo csrf_field(); ?>
												 <input type="number" min ="1"value="<?php echo e($details['quantity']); ?>" class="form-control quantity" name="new_amount" style="width: 50px;float: left;padding: 5px;height: 40px" />
                                                    <input type="hidden" value="<?php echo e($id); ?>" name="id" />


                                                 <button  type="submit"class="btn btn-info btn-sm update-cart" data-id="<?php echo e($id); ?>" type="submit"><i class="fa fa-refresh" style="padding: 8px" aria-hidden="true"></i></button>

											</form>
	                                   
											<!-- <div class="entry value-plus active">&nbsp;</div> -->

										</div>

									</div>
								</td>
								
								<td class="invert" id="totalprice">$<?php echo e($details['price'] * $details['quantity']); ?></td>
								<td class="invert">
									<div class="rem">
										
                      <button type="button" onclick="window.location='<?php echo e(route('CART_DELETING',['id'=>$id])); ?>'" class="btn btn-danger"><i class="fas fa-trash-alt"></i><span style="margin-left:8px">Delete</span></button>


									</div>
								</td>
							</tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                           			<tr class="rem1">
								<td class="invert-image"></td>
                                <td class="invert"></td>
								<td class="invert"></td>
								<td class="invert"></td>							
								<td class="invert" id="totalprice"><strong>$total price</strong> </td>
								<td class="invert"></td>
							        </tr>
							    		<tr class="rem1">
								<td class="invert-image"></td>
                                <td class="invert"></td>
								<td class="invert"></td>
								<td class="invert"></td>							
								<td class="invert" id="totalprice"> <strong><span style="margin-right: 3px">$</span><?php echo $total?></strong></td>
								<td class="invert"></td>
							        </tr>    



						</tbody>
					</table>
				</div>
			</div>
             

                <?php else: ?>
   		<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
                    
           
					<span>0 Products</span>
				</h4>





             <?php endif; ?>
























































			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Add a new Details</h4>
					<form action="<?php echo e(route('PAYMENT_POST')); ?>" method="post" class="creditly-card-form agileinfo_form">
						<?php echo csrf_field(); ?>
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Landmark" name="landmark" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Town/City" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls">
											<option>Select Address type</option>
											<option>Office</option>
											<option>Home</option>
											<option>Commercial</option>

										</select>
									</div>
								</div>
								<button class="submit check_out btn">Delivery to this Address</button>
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						<a href="<?php echo e(route('PAYMENT_GET')); ?>">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->


<?php $__env->stopSection(); ?>
	<?php $__env->startSection('website_custom_scripts'); ?>
	<!-- quantity -->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) + 1;
         


			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
		
	</script>
	<!--quantity-->



<script type="text/javascript">

	
    









</script>












	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>