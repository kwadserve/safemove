@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/examples/css/forms/advanced.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/assets/shiftingHome/shifting.css') }}"/>
    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
        .divWidth{
            width:120px;
        }
        .marginCss{
            margin-bottom: 30px;
        }
        .panel-body {
            padding: 0px 0px;
        }
        .board {
            width: 100%;
            margin: -40px auto;
            height: auto;
            background: #fff;
            box-shadow: 10px 10px 10px #ccc;
        }

    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
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
                                                                        <td style="padding-left:13px;" width="50%" colspan="2"><label>Property Details (Origin):</label></td>
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
                                                                                    <input class="form-control" placeholder="Floor No..." name="sourceFloorNo" type="text" id="sourceFloorNo" value="{{ old('sourceFloorNo') }}" required>
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
                                                                                    <input class="form-control" placeholder="Floor No..." name="destinationFloorNo" type="text" id="destinationFloorNo" value="{{ old('destinationFloorNo') }}" required>
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
                                                            <h4>Origin Address</h4>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" placeholder="Enter Address" name="cust_source_address1" type="text" id="cust_source_address1"  rows="3" required>{{(!empty($addDetails->src_add_line1))?$addDetails->src_add_line1:old('cust_source_address1')}}</textarea>
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
                                                            {{--<div class="form-group">--}}
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
                                                            {{--<div class="form-group">--}}
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
                                                            <h4>Destination Address </h4>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control" placeholder="Enter Address" name="cust_dest_address1" type="text" id="cust_dest_address1" rows="3" required>{{(!empty($addDetails->dest_add_line1))?$addDetails->dest_add_line1:old('cust_dest_address1')}}</textarea>
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
                                                            {{--<div class="form-group">--}}
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
                                                            {{--<div class="form-group">--}}
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
                                                    <br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('sourceFloorNo'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('sourceFloorNo') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cust_source_address1'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cust_source_address1') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cust_dest_address1'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_dest_address1') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('destinationFloorNo'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('destinationFloorNo') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <div class="form-group col-md-7 pull-right">
                                                        <br><br>
                                                        <button class="button2" name="submit" type="submit"  value="contactDetailsDashboardForm"><i class="fa fa-check rightArrow"></i></button>
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
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );

        });
        var app = angular.module('app', []);

        app.directive("matchPassword", function () {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=matchPassword"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.matchPassword = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                    });
                }
            };
        });
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '-3d'
            });
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

            $('.showArticalList').on('click', function(){
                var sel = $(this).data('title');
                var tog = $(this).data('toggle');
                $.ajax({
                    url: 'showArticalList/{id}',
                    type: 'GET',
                    data: { id: sel },
                    success: function(response)
                    {
                        $('#articalList').html(response);
                    }
                });
            });
            $('.chbox').on('change', function(){
                var curchboxId= this.id;
                var tempID = curchboxId.split("_");
                var articalesCount =parseInt($("#articalesCount").val());
                if($("#"+curchboxId).prop('checked') == true){
                    var count= articalesCount+1;
                    var eq_id = $("#"+tempID[0]+"_eqid_"+tempID[2]).val();
                    var eq_name = $("#"+tempID[0]+"_eqname_"+tempID[2]).val();
                    var eq_count = $("#"+tempID[0]+"_count_"+tempID[2]).val();

                    var markup = "<tr><td>"+eq_name+"</td><td>"+eq_count+" <input type='hidden' name='slt_arti_id[]' value='"+eq_id+"'> <input type='hidden' name='slt_arti_count[]' value='"+eq_count+"'></td>";
                    markup += '<td><a href="javascript: void(0)" onClick="deleteRow(this)"><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></a></td><tr>';
                    $("#addproduct").append(markup);
                    $("#articalesCount").val(count);
                }
            });

//            $("#sourceFloorNo").on("keyup",function(){
//                var floor_no = $("#sourceFloorNo").val();
//                if(floor_no!=""){
//                    if(floor_no == 0){
//                        document.getElementById("src_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                        $("#sourceFloorNo").val("");
//                    }else{
//                        if(isNaN(floor_no)){
//                            document.getElementById("src_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                            $("#sourceFloorNo").val("");
//                        }else{
//                            document.getElementById("src_floor_error").innerHTML ="";
//                        }
//                    }
//                }else{
//                    document.getElementById("src_floor_error").innerHTML ="";
//                }
//
//            });
//
//            $("#destinationFloorNo").on("keyup",function(){
//                var floor_no = $("#destinationFloorNo").val();
//                if(floor_no!=""){
//                    if(floor_no == 0){
//                        document.getElementById("dest_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                        $("#destinationFloorNo").val("");
//                    }else{
//                        if(isNaN(floor_no)){
//                            document.getElementById("dest_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
//                            $("#destinationFloorNo").val("");
//                        }else{
//                            document.getElementById("dest_floor_error").innerHTML ="";
//                        }
//                    }
//                }else{
//                    document.getElementById("dest_floor_error").innerHTML ="";
//                }
//
//            });

//            $("#shiftingSource").on("keyup",function(){
//                var source = $("#shiftingSource").val();
//                var regex = /^[a-zA-Z]*$/;
//                if(source!=""){
//                    if(regex.test(source)){
//                        document.getElementById("src_error").innerHTML ="";
//                    }else{
//                        document.getElementById("src_error").innerHTML ="<label style='color:red;'>Enter Correct Origin</label>";
//                        $("#shiftingSource").val("");
//                    }
//                }else{
//                    document.getElementById("src_error").innerHTML ="";
//                }
//            });

//            $("#shiftingDestination").on("keyup",function(){
//                var source = $("#shiftingDestination").val();
//                var regex = /^[a-zA-Z]*$/;
//                if(source!=""){
//                    if(regex.test(source)){
//                        document.getElementById("dest_error").innerHTML ="";
//                    }else{
//                        document.getElementById("dest_error").innerHTML ="<label style='color:red;'>Enter Correct Destination</label>";
//                        $("#shiftingDestination").val("");
//                    }
//                }else{
//                    document.getElementById("dest_error").innerHTML ="";
//                }
//            });

        });
        function deleteRow(row){
            var i=row.parentNode.parentNode.rowIndex;
            document.getElementById('articalesList').deleteRow(i);
            var articalesCount =parseInt($("#articalesCount").val());
            var count= articalesCount-1;
            $("#articalesCount").val(count);
        }
    </script>
@stop