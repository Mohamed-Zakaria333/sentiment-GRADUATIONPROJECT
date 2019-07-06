<!DOCTYPE html>
<html lang="en">

<head>
   <style type="text/css">



              .pro1
             {
               float:left;
               width: 300px;
             /* // height: 200px;*/
               color: orange;
                overflow: auto;
               background-color:#080d14;
               margin:20px;
             }
/*            .pro > a 
            {
               width: 200px;
               height: 200px;
            }   */
            .searching1
            {

              margin:20px;
              margin-right: 100px;
              overflow: auto;
             /* background-color: red;*/
}

/*            }
 #search_id*/
  input[type=text] {
  background-color:white;
  color: #6d6d6d;
  width: 100%;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
   
  
  
} 



   </style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin|Dashboard</title>


  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">



  <!-- Bootstrap core CSS -->
  <link href="{{url($Lib_admin_path)}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="{{url($Lib_admin_path)}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{url($css_admin_path)}}/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="{{url($Lib_admin_path)}}/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="{{url($css_admin_path)}}/style.css" rel="stylesheet">
  <link href="{{url($css_admin_path)}}/analytic.css" rel="stylesheet">
  <link href="{{url($css_admin_path)}}/notification.css" rel="stylesheet">
  <link href="{{url($css_admin_path)}}/add_productStyles.css" rel="stylesheet">

  <link href="{{url($css_admin_path)}}/style-responsive.css" rel="stylesheet">
  <script src="{{url($Lib_admin_path)}}/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Ecommerce<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->

          <!-- settings end -->
          <!-- inbox dropdown start-->

          <!-- inbox dropdown end -->

























          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="{{ route('Notifiying')}}">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->






















      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('admin_logout') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->