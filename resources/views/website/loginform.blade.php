@extends('website.layouts.master')
@section('custom_iclude')
@endsection



@section('content')
@endsection
	@section('website_custom_scripts')
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




	
	@endsection