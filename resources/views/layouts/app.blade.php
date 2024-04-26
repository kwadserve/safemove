<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">
  <title> Safemove</title>
  <link rel="stylesheet" href="{{URL::asset('public/global/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/global/css/bootstrap-extend.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/assets/css/site.min.css')}}"> 
  <link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/pages/login.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/pages/register.css')}}">
  <!-- Fonts -->
  <link rel="stylesheet" href="{{URL::asset('public/global/fonts/web-icons/web-icons.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/global/fonts/brand-icons/brand-icons.min.css')}}">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <link rel="stylesheet" href="public/global/vendor/ladda-bootstrap/ladda.css">
  {{Html::style('public/global/fonts/font-awesome/font-awesome.css')}}
  {{Html::style('public/global/fonts/weather-icons/weather-icons.css')}}
  {{Html::style('public/assets/css/bootstrap-glyphicons.css')}}
  
 <script src="{{URL::asset('public/global/vendor/modernizr/modernizr.js')}}"></script>
  <script src="{{URL::asset('public/global/vendor/breakpoints/breakpoints.js')}}"></script>
  <script src="{{URL::asset('public/global/vendor/jquery/jquery.js')}}"></script>
  <script>
  Breakpoints();
  </script>
 

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
@yield('content')
</div>

<script src="{{URL::asset('public/global/vendor/bootstrap/bootstrap.js')}}"></script>
<script src="{{URL::asset('public/global/vendor/animsition/animsition.js')}}"></script>
<script src="{{URL::asset('public/global/vendor/asscrollable/jquery.asScrollable.all.js')}}"></script>
<script src="{{URL::asset('public/global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
<script src="{{URL::asset('public/global/js/core.js')}}"></script>
<script src="{{URL::asset('public/assets/js/site.js')}}"></script>
<script src="{{URL::asset('public/assets/js/sections/sidebar.js')}}"></script>
<script src="{{URL::asset('public/global/js/components/asscrollable.js')}}"></script>
<script src="{{URL::asset('public/global/js/components/animsition.js')}}"></script>
<script src="{{URL::asset('public/global/js/components/slidepanel.js')}}"></script>
<script src="{{URL::asset('public/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('public/global/js/components/jquery-placeholder.js')}}"></script>

<script src="{{URL::asset('public/global/vendor/ladda-bootstrap/spin.js')}}"></script>
  <script src="{{URL::asset('public/global/vendor/ladda-bootstrap/ladda.js')}}"></script>
<script src="{{URL::asset('public/global/js/components/ladda-bootstrap.js')}}"></script> 
 
<script>
	(function(document, window, $) {
	'use strict';
	var Site = window.Site;
	$(document).ready(function() {
	  Site.run();
	});
	})(document, window, jQuery);

	$('.loadingclick').on('click', function() {
	var $this = $(this);
	$this.button('loading');
	setTimeout(function() {
	   $this.button('reset');
	}, 8000000);
	});
</script>  
  
</body>
</html>