@extends('layouts.web_template')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('public/assets/shiftingHome/shifting.css') }}"/>

<div class="frontend_content" >
    <div class="works-area" style="padding: 40px 0px;">
    </div>
    <section  class="backgroundImg">
        <div class="container">
            <div class="row">
                <div class="board">
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li class="active">
                                <a href="#home" data-toggle="tab" title="welcome">
                              <span class="round-tabs one">
                                      <img src="{{URL::asset('public/images/contract.png')}}" class="imgClass">
                              </span></a>
                            </li>

                            <li><a>
                                 <span class="round-tabs two">
                                     <img src="{{URL::asset('public/images/sofa.png')}}" class="imgClass">
                                 </span></a>
                            </li>
                            <li><a >
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
                                        <form method="POST" role="form" action="{{ url('/shiftingHome/oriDest') }}" accept-charset="UTF-8" id="oriDsetForm" name="oriDsetForm">
                                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="unit_no" class="control-label col-md-4" style="padding-right: 30px">Expected Shifting Date<span class="requiredStar"> * </span></label>
                                                    <div class="input-group date col-md-5" data-provide="datepicker">
                                                        <input type="text" class="form-control" placeholder="Select Shifting Date..." name="shiftingDate" type="text" id="shiftingDate" value="{{ old('shiftingDate') }}">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                        @if ($errors->has('shiftingDate'))
                                                            <span class="help-block" role="alert">
                                								<label class="col-md-12" style="color:red;margin-bottom: 5px;">{{ $errors->first('shiftingDate') }}</label>
                                							</span>
                                                        @else
                                                            <label class="col-md-4" style="color:lightgray">(dd/mm/yyyy)</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="shiftingSource" class="control-label col-md-2">Source<span class="requiredStar"> * </span></label>
                                                    <div class="col-md-3">
                                                        <input class="form-control" placeholder="Enter Source..." name="shiftingSource" type="text" id="shiftingSource" value="{{ old('shiftingSource') }}">
                                                        @if ($errors->has('shiftingSource'))
                                                            <span class="help-block" role="alert">
                                								<label style="color:red">{{ $errors->first('shiftingSource') }}</label>
                                							</span>
                                                        @endif
                                                        <span id="src_error"></span>
                                                    </div>
                                                    <div class="col-md-2 roundOr" align="right">
                                                        <i class="fa  fa-arrow-right"></i>
                                                    </div>
                                                    <label for="shiftingDestination" class="control-label col-md-2">Destination<span class="requiredStar"> * </span></label>
                                                    <div class="col-md-3">
                                                        <input class="form-control" placeholder="Enter Destination..." name="shiftingDestination" type="text" id="shiftingDestination" value="{{ old('shiftingDestination') }}">
                                                        @if ($errors->has('shiftingDestination'))
                                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('shiftingDestination') }}</label>
                                							</span>
                                                        @endif
                                                        <span id="dest_error"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="enquiry_type" value="Vehicle">
                                                <br><br><hr> <br>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="">Customer Name<span class="requiredStar"> * </span></label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter Customer Name" value="{{ old('cust_name') }}">
                                                        @if ($errors->has('cust_name'))
                                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cust_name') }}</label>
                                							</span>
                                                        @endif
                                                    </div>

                                                    <label class="control-label col-md-2">Customer Email<span class="requiredStar"> * </span></label>
                                                    <div class="form-group col-md-4">
                                                        <input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Enter Customer Email" value="{{ old('cust_email') }}">
                                                        @if ($errors->has('cust_email'))
                                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cust_email') }}</label>
                                							</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="">Contact No<span class="requiredStar"> * </span></label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="cust_contact" name="cust_contact" placeholder="Enter Contact No" value="{{ old('cust_contact') }}">
                                                        @if ($errors->has('cust_contact'))
                                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cust_contact') }}</label>
                                							</span>
                                                        @endif
                                                    </div>

                                                    <label class="control-label col-md-2"> Alternate No &nbsp;&nbsp;</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="cust_alternate_no" name="cust_alternate_no" placeholder="Enter  Alternate No" value="{{ old('cust_alternate_no') }}">
                                                        @if ($errors->has('cust_alternate_no'))
                                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cust_alternate_no') }}</label>
                                							</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Lead Source &nbsp;&nbsp;</label>
                                                    <div class="form-group col-md-4">
                                                        <select class="form-control" name="reference" id="reference" >
                                                            <option value="">Select Lead Source </option>
                                                        </select>
                                                    </div>
                                                    <label class="control-label col-md-2">Lead Status &nbsp;&nbsp;</label>
                                                    <div class="form-group col-md-4">
                                                        <select class="form-control" name="reference_status" id="reference_status" >
                                                            <option value="">Select Lead Status </option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <br>
                                            <div class="form-group col-md-7 pull-right">
                                                <button class="button2" name="submit" type="submit" ><i class="fa fa-long-arrow-right rightArrow"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="board-inner">--}}
                        {{--<ul class="nav nav-tabs" id="myTab">--}}
                            {{--<div class="liner"></div>--}}
                            {{--<li class="active">--}}
                             {{--<a href="#home" data-toggle="tab" title="welcome">--}}
                              {{--<span class="round-tabs one">--}}
                                      {{--<img src="{{URL::asset('public/images/path.png')}}" class="imgClass">--}}
                              {{--</span></a>--}}
                            {{--</li>--}}

                            {{--<li><a>--}}
                                 {{--<span class="round-tabs two">--}}
                                     {{--<img src="{{URL::asset('public/images/sofa.png')}}" class="imgClass">--}}
                                 {{--</span></a>--}}
                            {{--</li>--}}
                            {{--<li><a >--}}
                                 {{--<span class="round-tabs three">--}}
                                      {{--<img src="{{URL::asset('public/images/contract.png')}}" class="imgClass">--}}
                                 {{--</span> </a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane fade in active" id="home">--}}
                            {{--<div class="container" style="transform: none;">--}}
                                {{--<div class="row" style="transform: none;">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<form method="POST" role="form" action="{{ url('/shiftingVehicale/oriDestVec') }}" accept-charset="UTF-8" id="oriDestVecForm" name="oriDestVecForm">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="unit_no" class="unit_no col-md-3">Expected Shifting Date</label>--}}
                                            {{--<div class="input-group date col-md-5" data-provide="datepicker">--}}
                                                {{--<input type="text" class="form-control" placeholder="Select Shifting Date..." name="shiftingDate" type="text" id="shiftingDate" value="{{ old('shiftingDate') }}">--}}
                                                {{--<div class="input-group-addon">--}}
                                                    {{--<span class="glyphicon glyphicon-th"></span>--}}
                                                {{--</div>--}}
                                                {{--@if ($errors->has('shiftingDate'))--}}
                        							{{--<span class="help-block" role="alert">--}}
                        								{{--<label class="col-md-12" style="color:red;margin-bottom: 5px;">{{ $errors->first('shiftingDate') }}</label>--}}
                        							{{--</span>--}}
                        						{{--@else--}}
                        						    {{--<label class="col-md-4" style="color:lightgray">(dd/mm/yyyy)</label>--}}
                        						{{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<br><hr><br>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label for="shiftingSource" class="col-md-2">Source</label>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<input class="form-control" placeholder="Enter Source..." name="shiftingSource" type="text" id="shiftingSource" value="{{ old('shiftingSource') }}">--}}
                                                {{--@if ($errors->has('shiftingSource'))--}}
                        							{{--<span class="help-block" role="alert">--}}
                        								{{--<label style="color:red">{{ $errors->first('shiftingSource') }}</label>--}}
                        							{{--</span>--}}
                        						{{--@endif--}}
                        						{{--<span id="src_error"></span>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-1 roundOr">--}}
                                            {{--<i class="fa  fa-arrow-right"></i>--}}
                                            {{--</div>--}}
                                            {{--<label for="shiftingDestination" class="col-md-2">Destination</label>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<input class="form-control" placeholder="Enter Destination..." name="shiftingDestination" type="text" id="shiftingDestination" value="{{ old('shiftingDestination') }}">--}}
                                                {{--@if ($errors->has('shiftingDestination'))--}}
                        							{{--<span class="help-block">--}}
                        								{{--<label style="color:red">{{ $errors->first('shiftingDestination') }}</label>--}}
                        							{{--</span>--}}
                        						{{--@endif--}}
                        						{{--<span id="dest_error"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<br><br>--}}
                                    {{--</div>--}}
                                    {{--<br>--}}
                                    {{--<div class="form-group col-md-8 pull-right">               --}}
                                         {{--<button class="button2" name="submit" type="submit" ><i class="fa fa-long-arrow-right rightArrow"></i></button>--}}
                                    {{--</div>--}}
                                {{----}}
                                {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
	$('.datepicker').datepicker({
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
    
    $("#sourceFloorNo").on("keyup",function(){
        var floor_no = $("#sourceFloorNo").val();
        if(floor_no!=""){
            if(floor_no == 0){
               document.getElementById("src_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
               $("#sourceFloorNo").val("");
            }else{
                if(isNaN(floor_no)){
                	document.getElementById("src_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
                	$("#sourceFloorNo").val("");
                }else{
                	document.getElementById("src_floor_error").innerHTML ="";
                }
            }
        }else{
            document.getElementById("src_floor_error").innerHTML ="";
        }
        
    });
    
    $("#destinationFloorNo").on("keyup",function(){
        var floor_no = $("#destinationFloorNo").val();
        if(floor_no!=""){
            if(floor_no == 0){
               document.getElementById("dest_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
               $("#destinationFloorNo").val("");
            }else{
                if(isNaN(floor_no)){
                	document.getElementById("dest_floor_error").innerHTML ="<label style='color:red;margin-left: -58px;'>Enter Correct Floor No</label>";
                	$("#destinationFloorNo").val("");
                }else{
                	document.getElementById("dest_floor_error").innerHTML ="";
                }
            }
        }else{
            document.getElementById("dest_floor_error").innerHTML ="";
        }
        
    });
    
    $("#shiftingSource").on("keyup",function(){
        var source = $("#shiftingSource").val();
        var regex = /^[a-zA-Z]*$/;
        if(source!=""){
            if(regex.test(source)){
            	document.getElementById("src_error").innerHTML ="";
            }else{
            	document.getElementById("src_error").innerHTML ="<label style='color:red;'>Enter Correct Source</label>";
            	$("#shiftingSource").val("");
            }
        }else{
            document.getElementById("src_error").innerHTML ="";
        }
    });
    
    $("#shiftingDestination").on("keyup",function(){
        var source = $("#shiftingDestination").val();
        var regex = /^[a-zA-Z]*$/;
        if(source!=""){
            if(regex.test(source)){
            	document.getElementById("dest_error").innerHTML ="";
            }else{
            	document.getElementById("dest_error").innerHTML ="<label style='color:red;'>Enter Correct Destination</label>";
            	$("#shiftingDestination").val("");
            }
        }else{
            document.getElementById("dest_error").innerHTML ="";
        }
    });
    
});
function deleteRow(row){
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('articalesList').deleteRow(i);
    var articalesCount =parseInt($("#articalesCount").val());
        var count= articalesCount-1;
        $("#articalesCount").val(count);
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
@endsection