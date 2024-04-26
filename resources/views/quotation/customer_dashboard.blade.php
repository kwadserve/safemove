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
            
            <h1>Customer Dahsboard Page here </h1>
               <!-- <a href="{{URL::to('/customerlogout')}}">Log Out</a>            -->
            </div>
        </div>
    </div>
</div>
@endsection
