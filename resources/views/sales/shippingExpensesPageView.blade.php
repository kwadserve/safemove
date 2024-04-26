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
                                        <a href="#tab_default_2" data-toggle="tab">All Shipping Expenses </a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">Shipping Expenses </a>
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
                                                        <th>Origin Total</th>
                                                        <th>Destination Total</th>
                                                        <th>Customer Charges</th>
                                                        <th>Final Total</th>
                                                        <th>Total Profit/Loss</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($srcDestexpRs as $srcDestexpData)
                                                        <tr>
                                                            <td>{{$srcDestexpData->cn_no}}</td>
                                                            <td align="right">{{$srcDestexpData->source_total}}</td>
                                                            <td align="right">{{$srcDestexpData->dest_total}}</td>
                                                            <td></td>
                                                            <td align="right">{{$srcDestexpData->total}}</td>
                                                            <td></td>
                                                            <td>{{date("d-m-Y",strtotime($srcDestexpData->created_at))}}</td>
                                                            <td>
{{--                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editInvoice',base64_encode($srcDestexpData->id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('ShippingSourceDataDestroy',base64_encode($srcDestexpData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addSrcDestShipExpanses') }}" accept-charset="UTF-8" id="invoicePageForm" autocomplete="off" name="invoicePageForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Entry No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="entry_no" name="entry_no" placeholder="" value="{{(empty($expId))?old("entry_no"):$expId}}" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date &nbsp;&nbsp;</label>
                                                            <div class="form-group input-group date col-md-1" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="entry_date" type="text" id="entry_date" value="{{ date('d-m-Y') }}" readonly>
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div><!--/. row -->
                                                      <div class = "row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Tab" value="{{old("consignment_no")}}">
                                                            </div>
                                                           <!-- <label for="" class="control-label col-md-2"> &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>-->
                                                            <label class="control-label col-md-2">Expense At <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('expanse_at'))?'errorBox':'' }}" name="expanse_at" id="expanse_at"  >
                                                                    {{--<option value="">Select...</option>--}}
                                                                    <option value="Source" selected>Origin</option>
                                                                    <option value="Destination">Destination</option>
                                                                </select>
                                                            </div>
                                                            <!--<label for="" class="control-label col-md-2"> &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>-->
                                                        </div>
                                                       </div><!--/. row -->
                                                       
                                                        <div id="sourceExpanseDiv" style="display: block">
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Packaging Material</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="pack_mat_cost" name="src_cost[]" placeholder="Enter Amount" value="" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Packaging Material" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="src_pay_mode[]" id="pack_mat_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                        <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="pack_mat_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Goods Transportation</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control  calSrcDestExp" id="gud_transp_cost" name="src_cost[]" placeholder="Enter Amount" value="" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Goods Transportation" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control " name="src_pay_mode[]" id="gud_transp__paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="gud_transp_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Vehical Transportation</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="vehi_transp_cost" name="src_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Vehical Transportation" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control " name="src_pay_mode[]" id="vehi_transp__paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="vehi_transp_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Insurance</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="insu_cost" name="src_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Insurance" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="src_pay_mode[]" id="insu__paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="insu_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Service Tax</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="ser_tax_cost" name="src_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Service Tax" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="src_pay_mode[]" id="ser_tax_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="ser_tax_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Local Transportation</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="local_transp_cost" name="src_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Local Transportation" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="src_pay_mode[]" id="local_transp_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="local_transp_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Loading Costing</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="load_chrg_cost" name="src_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Loading Costing" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="src_pay_mode[]" id="load_chrg_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="load_chrg_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Labour Charge</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="lab_chrg_cost" name="src_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="src_label[]" placeholder="" value="Labour Charge" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="src_pay_mode[]" id="lab_chrg_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="lab_chrg_narration" name="src_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="destExpanseDiv"  style="display: none">
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Destination Expense</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="dest_exp_cost" name="dest_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="dest_label[]" placeholder="" value="Destination Expense" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="dest_pay_mode[]" id="dest_exp_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="dest_exp_narration" name="dest_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Unloading Costing</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="unload_cost" name="dest_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="dest_label[]" placeholder="" value="Unloading Costing" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control " name="dest_pay_mode[]" id="unload__paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="unload_narration" name="dest_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Local Transportation</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="dst_local_tra_cost" name="dest_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="dest_label[]" placeholder="" value="Local Transportation" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control " name="dest_pay_mode[]" id="dst_local_tra__paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="dst_local_tra_narration" name="dest_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Conveyence</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="convey_cost" name="dest_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="dest_label[]" placeholder="" value="Conveyence" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="dest_pay_mode[]" id="convey__paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="convey_narration" name="dest_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="commonExpanseDiv" style="display: block">
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Naka</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="naka_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Naka">
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="naka_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="naka_narration" name="common_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Fooding</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="fooding_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Fooding">
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="fooding_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="fooding_narration" name="common_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Miscellaneous</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="misce_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Miscellaneous" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="misce_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="misce_narration" name="common_narration[]" placeholder="Enter Narration">
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Other 1</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="other1_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Other 1" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="other1_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="other1_narration" name="common_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Other 2</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="other2_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Other 2" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="other2_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="other2_narration" name="common_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Other 3</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="other3_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Other 3" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="other3_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="other3_narration" name="common_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Other 4</label>
                                                                <div class="form-group col-md-2">
                                                                    <input type="number" class="form-control calSrcDestExp" id="other4_cost" name="common_cost[]" placeholder="Enter Amount" min="0">
                                                                    <input type="hidden" class="form-control" id="" name="common_label[]" placeholder="" value="Other 4" >
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <select class="form-control" name="common_pay_mode[]" id="other4_paymode"  >
                                                                        <option value="">Select...</option>
                                                                        @foreach($payModeRs as $payModeData)
                                                                            <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="other4_narration" name="common_narration[]" placeholder="Enter Narration" >
                                                                </div>
                                                                <div class="form-group col-md-1">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <i class="fa fa-save"></i>  Print
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Origin Total <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-2">
                                                                <input type="number" class="form-control " id="source_total" name="source_total" placeholder="" value="{{old("source_total")}}" min="0">
                                                            </div>
                                                            <label class="control-label col-md-2">Destination Total <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-2">
                                                                <input type="number" class="form-control " id="dest_total" name="dest_total" placeholder="" value="{{old("dest_total")}}" min="0">
                                                            </div>
                                                            <label class="control-label col-md-1">Total <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-2">
                                                                <input type="number" class="form-control " id="src_dest_total" name="src_dest_total" placeholder="" value="{{old("src_dest_total")}}" min="0">
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
                                                                @if ($errors->has('expanse_at'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('expanse_at') }}</label>
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
            $('#expanse_at').on("change",function(){
                var expanse_at = $('#expanse_at').val();
                var cn_no = $("#consignment_no").val();
                if(cn_no != "") {
                    if (expanse_at != "") {
                        if (expanse_at == "Source") {
                            $('#sourceExpanseDiv').show();
                            $('#commonExpanseDiv').show();
                            $('#destExpanseDiv').hide();

                        } else if (expanse_at == "Destination") {
                            $('#destExpanseDiv').show();
                            $('#commonExpanseDiv').show();
                            $('#sourceExpanseDiv').hide();
                        } else {
                            $('#sourceExpanseDiv').hide();
                            $('#destExpanseDiv').hide();
                            $('#commonExpanseDiv').hide();
                        }
                    }
                }else{
                    alert("Please Enter Consignment No First.");
                    $("#expanse_at").val($("#expanse_at option:first").val());
                    $('#sourceExpanseDiv').show();
                    $('#destExpanseDiv').hide();
                    $('#commonExpanseDiv').show();
                }
            });

            $('.calSrcDestExp').on("keyup",function(){
                var expanse_at = $('#expanse_at').val();
                if (expanse_at != "") {
                    var com_cost1 = parseInt($("#naka_cost").val());
                    var com_cost2 = parseInt($("#fooding_cost").val());
                    var com_cost3 = parseInt($("#misce_cost").val());
                    var com_cost4 = parseInt($("#other1_cost").val());
                    var com_cost5 = parseInt($("#other2_cost").val());
                    var com_cost6 = parseInt($("#other3_cost").val());
                    var com_cost7 = parseInt($("#other4_cost").val());
                    if(isNaN(com_cost1 )){com_cost1=0;}
                    if(isNaN(com_cost2 )){com_cost2=0;}
                    if(isNaN(com_cost3 )){com_cost3=0;}
                    if(isNaN(com_cost4 )){com_cost4=0;}
                    if(isNaN(com_cost5 )){com_cost5=0;}
                    if(isNaN(com_cost6 )){com_cost6=0;}
                    if(isNaN(com_cost7 )){com_cost7=0;}
                    var allcomcost = com_cost1+com_cost2+com_cost3+com_cost4+com_cost5+com_cost6+com_cost7;
//                    alert(allcomcost);

                    if (expanse_at == "Source") {
                        var src_cost1 = parseInt($("#pack_mat_cost").val());
                        var src_cost2 = parseInt($("#gud_transp_cost").val());
                        var src_cost3 = parseInt($("#vehi_transp_cost").val());
                        var src_cost4 = parseInt($("#insu_cost").val());
                        var src_cost5 = parseInt($("#aser_tax_costbc").val());
                        var src_cost6 = parseInt($("#local_transp_cost").val());
                        var src_cost7 = parseInt($("#load_chrg_cost").val());
                        var src_cost8 = parseInt($("#lab_chrg_cost").val());
                        if(isNaN(src_cost1 )){src_cost1=0;}
                        if(isNaN(src_cost2 )){src_cost2=0;}
                        if(isNaN(src_cost3 )){src_cost3=0;}
                        if(isNaN(src_cost4 )){src_cost4=0;}
                        if(isNaN(src_cost5 )){src_cost5=0;}
                        if(isNaN(src_cost6 )){src_cost6=0;}
                        if(isNaN(src_cost7 )){src_cost7=0;}
                        if(isNaN(src_cost8 )){src_cost8=0;}
                        $("#source_total").val(src_cost1+src_cost2+src_cost3+src_cost4+src_cost5+src_cost6+src_cost7+src_cost8+allcomcost);
                        var src_total = parseInt($("#source_total").val());
                        var dest_total = parseInt($("#dest_total").val());
                        if(isNaN(src_total )){src_total=0;}
                        if(isNaN(dest_total )){dest_total=0;}
                        $("#src_dest_total").val(src_total+dest_total);
                    }
                    if (expanse_at == "Destination") {
                        var dest_cost1 = parseInt($("#dest_exp_cost").val());
                        var dest_cost2 = parseInt($("#unload_cost").val());
                        var dest_cost3 = parseInt($("#dst_local_tra_cost").val());
                        var dest_cost4 = parseInt($("#convey_cost").val());
                        if(isNaN(dest_cost1 )){dest_cost1=0;}
                        if(isNaN(dest_cost2 )){dest_cost2=0;}
                        if(isNaN(dest_cost3 )){dest_cost3=0;}
                        if(isNaN(dest_cost4 )){dest_cost4=0;}

                        $("#dest_total").val(dest_cost1+dest_cost2+dest_cost3+dest_cost4+allcomcost);
                        var src_total = parseInt($("#source_total").val());
                        var dest_total = parseInt($("#dest_total").val());
                        if(isNaN(src_total )){src_total=0;}
                        if(isNaN(dest_total )){dest_total=0;}
                        $("#src_dest_total").val(src_total+dest_total);
                    }
                }
            });

            //get Shipping Expenese deatils of consignment no
            $('#consignment_no').keydown(function(e){
                var base_url= basePath();
                if(e.keyCode == 13) {
                    var cnno = $('#consignment_no').val();
                    if (cnno != "") {
                        $.ajax({
                            url: base_url+'getShippingSourceData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno,
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                    $('#pack_mat_cost').val(parseInt(obj.total_pack_mat_amt));
                                    $('#gud_transp_cost').val(parseInt(obj.transportation_chrg));
                                    $('#local_transp_cost').val(parseInt(obj.local_transp));
                                    $('#load_chrg_cost').val(parseInt(obj.loading_chrg));
                                    var total_src = parseInt(obj.total_pack_mat_amt)+parseInt(obj.transportation_chrg)+parseInt(obj.local_transp)+parseInt(obj.loading_chrg);
                                    if(obj.cost_type=="cost_include1"){
                                        $('#insu_cost').val("0");
                                        $('#ser_tax_cost').val("0");
                                    }else{
                                        $('#insu_cost').val(parseInt(obj.after_insurance_amnt));
                                        $('#ser_tax_cost').val(parseInt(obj.after_service_tax));
                                        total_src = total_src + parseInt(obj.after_insurance_amnt)+parseInt(obj.after_service_tax);
                                    }

                                    $('#source_total').val(total_src);
                                    $('#src_dest_total').val(total_src);
//

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