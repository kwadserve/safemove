@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
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
                                        <a href="#tab_default_1" data-toggle="tab">Edit Quotation</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateQuotation') }}" accept-charset="UTF-8" id="quotationPageForm" name="quotationPageForm" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Tab" value="{{$quotation->cn_no}}">
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Quotation No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="quot_no" name="quot_no" value="{{$quotation->quot_id}}" readonly>
                                                                <input type="hidden" class="form-control" id="quot_id" name="quot_id" value="{{$quotation->quot_id}}" readonly>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Customer Name </label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter Customer Name" value="{{$quotation->cust_name}}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Customer Email</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Enter Customer Email" value="{{$quotation->cust_email}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Contact No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="cust_contact" name="cust_contact" placeholder="Enter Contact No" value="{{$quotation->cust_contact}}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2"> Alternate No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="cust_alternate_no" name="cust_alternate_no" placeholder="Enter  Alternate No" value="{{$quotation->cust_alt_contact}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Source</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" placeholder="Enter Source" value="{{$quotation->source}}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" value="{{$quotation->destination}}" readonly>
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
                                                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="{{(int)$quotation->amount}}" >
                                                            </div>

                                                            <label class="control-label col-md-2">Goods Value </label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="goods_value" name="goods_value" placeholder="Enter Goods Value" value="{{(int)$quotation->goods_value}}" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Discount </label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount" value="{{(int)$quotation->discount}}" >
                                                            </div>

                                                            <label class="control-label col-md-2">Other</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="other_amount" name="other_amount" placeholder="Enter Other" value="{{(int)$quotation->other}}" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Packing & Moving Charges for</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="pack_mov_chrg" name="pack_mov_chrg" placeholder="Enter Packing & Moving Charges">
                                                            </div>

                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-3">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Our Cost Include</label>
                                                            <div class="form-group col-md-9">
                                                                <input type="text" class="form-control" id="cost_include" name="cost_include" readonly value="Packing, Loading, Transportation, Unloading, Unpacking, Settling and Removal of Debris with Door to Door Service.">
                                                            </div>
                                                            <br><br><br>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="col-md-12">
                                                                <label for="cost_include1" class="control-label radio-inline col-md-3" style="padding-left: 95px;">
                                                                    <input type="radio" id="cost_include1"  class="radio" name="cost_radio" value="cost_include1" {{($quotation->cost_type == "cost_include1")?"checked":""}}>
                                                                    Our Cost Include:1&nbsp;
                                                                </label>
                                                                <div class="form-group col-md-9">
                                                                    <input type="text" class="form-control" id="cost_include_value1" name="cost_include_value1"  value="Freight on Value @3% on the declare value of Goods, Service Tax @18%" style="margin-left: -9px;" {{($quotation->cost_type == "cost_include1")?"":"readOnly"}}>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="col-md-12" >
                                                                <label for="cost_exclude2" class="control-label radio-inline col-md-3" style="padding-left: 95px;">
                                                                    <input type="radio"  id="cost_exclude2" class="radio" name="cost_radio" value="cost_exclude2" {{($quotation->cost_type == "cost_exclude2")?"checked":""}}>
                                                                    Our Cost Exclude:2&nbsp;
                                                                </label>
                                                                <div class="form-group input-group col-md-7">
                                                                    <div class="input-group-addon">
                                                                        <span>&nbsp;&nbsp;Insurance on value @ &nbsp;&nbsp;</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="cost_exclude_value1" name="cost_exclude_value1" value="{{(int)$quotation->cost_ex_ins_val}}" {{($quotation->cost_type == "cost_exclude2")?"":"readOnly"}} style="width:100px;margin-right:10px;">
                                                                    <div class="input-group-addon">
                                                                        <span>% on value of goods,Service Tax @ &nbsp;&nbsp;</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="cost_exclude_value2" name="cost_exclude_value2" value="{{(int)$quotation->cost_ex_service_tax}}" {{($quotation->cost_type == "cost_exclude2")?"":"readOnly"}} style="width:100px;margin-right:10px;">
                                                                    <div class="input-group-addon">
                                                                        <span>%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="">Miscellaneous Charges </label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="misc_charges" name="misc_charges" placeholder="" value="" readOnly>
                                                            </div>
                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">After Insurance</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="after_insurance_amnt" name="after_insurance_amnt"  value="{{(int)$quotation->after_insurance_amnt}}" readOnly>
                                                            </div>
                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="">After Service Tax</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="after_service_tax" name="after_service_tax"  value="{{(int)$quotation->after_service_tax}}" readOnly>
                                                            </div>
                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Net Amount</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="net_amount" name="net_amount"  value="{{(int)$quotation->net_amount}}" readOnly>
                                                            </div>
                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <hr style="border:1px solid lightgray">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="">Time Required For Packing</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="timerequired" name="timerequired" placeholder="Enter required packing time" value="{{$quotation->time_req_for_packing}}">
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Minimum</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="priornotice" name="priornotice" placeholder="Days Prior Notice Required For Packing" value="{{$quotation->prior_notice}}">
                                                            </div>


                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Transit Time</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="transitday" name="transitday" placeholder="From The Date Of Final Dispatch."  value="{{$quotation->transist_time}}">
                                                            </div>

                                                            <label class="control-label col-md-2">Payment Terms</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="paymentterm" name="paymentterm" placeholder="Enter payment terms" value="{{$quotation->payment_terms}}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Update
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
                order:["0","desc"]
            } );




            $("#cost_exclude_value1").on("keyup",function(){
                var goods_value = parseInt($('#goods_value').val());
                var amount = parseInt($('#amount').val());
                var insu_per = parseInt($("#cost_exclude_value1").val())/100;
                var service_per = parseInt($("#cost_exclude_value2").val())/100;
                if ($("#cost_exclude2").prop("checked") == true) {
                    if(isNaN(insu_per)) {
                        var insu_amt =0;
                    }else{
                        var insu_amt = Math.round(goods_value * insu_per);
                    }
                    $("#after_insurance_amnt").val(insu_amt);
                    if(isNaN(service_per)){
                        var service_amt =0;
                    }else{
                        var service_amt = Math.round(amount*service_per);
                    }
                    $("#after_service_tax").val(service_amt);
                    $('#net_amount').val(amount+insu_amt+service_amt);

                }
            });
            $("#cost_exclude_value2").on("keyup",function(){
                var goods_value = parseInt($('#goods_value').val());
                var amount = parseInt($('#amount').val());
                var insu_per = parseInt($("#cost_exclude_value1").val())/100;
                var service_per = parseInt($("#cost_exclude_value2").val())/100;
                if ($("#cost_exclude2").prop("checked") == true) {
                    if(isNaN(insu_per)) {
                        var insu_amt =0;
                    }else{
                        var insu_amt = Math.round(goods_value * insu_per);
                    }
                    $("#after_insurance_amnt").val(insu_amt);
                    if(isNaN(service_per)){
                        var service_amt =0;
                    }else{
                        var service_amt = Math.round(amount*service_per);
                    }
                    $("#after_service_tax").val(service_amt);
                    $('#net_amount').val(amount+insu_amt+service_amt);
                }
            });
        });
    </script>
@stop