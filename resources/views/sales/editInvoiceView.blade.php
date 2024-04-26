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

    </style>
    @foreach($invData as $invData)
    @endforeach
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Edit Inovice </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateInvoice') }}" accept-charset="UTF-8" id="invoicePageForm" name="invoicePageForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" value="{{ $invData->cn_no }}" >
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Bill No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="bill_no" name="bill_no" value="{{ $invData->id }}" readonly>
                                                            </div>
                                                            <input type="hidden" name="inv_id" value="{{ $invData->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Purches Order No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="pur_order_no" name="pur_order_no" placeholder="Enter Purches Order No"  value="{{ $invData->pur_order_no }}" >
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Purches Date <span class="spancolor">*</span></label>
                                                            <div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control {{ ($errors->has('purches_date'))?'errorBox':'' }}" placeholder="Select Date..." name="purches_date" type="text" id="purches_date" value="{{ date("d-m-Y",strtotime($invData->pur_order_date)) }}">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Customer Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Enter Customer Name"  value="{{ $invData->cust_name }}" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Contact No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="cust_contact" name="cust_contact" placeholder="Enter Contact No" value="{{ $invData->cust_contact }}" readonly   >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Invoice Amount <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('invoice_amount'))?'errorBox':'' }}" id="invoice_amount" name="invoice_amount" value="{{ (int)$invData->invoice_amount }}" placeholder="Enter invoice amount" >
                                                            </div>

                                                            <label class="control-label col-md-2">Payment Mode <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('payment_mode'))?'errorBox':'' }}" name="payment_mode" id="payment_mode"  >
                                                                    <option value="">Select Payment Mode</option>
                                                                    <option value="Card" {{ ($invData->payment_mode == 'Card')?"selected":'' }}>Card </option>
                                                                    <option value="Cash" {{ ($invData->payment_mode == 'Cash')?"selected":'' }}>Cash</option>
                                                                    <option value="Net Banking" {{ ($invData->payment_mode == 'Net Banking')?"selected":'' }}>Net Banking</option>
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
                                                                @if ($errors->has('purches_date'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('purches_date') }}</label>
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
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@stop