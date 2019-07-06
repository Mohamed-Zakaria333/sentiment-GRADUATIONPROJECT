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
            <a class="active" href="{{ route('Editing')}}">
              <!-- fa fa-dashboard -->
              <i class="fa fa-dashboard"></i>
              <span>Edit/Delete</span>
              </a>
          </li>
          <li class="mt" >
            <a   href="{{ route('Adding')}}">
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
        <h1>Add new product </h1>
  <!--  //=============================================== -->
   @if (count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   <!-- //===================== -->
   @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
    product modified successfuly
     </div>
   @endif
 <!--   //===================================================== -->

<form class="cf" action="{{ route('exe_modifing') }}" enctype="multipart/form-data" method="post" >
  {{csrf_field()}}
  <div class="half left cf">
    <input type="text" id="input-name" placeholder="product Name" name="pro_name" value="{{$product->pro_name}}">
    <input type="text" id="input-salary" placeholder="price" name="pro_price" value="{{$product->pro_price}}">
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
     <input type="number" id="input-discount"  name="pro_amount" style="width:55%;margin-left: 18px;" placeholder="amount" value="{{$product->pro_amount}}">
  </div>
  <div class="half right cf">
    <img class="img" id="pro-image" src="{{url($uploaded_img_path)}}/{{$product->pro_imgPath}}" style="width:300px;height:200px">
    <label class="file">
     <input type="file" id="file-image"  name="file-image" aria-label="File browser example">
    <span class="file-custom"></span>
    </label>
  </div>
  <div class="half_right_cf1">
    <input type="hidden" value="{{$product->id}}" name="product_id">
    <textarea type="text" id="input-message" name="pro_description" placeholder="pro_description" value="{{$product->description}}">{{$product->pro_description}}</textarea>
  </div>  




















  
  <div class="half_right_cf2">
    <h2 style="text-align: left">features </h2>
    <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="{{$product->pro_returnPolicy}}">>
     <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="{{$product->pro_feature1}}">
      <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="{{$product->pro_feature2}}">
       <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="{{$product->pro_feature3}}">
        <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="{{$product->pro_feature4}}">
         <input type="text" id="input-name" placeholder="add faeture (optional)" style="margin-left: 0px;width: 100%" value="{{$product->pro_feature5}}">
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
@endsection
@section('custom_scripts')
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
  window.onload = SelectElement("selectcatagory", "{{$product->pro_catagory}}");

</script>
<!-- //============================== -->
<script type="text/javascript">
var paymentMethodsarr = "{{$product->pro_paymentMethods}}".split("|");
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



@endsection