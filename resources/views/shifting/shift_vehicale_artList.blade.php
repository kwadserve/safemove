@extends('layouts.web_template')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('public/assets/shiftingHome/shifting.css') }}"/>
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
                                        <form method="POST" action="{{url('/shiftingHome/articalsDataVec')}}" accept-charset="UTF-8" id="articalsForm" name="articalsForm">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-6">Select Vehicle Type</label>
                                                <div class="col-md-6">
                                                    <select  class="form-control select2_vehicale_type" name="vehicle_type" id="vehicle_type">
                                                      <option></option>
                                                      <option value="2 Wheeler">2 Wheeler</option>
                                                      <option value="4 Wheeler">4 Wheeler</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                            <input type="hidden" name="last_eq_id" value="{{ $last_eq_id}}">
                                            <div class="form-group">
                                                <div style="display:none;width:auto;" id="twoWheelerDiv">    
                                                    <label class="col-md-6">Select 2 Wheeler Segment</label>
                                                    <div class="col-md-6">
                                                        <select  class="form-control select2_two_wheeler_type" name="two_wheeler_seg" id="two_wheeler_seg" style="width:auto;">
                                                            <option></option>
                                                            <option value="Upto 200CC">Upto 200CC</option>
                                                            <option value="Above 200CC">Above 200CC</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div style="display:none;width:auto;"id="fourWheelerDiv">
                                                    <label class="col-md-6">Select 4 Wheeler Segment</label>
                                                    <div class="col-md-6">
                                                        <select  class="form-control select2_four_wheeler_type" name="four_wheeler_seg" id="four_wheeler_seg" style="width:auto;">
                                                          <option></option>
                                                          <option value="Small">Small</option>
                                                          <option value="Executive">Executive</option>
                                                          <option value="Saloon">Saloon</option>
                                                          <option value="4x4">4x4</option>
                                                          <option value="Luxury">Luxury</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display:none;"id="vehicleNameDiv">
                                                <br><br>
                                                <div class="form-group">
                                                    <label class="col-md-6">Vehicle Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="vehicle_name" id="vehicle_name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-7 pull-right" >    
                                                    <br><br>
                                                    <button class="button" name="add_vehicle" id="add_vehicle" type="button"><span>ADD Vehicle</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ex1 col-md-6">
                                            <table width="100%" class="table table-bordered table-hover" id="articalesList">
                                                <thead>
                                                    <tr>
                                                        <th>Vehicle Type</th>
                                                        <th>Segment</th>
                                                        <th>Name</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="addproduct">
                                                    
                                                </tbody>    
                                            </table>
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
    $( ".select2_vehicale_type" ).select2( {
		placeholder: "Select Vehicle Type"
		
	} );
	$( ".select2_two_wheeler_type" ).select2( {
		placeholder: "Select 2 Wheeler Company"
		
	} );
	$( ".select2_four_wheeler_type" ).select2( {
		placeholder: "Select 4 Wheeler Company"
		
	} );
	$("#vehicle_type").on('change',function(){
	    if($("#vehicle_type").val()=="2 Wheeler"){
	       // $("#twoWheelerDiv").show();
	        document.getElementById('twoWheelerDiv').style.display = "block";
	        document.getElementById('fourWheelerDiv').style.display = "none";
	    }else{
	       // $("#fourWheelerDiv").hide();
	       document.getElementById('fourWheelerDiv').style.display = "block";
	       document.getElementById('twoWheelerDiv').style.display = "none";
	    }
	});
	$("#two_wheeler_seg").on('change',function(){    
	    document.getElementById('vehicleNameDiv').style.display = "block";
	   // document.getElementById('addBtnDiv').style.display = "block";
	});
	$("#four_wheeler_seg").on('change',function(){   
	    document.getElementById('vehicleNameDiv').style.display = "block";
	   // document.getElementById('addBtnDiv').style.display = "block";
	});
    $('#add_vehicle').on('click', function(){
        var curchboxId= this.id;
        var tempID = curchboxId.split("_");
        var articalesCount =parseInt($("#articalesCount").val());
        var count= articalesCount+1;
        var veh_type = $("#vehicle_type").val();
        if(veh_type=="2 Wheeler"){
            var veh_segment= $("#two_wheeler_seg").val();
        }else{
            var veh_segment= $("#four_wheeler_seg").val();
        }
        var veh_name = $("#vehicle_name").val();
       
       var markup = "<tr><td>"+veh_type+" <input type='hidden' name='veh_type[]' value='"+veh_type+"'></td><td>"+veh_segment+"<input type='hidden' name='veh_segment[]' value='"+veh_segment+"'></td>";
       markup += "<td>"+veh_name+"<input type='hidden' name='veh_name[]' value='"+veh_name+"'></td>"
       markup += '<td><a href="javascript: void(0)" onClick="deleteRow(this)"><i class="fa fa-times" aria-hidden="true" style="color:red;"></i></a></td><tr>';
       $("#addproduct").append(markup);
       $("#articalesCount").val(count);
     
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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>-->
<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>-->
@endsection