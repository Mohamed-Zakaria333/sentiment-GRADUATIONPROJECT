@extends('admin.layouts.master')
@section('sidebar')
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{url($avatars_path)}}/{{Session::get('active_admin')[1]}}" class="img-circle" width="80"></a></p>
          <h5 class="centered"><span style="margin-right: 10px">{{Session::get('active_admin')[2]}}</span>{{Session::get('active_admin')[3]}}</h5>
          <li class="mt">
            <!-- mt -->
            <a  href="{{ route('Editing')}}">
              <!-- fa fa-dashboard -->
              <i class="fa fa-dashboard"></i>
              <span>Edit/Delete</span>
              </a>
          </li>
          <li class="mt">
            <a  href="{{ route('Adding')}}">
              <i class="fa fa-desktop"></i>
              <span>ADD product</span>
              </a>
 
          </li>
          <li class="mt">
            <a href="{{ route('Analyting',[Config::get('first_analyting_product')])}}">
              <i class="fa fa-cogs"></i>
              <span>Comment analytic</span>
              </a>
 
          </li>
          <li class="mt">
            <a href="{{ route('Requesting')}}">
              <i class="fa fa-book"></i>
              <span>Product Requests</span>
              </a>
 
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>



@endsection
@section('content')
   <!--  //========================================================== -->
    <section id="main-content">
      <section class="wrapper">
    <section id="main-content">
      <section class="wrapper" >
   @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 40px">
    message sended successfuly to  <span style="color:#22242a">{{$number}}</span> users</h3>
     </div>
   @endif





    <h3 align="center"style="color: #4ecdc4">this message will sended to <span style="color:#22242a">{{$number}}</span> users</h3>
    
<form class="cf" action="{{route('Mailing_ms')}}"  method="post">
  @csrf
  <div class="half_left_cf">
    <label style="float: left;font-size: 20px">from</label>
    <input type="email" id="input-email" value="{{$source}}" readonly>
    <label style="float: left;font-size: 20px">to</label>
    <input type="email" id="input-email" value="{{$user}}" readonly>
    <label style="float: left;font-size: 20px">subject</label>
    <input type="text" id="input-discount" value="Replaying your comment on product    ({{$product->pro_name}})" style="margin-left: 0px;width: 100%" name="subject" >

    
  </div>
 
  <div class="half_right_cf1">
    <label style="float: left;font-size: 20px">message</label>
    <textarea name="content" type="text" id="input-message" style="font-size: 16px">Thank you for your interest in commenting on our product. We read your comment and focused on some things that might bother you and which we will improve in the near future</textarea>
  </div>  



<input type="hidden"  name="pro_id" value="{{$product->id}}">
<input type="hidden"  name="neg_users" value="{{$neg_users}}">

  <input type="submit" value="send_broadcasting" id="input-submit"style="background-color: #2f323a;margin-bottom: 100px">
</form>



    </section>
  </section>
@endsection
