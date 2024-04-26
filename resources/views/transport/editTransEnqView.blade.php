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
    @foreach($listData as $listData)
    @endforeach
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Edit Transport Enquiry</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateTransEnq') }}" accept-charset="UTF-8" id="transportEnquiryForm" name="transportEnquiryForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="consignment_no" name="consignment_no" value="{{ $listData->cn_no }}" readonly>
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Transport Enquiry No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="transport_enq_no" name="transport_enq_no" value="{{ $listData->id }}" readonly >
                                                                <input type="hidden" name="te_id" value="{{ $listData->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name"  value="{{ $listData->cust_name }}" readonly >
                                                            </div>
                                                            <label class="control-label col-md-2">Goods Types <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('good_types'))?'errorBox':'' }}" name="good_types" id="good_types" >
                                                                    <option value="">Select Good Types </option>
                                                                    @foreach($goodsRS as $goodsData)
                                                                        <option value="{{$goodsData->goods_type}}" {{ ($listData->good_type == $goodsData->goods_type)?"selected":"" }}>{{$goodsData->goods_type}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" placeholder="Enter Origin" value="{{ $listData->source }}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" value="{{ $listData->destination }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class="control-label col-md-2" for="">Goods Transport Agent</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="good_trans_agent" id="good_trans_agent" >
                                                                    <option value="">Select Goods Transport Agent</option>
                                                                    @foreach($trasnAgent as $trasnAgentData)
                                                                        <option value="{{$trasnAgentData->trans_agent_name}}" {{ ($listData->good_trans_agent == $trasnAgentData->trans_agent_name)?"selected":"" }}>{{$trasnAgentData->trans_agent_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <label class="control-label col-md-2">Vehicle Transport Agent</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="vehi_trans_agent" id="vehi_trans_agent"  >
                                                                    <option value="">Select Vehicle Transport Agent </option>
                                                                    @foreach($trasnAgent as $trasnAgentData)
                                                                        <option value="{{$trasnAgentData->trans_agent_name}}" {{ ($listData->vehi_trans_agent == $trasnAgentData->trans_agent_name)?"selected":"" }}>{{$trasnAgentData->trans_agent_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Amount</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="goods_amount" name="goods_amount" value="{{ ($listData->good_amount== "0.00")?"":$listData->good_amount }}" placeholder="Enter Goods Amount" >
                                                            </div>
                                                            <label class="control-label col-md-2">Amount</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="vehicle_charges" name="vehicle_charges" value="{{ ($listData->vehical_amount== "0.00")?"":$listData->vehical_amount }}" placeholder="Enter Vehicle Charges" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Goods Transist Time</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="good_transist_time" name="good_transist_time" placeholder="Enter Goods Transist Time"  value="{{($listData->gud_transist_time== "0")?"":$listData->gud_transist_time}}">
                                                            </div>
                                                            <label class="control-label col-md-2">Vehicle Transist Time</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="vehicle_trasist_time" name="vehicle_trasist_time" placeholder="Enter Vehicle Transist Time"  value="{{($listData->veh_tansist_time== "0")?"":$listData->veh_tansist_time}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Narration</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="narration" name="narration" placeholder="Enter Narration"  rows="3">{{$listData->narration}}</textarea>
                                                            </div>
                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
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
                                                                @if ($errors->has('good_types'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('good_types') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
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
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        });
    </script>
@stop