@extends('layouts.template')
@section('content') 
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/forms/advanced.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
<style>
p.redcolor{color:red; font-size:16px;}
.spancolor{color:red;}
.help-block{color:red;}
.input-group-addon {
     padding: 0px 0px; 
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #76838f;
    text-align: center;
     background-color: #fff; 
     border: 0px solid #e4eaec; 
     border-radius: 0px; 
}
.amountBox {
	box-shadow: 1px 1px 5px 3px #14770e;
}
	.activeClass{
		display:block!important;
	}
.iclass{
    font-size: 27px;
    /*margin-top: 24px;*/
    margin-left: 10px;
    color: green;
}
.iclass2{
    font-size: 27px;
    margin-left: 10px;
    color: red;
}
</style>
<div class="page-content">	
    <div class="panel">
		@if(!empty($message))
			<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<i class="fa fa-bell" style="color:#fff"></i>&nbsp;&nbsp;
				{{$message}}
			</div>
		@endif
        <div class="panel-body container-fluid">
            <div class="row">
        		<div class="col-md-12">
        			<div class="tabbable-panel">
        				<div class="tabbable-line">
        					<ul class="nav nav-tabs ">
        						<li class="active">
        							<a href="#tab_default_2" data-toggle="tab">All Quotation </a>
        						</li>
        						<li>
        							<a href="#tab_default_1" data-toggle="tab">New Quotation </a>
        						</li>
        					</ul>
        					<div class="tab-content">
								<div class="tab-pane active" id="tab_default_2">
									<div class="row" style="transform: none;">
										<div class="col-md-12">
											<table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
												<thead>
												<tr>
													<th>CN No</th>
													<th>Name</th>
													<th>Insurance Amount</th>
													<th>Service Tax Amount</th>
													<th>Net Amount</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												@foreach($qutData as $qutData)
													<tr>
														<td>{{$qutData->cn_no}}</td>
														<td>{{ucwords($qutData->cust_name)}}</td>
														<td align="right">
															<?php
																$ins_val = (int)$qutData->cost_ex_ins_val;
																$goods_val =  $qutData->goods_value;
																$ins_amt= ($ins_val/100)*$goods_val;
                                                            	echo number_format((float)$ins_amt, 2, '.', '');
															?>
														</td>
														<td align="right">
                                                            <?php
																$ser_val = (int)$qutData->cost_ex_service_tax;
																$amount =  $qutData->amount;
																$ser_amt = ($ser_val/100)*$amount;
                                                            	echo number_format((float)$ser_amt, 2, '.', '');
                                                            ?>
														</td>
														<td align="right">{{$qutData->net_amount}}</td>
														<td>{{date("d-m-Y",strtotime($qutData->quot_create))}}</td>
														<td>
															<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('quotationDetails',base64_encode($qutData->cn_no))}}" target="_blank"><i class="icon fa-eye" aria-hidden="true"></i></a>

															{{--<a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editQuotation',base64_encode($qutData->quot_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

															<button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('quotationDestroy',base64_encode($qutData->quot_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
														</td>
													</tr>
												@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
        						<div class="tab-pane" id="tab_default_1">
                                    <div class="row" style="transform: none;">
                                        <div class="col-md-12">
                                            <form method="POST" role="form" action="{{ url('/addQuotation') }}" accept-charset="UTF-8" id="quotationPageForm" name="quotationPageForm" autocomplete="off">
                                                {{ csrf_field() }}
                                                <br>
                                                <div class="row">
                                                    <div class="form-group">
														<label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
														<div class="form-group col-md-4">
															<input type="number" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Enter" >
														</div>
                                                        <label for="" class="control-label col-md-2">Quotation No</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="quot_no" name="quot_no" value="{{$quotId}}" readonly>
                                                        </div>

                                                    </div>
                                                  </div><!--/. row -->    
                                                    <div class="form-group">
                                            			<label class="control-label col-md-2" for="">Customer Name </label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter Customer Name" readonly>
                                            			</div>
                                            			
                                            			<label class="control-label col-md-2">Customer Email</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Enter Customer Email" readonly>
                                            			</div>
                                            		</div>
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2" for="">Contact No</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="cust_contact" name="cust_contact" placeholder="Enter Contact No" readonly>
                                            			</div>
                                            			
                                            			<label class="control-label col-md-2"> Alternate No</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="cust_alternate_no" name="cust_alternate_no" placeholder="Enter  Alternate No"readonly>
                                            			</div>
                                            		</div>
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2" for="">Origin</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="source" name="source" placeholder="Enter Origin"readonly>
                                            			</div>
                                            			
                                            			<label class="control-label col-md-2">Destination</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" readonly>
                                            			</div>
                                            		</div>
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2">Transport By</label>
                                            			<div class="form-group col-md-4">
                                            				<select class="form-control" name="transport_by" id="transport_by">
                                                				<option value="">Select Transport By </option>
																<option value="Road Transport" selected>Road Transport</option>
																<option value="Sea Freight">Sea Freight</option>
																<option value="Air Freight">Air Freight</option>
                                                			</select>
                                            			</div>
                                            			
                                            			<label class="control-label col-md-2">KM</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="kilometer" name="kilometer" placeholder="Enter Kilometer">
                                            			</div>
                                            		</div>
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2" for="">Amount </label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control amountBox" id="amount" name="amount" placeholder="Enter Amount" >
                                            			</div>
                                            			
                                            			<label class="control-label col-md-2">Goods Value </label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="goods_value" name="goods_value" placeholder="Enter Goods Value" >
                                            			</div>
                                            		</div>
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2" for="">Discount </label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount" value="0">
                                            			</div>
                                            			
                                            			<label class="control-label col-md-2">Other</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="other_amount" name="other_amount" placeholder="Enter Other" >
                                            			</div>
                                            		</div>
                                            	
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2">Packing & Moving Charges for</label>
                                            			<div class="form-group col-md-10">
                                            				<input type="text" class="form-control" id="pack_mov_chrg" name="pack_mov_chrg" placeholder="Enter Packing & Moving Charges">
                                            			</div>
                                            			
                                            		<!--	<label class="control-label col-md-2"></label>
                                            			<div class="form-group col-md-3">
                                            			    <br><br>
                                            			</div>-->
                                            		</div>
                                            		
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2">Our Cost Include</label>
                                            			<div class="form-group col-md-10">
                                            				<input type="text" class="form-control" id="cost_include" name="cost_include" readonly value="Packing, Loading, Transportation, Unloading, Unpacking, Settling and Removal of Debris with Door to Door Service.">
                                            			</div>
                                            			<br><br><br>
                                            		</div>
                                            	  	 
                                            		<div class="form-group ">
                                                        <div class="col-md-12">
                                                            <label for="cost_include1" class="control-label radio-inline col-md-3" style="padding-left: 90px;">
                                                                <input type="radio" id="cost_include1"  class="radio" name="cost_radio" value="cost_include1" checked>
                                                                Our Cost Include:1&nbsp;
                                                            </label>    
                                                            <div class="form-group col-md-9">
                                                				<input type="text" class="form-control" id="cost_include_value1" name="cost_include_value1"  value="Freight on Value @3% on the declare value of GST @18%" style="margin-left: -9px;">
                                                			</div>
                                                        </div>
                                                    </div>
                                            		<div class="form-group ">    
                                                        <div class="col-md-12" >
                                                            <label for="cost_exclude2" class="control-label radio-inline col-md-3" style="padding-left: 90px;">
                                                                <input type="radio"  id="cost_exclude2" class="radio" name="cost_radio" value="cost_exclude2" >
                                                                Our Cost Exclude:2&nbsp;
                                                            </label>
                                                            <div class="form-group input-group col-md-7">
                                                                <div class="input-group-addon">
                                                                    <span>&nbsp;&nbsp;Insurance on value @ &nbsp;&nbsp;</span>
                                                                </div>
                                                				<input type="text" class="form-control" id="cost_exclude_value1" name="cost_exclude_value1" value="" readOnly style="width:100px;margin-right:10px;">
                                                                <div class="input-group-addon">
                                                                    <span>% on value of GST @ &nbsp;&nbsp;</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="cost_exclude_value2" name="cost_exclude_value2" value="" readOnly style="width:100px;margin-right:10px;">
                                                                <div class="input-group-addon">
                                                                    <span>%</span>
                                                                </div>                                                			
                                                			</div>
                                                        </div>
                                                    </div>
                                                <div class = "row">
                                                    <div class="form-group">
                                            			<label class="control-label col-md-3" for="">Miscellaneous Charges </label>
                                            			<div class="form-group col-md-3">
                                            				<input type="text" class="form-control" id="misc_charges" name="misc_charges" placeholder="" readOnly>
                                            			</div>
													</div>
												</div><!--/. row -->
                                                <div class = "row">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="">Total Amount </label>
                                                        <div class="form-group col-md-3">
                                                            <input type="text" class="form-control" id="amt_without_gst" name="amt_without_gst" placeholder="Without GST Amount" readOnly>
                                                        </div>
                                                    </div>
                                                </div><!--/. row -->
												<div class = "row">
													<div class="form-group">
                                            			<label class="control-label col-md-3">After Insurance</label>
                                            			<div class="form-group col-md-3">
                                            				<input type="text" class="form-control" id="after_insurance_amnt" name="after_insurance_amnt" value="0.00" readOnly>
                                            			</div>
														<label class="control-label col-md-2"></label>
														<!--<div class="form-group col-md-4">
															<br><br>
														</div>-->
                                            		</div>
                                            	</div><!--/. row -->
                                            	<div class = "row">
                                            		<div class="form-group">
                                            			<label class="control-label col-md-3" for="">GST</label>
                                            			<div class="form-group col-md-3">
                                            				<input type="text" class="form-control" id="after_service_tax" name="after_service_tax" value="0.00" readOnly>
                                            			</div>
														<!--<label class="control-label col-md-2"></label>
														<div class="form-group col-md-4">
															<br><br>
														</div>-->
													</div>
												</div><!--/. row -->	
												<div class = "row">	
													<div class="form-group">
                                            			<label class="control-label col-md-3">Net Amount</label>
                                            			<div class="form-group col-md-3">
                                            				<input type="text" class="form-control amountBox" id="net_amount" name="net_amount" value="0.00" readOnly>
                                            			</div>
														<!--<label class="control-label col-md-2"></label>
														<div class="form-group col-md-4">
															<br><br>
														</div>-->
                                            		</div>
                                            	</div><!--/. row -->
                                            	<div class = "col-md-12">
                                            	    <hr style="border:1px solid lightgray">
                                            	</div><!--/. Line div -->
                                            	
													<div class="form-group">
														<label class="control-label col-md-3" for="">Time Required For Packing</label>
														<div class="form-group col-md-3">
															<input type="text" class="form-control" id="timerequired" name="timerequired" placeholder="Enter required packing time">
														</div>
                                                        <label class="control-label col-md-2" for="">Minimum</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="priornotice" name="priornotice" placeholder="Days Prior Notice Required For Packing">
                                                        </div>


													</div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Transit Time</label>
                                                        <div class="form-group col-md-3">
                                                            <input type="text" class="form-control" id="transitday" name="transitday" placeholder="From The Date Of Final Dispatch." >
                                                        </div>

                                                        <label class="control-label col-md-2">Advance Payment</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="paymentterm" name="paymentterm" placeholder="Enter Advance Payment" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Terms And Conditions</label>
                                                        <div class="form-group col-md-6">
                                                            <input type="text" class="form-control" name="terms_and_cond[]" placeholder="Enter Term And Condition" maxlength = "100">
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <i class="fa fa-plus iclass" onclick="addDistrictQtls()"> </i>
                                                        </div>
                                                        <input type="hidden" name="div_count" id="div_count" value="1">
                                                    </div>
                                                    <div id="appendDistrict"></div>

                                                    {{--<div class="form-group">--}}
                                                        {{--<label class="control-label col-md-3"></label>--}}
                                                        {{--<div class="form-group col-md-6">--}}
                                                            {{--<input type="text" class="form-control" id="transitday" name="terms_and_cond[]" placeholder="Enter Term And Condition" >--}}
                                                        {{--</div>--}}
                                                        {{--<div class="form-group col-sm-3">--}}
                                                            {{--<i class="fa fa-minus iclass2" onclick="deleteDistrict()"> </i>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                
                                                <br>
                                                <div class="form-group col-sm-7 pull-right">
                                                	<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                			<i class="fa fa-save"></i>  Save
                                                	    <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                	</button>
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
    function addDistrictQtls() {
        var count = parseInt($("#div_count").val());
        if(count != ""){
            $('#appendDistrict').append(' <div class="form-group" id="dist_row_'+count+'">\n' +
                '                                                        <label class="control-label col-md-3"></label>\n' +
                '                                                        <div class="form-group col-md-6">\n' +
                '                                                            <input type="text" class="form-control" name="terms_and_cond[]" placeholder="Enter Term And Condition"  maxlength = "100">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group col-sm-3">\n' +
                '                                                            <i class="fa fa-minus iclass2" onclick="deleteDistrict('+count+')"> </i>\n' +
                '                                                        </div>\n' +
                '                                                    </div>');
            $("#div_count").val(count+1);
        }else{
            alert("Select District");
        }
    }

    function deleteDistrict(id) {
        $("#dist_row_"+id).hide();
    }

    $(document).ready(function() {


    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
	$('.datepicker').datepicker({
        startDate: '-3d'
    });
    
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        order: [],
        columnDefs: [ { orderable: false}]
    } );
    //get customer deatils of consignment no
    $('#consignment_no').keydown(function(e){
        var base_url= basePath();
        if(e.keyCode == 13) {
            var cnno = $('#consignment_no').val();
            if (cnno != "") {
                $.ajax({
                    url: base_url+'getQuotationData/{id}',
                    type: 'GET',
                    data: {
                        cn_no: cnno,
                    },
                    success: function (response) {
                        var obj = JSON.parse(response);
                        if(isNaN(obj.total_quot_amt)){
                            $('#quot_no').val(obj.quot_id);
                            $('#cust_name').val(obj.cust_name);
                            $('#cust_contact').val(obj.cust_contact);
                            $('#cust_email').val(obj.cust_email);
                            $('#cust_alternate_no').val(obj.cust_alt_contact);
                            $('#source').val(obj.source);
                            $('#destination').val(obj.destination);
                            $('#amount').val(parseInt(obj.amount));
                            $('#pack_mov_chrg').val(obj.enquiry_type);
                            $('#goods_value').val(parseInt(obj.goods_value));
                            $('#discount').val(parseInt(obj.discount));
                            $('#other_amount').val(parseInt(obj.other));
                            $('#net_amount').val(obj.net_amount);
                            $('#timerequired').val(obj.time_req_for_packing);
                            $('#priornotice').val(obj.prior_notice);
                            $('#transitday').val(obj.transist_time);
                            $('#paymentterm').val(obj.payment_terms);
                            $('#kilometer').val(obj.km);
                            if(obj.cost_type=="cost_include1"){
                                document.getElementById("cost_include1").checked = true;
                                $('#cost_exclude_value1').prop('readonly', true);
                                $('#cost_exclude_value2').prop('readonly', true);
                                $('#misc_charges').prop('readonly',true);
                                $('#cost_include_value1').prop('readonly',false);
                                $('#cost_exclude_value1').val("");
                                $('#cost_exclude_value2').val("");
                                $('#misc_charges').val("");
                                $('#after_insurance_amnt').val("0.00");
                                $('#after_service_tax').val("0.00");

							}else{
                                document.getElementById("cost_exclude2").checked = true;
                                $('#cost_exclude_value1').prop('readonly', false);
                                $('#cost_exclude_value2').prop('readonly', false);
                                $('#misc_charges').prop('readonly',false);
                                $('#cost_include_value1').prop('readonly', true);
                                $('#cost_exclude_value1').val(parseInt(obj.cost_ex_ins_val));
                                $('#cost_exclude_value2').val(parseInt(obj.cost_ex_service_tax));
                                $('#misc_charges').val("");
                                $('#after_insurance_amnt').val(obj.after_insurance_amnt);
                                $('#after_service_tax').val(obj.after_service_tax);
							}
						}else {
                            $('#cust_name').val(obj.cust_name);
                            $('#cust_contact').val(obj.cust_contact);
                            $('#cust_email').val(obj.cust_email);
                            $('#cust_alternate_no').val(obj.cust_alt_contact);
                            $('#source').val(obj.source);
                            $('#destination').val(obj.destination);
                            $('#amount').val(parseInt(obj.total_quot_amt));
                            $('#pack_mov_chrg').val(obj.enquiry_type);
                            $('#goods_value').val(parseInt(obj.goods_value));
                            $('#net_amount').val(obj.total_quot_amt);
                            $('#kilometer').val(obj.kilometer);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Enter Correct Consignment No");
                        $('#consignment_no').val("");
                    }

                });
            }
        }
    });

    //
    $('input[name="cost_radio"]'). click(function() {
        if ($("#cost_include1").prop("checked") == true) {
            $('#cost_exclude_value1').prop('readonly', true);
            $('#cost_exclude_value2').prop('readonly', true);
            $('#misc_charges').prop('readonly',true);
            $('#cost_include_value1').prop('readonly',false);
        }
        if ($("#cost_exclude2").prop("checked") == true) {
            $('#cost_exclude_value1').prop('readonly', false);
            $('#cost_exclude_value2').prop('readonly', false);
            $('#misc_charges').prop('readonly',false);
            $('#cost_include_value1').prop('readonly', true);
        }
    });

    $("#cost_exclude_value1").on("keyup",function(){
        var goods_value = parseInt($('#goods_value').val());
        var temp_amount = parseInt($('#amount').val());
        var discount = parseInt($('#discount').val());
        var insu_per = $("#cost_exclude_value1").val()/100;
        var service_per = parseInt($("#cost_exclude_value2").val())/100;
        if(isNaN(discount)){discount=0;}
        var amount =  temp_amount - discount;
        if(discount> amount){
            alert("Enter Valid Discount");
            $('#discount').val("");
            if ($("#cost_exclude2").prop("checked") == true) {
                if (isNaN(insu_per)) {
                    var insu_amt = 0;
                } else {
                    var insu_amt = Math.round(goods_value * insu_per);
                }
                $("#after_insurance_amnt").val(insu_amt);
                if (isNaN(service_per)) {
                    var service_amt = 0;
                } else {
                    var service_amt = Math.round(amount * service_per);
                }

                $("#amt_without_gst").val(amount);
                $("#after_service_tax").val(service_amt);
                $('#net_amount').val(amount + insu_amt + service_amt);

            }
		}else {
            if ($("#cost_exclude2").prop("checked") == true) {
                if (isNaN(insu_per)) {
                    var insu_amt = 0;
                } else {
                    var insu_amt = Math.round(goods_value * insu_per);
                }
                $("#after_insurance_amnt").val(insu_amt);
                if (isNaN(service_per)) {
                    var service_amt = 0;
                } else {
                    var service_amt = Math.round(amount * service_per);
                }

                $("#amt_without_gst").val(amount);
                $("#after_service_tax").val(service_amt);
                $('#net_amount').val(amount + insu_amt + service_amt);

            }
        }
	});
    $("#cost_exclude_value2").on("keyup",function(){
        var goods_value = parseInt($('#goods_value').val());
        var temp_amount = parseInt($('#amount').val());
        var discount = parseInt($('#discount').val());
        var insu_per = $("#cost_exclude_value1").val()/100;
        var service_per = parseInt($("#cost_exclude_value2").val())/100;
        if(isNaN(discount)){discount=0;}
        var amount =  temp_amount - discount;
        if(discount> amount){
            alert("Enter Valid Discount");
            $('#discount').val("");
            if ($("#cost_exclude2").prop("checked") == true) {
                if (isNaN(insu_per)) {
                    var insu_amt = 0;
                } else {
                    var insu_amt = Math.round(goods_value * insu_per);
                }
                $("#after_insurance_amnt").val(insu_amt);
                if (isNaN(service_per)) {
                    var service_amt = 0;
                } else {
                    var service_amt = Math.round(amount * service_per);
                }

                $("#amt_without_gst").val(amount);
                $("#after_service_tax").val(service_amt);
                $('#net_amount').val(amount + insu_amt + service_amt);
            }
        }else {
            if ($("#cost_exclude2").prop("checked") == true) {
                if (isNaN(insu_per)) {
                    var insu_amt = 0;
                } else {
                    var insu_amt = Math.round(goods_value * insu_per);
                }
                $("#after_insurance_amnt").val(insu_amt);
                if (isNaN(service_per)) {
                    var service_amt = 0;
                } else {
                    var service_amt = Math.round(amount * service_per);
                }

                $("#amt_without_gst").val(amount);
                $("#after_service_tax").val(service_amt);
                $('#net_amount').val(amount + insu_amt + service_amt);
            }
        }
    });

    $("#discount").on("keyup",function(){
        var goods_value = parseInt($('#goods_value').val());
        var temp_amount = parseInt($('#amount').val());
        var discount = parseInt($('#discount').val());
        var insu_per = $("#cost_exclude_value1").val()/100;
        var service_per = parseInt($("#cost_exclude_value2").val())/100;
        if(isNaN(discount)){discount=0;}
        var amount =  temp_amount - discount;
        if(discount> temp_amount){
            alert("Enter Valid Discount");
            $('#discount').val("");
            if ($("#cost_exclude2").prop("checked") == true) {
                if (isNaN(insu_per)) {
                    var insu_amt = 0;
                } else {
                    var insu_amt = Math.round(goods_value * insu_per);
                }
                $("#after_insurance_amnt").val(insu_amt);
                if (isNaN(service_per)) {
                    var service_amt = 0;
                } else {
                    var service_amt = Math.round(amount * service_per);
                }
                $("#amt_without_gst").val(amount);
                $("#after_service_tax").val(service_amt);
                $('#net_amount').val(amount + insu_amt + service_amt);

            }

            if ($("#cost_include1").prop("checked") == true) {
                $("#amt_without_gst").val(amount);
                $('#net_amount').val(amount);
			}
        }else {
            if ($("#cost_exclude2").prop("checked") == true) {
                if (isNaN(insu_per)) {
                    var insu_amt = 0;
                } else {
                    var insu_amt = Math.round(goods_value * insu_per);
                }
                $("#after_insurance_amnt").val(insu_amt);
                if (isNaN(service_per)) {
                    var service_amt = 0;
                } else {
                    var service_amt = Math.round(amount * service_per);
                }
                $("#amt_without_gst").val(amount);
                $("#after_service_tax").val(service_amt);
                $('#net_amount').val(amount + insu_amt + service_amt);

            }

            if ($("#cost_include1").prop("checked") == true) {
                $("#amt_without_gst").val(amount);
                $('#net_amount').val(amount );
            }
        }
    });
});
</script>
@stop