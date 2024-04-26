@extends('layouts.web_template')

@section('content')
<div class="frontend_content">
        <div class="slider-page"></div>
    <div class="about-area">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        @if (session()->get('error'))
                            <div class="alert alert-danger">
                            {!! session()->get('error') !!}
                            </div>
                        @endif
                        @if (session()->get('status'))
                            <div class="alert alert-success">
                            {!! session()->get('status') !!}
                            </div>
                        @endif
                   </div>
                    <div class="about-text">
                        <form method="POST" action="{{URL::to('/createaccount')}}" accept-charset="UTF-8">                        
                        {{ csrf_field() }}
                        <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="title">First Name</label>
                                <input class="form-control" placeholder="Enter First Name" name="first_name" type="text" id="first_name">
                            </div>	
                            <div class="form-group">
                                <label for="email" class="title">Last Name</label>
                                <input class="form-control" placeholder="Enter Last Name" name="last_name" type="text" id="last_name">
                            </div>	
                            <div class="form-group">
                                <label for="email" class="title">Username</label>
                                <input required="" class="form-control" placeholder="Enter Username" name="username" type="text" id="username">
                            </div>
                        </div>

                        <div class="col-md-4">	
                            <div class="form-group">
                                <label for="email" class="title">Email Address</label>
                                <input required="" class="form-control" placeholder="Enter Email" name="email" type="text" id="email">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sub_title">Password</label>
                                <input class="form-control" placeholder="Enter Password" name="password" type="password" value="" id="password">
                            </div>
                            <div class="form-group">
                                <label for="email" class="title">Address</label>
                                <textarea class="form-control" placeholder="Enter Address" name="address" id="address"></textarea>
                            </div>	
                       </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Save Information">
                                <a class="btn btn-link" href="{{URL::to('/customerlogin')}}">
                                    Go to Login?
                                </a>                
                            </div>
                    </div>
            </form>                   
             </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
