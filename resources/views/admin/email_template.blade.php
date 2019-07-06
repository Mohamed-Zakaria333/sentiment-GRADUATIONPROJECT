<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Simply Merit Email Template</title>
  
  <style>
  .email {
  display: inline-block;
  text-align: center;
  margin: 0 auto;
  background-color: #F0F4F7;
  border-top: 3px solid #27A9E0;
  border-bottom: 3px solid #27A9E0;
  width: 600px;
  margin: 0 auto;
  display: block;
}

.logo {
  margin: 0 auto;
  text-align: center;
  display: block;
  margin-top: 30px;
  margin-bottom: 30px;
}

.white-container {
  background: #ffffff;
  width: 560px;
  text-align: center;
  margin: 0 auto;
  padding: 30px 0;
  margin-top: -10px; height: 225px;

}

h3 {
  font-weight: light;
}


.button {
  padding: 18px 25px;
  background-color: #27A9E0;
  border-radius: 30px;
  text-decoration: none;
  color: white;
  text-transform: uppercase;
  font-size: 13px;
  letter-spacing: 1px;
}

.link {
  margin-top: 30px;
  text-decoration: none;
  color: #303141;
  display: inline-block;
}

.links {
  margin: 0 auto;
  text-align: center;
  display: block;
}

.sm {
  max-width: 25px;
  display: inline-block;
  margin: 30px 5px;
}

h3 {
  width: 400px;
  margin: 0 auto;
  margin-bottom: 50px;
}
  
  
  
  
  
  
  
  </style>
  
      

  
</head>

<body>

  <div style="font-family:Tondo; margin: 20px;">
  
<div class="email">
  
  <img class="logo" src="{{url($slidingimages_admin_path)}}/website_logo.PNG">


  <img src="{{url($uploaded_img_path)}}/{{$data['pro_img']}}">

  <div class="white-container">
    <h2>Dear: {{$data['fname']}} {{$data['lname']}}</h2>

    <h3>{{$data['content']}}.</h3>

    <a href="{{route('Home')}}" class="button">shop for more products</a>
    
  </div>
  <div class="links">
    <a class="link" href="{{route('Home')}}">products | </a>

    <a class="link" href="{{route('about')}}">About | </a>

    <a class="link" href="{{route('concat')}}">Contact</a>
   </div>
  
  <div class="social-media">
    <img class="sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/615414/facebook_icon.svg">
  
    <img class="sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/615414/twitter_icon.svg">
    
    <img class="sm" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/615414/linkedin_icon.svg">
  </div>
  
 </div>
  
  

</body>

</html>
