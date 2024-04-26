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

                <div class="col-md-5">
                    <div class="about-text">
                        <form method="POST" action="{{URL::to('/customerlogin')}}" accept-charset="UTF-8">                        
                        {{ csrf_field() }}	
                        <div class="form-group">
                            <label for="email" class="title">Email Address</label>
                            <input required="" class="form-control" placeholder="Enter Email" name="email" type="text" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sub_title">Password</label>
                            <input class="form-control" placeholder="Enter Password" name="password" type="password" value="" id="password">
                        </div>

                        <div class="form-group">
                            <label class="login-bar">
                                <input type="checkbox" name="remember">
                                Remember Me
                            </label>
                        </div>

            <div class="form-group">
                <input class="btn btn-success" type="submit" value="Sign In">
                <a class="btn btn-link" href="{{URL::to('/createaccount')}}">
                    Create New Account?
                </a>
                <a class="btn btn-link" href="{{URL::to('/reset_password')}}">
                    Forgot Your Password?
                </a>
                
            </div>
            </form>                   
             </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
