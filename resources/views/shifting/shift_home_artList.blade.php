@extends('layouts.web_template')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('public/assets/shiftingHome/shifting.css') }}"/>
<style>
    .sublist{
        background-color:gray;
        border:2px solid black;
        margin-left:20px;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color: Black;
    background-color: #d6d4d4;
    border: 2px solid #0082CA;
    border-radius:15px;
    font-weight:bold;
}
.nav-pills>li{
    margin-left: 2px;
    color: Black;
    background-color: #f7f7f7;
    border: 1px solid #f7f7f7;
    border-radius:20px;
    font-weight:bold;
}
</style>
<div class="frontend_content">
    <div class="works-area" style="padding: 40px 0px;">
    </div>
    <section>
        <div class="container"  class="backgroundImg">
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

                            <li class="active">
                             <a href="#home" data-toggle="tab" title="welcome">
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
                                        <form method="POST" action="{{url('/shiftingHome/articalsData')}}" accept-charset="UTF-8" id="articalsForm" name="articalsForm">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group" style="margin-left:20%">
                                            <label for="unit_no" class="unit_no col-md-3">How big is your home?</label>
                                            <div class="input-group col-md-9">
                                                <div id="radioBtn" class="btn-group" style="font-size:20px">
                                					<a class="btn btn-primary btn-sm active" data-toggle="homeType" data-title="1 BHK">1 BHK</a>
                                					<a class="btn btn-primary btn-sm notActive" data-toggle="homeType" data-title="2 BHK">2 BHK</a>
                                					<a class="btn btn-primary btn-sm notActive" data-toggle="homeType" data-title="3 BHK">3 BHK</a>
                                					<a class="btn btn-primary btn-sm notActive" data-toggle="homeType" data-title="Penthouse/Bunglow">Penthouse/Bunglow</a>
                                					<a class="btn btn-primary btn-sm notActive" data-toggle="homeType" data-title="Other">Other</a>
                                				</div>
                                				<input type="hidden" name="homeType" id="homeType" value="1 BHK">
                                            </div>
                                            <input type="text" name="last_eq_id" value="{{ $last_eq_id}}">
                                        </div>
                                        <br>
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="sublist"><a data-toggle="tab" href="#roomType1">Living Room</a></li>
                                            <li class="sublist"><a data-toggle="tab" href="#roomType2">Bedroom</a></li>
                                            <li class="sublist"><a data-toggle="tab" href="#roomType3">Dining Room</a></li>
                                            <li class="sublist"><a data-toggle="tab" href="#roomType4">Kitchen</a></li>
                                            <li class="sublist"><a data-toggle="tab" href="#roomType5">Bathroom</a></li>
                                            <li class="sublist"><a data-toggle="tab" href="#roomType6">Miscellaneous</a></li>
                                            <li class="sublist"><a data-toggle="tab" href="#roomType7">Car/Bike</a></li>
                                        </ul>
                                        <br>
                                        <div class="tab-content">
                                            <div id="roomType1" class="tab-pane fade in active ">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach($livingRoomList as $list1)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list1->eq_name)}}
                                                                <input type="hidden" value="{{ $list1->home_eq_id}}" name="lr_eqid_{{ $i}}" id="lr_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list1->eq_name)}}" name="lr_eqname_{{ $i}}" id="lr_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="lr_count_{{ $i}}" id="lr_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='lr_check_{{$i}}' id='lr_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            <div id="roomType2" class="tab-pane fade">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach($bedroomList as $list2)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list2->eq_name)}}
                                                                <input type="hidden" value="{{ $list2->home_eq_id}}" name="br_eqid_{{ $i}}" id="br_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list2->eq_name)}}" name="br_eqname_{{ $i}}" id="br_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="br_count_{{ $i}}" id="br_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='br_check_{{$i}}' id='br_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            <div id="roomType3" class="tab-pane fade">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach($diningRoomList as $list3)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list3->eq_name)}}
                                                                <input type="hidden" value="{{ $list3->home_eq_id}}" name="dr_eqid_{{ $i}}" id="dr_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list3->eq_name)}}" name="dr_eqname_{{ $i}}" id="dr_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="dr_count_{{ $i}}" id="dr_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='dr_check_{{$i}}' id='dr_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            <div id="roomType4" class="tab-pane fade">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach($kitchenList as $list4)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list4->eq_name)}}
                                                                <input type="hidden" value="{{ $list4->home_eq_id}}" name="kr_eqid_{{ $i}}" id="kr_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list4->eq_name)}}" name="kr_eqname_{{ $i}}" id="kr_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="kr_count_{{ $i}}" id="kr_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='kr_check_{{$i}}' id='kr_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            <div id="roomType5" class="tab-pane fade">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach($bathroomList as $list5)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list5->eq_name)}}
                                                                <input type="hidden" value="{{ $list5->home_eq_id}}" name="btr_eqid_{{ $i}}" id="btr_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list5->eq_name)}}" name="btr_eqname_{{ $i}}" id="btr_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="btr_count_{{ $i}}" id="btr_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='btr_check_{{$i}}' id='btr_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            <div id="roomType6" class="tab-pane fade">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach( $miscellaneousList as $list6)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list6->eq_name)}}
                                                                <input type="hidden" value="{{ $list6->home_eq_id}}" name="mr_eqid_{{ $i}}" id="mr_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list6->eq_name)}}" name="mr_eqname_{{ $i}}" id="mr_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="mr_count_{{ $i}}" id="mr_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='mr_check_{{$i}}' id='mr_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            <div id="roomType7" class="tab-pane fade">
                                                <div class="ex1 col-md-6">
                                                    <table width="100%">
                                                        <?php $i =1;?>
                                                        @foreach($cbList as $list7)
                                                        <tr class="trclass">
                                                            <td class="listtd">{{ ucWords($list7->eq_name)}}
                                                                <input type="hidden" value="{{ $list7->home_eq_id}}" name="cbr_eqid_{{ $i}}" id="cbr_eqid_{{ $i}}">
                                                                <input type="hidden" value="{{ ucWords($list7->eq_name)}}" name="cbr_eqname_{{ $i}}" id="cbr_eqname_{{ $i}}">
                                                            </td>
                                                            <td class="listtd"><input type="number" name="cbr_count_{{ $i}}" id="cbr_count_{{ $i}}" value="1" style="width:50px" min="0"></td>
                                                            <td class="listtd"><input type='checkbox' name='cbr_check_{{$i}}' id='cbr_check_{{$i}}' class="chbox"></td>
                                                        </tr>
                                                        <?php $i++;?>
                                                        @endforeach
                                                    </table>  
                                                </div>
                                            </div>
                                            
                                            <div class="ex1 col-md-6">
                                                <table width="100%" class="table table-bordered table-hover" id="articalesList">
                                                    <thead>
                                                        <tr>
                                                            <th>Articales Name</th>
                                                            <th>Count</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="addproduct">
                                                        
                                                    </tbody>    
                                                </table>
                                            </div>
                                        </div>    
                                        
                                        <div class="form-group col-md-7 pull-right">    
                                            <br>
                                            <label style="margin-left: -35px;">Total Count:</label> &nbsp;&nbsp;&nbsp;<input type="text" name="articalesCount" id="articalesCount" value="0" readonly style="width:100px">
                                            <br><br>
                                            <button class="button2" name="submit" type="submit" ><i class="fa fa-long-arrow-right rightArrow"></i></button>
                                        </div>
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