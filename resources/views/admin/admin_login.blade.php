<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
  
  
      <link rel="stylesheet" href="{{url($css_admin_path)}}/log_admin.css">

  
</head>

<body>

  <div class="custom-main-admin-login">
	<div class="custom-login-wrapper">
		<div class="custom-round-form">
			<div class="loading-ring"></div>
			<div class="login-form">
				<div class="login-icon">
					<span class="text">Admin Login</span><i class="fas fa-sign-in-alt"></i>
				</div>
				<form method="post" action="{{ route('admin_login')}}">
                 						@csrf
						         

		                  @if (count($errors) > 0)
                           <div class="alert alert-danger">
                                <ul style="list-style-type: none">
                            @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                          </ul>
                           </div>
                           @endif
                                        @if ($message = Session::get('success'))
                                       <span style="font-size: 15px;color: #0fc1f5">
                                       Admin not found

                                       </span>
                                      
                                    
                                              @endif





			<div class="login-form-section">
					<label>Email</label>
					<input type="email" name="email">
					<label>Password</label>
					<input type="password" name="password">
					<button class="login" type="submit">Login</button>
	</div>
	</form>
			</div>
		</div>
	</div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://use.fontawesome.com/releases/v5.1.0/js/all.js'></script>

  

 


  
<script type="text/javascript">
	
$('.login-form button.login').click(function(){
	$('.custom-main-admin-login').toggleClass('loading');
});




</script>
</body>

</html>
