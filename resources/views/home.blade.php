@extends('layouts.web_template')

@section('content')
<style>
a.shift {
    color: #fff;
}
.shift {
    width: 150px;
    display: inline-block;
    vertical-align: middle;
    font-size: 15px;
    padding: 5px ;
    text-align: center;
}
.btnPrimary {
    background-color: #f16e25;
    color: #fff;
    border-radius: 5px;
    text-align: center;
    border: 1px solid #f16e25;
}
.shiftBtns span {
    margin: 0 25px;
    font-size: 12px;
    color: #666;
    display: inline-block;
    text-align: center;
    width: 31px;
    background-color: #eee;
    padding: 7px 0;
    border-radius: 50%;
}
</style>
<div class="frontend_content">
    <!--<div class="slider-bg1">   
        <br/><br/><br/><br/><br/>
        <div class="container"><br/>
            <div class="col-md-12">
			<div class="col-md-8 col-md-offset-2 text-center">
              <h1 style="color:#5cb85c; font-size:50px; ">We Move You</h1> 
              <h1 style="color:#5cb85c; font-size:50px; ">Safely and Gracefully</h1> <br/>
            </div>
			<div style="clear:both"></div><br/>
			
            <div class="input-group">
                    <input type="text" class="form-control" style="height:65px" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-success"  style="height:64px" type="button"><i class="fa fa-search fa-fw"></i> Search</button>
                    </span>
                </div>
            </div>
       </div><br/><br/>
    </div>-->
    @if (session('SuccessEnq'))
        <script> alert("Thanks! For Enquiry.")</script>
    @endif
  <div class="container-fluid"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{URL::asset('public/assets/getitready_front_end/img/slide1.jpg')}}" alt="Los Angeles" style="width:100%;background-size: cover;">
      </div>

      <div class="item">
        <img src="{{URL::asset('public/assets/getitready_front_end/img/slide2.jpeg')}}" alt="Chicago" style="width:100%;background-size: cover;">
      </div>
    
      <div class="item">
        <img src="{{URL::asset('public/assets/getitready_front_end/img/slide3.jpg')}}" alt="New york" style="width:100%;background-size: cover;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>  
   
<div class="works-area" style="background-color:white">
    <div class="container">
        <div class="row" style="background-color:#F5F5F5; box-shadow:3px 3px 5px 6px gray;">
            <h2 style="text-align:center;">We've built a very simple yet efficient tool !</h2>
            <h4 style="text-align:center;">Try it out. Start by telling us what you would like to shift?</h4>
            
            <div class="col-md-3">
            </div>
            <div class="shiftBtns">
				<a href="{{URL::to('/shiftHome')}}" class="btnPrimary shift"><i class="fa fa-home" style="font-size:20px;"></i>&nbsp; Shift Home</a>
				<span>OR</span>
				<a href="{{URL::to('/shiftOffice')}}" class="btnPrimary shift"><i class="fa fa-home" style="font-size:20px;"></i>&nbsp; Shift Office</a>
				<span>OR</span>
				<a href="{{URL::to('/shiftVehicle')}}" class="btnPrimary shift"><i class="fa fa-car" style="font-size:18px;"></i>&nbsp; Shift Vehicle</a>
			</div>
            <br>
	    </div>
    </div>
</div>

  <!--slider-area-end-->

<div class="works-area">
        <div class="container">

            <div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12">
	    <div class="work-item float-left mrg-left">
		<div class="booking-icone_icon">
		    <i class="fa fa-user-circle" aria-hidden="true"></i>
		</div>
		<div class="inner-title">
		    <h5>We are Fully Insured </h5>
		</div>
	    </div>
	    <div class="work-item float-left  mrg-left1">
		<div class="booking-icone_icon">
		    <i class="fa fa-handshake-o" aria-hidden="true"></i>
		</div>
		<div class="inner-title">
		    <h5>Satisfaction Guaranteed </h5>
		</div>
	    </div>
	    <div class="work-item float-left  mrg-left1">
		<div class="booking-icone_icon">
		    <i class="fa fa-users" aria-hidden="true"></i>
		</div>
		<div class="inner-title">
		    <h5>Highly Trained Staff </h5>
		</div>
	    </div>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
	    <div class="work-img">
		<img src="{{URL::asset('public/assets/getitready_front_end/img/center.jpg')}}" alt="">
	    </div>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
	    <div class="work-item float-right">
		<div class="booking-icone_icon circle">
		    <i class="fa fa-check" aria-hidden="true"></i>
		</div>
		<div class="inner-title text-left">
		    <h5> We Place Your Cargo Safely</h5>
		</div>
	    </div>
	    <div class="work-item float-right">
		<div class="booking-icone_icon circle">
		    <i class="fa fa-usd" aria-hidden="true"></i>
		</div>
		<div class="inner-title text-left">
		    <h5>Straight Forward Pricing</h5>
		</div>
	    </div>
	    <div class="work-item float-right">
		<div class="booking-icone_icon circle">
		    <i class="fa fa-recycle" aria-hidden="true"></i>
		</div>
		<div class="inner-title text-left">
		    <h5> Available 7 days in a week</h5>
		</div>
	    </div>
	</div>
</div>
        </div>
    </div>
    
	 <!--our-services-area-start-->
	 <!--<div class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="service-taitle">
                        <h1>OUR CLEANING SERVICES</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                       
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                         <img src="{{URL::asset('public/assets/getitready_front_end/images/1.jpg')}}" alt="Steam Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Steam Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                      <img src="{{URL::asset('public/assets/getitready_front_end/images/3-windowcleaning.jpg')}}" alt="Window Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Window Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                         <img src="{{URL::asset('public/assets/getitready_front_end/images/3.jpg')}}" alt="Housekeeping">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Housekeeping</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                                 
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                         <img src="{{URL::asset('public/assets/getitready_front_end/images/7.jpg')}}" alt="Construction Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Construction Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                       <img src="{{URL::asset('public/assets/getitready_front_end/images/8.jpg')}}" alt="Strata Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Strata Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                       <img src="{{URL::asset('public/assets/getitready_front_end/images/9.jpg')}}" alt="Commercial Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Commercial Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                      <img src="{{URL::asset('public/assets/getitready_front_end/images/gutterclearning1.jpg')}}" alt="Gutter Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Gutter Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <a title="View Details" href="#">
                                    <div class="service-box">
                                         <img src="{{URL::asset('public/assets/getitready_front_end/images/11.jpg')}}" alt="Pressure Cleaning">
                                    </div>
                                </a>
                                <div class="service-box-inner">
                                    <a title="View Details" href="#">book now</a>
                                </div>
                                <div class="service-box-info">
                                    <a title="View Details" href="#">
                                        <h4>Pressure Cleaning</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                                                                                                                                                                                                                        

            </div>
        </div>
    </div>-->
    <!--our-services-area-end-->
	</div>
@endsection
