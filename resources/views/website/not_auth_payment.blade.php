<!DOCTYPE html>
<html lang="zxx">

<head>
	<title> Store Ecommerce| payment </title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<link href="{{url($css_path)}}/rating.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">





  
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

           
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="{{url($css_path)}}/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{url($css_path)}}/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{url($css_path)}}/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{url($css_path)}}/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{{url($css_path)}}/menu.css" rel="stylesheet" type="text/css" media="all" />
	
	@yield('custom_header_links')
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->
<!-- ================================================================================== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css'>
<!-- ================================================================================== -->

     <style type="text/css">
/* rating starts css start
animation
*/

/* rating starts css start*/
/*//=================================================================================*/

.formFill,
.formFill ul {
    margin: 0;
    padding: 0;
    width: 1000px;
    list-style: none;
}

.hide {
    display: none;
}

.tab-buttons{
    display: inline-block;
    background: #CCCCCC;
    padding: 10px;
    color: #000;
    font-size: 16px;
    width: 498px;
    cursor: pointer;
    -webkit-border-radius: 4px 4px 0px 0px;
    -moz-border-radius: 4px 4px 0px 0px;
    border-radius: 4px 4px 0px 0px;
}

  .tab-buttons-container a{
    text-decoration: none !important;
    color: #000;
 
  }

.form-container {
    min-height: 400px;
    width: 1000px;
    background: #fff;
    border-top: 1px solid #CCCCCC;
    line-height: 24px;
    padding-left: 15px;
    padding-top: 10px;
    overflow:hidden;
}

.activeTab {
    background: #BC2D44;
    color: #fff !important;
}

#font {
    font-size: 16px;
}


     </style>



</head>

<body>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
								<i class="fas fa-map-marker mr-2"></i>Select Location</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 001 234 5678
						</li>
     @if(auth::check())
			            <li class="text-center border-right text-white">
							<a href="{{ route('custom_logout')}}"  class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i> logout </a>
						</li>
						<li class="text-center text-white">
							<img src="{{url($avatars_path)}}/{{Auth::user()->avatar}}" style="border-radius: 15px" width="30">
							<span>
								{{Auth::user()->Fname}}
							</span>
								<span>
								{{Auth::user()->Lname}}
							</span>

						</li>            

 @else
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Register </a>
						</li>

 @endif
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>


	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" class="form-control" placeholder=" " name="Name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="Password" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Register Now</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input type="text" class="form-control" placeholder=" " name="Name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="Email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirm Password</label>
							<input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Register">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index.html" class="font-weight-bold font-italic">
							<img src="{{url($img_path)}}/logo2.png" alt=" " class="img-fluid">Electro Store
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->

						
						
						
						
						
						
						
						
						
		
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1" style="float: left;">
	
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.html">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
				

						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="about.html">About Us</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>






















































	<ul class="formFill">
    <li class="tab-buttons-container" >
        <a target="_self" id="CreditCardTab"style="background-color: #0879c9"class="tab-buttons activeTab">Debit/Credit Card</a>

    </li>
    <li class="form-container">
        <ul class="CreditCardTabInfo">
            <form id="payment-form-cc" name="payment-form-cc" class="payment-form" method="post" role="form" action="process-payment.php" novalidate="novalidate">
                <input type="hidden" name="cc-confirm" value="true">
                <div id="message-status"></div>
                <div class="row">
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Billing Adress</legend>
                            <div class="form-group col-xs-6">
                                <input id="cardholders-first-name" class="form-control" type="text" name="cardholders-first-name" placeholder="First Name" style="cursor: auto;">
                            </div>
                            <div class="form-group col-xs-6">
                                <input id="cardholders-last-name" class="form-control" type="text" name="cardholders-last-name" placeholder="Last Name">
                            </div>
                            <div class="form-group col-xs-12">
                                <input id="street-address" class="form-control" type="text" name="street-address" placeholder="Street Address">
                            </div>
                            <div class="form-group col-xs-6">
                                <input id="city" class="form-control" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-xs-3">
                                <input id="state" class="form-control" type="text" name="state" placeholder="State" maxlength="2">
                            </div>
                            <div class="form-group col-xs-3">
                                <input id="zip" class="form-control" type="text" name="zip" maxlength="5" placeholder="Zip">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset>
                            <legend>Payment Type</legend>
                            <div class="form-group col-xs-8">
                                <input id="card-number" class="form-control" type="text" name="card-number" maxlength="19" autocomplete="off" placeholder="Debit/Credit Card Number">
                            </div>
                            <div class="form-group col-xs-4">
                                <input id="cvv" class="form-control" type="text" name="cvv" maxlength="4" placeholder="CVV">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exp-month" class="control-label">Exp Month</label>
                                <select name="exp-month" id="exp-month" class="form-control">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exp-year" class="control-label">Exp Year</label>
                                <select id="exp-year" class="form-control" name="exp-year">
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="payment-amount" class="control-label">Payment amount</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-usd"></span>
                                    </div>
                                    <input id="payment-amount" class="form-control " type="text" name="payment-amount" placeholder="XXX.XX">
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <input id="payment-description" name="payment-description" class="form-control" type="text" placeholder="Payment Description">
                            </div>
                            <div class="form-group col-xs-12">
                                <div class="checkbox">
                                    <label class="legal">
                                        <input type="checkbox" name="legal" id="legal"> I agree to the <a href="/deposit-disclaimer">Deposit Disclaimer</a> and <a href="/privacy">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 pull-right">
                                <button id="submit-credit" type="submit" class="btn btn-lg">Submit Payment</button>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>
        </ul>
        <ul class="BankAccountTabInfo hide">
            <form id="payment-form-bank" name="payment-form-bank" class="payment-form" method="post" role="form" action="process-payment.php" novalidate="novalidate">
                <input type="hidden" name="bank-confirm" value="true">
                <div id="message-status"></div>
                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <fieldset>
                            <legend>Bank Account Info</legend>
                            <div class="form-group col-md-6 col-sm-6">
                                <label class="radio-inline">
                                    <input type="radio" name="bank-account-type" id="checking" value="Checking" checked=""> Checking
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="bank-account-type" id="savings" value="Savings"> Savings
                                </label>
                            </div>
                            <div class="form-group col-xs-12">
                                <input id="bank-account-holders-name" class="form-control" type="text" name="bank-account-holders-name" placeholder="Account Holder's Name">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="routing-number" class="control-label">Routing Number</label>
                                <input id="routing-number" class="form-control" type="text" name="routing-number" maxlength="9" placeholder="Routing Number">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="bank-account-number" class="control-label">Bank Account Number</label>
                                <input id="bank-account-number" class="form-control" type="text" name="bank-account-number" placeholder="Account Number">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-6">
                        <fieldset>
                            <legend>Payment Type</legend>
                            <div class="form-group col-xs-6">
                                <label for="bank-payment-amount" class="control-label">Payment amount</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-usd"></span>
                                    </div>
                                    <input id="payment-amount" class="form-control " type="text" name="payment-amount" placeholder="XXX.XX">
                                </div>
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="payment-description" class="control-label">Payment Description</label>
                                <input id="payment-description" name="payment-description" class="form-control" type="text" placeholder="Payment Description">
                            </div>
                            <div class="form-group col-xs-12">
                                <div class="checkbox">
                                    <label class="legal">
                                        <input type="checkbox" name="legal" id="legal"> I agree to the <a href="/deposit-terms">Deposit Terms</a> and <a href="/privacy">Privacy Policy</a>.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 pull-right">
                                <button id="submit-credit" type="submit" class="btn btn-lg">Submit Payment</button>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>
        </ul>
    </li>
</ul>
<script>
$(document).ready(function() {
    $('#CreditCardTab').click(function() {
        $(this).addClass('activeTab');
        $('#BankAccountTab').removeClass('activeTab');
        $('.CreditCardTabInfo').removeClass('hide');
        $('.BankAccountTabInfo').addClass('hide');
        $('.BankAccountTabInfo').removeClass('activeTab');

    });
    $('#BankAccountTab').click(function() {
        $(this).addClass('activeTab');
        $('#CreditCardTab').removeClass('activeTab');
        $('.BankAccountTabInfo').removeClass('hide');
        $('.CreditCardTabInfo').addClass('hide');
        $('.CreditCardTabInfo').removeClass('activeTab');
    });
});
</script>







