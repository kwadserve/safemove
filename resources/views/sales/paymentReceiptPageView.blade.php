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
                                        <a href="#tab_default_2" data-toggle="tab">All Payment Receipt </a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Payment Receipt </a>
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
                                                        <th>Invoice Amount</th>
                                                        <th>Payment Mode</th>
                                                        <th>Amount</th>
                                                        <th>Narrration</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($payListData as $listData)
                                                        <tr>
                                                            <td>{{$listData->cn_no}}</td>
                                                            <td>{{ucwords($listData->cust_name)}}</td>
                                                            <td align="right">{{$listData->invoice_amt}}</td>
                                                            <td>{{$listData->payment_mode}}</td>
                                                            <td align="right">{{$listData->cur_paid_amt}}</td>
                                                            <td>{{$listData->narrations}}</td>
                                                            <td>{{date("d-m-Y",strtotime($listData->pay_create))}}</td>
                                                            <td>
                                                                <a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('paymentRcpDetails',base64_encode($listData->rcp_id))}}" target="_blank"><i class="icon fa-eye" aria-hidden="true"></i></a>
                                                                {{--<a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editInvoice',base64_encode($listData->rcp_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('paymentRcpDestroy',base64_encode($listData->rcp_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addPaymentRecp') }}" accept-charset="UTF-8" id="paymentReceiptForm" name="paymentReceiptForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Enter" >
                                                                <input type="hidden" id="invoice_no" name="invoice_no" >
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Receipt No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="receipt_no" name="receipt_no" value="{{(empty($rcp_id))?old('receipt_no'):$rcp_id }}" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">To &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="receipt_to" name="receipt_to" placeholder="Customer Name" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date &nbsp;&nbsp;</label>
                                                            <div class="form-group input-group date col-md-1"  style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="tr_date" type="text" id="tr_date" value="{{date("d-m-Y")}}" readonly>
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Invoice Amount &nbsp;&nbsp; </label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="invoice_amount" name="invoice_amount"  placeholder="Invoice Amount" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Paid Amount &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="paid_amount" name="paid_amount" value="" placeholder="Paid Amount" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Balance Amount &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="balance_amount" name="balance_amount" value="" placeholder="Outstanding Amount" readonly>
                                                                <input type="hidden" class="form-control" id="balance_amt" name="balance_amt" value="" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Previous TDS &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="previous_tds" name="previous_tds" value="0" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Amount <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('amount'))?'errorBox':'' }}" id="amount" name="amount" placeholder="Enter Amount">
                                                            </div>

                                                            <label class="control-label col-md-2">TDS &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="current_tds" name="current_tds" placeholder="Enter TDS" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Payment Mode <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('payment_mode'))?'errorBox':'' }}" name="payment_mode" id="payment_mode">
                                                                    <option value="">Select Payment Mode</option>
                                                                    @foreach($payModeRs as $payModeData)
                                                                        <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label class="control-label col-md-2">Narrations &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="narration" name="narration" rows="3" placeholder="Enter narrations"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="bankNameId" style="display: none">
                                                            <label class="control-label col-md-2">Bank Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
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
                                                                @if ($errors->has('amount'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('amount') }}</label>
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
            });

            //get customer deatils of consignment no
            $('#consignment_no').keydown(function(e){
                var base_url= basePath();
                if(e.keyCode == 13) {
                    var cnno = $('#consignment_no').val();
                    if (cnno != "") {
                        $.ajax({
                            url: base_url+'getConsignmentData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno,
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                $('#receipt_to').val(obj.cust_name);
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("Enter Correct Consignment No");
                                $('#consignment_no').val("");
                            }

                        });

                        $.ajax({
                            url: base_url+'getPaymentData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno,
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                $('#invoice_no').val(obj.invoice_no);
                                $('#invoice_amount').val(obj.invoice_amt);
                                $('#paid_amount').val(obj.paid_amt);
                                $('#balance_amount').val(obj.bal_amt);
                                $('#balance_amt').val(obj.bal_amt);
                                $('#previous_tds').val(obj.previous_tds);
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("Enter Correct Consignment No");
                                $('#consignment_no').val("");
                            }

                        });
                    }
                }
            });

            $('#current_tds').on('keyup',function(){
                var inv_amt = parseInt($('#invoice_amount').val());
                var cur_amt = parseInt($('#amount').val());
                var paid_amt = parseInt($('#paid_amount').val());
                var bal_amt = parseInt($('#balance_amt').val());
                var cur_tds = parseInt($('#current_tds').val());
                if(cur_tds !="") {
                    if(paid_amt == "0") {
                        var bal = (inv_amt-cur_amt)-cur_tds;
                        if(bal>=0) {
                            $('#balance_amount').val(bal);
                        }else{
                            $('#balance_amount').val(inv_amt-cur_amt);
                        }
                    }else{
                        var bal = (bal_amt-cur_amt)-cur_tds;
                        if(bal>=0) {
                            $('#balance_amount').val(bal);
                        }else{
                            $('#balance_amount').val(bal_amt-cur_amt);
                        }
                    }
                }

            });

            $('#amount').on('keyup',function(){
                var inv_amt = parseInt($('#invoice_amount').val());
                var cur_amt = parseInt($('#amount').val());
                var paid_amt = parseInt($('#paid_amount').val());
                var bal_amt = parseInt($('#balance_amt').val());
                var cur_tds = parseInt($('#current_tds').val());
                if(isNaN(cur_tds)){cur_tds=0;}
                if(cur_amt !="") {
                    if(paid_amt == "0") {
                        var bal = (inv_amt-cur_amt)-cur_tds;
                        if(bal>=0) {
                            $('#balance_amount').val(bal);
                        }else{
                            alert("Please enter correct amount");
                            $('#amount').val("");
                            $('#balance_amount').val("");
                        }
                    }else{
                        var bal = (bal_amt-cur_amt)-cur_tds;
                        if(bal>=0) {
                            $('#balance_amount').val(bal);
                        }else{
                            alert("Please enter correct amount");
                            $('#amount').val("");
                            $('#balance_amount').val("");
                        }
                    }
                }
            });

            $("#payment_mode").on("change",function(){
                if($("#payment_mode").val()=="Cheque"){
                    $("#bankNameId").show();
                }else{
                    $("#bankNameId").hide();
                }
            });
        });
    </script>
@stop