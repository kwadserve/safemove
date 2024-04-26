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
        .divWidth{
            width:120px;
        }
        .marginCss {
            margin-bottom: 30px;
        }

    </style>
    @foreach($listData as $list)
    @endforeach
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                @if(!empty($message))
                    <div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{$message}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Edit Delivery</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateDelivery') }}" accept-charset="UTF-8" id="deliveryPageForm" name="deliveryPageForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control cnnoBox" id="consignment_no" name="consignment_no" value="{{ $list->cn_no }}" readonly>
                                                                <input type="hidden" id="del_id" name="del_id" value="{{ $list->del_id }}">
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Customer Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $list->cust_name }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" value="{{ $list->source }}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination"  value="{{ $list->destination }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Truck No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="truck_no" name="truck_no"  value="{{ $list->truck_no }}" placeholder="Enter truck no" >
                                                            </div>

                                                            <label class="control-label col-md-2">No of Packages <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control" id="no_of_packages" name="no_of_packages" placeholder="Enter no of packages"  value="{{ $list->no_of_packages }}" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Value Of Goods <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="value_of_goods" name="value_of_goods"  value="{{ $list->value_of_goods }}" placeholder="Enter valu of good" >
                                                            </div>

                                                            <label class="control-label col-md-2">Type Of Packing &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="type_of_packing" id="type_of_packing" >
                                                                    <option value="">Select Type Of Packing</option>
                                                                    @foreach($typePackRS as $typePackData)
                                                                        <option value="{{$typePackData->type_name}}" {{ ($list->type_of_packing == $typePackData->type_name)?"selected":"" }}>{{$typePackData->type_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Mode of Dispatch &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="mode_of_dispatch" id="mode_of_dispatch" >
                                                                    <option value="">Select Mode Of Dispatch</option>
                                                                    @foreach($disModeRS as $disModeData)
                                                                        <option value="{{$disModeData->type_name}}" {{ ($list->mode_of_dispatch == $disModeData->type_name)?"selected":"" }} >{{$disModeData->type_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label class="control-label col-md-2">Risk Type &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="risk_type" id="risk_type" >
                                                                    <option value="">Select Risk Type</option>
                                                                    @foreach($riskTypeRS as $riskTypeData)
                                                                        <option value="{{$riskTypeData->risk_name}}" {{ ($list->risk_type == $riskTypeData->risk_name)?"selected":"" }}>{{$riskTypeData->risk_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Private Mark &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="private_mark" name="private_mark" row="3"  value="{{ $list->private_mark }}"></textarea>
                                                            </div>

                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">

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
                                                                @if ($errors->has('truck_no'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('truck_no') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('no_of_packages'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('no_of_packages') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('value_of_goods'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('value_of_goods') }}</label>
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
            } );
        });
    </script>
@stop