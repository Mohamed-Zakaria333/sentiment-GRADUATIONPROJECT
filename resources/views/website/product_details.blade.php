@extends('website.layouts.master')
@section('custom_iclude')
@endsection



@section('content')
<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 id="posted_completed"class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" ">
				</h3>
			<!-- //tittle heading -->
				@foreach($product as $product)
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides"   style="list-style-type: none;">
								<li data-thumb="{{url($img_path)}}/si1.jpg" >
									<div class="thumb-image">
										<img src="{{url($uploaded_img_path)}}/{{$product->pro_imgPath}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>

							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
                 
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3">{{$product->pro_name}}</h3>
					<p class="mb-3">
						<span class="item_price">{{$product->pro_price}}</span>
						<del class="mx-2 font-weight-light">$1000</del>
						<label>Free delivery</label>
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
								{{$product->pro_description}}
							</li>
					
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							{{$product->pro_returnPolicy}}</p>
						<ul>
							<li class="mb-1">
								{{$product->pro_feature1}}
							</li>
							<li class="mb-1">
								{{$product->pro_feature2}}
							</li>
							<li class="mb-1">
								{{$product->pro_feature3}}
							</li>
							<li class="mb-1">
								{{$product->pro_feature4}}
							</li>
							<li class="mb-1">
								{{$product->pro_feature5}}
							</li>
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>{{$product->pro_paymentMethods}}
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
			@endforeach
		</div>
	</div>
	<!-- //Single Page -->
<!-- //================================================================================================ -->
  <div class="container1" style="width:74%">
  <div class="inner">
    <div class="rating">
      <span class="rating-num">{{$rating}}</span>
      <div class="rating-stars">
        <span><i class="active icon-star"></i></span>
        <span><i class="active icon-star"></i></span>
        <span><i class="active icon-star"></i></span>
        <span><i class="active icon-star"></i></span>
        <span><i class="icon-star"></i></span>
      </div>
      <div class="rating-users">
        <i class="icon-user"></i> {{$comment_total}} total
      </div>
    </div>
    
    <div class="histo">
      <div class="five histo-rate">
        <span class="histo-star">
          <i class="active icon-star"></i> positive         </span>
        <span class="bar-block">
          <span id="bar-five" class="bar">
            <span>{{$positive_num}}</span>&nbsp;
          </span> 
        </span>
      </div>
      
      <div class="four histo-rate">
        <span class="histo-star">
          <i class="active icon-star"></i> netural          </span>
        <span class="bar-block">
          <span id="bar-four" class="bar">
            <span>{{$netural_num}}</span>&nbsp;
          </span> 
        </span>
      </div> 
      
      <div class="one histo-rate">
        <span class="histo-star">
          <i class="active icon-star"></i> negative          </span>
        <span class="bar-block">
          <span id="bar-three" class="bar">
            <span>{{$negative_num}}</span>&nbsp;
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

                      @if(auth::check())
						<div class="avatar" style="background-image: url('{{url($avatars_path)}}/{{Auth::user()->avatar}}')"></div>
						@else
						

                         <div class="avatar" style="background-image: url('{{url($avatars_path)}}/unauth.PNG')"></div>

						@endif
				</div>
				<div class="comment-block">
						<form action="{{route('product_details',['id'=> $product->id])}}" method="post">
							<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
								<textarea name="comment" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
								<input   style="float:right;padding:10px 30px 10px 30px;background-color: #065f9d;border-radius: 5px;color: white;margin-top:20px;"type="submit" value="post" id="btn_post">
							 
						</form>
				</div>
		</div>
        @foreach($product_comments as $product_comment)
		<div class="comment-wrap">
				<div class="photo">

						<div class="avatar" style="background-image: url('{{url($avatars_path)}}/{{$product_comment->user->avatar}}')">
							
         

						</div>
				</div>
				<div class="comment-block">
					<h6 style="color: orange">{{$product_comment->user->name}}</h6>
					<p style="font-size: 12px;color: #0879c9">{{$product_comment->user->email}}</p>
						<p class="comment-text">{{$product_comment->comment}}</p>
						<div class="bottom-comment">
								<div class="comment-date">{{$product_comment->created_at}}</div>

						</div>
				</div>
		</div>
		@endforeach

</div>

</div>

	<!-- //Single Page -->
	@endsection
	@section('website_custom_scripts')

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
     if({{Session::get('status')}}==0)
           {
           
           	
        $('#exampleModal').modal('show');
         // {{Session::forget('status')}}
         // console.log({{Session::get('status')}});
          }
});
       

</script>



	
	@endsection