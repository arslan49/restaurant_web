<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Canonical SEO -->

    <!--  Social tags      -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">
  
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet"/>
    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('assets/css/paper-dashboard.css')}}" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link href="{{asset('assets/font-awesome/latest/css/font-awesome.min.css')}}"  rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Welcome
                </a>
            </div>
            
            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if(Illuminate\Support\Facades\Session::get("company"))
                <li>
                    <a href="{{url('addcategoryview')}}">
                        <i class="ti-user"></i>
                        <p>Add Category</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('viewcategory')}}">
                        <i class="ti-list"></i>
                        <p>View Category</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('addproductview')}}">
                        <i class="ti-tag"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('getorders')}}/0">
                        <i class="ti-list-ol"></i>
                        <p>New Orders</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('getorders')}}/1">
                        <i class="ti-list-ol"></i>
                        <p>Completed Orders</p>
                    </a>
                </li>
                @elseif(Illuminate\Support\Facades\Session::get("admin"))
                <li>
                    <a href="{{url('requestcompany/0')}}">
                        <i class="ti-user"></i>
                        <p>Requests</p>
                    </a>
                </li>
                 <li>
                    <a href="{{url('requestcompany/1')}}">
                        <i class="ti-user"></i>
                        <p>Approved Companeis</p>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{url('logout')}}">
                        <i class="ti-lock"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                    @include("error")
                </div>
                <div class="collapse navbar-collapse">
                    
                </div>
            </div>
        </nav>
