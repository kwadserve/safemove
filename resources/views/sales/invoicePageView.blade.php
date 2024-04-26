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
                                    <a href="#tab_default_2" data-toggle="tab">All Inovice </a>
                                </li>
        						<li>
                                    <a href="#tab_default_1" data-toggle="tab">New Inovice </a>
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
                                                    <th>Contact</th>
                                                    <th>Amount</th>
                                                    <th>Payment Mode</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($invData as $invData)
                                                    <tr>
                                                        <td>{{$invData->cn_no}}</td>
                                                        <td>{{ucwords($invData->cust_name)}}</td>
                                                        <td>{{$invData->cust_contact}}</td>
                                                        <td align="right">{{$invData->invoice_amount}}</td>
                                                        <td>{{$invData->payment_mode}}</td>
                                                        <td>{{date("d-m-Y",strtotime($invData->inv_create))}}</td>
                                                        <td>
                                                            <a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('invoiceDetails',base64_encode($invData->cn_no))}}" target="_blank"><i class="icon fa-eye" aria-hidden="true"></i></a>
                                                            <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editInvoice',base64_encode($invData->id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                            <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('invoiceDestroy',base64_encode($invData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
        						<div class="tab-pane " id="tab_default_1">
                                    <div class="row" style="transform: none;">
                                        <div class="col-md-12">
                                            <form method="POST" role="form" action="{{ url('/addInvoice') }}" accept-charset="UTF-8" id="invoicePageForm" autocomplete="off" name="invoicePageForm" >
                                                {{ csrf_field() }}
                                                <br>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="number" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Enter" value="{{old("consignment_no")}}">
                                                        </div>
                                                        <label for="" class="control-label col-md-2">Bill No &nbsp;&nbsp;</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="" value="{{(empty($invId))?old("bill_no"):$invId}}" readonly>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Purches Order No &nbsp;&nbsp;</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="pur_order_no" name="pur_order_no" placeholder="Enter Purches Order No" value="{{old("pur_order_no")}}">
                                                        </div>
                                                        <label class="control-label col-md-2" for="">Purches Date &nbsp;&nbsp;</label>
                                                        {{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
                                                            {{--<input type="text" class="form-control" placeholder="Select Date..." name="purches_date" type="text" id="purches_date" value="{{old("purches_date")}}" >--}}
                                                            {{--<div class="input-group-addon">--}}
                                                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <div class="form-group col-md-3" >
                                                            <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="purches_date" type="text" id="purches_date" value="{{old("purches_date")}}" data-plugin="datepicker" data-date-today-highlight= "true">
                                                            </div>
                                                        </div>
                                            		</div>
                                            		<div class="form-group">
                                            			<label class="control-label col-md-2" for="">Customer Name &nbsp;&nbsp;</label>
                                            			<div class="form-group col-md-4">
                                            				<input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter Customer Name" value="{{old("cust_name")}}" readonly>
                                            			</div>
                                                        <label class="control-label col-md-2" for="">Contact No &nbsp;&nbsp;</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="cust_contact" name="cust_contact" placeholder="Enter Contact No" value="{{old("cust_contact")}}" readonly   >
                                                        </div>
                                            		</div>
                                            		<div class="form-group">
                                                        <label class="control-label col-md-2" for="">Invoice Amount <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="number" class="form-control {{ ($errors->has('invoice_amount'))?'errorBox':'' }}" id="invoice_amount" name="invoice_amount" placeholder="Enter invoice amount" value="{{old("invoice_amount")}}">
                                                        </div>

                                                        <label class="control-label col-md-2">Payment Mode <span class="spancolor">*</span></label>
                                            			<div class="form-group col-md-4">
                                            				<select class="form-control {{ ($errors->has('payment_mode'))?'errorBox':'' }}" name="payment_mode" id="payment_mode"  >
                                                				<option value="">Select Payment Mode</option>
                                                                @foreach($payModeRs as $payModeData)
                                                                    <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                @endforeach
                                                			</select>
                                            			</div>
                                            		</div>
                                                </div>
                                                <br>
                                                <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                    <div class="form-group col-md-4">
                                                    </div>
                                                    <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                        <p>
                                                            @if ($errors->has('consignment_no'))
                                                                <span class="help-block">
                                								<label style="color:red">{{ $errors->first('consignment_no') }}</label>
                                							</span>
                                                            @endif
                                                        </p>
                                                        <p>
                                                            @if ($errors->has('invoice_amount'))
                                                                <span class="help-block">
                                								<label style="color:red">{{ $errors->first('invoice_amount') }}</label>
                                							</span>
                                                            @endif
                                                        </p>
                                                        <p>
                                                            @if ($errors->has('payment_mode'))
                                                                <span class="help-block">
                                								<label style="color:red">{{ $errors->first('payment_mode') }}</label>
                                							</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="form-group col-md-4"></div>
                                                </div>
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
                    url: base_url+'getInvoiceData/{id}',
                    type: 'GET',
                    data: {
                        cn_no: cnno,
                    },
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $('#cust_name').val(obj.cust_name);
                        $('#cust_contact').val(obj.cust_contact);
                        $('#invoice_amount').val(obj.net_amount);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Enter Correct Consignment No");
                        $('#consignment_no').val("");
                    }

                });
            }
        }
    });
});
</script>
@stop