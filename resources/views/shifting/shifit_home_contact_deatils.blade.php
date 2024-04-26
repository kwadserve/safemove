@extends('layouts.web_template')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('public/assets/shiftingHome/shifting.css') }}"/>
<style>
</style>
<div class="frontend_content">
    <div class="works-area" style="padding: 40px 0px;">
    </div>
    <section>
        <div class="container" class="backgroundImg">
            <div class="row">
                <div class="board">
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li>
                             <a>
                              <span class="round-tabs one">
                                      <img src="{{URL::asset('public/images/contract.png')}}" class="imgClass">
                              </span></a>
                            </li>

                            <li><a>
                                 <span class="round-tabs two">
                                     <img src="{{URL::asset('public/images/sofa.png')}}" class="imgClass">
                                 </span></a>
                            </li>
                            <li class="active">
                             <a href="#home" data-toggle="tab" title="welcome">
                                 <span class="round-tabs three">
                                      <img src="{{URL::asset('public/images/path.png')}}" class="imgClass">
                                 </span> </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="container" style="transform: none;">
                                <div class="row" style="transform: none;">
                                    <div class="col-md-12">
                                        <form method="POST" role="form" action="{{url('/shiftingHome/addContactDetails')}}" accept-charset="UTF-8" id="contactDetailsForm" name="contactDetailsForm" >
                                    {{ csrf_field() }}
                                    @if($addFormFlag !='from add vehicle')
                                    <h3>Property Details</h3><br>
                                    <div class="row">
                                        <div class="form-group" style="padding-left: 5%">
                                            <table width="100%" >
                                                <tr>
                                                    <td style="padding-left:13px;" width="50%" colspan="2"><label>Property Details (Source):</label></td>
                                                    <td colspan="2" width="50%"><label>Property Details (Destination):</label></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left:13px;" width="50%" colspan="2">
                                                        <div class="input-group">
                                                            <div id="radioBtn" class="btn-group">
                                                                <a class="btn btn-primary btn-sm active" data-toggle="sourceType" data-title="Apartment">Apartment</a>
                                                                <a class="btn btn-primary btn-sm notActive" data-toggle="sourceType" data-title="Bungalow">Bungalow</a>
                                                            </div>
                                                            <input type="hidden" name="sourceType" id="sourceType" value="Apartment">
                                                            <div class="col-md-5 pull-right" style="padding-left:0px;display:block;" id="sourceFloorDiv">
                                                                <input class="form-control" placeholder="Floor No..." name="sourceFloorNo" type="text" id="sourceFloorNo" value="{{ old('sourceFloorNo') }}" >
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2" width="50%">
                                                        <div class="input-group">
                                                            <div id="radioBtn" class="btn-group">
                                                                <a class="btn btn-primary btn-sm active" data-toggle="destinationType" data-title="Apartment">Apartment</a>
                                                                <a class="btn btn-primary btn-sm notActive" data-toggle="destinationType" data-title="Bungalow">Bungalow</a>
                                                            </div>
                                                            <input type="hidden" name="destinationType" id="destinationType"  value="Apartment">
                                                            <div class="col-md-5  pull-right" style="padding-left:0px;display:block;" id="destinationFloorDiv">
                                                                <input class="form-control" placeholder="Floor No..." name="destinationFloorNo" type="text" id="destinationFloorNo" value="{{ old('destinationFloorNo') }}" >
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0px !important;padding-bottom: 0px !important;"> </td>
                                                    <td style="padding:0px !important;padding-bottom: 0px !important;"><span id="src_floor_error"></span></td>
                                                    <td style="padding:0px !important;padding-bottom: 0px !important;"> </td>
                                                    <td style="padding-top:0px !important;padding-bottom: 0px !important;"><span id="dest_floor_error"></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left:13px;" width="25%"><label>Packing Services Request</label></td>
                                                    <td width="25%">
                                                        <div class="input-group">
                                                            <div id="radioBtn" class="btn-group">
                                                                <a class="btn btn-primary btn-sm active" data-toggle="packingService" data-title="Y">Yes</a>
                                                                <a class="btn btn-primary btn-sm notActive" data-toggle="packingService" data-title="N">No</a>
                                                            </div>
                                                            <input type="hidden" name="packingService" id="packingService" value="Y">
                                                        </div>
                                                    </td>
                                                    <td width="25%"><label>Unpacking Services Request</label></td>
                                                    <td width="25%">
                                                        <div class="input-group">
                                                            <div id="radioBtn" class="btn-group">
                                                                <a class="btn btn-primary btn-sm active" data-toggle="unPackingService" data-title="Y">Yes</a>
                                                                <a class="btn btn-primary btn-sm notActive" data-toggle="unPackingService" data-title="N">No</a>
                                                            </div>
                                                            <input type="hidden" name="unPackingService" id="unPackingService" value="Y">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left:13px;" width="25%"><label> loading Services Request</label></td>
                                                    <td width="25%">
                                                        <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-primary btn-sm active" data-toggle="loadingService" data-title="Y">Yes</a>
                                                            <a class="btn btn-primary btn-sm notActive" data-toggle="loadingService" data-title="N">No</a>
                                                        </div>
                                                        <input type="hidden" name="loadingService" id="loadingService" value="Y">
                                                    </td>
                                                    <td width="25%"><label> Unloading Services Request</label></td>
                                                    <td width="25%">
                                                        <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-primary btn-sm active" data-toggle="unLoadingService" data-title="Y">Yes</a>
                                                            <a class="btn btn-primary btn-sm notActive" data-toggle="unLoadingService" data-title="N">No</a>
                                                        </div>
                                                        <input type="hidden" name="unLoadingService" id="unLoadingService" value="Y">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-left:13px;" width="25%"><label>Elevator Available</label></td>
                                                    <td width="25%">
                                                        <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-primary btn-sm active" data-toggle="sourceElevator" data-title="Y">Yes</a>
                                                            <a class="btn btn-primary btn-sm notActive" data-toggle="sourceElevator" data-title="N">No</a>
                                                        </div>
                                                        <input type="hidden" name="sourceElevator" id="sourceElevator"  value="Y">
                                                    </td>
                                                    <td width="25%"><label>Elevator Available </label></td>
                                                    <td width="25%">
                                                        <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-primary btn-sm active" data-toggle="destinationElevator" data-title="Y">Yes</a>
                                                            <a class="btn btn-primary btn-sm notActive" data-toggle="destinationElevator" data-title="N">No</a>
                                                        </div>
                                                        <input type="hidden" name="destinationElevator" id="destinationElevator"  value="Y">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <input type="hidden" name="last_eq_id" value="{{ $last_eq_id}}">
                                        <hr>
                                    </div>
                                    @endif
                                    <h3>Address Details</h3><br>
                                    <div class="row" style="padding-left: 5%">
                                        <div class="col-md-5">
                                            <h4>Source Address</h4>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" placeholder="Enter Source Address" name="cust_source_address1" type="text" id="cust_source_address1" value="{{ old('cust_email') }}" rows="3" ></textarea>
                                                    @if ($errors->has('cust_source_address1'))
                            							<span class="help-block" role="alert">
                            								<label style="color:red">{{ $errors->first('cust_source_address1') }}</label>
                            							</span>
                            						@endif
                                                </div>
                                            </div><br><br><br>
                                            {{--<div class="form-group">--}}
                                                {{--<div class="col-md-12">--}}
                                                    {{--<label>Address Line 2</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Address Line 2..." name="cust_source_address2" type="text" id="cust_source_address2" value="{{ old('cust_email') }}" >--}}
                                                    {{--@if ($errors->has('cust_source_address2'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_source_address2') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div><br><br><br>--}}
                                            {{--<div class="form-group">    --}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>City</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your City..." name="cust_source_city" type="text" id="cust_source_city" value="{{ old('cust_source_city') }}">--}}
                                                    {{--@if ($errors->has('cust_source_city'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_source_city') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>Pincode</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your Pincode..." name="cust_source_pincode" type="text" id="cust_source_pincode" value="{{ old('cust_source_pincode') }}" >--}}
                                                    {{--@if ($errors->has('cust_source_pincode'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_source_pincode') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div><br><br><br>--}}
                                            {{--<div class="form-group">    --}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>State</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your State..." name="cust_source_state" type="text" id="cust_source_state"  value="{{ old('cust_source_state') }}">--}}
                                                    {{--@if ($errors->has('cust_source_state'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_source_state') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>Country</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your Country..." name="cust_source_country" type="text" id="cust_source_country" value="{{ old('cust_source_country') }}" >--}}
                                                    {{--@if ($errors->has('cust_source_country'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_source_country') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <h4>Destination Address</h4>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" placeholder="Enter Destination Address" name="cust_dest_address1" type="text" id="cust_dest_address2" value="{{ old('cust_dest_address2') }}" rows="3" ></textarea>
                                                    @if ($errors->has('cust_dest_address1'))
                            							<span class="help-block" role="alert">
                            								<label style="color:red">{{ $errors->first('cust_dest_address1') }}</label>
                            							</span>
                            						@endif
                                                </div>
                                            </div><br><br><br>
                                            {{--<div class="form-group">--}}
                                                {{--<div class="col-md-12">--}}
                                                    {{--<label>Address Line 2</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Address Line 2..." name="cust_dest_address2" type="text" id="cust_dest_address2" value="{{ old('cust_dest_address2') }}">--}}
                                                    {{--@if ($errors->has('cust_dest_address2'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_dest_address2') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div><br><br><br>--}}
                                            {{--<div class="form-group">    --}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>City</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your City..." name="cust_dest_city" type="text" id="cust_dest_city" value="{{ old('cust_dest_city') }}" >--}}
                                                    {{--@if ($errors->has('cust_dest_city'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_dest_city') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>Pincode</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your Pincode..." name="cust_dest_pincode" type="text" id="cust_dest_pincode" value="{{ old('cust_dest_pincode') }}" >--}}
                                                    {{--@if ($errors->has('cust_dest_pincode'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_dest_pincode') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div><br><br><br>--}}
                                            {{--<div class="form-group">    --}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>State</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your State..." name="cust_dest_state" type="text" id="cust_dest_state"value="{{ old('cust_dest_state') }}" >--}}
                                                    {{--@if ($errors->has('cust_dest_state'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_dest_state') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<label>Country</label>--}}
                                                    {{--<input class="form-control" placeholder="Enter Your Country..." name="cust_dest_country" type="text" id="cust_dest_country" value="{{ old('cust_dest_country') }}">--}}
                                                    {{--@if ($errors->has('cust_dest_country'))--}}
                            							{{--<span class="help-block" role="alert">--}}
                            								{{--<label style="color:red">{{ $errors->first('cust_dest_country') }}</label>--}}
                            							{{--</span>--}}
                            						{{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 pull-right">    
                                        <br><br>
                                        <button class="button2" name="submit" type="submit" ><i class="fa fa-check rightArrow"></i></button>
                                    </div>
                                </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function() {
    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);

        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');

        //data-toggle="sourceType" data-title="Apartment" Bungalow
        if(tog=="sourceType" && sel=="Apartment"){
            $("#sourceFloorDiv").show();
        }else if(tog=="sourceType" && sel=="Bungalow"){
            $("#sourceFloorDiv").hide();
        }

        if(tog=="destinationType" && sel=="Apartment"){
            $("#destinationFloorDiv").show();
        }else if(tog=="destinationType" && sel=="Bungalow"){
            $("#destinationFloorDiv").hide();
        }
    });
//    $("#sourceFloorNo").on("keyup",function(){
//        var floor_no = $("#sourceFloorNo").val();
//        if(floor_no!=""){
//            if(floor_no == 0){
//                document.getElementById("src_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                $("#sourceFloorNo").val("");
//            }else{
//                if(isNaN(floor_no)){
//                    document.getElementById("src_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                    $("#sourceFloorNo").val("");
//                }else{
//                    document.getElementById("src_floor_error").innerHTML ="";
//                }
//            }
//        }else{
//            document.getElementById("src_floor_error").innerHTML ="";
//        }
//
//    });
//
//    $("#destinationFloorNo").on("keyup",function(){
//        var floor_no = $("#destinationFloorNo").val();
//        if(floor_no!=""){
//            if(floor_no == 0){
//                document.getElementById("dest_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                $("#destinationFloorNo").val("");
//            }else{
//                if(isNaN(floor_no)){
//                    document.getElementById("dest_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                    $("#destinationFloorNo").val("");
//                }else{
//                    document.getElementById("dest_floor_error").innerHTML ="";
//                }
//            }
//        }else{
//            document.getElementById("dest_floor_error").innerHTML ="";
//        }
//
//    });

});
</script>
<script src="{{URL::asset('public/assets/shiftingHome/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('public/assets/shiftingHome/additional-methods.min.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
@endsection