<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="UEmfaJQBiRYOzBmorrLWrgPNo0iOnzoVbj8pkAQ7">
    <link rel="icon" href="" type="image/png" sizes="16x17">
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"><title>SafeMove</title><meta name="description" content="Need It Done | Need It Done">
		<meta name="keywords" content="Need It Done | Need It Done">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"><meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:site_name" content="Need It Done"/>
		<meta property="og:locale" content="bn_BD"/><meta property="og:type" content="article"/>
		<meta property="og:title" content="Need It Done"/>
		<meta property="og:description" content="Need It Done | Need It Done"/>
		<meta property="og:url" content="#" /><meta property="og:image" content=""/>
		<meta property="fb:pages" content="d5587474"/>
		<link href="https://fonts.googleapis.com/css?family=Yantramanav:300,400,500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Metal+Mania|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
			rel="stylesheet">
		<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/all.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/google-places.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/plugin.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/flaticon.css')}}">		
		<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/style.css')}}">
		<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/uc_icon.css')}}">    <!-- Modernizr -->
		<script src="{{URL::asset('public/assets/getitready_front_end/js/modernizr-2.8.3.min.js')}}"></script>
		<link rel="stylesheet" href="{{URL::asset('public/global/vendor/select2/select2.css')}}">

		<script src="{{URL::asset('public/assets/getitready_front_end/js/pin.v2.js')}}"></script>
</head>
<body>

<script src="{{URL::asset('public/assets/getitready_front_end/js/jquery.min.js')}}"></script>
<header>
    <div class="header-area header_p">
        <div class="container">
            <div class="row">
                <div class="responsive">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <ul>
                            <li><a class="active" href="{{URL::to('/')}}">Home</a></li>
                            <li><a href="{{URL::to('/reviews')}}">Testimonials</a></li>
                            <li><a href="{{URL::to('/customerfaq')}}">Blog</a></li>
                            <li><a href="{{URL::to('/customerservice')}}">About Us</a></li>
                            <li><a href="{{URL::to('/contactus')}}">Contact Us</a></li>
                            <!--<li><a href="{{URL::to('/quotation')}}">Instant Quote</a></li>-->
                            <li><a  href="{{URL::to('/customerlogin')}}">Login</a></li>
                        </ul>
                    </div>
                    <span style="cursor:pointer" onclick="openNav()">&#9776;</span>
                </div>
            </div>
            <div class="row">
                <!--header-logo-start-->
                <div class="col-md-2 col-sm-2 col-xs-3">
                    <div class="header-logo">
                        <a href="{{URL::to('/')}}">
                            <img src="{{URL::asset('public/assets/getitready_front_end/img/logo.png')}}" alt="home-logo" style="margin-top:-50px">
                        </a>

                    </div>
                </div>
                <!--header-menu-start-->
                <div class="col-md-5 col-sm-8 col-xs-9">
                    <div class="header-menu">
                             <!--<ul>  
								<li>
									<a href="{{URL::to('/')}}">Home</a>
								</li>
								<li>
									<a href="{{URL::to('/customerservice')}}">Testimonials</a>
								</li> 
                                <li>
                                    <a href="{{URL::to('/reviews')}}">Blog</a>
								</li>  
								<li>
									<a href="{{URL::to('/customerfaq')}}">About Us</a>
								</li>                                    
								<li>
									<a href="{{URL::to('/contactus')}}">Contact Us</a>
								</li>                                         
                              </ul>-->
                    </div>
                </div>
                <!-- header-right-area-->
                <div class="col-md-5 col-sm-2">
                    <div class="header-right hidet_2">
                        <ul>                                 
                            <!--<li class="active">
                                <a href="{{URL::to('/quotation')}}">Instant Quote</a>
                            </li>-->
                            <li class="active">
                                <a href="{{URL::to('/quotation')}}">Testimonials</a>
                            </li>
                            <li class="active">
                                <a href="{{URL::to('/quotation')}}">Blog</a>
                            </li>
                            <?php   
                           
                                $customerid =  Auth::guard('customer')->id(); 
                                if($customerid){
                                ?>
                                    <li class=" active dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <i class="fa fa-caret-down"></i> <?php 
                                      echo  Auth::guard('customer')->user()->first_name.' '.Auth::guard('customer')->user()->last_name; 
                                        
                                        ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="{{URL::to('/customerhome')}}"></i> Manage Projecet</a></li>                        
                                        <li><a href="{{URL::to('/customerlogout')}}"><i class="fa fa-sign-out fa-fw"></i>Logout</a></li>
                                    </ul>
                                    </li>
                                <?php 
                                } else{
                                ?>
                                <li class="active">
                                    <a  href="{{URL::to('/login')}}">Login</a>
                                </li>
                                <?php
                                }   
                                ?> 
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
.header-right ul li ul li a{
    display: inline-block;
    font-size: 14px;
   text-transform: none !important;
    color: #333;
    line-height: 18px;
}
.header-right ul li ul li {
    display: inline-block;
    font-size: 14px;
    padding: 5px 2px;
    color: #333;
    line-height: 18px;
}
</style>

@yield('content')



    
   

    
</div>

<footer id="footer-section" class="footer-section ow-background" style="margin-top: -25px;">
    <div class="fotter-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-7">
                    <div class="fotter-text">
                        <div class="footer-bottom">
                            <p>
                                Copyright © 2019 All Rights Reserved by Need It Done.
                                Developed and Safemove 
                                <a target="_blank" href="">
								   Safemove
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-5">
                    <div class="fotter-sochel">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container /- -->
</footer>
<script src="{{URL::asset('public/assets/getitready_front_end/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('public/assets/getitready_front_end/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('public/assets/getitready_front_end/js/plugins.js')}}"></script>
<script src="{{URL::asset('public/assets/getitready_front_end/js/main.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('public/assets/getitready_front_end/css/bootstrap-datepicker.min.css')}}">
<script src="{{URL::asset('public/global/vendor/select2/select2.min.js')}}"></script> 
</body>
</html>
