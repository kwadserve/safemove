@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css') }}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css') }}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/forms/advanced.css') }}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}

        .paddingRightDiv{
            padding-right: 30px;
        }
        .marginCss{
            padding-bottom: 30px;
            text-align: right;
            padding-right: 30px;
        }
        .libtn {
            background-color: #1797be;
            border: 1px solid #260df7;
            border-radius: 10px;
            font-size: 17px;
            padding: 5px;
            text-align: center;
        }
        .checkbox label:after,
        .radio label:after {
            content: '';
            display: table;
            clear: both;
        }

        .checkbox .cr,
        .radio .cr {
            position: relative;
            display: inline-block;
            border: 1px solid #a9a9a9;
            border-radius: .25em;
            width: 1.3em;
            height: 1.3em;
            float: left;
            margin-right: .5em;
        }

        .radio .cr {
            border-radius: 50%;
        }

        .checkbox .cr .cr-icon,
        .radio .cr .cr-icon {
            position: absolute;
            font-size: .8em;
            line-height: 0;
            top: 50%;
            left: 20%;
        }

        .radio .cr .cr-icon {
            margin-left: 0.04em;
        }

        .checkbox label input[type="checkbox"],
        .radio label input[type="radio"] {
            display: none;
        }

        .checkbox label input[type="checkbox"] + .cr > .cr-icon,
        .radio label input[type="radio"] + .cr > .cr-icon {
            transform: scale(3) rotateZ(-20deg);
            opacity: 0;
            transition: all .3s ease-in;
        }

        .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
        .radio label input[type="radio"]:checked + .cr > .cr-icon {
            transform: scale(1) rotateZ(0deg);
            opacity: 1;
        }

        .checkbox label input[type="checkbox"]:disabled + .cr,
        .radio label input[type="radio"]:disabled + .cr {
            opacity: .5;
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
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_default_2" data-toggle="tab">All Own Survey Plan</a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Own Survey Plan</a>
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
                                                        <th>Date</th>
                                                        <th>Costing</th>
                                                        <th>Packing Material</th>
                                                        <th>Quotation</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($allSurveyPlan as $allSurveyData)
                                                        <tr>
                                                            <td>{{$allSurveyData->cn_no}}</td>
                                                            <td>{{ucwords($allSurveyData->cust_name)}}</td>
                                                            <td>{{$allSurveyData->survey_date}}</td>
                                                            <td align="right">{{$allSurveyData->total_costing_amt}}</td>
                                                            <td align="right">{{$allSurveyData->total_pack_mat_amt}}</td>
                                                            <td align="right">{{$allSurveyData->total_quot_amt}}</td>
                                                            <td>
                                                                {{--<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('surveyDetails',base64_encode($allSurveyData->survey_id))}}"><i class="icon fa-eye" aria-hidden="true"></i></a>--}}

                                                                {{--<a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('surveyEdit',base64_encode($allSurveyData->survey_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('surveyDestroy',base64_encode($allSurveyData->survey_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/ownSurveyPage/addOwnSurvey') }}" accept-charset="UTF-8" autocomplete="off" id="ownSurveyPlanForm" name="ownSurveyPlanForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Enter" value="{{ old('consignment_no') }}">
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Survey No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="Survey_no" name="Survey_no" value="{{$surveynxt+1}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" readonly value="{{ old('customer_name') }}" >
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date</label>
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                      <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                    </span>
                                                                        <input type="text" class="form-control" name="survey_date" value="{{ date("d-m-Y") }}"  style="position: unset!important;" placeholder="Select Survey Date..." data-date-today-highlight= "true" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin </label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" placeholder="Enter Origin" value="{{ old('source') }}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination" value="{{ old('destination') }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin Address <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control {{ ($errors->has('src_address'))?'errorBox':'' }}" id="src_address" name="src_address" rows="3" placeholder="Enter source full address">{{ old('src_address') }}</textarea>
                                                            </div>

                                                            <label class="control-label col-md-2" for="">Destination Address <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control {{ ($errors->has('dest_address'))?'errorBox':'' }}" id="dest_address" name="dest_address" rows="3" placeholder="Enter destination full address">{{ old('dest_address') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <hr style="border:1px solid lightgray">
                                                        <div class="form-group">
                                                            <label for="schedulePlan" class="control-label col-md-2">Schedule Survey</label>
                                                            <div class="form-group checkbox col-md-2">
                                                                <label style="font-size: 1.5em">
                                                                    <input type="checkbox" id="schedulePlan" name="schedulePlan" {{ (old('schedulePlan')=="on")?"checked":"" }}>
                                                                    <span class="cr"><i class="cr-icon fa fa-check" style="color: #4e97d9;"></i></span>
                                                                </label>
                                                            </div>

                                                            <label for="without_plan" class="control-label col-md-2">Without Survey Visit</label>
                                                            <div class="form-group checkbox col-md-2">
                                                                <label style="font-size: 1.5em">
                                                                    <input type="checkbox" id="without_plan" name="without_plan" {{ (old('without_plan')=="on")?"checked":"" }} >
                                                                    <span class="cr"><i class="cr-icon fa fa-check" style="color: #4e97d9;"></i></span>
                                                                </label>
                                                            </div>
                                                            <label for="without_plan" class="control-label col-md-2">Complete Survey Visit</label>
                                                            <div class="form-group checkbox col-md-2">
                                                                <label style="font-size: 1.5em">
                                                                    <input type="checkbox" id="complete_survey" name="complete_survey" {{ (old('complete_survey')=="on")?"checked":"" }} >
                                                                    <span class="cr"><i class="cr-icon fa fa-check" style="color: #4e97d9;"></i></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="surveyPlanDiv" style="{{ (old('schedulePlan')=="on")?"display: block":"display: none" }}">
                                                            <!--style="{{ (old('schedulePlan')=="on")?"display: block":"display: none" }}"-->
                                                            <br><br><br>
                                                             <hr style="border:1px solid lightgray">
                                                          <div class = "row">    
                                                            <div class="form-group" >
                                                                <label class="control-label col-md-3" for="">Date <span class="spancolor">*</span></label>
                                                                <div class="form-group col-md-6" >
                                                                    <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                      <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                    </span>
                                                                        <input type="text" class="form-control {{ ($errors->has('schedule_date'))?'errorBox':'' }}" name="schedule_date" id="schedule_date" value="{{ old('schedule_date') }}" placeholder="Select Schedule Date..." data-plugin="datepicker" data-date-today-highlight= "true" data-options="minDate:0">
                                                                    </div>
                                                                </div>
                                                                <label for="" class="control-label col-md-3"></label>
                                                                <div class="form-group col-md-3"><br><br>
                                                                 </div>
                                                            </div>
                                                          </div><!--/. row -->
                                                          <div class = "row">
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-3">Time <span class="spancolor">*</span></label>
                                                                <div class="form-group col-md-6">
                                                                    <input class="form-control text time1 {{ ($errors->has('schedule_time'))?'errorBox':'' }}" type="text" id="schedule_time" name="schedule_time" value="{{ old('schedule_time') }}">
                                                                </div>
                                                                <!--<div class="form-group col-md-7 "><br><br></div>-->
                                                            </div>
                                                          </div><!--/. row -->  
                                                          <div class = "row">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Assign Employee <span class="spancolor">*</span></label>
                                                                <div class="form-group col-md-6">
                                                                    <select class="form-control {{ ($errors->has('assing_emp'))?'errorBox':'' }}" name="assing_emp" id="assing_emp" >
                                                                        <option value="">Select Employee </option>
                                                                        @foreach($allEmp as $allEmpData)
                                                                            <option value="{{ $allEmpData->id }}" {{ (old('assing_emp') == $allEmpData->id)?"selected":"" }}>{{$allEmpData->first_name." ".$allEmpData->last_name }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <label class="control-label col-md-2"></label>
                                                                <!--<div class="form-group col-md-4">
                                                                    <br><br>
                                                                </div>-->
                                                            </div>
                                                           </div><!--/. row -->    
                                                            {{--<div class="form-group">--}}
                                                            {{--<div class="form-group col-md-3"></div>--}}
                                                            {{--<div class="form-group col-md-2">--}}
                                                            {{--<div class="libtn">--}}
                                                            {{--<a href="{{ URl::to('/importArticlesHome') }}" style="color: #fff;">Import Articals</a>--}}
                                                            {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="form-group col-md-7"><br><br></div>--}}
                                                            {{--</div>--}}
                                                        </div>


                                                        <div id="checkSurveyDiv" style="{{ (old('complete_survey')=="on")?"display: block":"display: none" }}">
                                                            <br><br><br>
                                                            <hr style="border:1px solid lightgray">
                                                            {{--<div class="form-group" id="importArticalDiv">--}}
                                                                {{--<label class="control-label col-md-3" for="">Import Artical Without Survey Visit</label>--}}
                                                                {{--<div class="col-md-2 libtn">--}}
                                                                    {{--<a onClick="openArticalList()" style="color: #fff;text-decoration: none;">Articals</a>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<br><br><br>--}}
                                                            <div class="form-group row">
                                                                <label class="control-label col-md-2" for="">Total KM</label>
                                                                <span><label class="control-label col-md-4" id="total_km" style="text-align: left"></label></span>
                                                                <label class="control-label col-md-2">Total CFT</label>
                                                                <span><label class="control-label col-md-4" id="total_cft" style="text-align: left"></label></span>
                                                                <br>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2" for="">Truck Size</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="truck_size" name="truck_size" placeholder="" value="{{ old('truck_size') }}">
                                                                </div>

                                                                <label class="control-label col-md-2">Laboure Required</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="laboure_req" name="laboure_req" placeholder="" value="{{ old('laboure_req') }}">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2" for="">Goods Value <span class="spancolor">*</span></label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control {{ ($errors->has('good_value'))?'errorBox':'' }}" id="good_value" name="good_value" placeholder="Enter Goods Value" value="{{ old('good_value') }}">
                                                                </div>

                                                                <label class="control-label col-md-2">Remark</label>
                                                                <div class="form-group col-md-4">
                                                                    <textarea class="form-control" id="remark" name="remark" rows="3" placeholder="Enter Remark">{{ old('remark') }}</textarea>
                                                                </div>
                                                            </div>

                                                            <hr style="border:1px solid lightgray">
                                                            <h4 style="margin-left: 20px;">Labour & Transportation Cost</h4>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="">Loading Charges</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="loading_charges" name="loading_charges" value="{{ (empty(old('loading_charges')))?"0": old('loading_charges')}}" min="0">
                                                                </div>

                                                                <label class="control-label col-md-3">Local Transportation</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="local_transportation" name="local_transportation" value="{{ (empty(old('local_transportation')))?"0": old('local_transportation')}}" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="">Transportation Charges</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="transportation_charges" name="transportation_charges" value="{{ (empty(old('transportation_charges')))?"0": old('transportation_charges')}}" min="0">
                                                                </div>

                                                                <label class="control-label col-md-3">Unloading Transportation</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="unloading_charges" name="unloading_charges" value="{{ (empty(old('unloading_charges')))?"0": old('unloading_charges')}}" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="">Delivery Charges</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="delivery_charges" name="delivery_charges" value="{{ (empty(old('delivery_charges')))?"0": old('delivery_charges')}}" min="0">
                                                                </div>

                                                                <label class="control-label col-md-3">Car Transportation Charges</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="car_trans_charges" name="car_trans_charges" value="{{ (empty(old('car_trans_charges')))?"0": old('car_trans_charges')}}" min="0">
                                                                </div>
                                                            </div>
                                                          <div class = "row">  
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3" for="">Other Charges</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control cal_total_costing_chrg" id="other_charges" name="other_charges" value="{{ (empty(old('other_charges')))?"0": old('other_charges')}}" min="0">
                                                                </div>

                                                                <!--<label class="control-label col-md-3"></label>
                                                                <div class="form-group col-md-3">
                                                                    <br><br>
                                                                </div>-->
                                                            </div>
                                                            
                                                          </div><!--/. row --> 
                                                          
                                                          <hr style="border:1px solid lightgray">
                                                          
                                                          <div class = "row">
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3" for="">Total Costing Amount</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control" id="total_costing_charges" name="total_costing_charges" placeholder=""  value="{{ old('total_costing_charges') }}" min="0">
                                                                </div>
                                                                <label class="control-label col-md-2"></label>
                                                                <div class="form-group col-md-2">
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                          </div>
                                                          
                                                            <hr style="border:1px solid lightgray;margin-top:0px;">
                                                            <h4 style="margin-left: 20px;">Packing Material Details </h4>
                                                            <br>
                                                            <div class="form-group" style="padding-left: 10px;padding-right: 20px">
                                                                <table width="100%">
                                                                    <tr>
                                                                        <td width="14%" class="marginCss"><label class="control-label " for=""></label></td>
                                                                        <td width="12%" align="center" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <label class="control-label " for="">Quantity</label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%" align="center" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <label class="control-label " for="">Price</label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%" align="center" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <label class="control-label " for="">Total Amount</label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for=""></label></td>
                                                                        <td width="12%" align="center" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <label class="control-label " for="">Quantity</label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%" align="center" class="paddingRightDiv">
                                                                            <div class="form-group">
                                                                                <label class="control-label " for="">Price</label>
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%" align="center" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <label class="control-label " for="">Total Amount</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="14%" class="marginCss"><label class="control-label " for="">Roll</label></td>
                                                                        <td width="12%" class="paddingRightDiv">
                                                                            <div class="form-group">
                                                                                <input type="number" class="form-control cal_pack_mat_cost1" id="roll_qty" name="roll_qty" placeholder="Quantity" value="" min="0">
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <input type="number" class="form-control " id="roll_price" name="roll_price" placeholder="Price" value="{{ $packing_list[0]->rate }}" min="0">
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%" class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <input type="number" class="form-control " id="roll_total_amt" name="roll_total_amt" placeholder=""  value="{{ (!empty(old('roll_total_amt')))?old('roll_total_amt'):"0" }}" min="0" >
                                                                            </div>
                                                                        </td>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for="">Boxes</label></td>
                                                                        <td width="12%"  class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <input type="number" class="form-control cal_pack_mat_cost1" id="boxes_qty" name="boxes_qty" placeholder="Quantity"   value="" min="0">
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%"  class="paddingRightDiv">
                                                                            <div class="form-group">
                                                                                <input type="number" class="form-control " id="boxes_price" name="boxes_price" placeholder="Price" value="{{ $packing_list[1]->rate }}" min="0">
                                                                            </div>
                                                                        </td>
                                                                        <td width="12%"  class="paddingRightDiv">
                                                                            <div class="form-group ">
                                                                                <input type="number" class="form-control " id="boxes_total_amt" name="boxes_total_amt" placeholder="" value="{{ (!empty(old('boxes_total_amt')))?old('boxes_total_amt'):"0" }}" min="0">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for="">Tap</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control cal_pack_mat_cost1" id="tap_qty" name="tap_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control" id="tap_price" name="tap_price" placeholder="Price"  value="{{ $packing_list[2]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control" id="tap_total_amt" name="tap_total_amt" placeholder=""  value="{{ (!empty(old('tap_total_amt')))?old('tap_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for="">Air Bubble</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control cal_pack_mat_cost2" id="air_bubble_qty" name="air_bubble_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control" id="air_bubble_price" name="air_bubble_price" placeholder="Price"  value="{{ $packing_list[3]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control" id="air_bubble_total_amt" name="air_bubble_total_amt" placeholder=""  value="{{ (!empty(old('air_bubble_total_amt')))?old('air_bubble_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for="">Thermacol</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control cal_pack_mat_cost1" id="thermacol_qty" name="thermacol_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control" id="thermacol_price" name="thermacol_price" placeholder="Price" value="{{ $packing_list[4]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control " id="thermacol_total_amt" name="thermacol_total_amt" placeholder=""  value="{{ (!empty(old('thermacol_total_amt')))?old('thermacol_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for="">News Paper</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control cal_pack_mat_cost2" id="news_paper_qty" name="news_paper_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control " id="news_paper_price" name="news_paper_price" placeholder="Price" value="{{ $packing_list[5]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control " id="news_paper_total_amt" name="news_paper_total_amt" placeholder=""  value="{{ (!empty(old('news_paper_total_amt')))?old('news_paper_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="14%" class="marginCss"><label class="control-label " for="">Stretch Film</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group">
                                                                                <input type="number" class="form-control cal_pack_mat_cost2" id="stretch_film_qty" name="stretch_film_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control" id="stretch_film_price" name="stretch_film_price" placeholder="Price" value="{{ $packing_list[6]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control " id="stretch_film_total_amt" name="stretch_film_total_amt" placeholder=""  value="{{ (!empty(old('stretch_film_total_amt')))?old('stretch_film_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                        <td width="14%" class="marginCss"><label class="control-label " for="">Foam Sheet</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control cal_pack_mat_cost2" id="foam_sheet_qty" name="foam_sheet_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control " id="foam_sheet_price" name="foam_sheet_price" placeholder="Price" value="{{ $packing_list[7]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control " id="foam_sheet_total_amt" name="foam_sheet_total_amt" placeholder=""  value="{{ (!empty(old('foam_sheet_total_amt')))?old('foam_sheet_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="14%" class="marginCss"><label class="control-label" for="">Other</label></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control cal_pack_mat_cost1" id="other_qty" name="other_qty" placeholder="Quantity" value="" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control " id="other_price" name="other_price" placeholder="Price" value="{{ $packing_list[8]->rate }}" min="0">
                                                                            </div></td>
                                                                        <td width="12%"  class="paddingRightDiv"><div class="form-group ">
                                                                                <input type="number" class="form-control " id="other_total_amt" name="other_total_amt" placeholder=""  value="{{ (!empty(old('other_total_amt')))?old('other_total_amt'):"0" }}" min="0">
                                                                            </div></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                             <hr style="border:1px solid lightgray">
                                                          
                                                          <div class = "row">
                                                              <div class="form-group">
                                                                <label class="control-label col-md-3" for="">Packing Material Amount (A)</label>
                                                                <div class="form-group col-md-3">
                                                                    <input type="number" class="form-control" id="total_pack_mate_amt" name="total_pack_mate_amt" placeholder=""  value="{{ old('total_pack_mate_amt') }}" min="0">
                                                                </div>
                                                                <label class="control-label col-md-2"></label>
                                                                <div class="form-group col-md-2">
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                          </div>
                                                          
                                                            <hr style="border:1px solid lightgray;margin-top:0px;">
                                                            
                                                            <div class="form-group">
                                                                <div class="control-label col-md-12"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="without_plan" class="control-label col-md-5">Part Load Transportation</label>
                                                                <div class="form-group checkbox col-md-4">
                                                                    <label style="font-size: 1.5em">
                                                                        <input type="checkbox" id="part_load" name="part_load" {{ (old('part_load')=="on")?"checked":"" }} >
                                                                        <span class="cr"><i class="cr-icon fa fa-check" style="color: #4e97d9;"></i></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="without_plan" class="control-label col-md-5">Normal Packing</label>
                                                                <div class="form-group checkbox col-md-4">
                                                                    <label style="font-size: 1.5em">
                                                                        <input type="checkbox" id="normal_packing" name="normal_packing" {{ (old('normal_packing')=="on")?"checked":"" }} >
                                                                        <span class="cr"><i class="cr-icon fa fa-check" style="color: #4e97d9;"></i></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" for="">Labour & Transportation Amount (B)</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="number" class="form-control" id="survey_amt" name="survey_amt" placeholder=""  value="{{ old('survey_amt') }}" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" for="">Survey Amount (A+B)</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="number" class="form-control" id="total_sur_amt" name="total_sur_amt" placeholder=""  value="{{ old('total_sur_amt') }}" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" for="">Margin %</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="number" class="form-control" id="margin_per" name="margin_per" value="{{ (empty(old('margin_per')))?"20":old('margin_per') }}" min="0">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5" for="">Total Quotation Amount <span class="spancolor">*</span></label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="number" class="form-control  {{ ($errors->has('total_quat_amt'))?'errorBox':'' }}" id="total_quat_amt" name="total_quat_amt" placeholder=""  value="{{ old('total_quat_amt') }}" readonly min="0">
                                                                </div>
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
                                                                @if ($errors->has('src_address'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('src_address') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('dest_address'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('dest_address') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('schedule_date'))
                                                                    <span class="help-block">
                                								    <label style="color:red">{{ $errors->first('schedule_date') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('schedule_time'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('schedule_time') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('assing_emp'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('assing_emp') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                           
                                                            <p>
                                                                @if ($errors->has('good_value'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('good_value') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('total_quat_amt'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('total_quat_amt') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                  <div class = "row">    
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Save
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
                                                    </div>
                                                </div><!--/. row -->    
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        function openArticalList(){
            var cn_no= btoa($('#consignment_no').val());
            //alert(cn_no);
            var url = "{{URL::to('importArticlesHome',":id")}}";
            url = url.replace('%3Aid', cn_no);
            window.location.assign(url);

        }
        
        $('.time1').datetimepicker({
            format: 'HH:mm a',
        });
        $(document).ready(function() {
            
            $('#checky').click(function(){
     
                if($(this).attr('checked') == false){
                    $('#postme').attr("disabled","disabled");   
                }
            else {
                $('#postme').removeAttr('disabled');
                }
            });
            
            $("#ownSurveyPlanForm").keydown(function(event){
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

            $("#schedulePlan").click( function () {
                var cnno= $('#consignment_no').val();
                if(cnno !="") {
                    if (document.getElementById('schedulePlan').checked) {
                        $("#surveyPlanDiv").show();
                        $("#checkSurveyDiv").hide();
                        $("#without_plan").prop("checked", false);
                        $("#complete_survey"). prop("checked", false);
                    } else {
                        $("#surveyPlanDiv").hide();
                    }
                } else {
                    alert("Please Enter CN NO");
                    $("#schedulePlan"). prop("checked",false);
                }
            });

            $("#without_plan").click( function () {
                var cnno= $('#consignment_no').val();
                if(cnno !="") {
                    if(document.getElementById('without_plan').checked) {
                        $("#checkSurveyDiv").hide();
                        $("#surveyPlanDiv").hide();
                        $("#schedulePlan"). prop("checked", false);
                        $("#complete_survey"). prop("checked", false);
                    } else {
                        $("#checkSurveyDiv").hide();
                    }
                } else {
                    alert("Please Enter CN NO");
                    $("#without_plan"). prop("checked", false);
                }
            });
            $("#complete_survey").click( function () {
                var cnno= $('#consignment_no').val();
                if(cnno !="") {
                    if(document.getElementById('complete_survey').checked) {
                        $("#checkSurveyDiv").show();
                        $("#surveyPlanDiv").hide();
                        $("#without_plan").prop("checked", false);
                        $("#schedulePlan"). prop("checked", false);
                    } else {
                        $("#checkSurveyDiv").hide();
                    }
                } else {
                    alert("Please Enter CN NO");
                    $("#complete_survey"). prop("checked", false);
                }
            });
            //calcluate total costing charges
            $(".cal_total_costing_chrg").on('keyup',function(){
                var temp_cur_id = this.id;
                var load_chrg = $('#loading_charges').val();
                var tran_chrg = $('#transportation_charges').val();
                var local_chrg = $('#local_transportation').val();
                var unload_chrg = $('#unloading_charges').val();
                var del_chrg = $('#delivery_charges').val();
                var cartran_chrg = $('#car_trans_charges').val();
                var other_chrg = $('#other_charges').val();
                var survey_amt = $('#survey_amt').val();
                var pack_amt = $('#total_pack_mate_amt').val();

                if(load_chrg==""){ load_chrg=0;}
                if(tran_chrg==""){ tran_chrg=0;}
                if(local_chrg==""){ local_chrg=0;}
                if(unload_chrg==""){ unload_chrg=0;}
                if(del_chrg==""){ del_chrg=0;}
                if(cartran_chrg==""){ cartran_chrg=0;}
                if(other_chrg==""){ other_chrg=0;}
                if(pack_amt==""){ pack_amt=0;}

//                if(document.getElementById('part_load').checked && tran_chrg != 0 && temp_cur_id == "transportation_charges"){
//                    var temp_tran_chrg = parseInt(tran_chrg) * 0.30;
//                    var tran_chrg = parseInt(tran_chrg) - temp_tran_chrg;
//                    $('#transportation_charges').val(tran_chrg);
//                }
//
//                if(document.getElementById('normal_packing').checked && pack_amt != 0  && temp_cur_id == "transportation_charges"){
//                    var temp_pack_amt = parseInt(pack_amt) * 0.25;
//                    var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                    $('#total_pack_mate_amt').val(pack_amt);
//                }

                var total_costing = parseInt(load_chrg)+parseInt(tran_chrg)+parseInt(local_chrg)+parseInt(unload_chrg)+parseInt(del_chrg)+parseInt(cartran_chrg)+parseInt(other_chrg);
                $('#total_costing_charges').val(parseInt(total_costing));
                 var total_survey_cost = parseInt(total_costing)+parseInt(pack_amt);
//                alert(survey_amt);
                $('#survey_amt').val(total_costing);
                $('#total_sur_amt').val(total_survey_cost);
                var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
            });
            //calculate packing material total cost
            $(".cal_pack_mat_cost1").on('keyup',function(){
                var id= this.id;
                var idStart = id.split('_');
                var qty = $("#"+idStart[0]+"_qty").val();
                var price = $("#"+idStart[0]+"_price").val();
                var survey_amt = $('#survey_amt').val();
//                var pack_amt = $('#total_pack_mate_amt').val();
                var totalcost_chr = $('#total_costing_charges').val();
                if(pack_amt==""){ pack_amt=0;}
                if(qty !=0) {
                    var temp_total = qty * price;
                    $("#" + idStart[0] + "_total_amt").val(temp_total);

                    var roll_price = parseInt($('#roll_total_amt').val());
                    var boxes_price = parseInt($('#boxes_total_amt').val());
                    var tap_price = parseInt($('#tap_total_amt').val());
                    var air_bubble_price = parseInt($('#air_bubble_total_amt').val());
                    var thermacol_price = parseInt($('#thermacol_total_amt').val());
                    var news_paper_price = parseInt($('#news_paper_total_amt').val());
                    var stretch_film_price = parseInt($('#stretch_film_total_amt').val());
                    var foam_sheet_price = parseInt($('#foam_sheet_total_amt').val());
                    var other_price = parseInt($('#other_total_amt').val());
                    var pack_amt = roll_price+boxes_price+tap_price+air_bubble_price+thermacol_price+news_paper_price+stretch_film_price+foam_sheet_price+other_price;
//                    if(document.getElementById('normal_packing').checked && pack_amt != 0){
//                        var temp_pack_amt = parseInt(pack_amt) * 0.25;
//                        var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                        $('#total_pack_mate_amt').val(pack_amt);
//                    }
                    $("#total_pack_mate_amt").val(parseInt(pack_amt));
                    $('#survey_amt').val(totalcost_chr);
                    $('#total_sur_amt').val(parseInt(totalcost_chr)+parseInt(pack_amt));
                    // $('#survey_amt').val(parseInt(totalcost_chr)+parseInt(pack_amt));

                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
                }else{
//                    alert ("Quantity Can not be Zero");
                    var temp_val = $("#" + idStart[0] + "_total_amt").val();
                    $("#" + idStart[0] + "_total_amt").val("0");

                    var roll_price = parseInt($('#roll_total_amt').val());
                    var boxes_price = parseInt($('#boxes_total_amt').val());
                    var tap_price = parseInt($('#tap_total_amt').val());
                    var air_bubble_price = parseInt($('#air_bubble_total_amt').val());
                    var thermacol_price = parseInt($('#thermacol_total_amt').val());
                    var news_paper_price = parseInt($('#news_paper_total_amt').val());
                    var stretch_film_price = parseInt($('#stretch_film_total_amt').val());
                    var foam_sheet_price = parseInt($('#foam_sheet_total_amt').val());
                    var other_price = parseInt($('#other_total_amt').val());
                    var pack_amt = roll_price+boxes_price+tap_price+air_bubble_price+thermacol_price+news_paper_price+stretch_film_price+foam_sheet_price+other_price;
//                    if(document.getElementById('normal_packing').checked && pack_amt != 0){
//                        var temp_pack_amt = parseInt(pack_amt) * 0.25;
//                        var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                        $('#total_pack_mate_amt').val(pack_amt);
//                    }
                    $("#total_pack_mate_amt").val(parseInt(pack_amt));
                    // alert( $("#total_pack_mate_amt").val(parseInt(pack_amt)));
                    $('#survey_amt').val(totalcost_chr);
                    $('#total_sur_amt').val(parseInt(totalcost_chr)+parseInt(pack_amt));
                    // $('#survey_amt').val(parseInt(totalcost_chr)+parseInt(pack_amt));
                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));

                }
            });
            $("#part_load").click( function () {
                var tran_chrg = $('#transportation_charges').val();
                if(tran_chrg==""){ tran_chrg=0;}
                var survey_amt = parseInt($('#total_sur_amt').val());
                if(document.getElementById('part_load').checked && tran_chrg != 0){
                    var temp_tran_chrg = parseInt(tran_chrg) * 0.30;
//                    alert(temp_tran_chrg);
//                    var tran_chrg = parseInt(tran_chrg) - temp_tran_chrg;
//                    $('#transportation_charges').val(tran_chrg);
                    var new_survey_amt = survey_amt-temp_tran_chrg;
                    $('#total_sur_amt').val(new_survey_amt);
                    var marginAmt = (parseInt($('#margin_per').val())/100)*new_survey_amt;
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
                }else{
                    var pack_amt = $('#total_pack_mate_amt').val();
                    if(pack_amt==""){ pack_amt=0;}

                    if(document.getElementById('normal_packing').checked && pack_amt != 0){
                        var temp_pack_amt = parseInt(pack_amt) * 0.25;
                        var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                        $('#total_pack_mate_amt').val(pack_amt);
                    }
                    $('#total_sur_amt').val(parseInt($('#total_costing_charges').val())+parseInt(pack_amt));
                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
                }
            });
            $("#normal_packing").click( function () {
                var pack_amt = $('#total_pack_mate_amt').val();
                if(pack_amt==""){ pack_amt=0;}
                var survey_amt = parseInt($('#total_sur_amt').val());

                if(document.getElementById('normal_packing').checked && pack_amt != 0){
                    var temp_pack_amt = parseInt(pack_amt) * 0.25;
//                    var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                    $('#transportation_charges').val(tran_chrg);
                    var new_survey_amt = survey_amt-temp_pack_amt;
                    $('#total_sur_amt').val(new_survey_amt);
                    var marginAmt = (parseInt($('#margin_per').val())/100)*new_survey_amt;
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
                }else{
                    var total_cost = $('#total_costing_charges').val();
                    if(total_cost==""){ total_cost=0;}

                    var tran_chrg = $('#transportation_charges').val();
                    if(tran_chrg==""){ tran_chrg=0;}

                    if( document.getElementById('part_load').checked && tran_chrg != 0){
                        var temp_tran_chrg = parseInt(tran_chrg) * 0.30;
                        var total_cost = parseInt(total_cost) - parseInt(temp_tran_chrg);
                    }

                    $('#total_sur_amt').val(parseInt(total_cost)+parseInt($('#total_pack_mate_amt').val()));
                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
                }
            });
            $("#total_pack_mate_amt").on('keyup',function(){
                var total_cost = $('#total_costing_charges').val();
                if(total_cost==""){ total_cost=0;}

                var pack_amt = $('#total_pack_mate_amt').val();
                if(pack_amt==""){ pack_amt=0;}

                var tran_chrg = $('#transportation_charges').val();
                if(tran_chrg==""){ tran_chrg=0;}

                if( document.getElementById('part_load').checked && tran_chrg != 0){
                    var temp_tran_chrg = parseInt(tran_chrg) * 0.30;
                    var total_cost = parseInt(total_cost) - parseInt(temp_tran_chrg);
                }

                if(document.getElementById('normal_packing').checked && pack_amt != 0){
                    var temp_pack_amt = parseInt(pack_amt) * 0.25;
                    var pack_amt = parseInt(pack_amt) - temp_pack_amt;
                }

                $('#total_sur_amt').val(parseInt(total_cost)+parseInt(pack_amt));
                var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
            });
            //calculate packing material total cost
            $(".cal_pack_mat_cost2").on('keyup',function(){
                var id= this.id;
                var idStart = id.split('_');
                var qty = $("#"+idStart[0]+"_"+idStart[1]+"_qty").val();
                var price = $("#"+idStart[0]+"_"+idStart[1]+"_price").val();
                var survey_amt = $('#total_sur_amt').val();
//                var pack_amt = $('#total_pack_mate_amt').val();
                var totalcost_chr = $('#total_costing_charges').val();
                if(pack_amt==""){ pack_amt=0;}
                if(qty !=0) {
                    var temp_total = qty * price;
                    $("#"+idStart[0]+"_"+idStart[1]+"_total_amt").val(temp_total);

                    var roll_price = parseInt($('#roll_total_amt').val());
                    var boxes_price = parseInt($('#boxes_total_amt').val());
                    var tap_price = parseInt($('#tap_total_amt').val());
                    var air_bubble_price = parseInt($('#air_bubble_total_amt').val());
                    var thermacol_price = parseInt($('#thermacol_total_amt').val());
                    var news_paper_price = parseInt($('#news_paper_total_amt').val());
                    var stretch_film_price = parseInt($('#stretch_film_total_amt').val());
                    var foam_sheet_price = parseInt($('#foam_sheet_total_amt').val());
                    var other_price = parseInt($('#other_total_amt').val());
                    var pack_amt = roll_price+boxes_price+tap_price+air_bubble_price+thermacol_price+news_paper_price+stretch_film_price+foam_sheet_price+other_price;
//                    if(document.getElementById('normal_packing').checked && pack_amt != 0){
//                        var temp_pack_amt = parseInt(pack_amt) * 0.25;
//                        var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                        $('#total_pack_mate_amt').val(pack_amt);
//                    }
                    $("#total_pack_mate_amt").val(parseInt(pack_amt));
                    $('#total_sur_amt').val(parseInt(totalcost_chr)+parseInt(pack_amt));
                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));
                }else{
//                    alert ("Quantity Can not be Zero");
                    var temp_val = $("#"+idStart[0]+"_"+idStart[1]+"_total_amt").val();

                    $("#"+idStart[0]+"_"+idStart[1]+"_total_amt").val("0");

                    var roll_price = parseInt($('#roll_total_amt').val());
                    var boxes_price = parseInt($('#boxes_total_amt').val());
                    var tap_price = parseInt($('#tap_total_amt').val());
                    var air_bubble_price = parseInt($('#air_bubble_total_amt').val());
                    var thermacol_price = parseInt($('#thermacol_total_amt').val());
                    var news_paper_price = parseInt($('#news_paper_total_amt').val());
                    var stretch_film_price = parseInt($('#stretch_film_total_amt').val());
                    var foam_sheet_price = parseInt($('#foam_sheet_total_amt').val());
                    var other_price = parseInt($('#other_total_amt').val());
                    var pack_amt = roll_price+boxes_price+tap_price+air_bubble_price+thermacol_price+news_paper_price+stretch_film_price+foam_sheet_price+other_price;
//                    if(document.getElementById('normal_packing').checked && pack_amt != 0){
//                        var temp_pack_amt = parseInt(pack_amt) * 0.25;
//                        var pack_amt = parseInt(pack_amt) - temp_pack_amt;
//                        $('#total_pack_mate_amt').val(pack_amt);
//                    }
                    $("#total_pack_mate_amt").val(parseInt(pack_amt));
                    $('#total_sur_amt').val(parseInt(totalcost_chr)+parseInt(pack_amt));

                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt($('#total_sur_amt').val());
                    $('#total_quat_amt').val(marginAmt+parseInt($('#total_sur_amt').val()));

                }
            });

            //calculate margin and total quotation amount
            $("#margin_per").on("blur",function(){
                var margin = $("#margin_per").val();
                var survey_amt = $('#total_sur_amt').val();
                if(parseInt($("#margin_per").val()) >= 10){
                    var per_margin = margin / 100;
//                var total = (parseInt(survey_amt)*per_margin)+per_margin;
                    var total_margin = parseInt(survey_amt) * per_margin;
                    $("#total_quat_amt").val(parseInt(survey_amt) + total_margin);
                    //alert(per_margin);
                }else {
                    alert("Please enter margin more than or equal to 10%");
                    $("#margin_per").val("");
                    $("#total_quat_amt").val(parseInt(survey_amt));
                }
            });

            //get customer deatils of consignment no
            $('#consignment_no').keydown(function(e){
                var base_url= basePath();
                if(e.keyCode == 13) {
                var flag;
                var cnno= $('#consignment_no').val();
                if(cnno !="") {
                    $.ajax({
                        data: {cn_no: cnno},
                        url: base_url+"checkSurveyForEdit/{id}",
                        success: function (result) {
                            if(parseInt(result) == 1){
                                $("#checkSurveyDiv"). show();
                                $("#importArticalDiv").hide();
                                $("#surveyPlanDiv"). hide();
                                $("#schedulePlan"). prop("checked", false);
                                $("#without_plan"). prop("checked", false);
                                $("#complete_survey"). prop("checked", true);
                                $.ajax({
                                    url: base_url+'getSurveyEditData/{id}',
                                    type: 'GET',
                                    data: { cn_no: cnno },
                                    success: function (response) {
                                        var obj = JSON.parse(response);
                                        $('#customer_name').val(obj.cust_name+" / "+obj.cust_contact);
                                        $('#source').val(obj.source);
                                        $('#destination').val(obj.destination);
                                        $('#src_address').val(obj.src_add_line1);
                                        $('#dest_address').val(obj.dest_add_line1);
                                        $('#truck_size').val(obj.vehical_name);
                                        $('#good_value').val(obj.goods_value);
                                        $('#laboure_req').val(obj.laboure_req);
                                        $('#total_km').html(obj.kilometer);
                                        $('#total_cft').html(obj.total_cft);
                                        $('#remark').val(obj.survey_remark);

                                        $('#loading_charges').val(parseInt(obj.loading_chrg));
                                        $('#local_transportation').val(parseInt(obj.local_transp));
                                        $('#transportation_charges').val(parseInt(obj.transportation_chrg));
                                        $('#unloading_charges').val(parseInt(obj.unloading_chrg));
                                        $('#delivery_charges').val(parseInt(obj.delivery_chrg));
                                        $('#car_trans_charges').val(parseInt(obj.car_transp_chrg));
                                        $('#other_charges').val(parseInt(obj.other_chrg));
                                        $('#total_costing_charges').val(parseInt(obj.total_costing_amt));
                                        $('#total_pack_mate_amt').val(parseInt(obj.total_pack_mat_amt));
                                        $('#survey_amt').val(parseInt(obj.total_costing_amt)+parseInt(obj.total_pack_mat_amt));

                                        $('#roll_qty').val(obj.roll_qty);
                                        $('#roll_price').val(obj.roll_price);
                                        $('#roll_total_amt').val(obj.roll_total_amt);
                                        $('#boxes_qty').val(obj.boxes_qty);
                                        $('#boxes_price').val(obj.boxes_price);
                                        $('#boxes_total_amt').val(obj.boxes_total_amt);
                                        $('#tap_qty').val(obj.tap_qty);
                                        $('#tap_price').val(obj.tap_price);
                                        $('#tap_total_amt').val(obj.tap_total_amt);
                                        $('#air_bubble_qty').val(obj.airbubble_qty);
                                        $('#air_bubble_price').val(obj.airbubble_price);
                                        $('#air_bubble_total_amt').val(obj.airbubble_total_amt);
                                        $('#thermacol_qty').val(obj.thermacol_qty);
                                        $('#thermacol_price').val(obj.thermacol_price);
                                        $('#thermacol_total_amt').val(obj.thermacol_total_amt);
                                        $('#news_paper_qty').val(obj.newspaper_qty);
                                        $('#news_paper_price').val(obj.newpaper_price);
                                        $('#news_paper_total_amt').val(obj.newspaper_total_amt);
                                        $('#stretch_film_qty').val(obj.strfilm_qty);
                                        $('#stretch_film_price').val(obj.strfilm_price);
                                        $('#stretch_film_total_amt').val(obj.strfilm_total_amt);
                                        $('#foam_sheet_qty').val(obj.foamsheet_qty);
                                        $('#foam_sheet_price').val(obj.	foamsheet_price);
                                        $('#foam_sheet_total_amt').val(obj.foamsheet_total_amt);
                                        $('#other_qty').val(obj.other_qty);
                                        $('#other_price').val(obj.other_price);
                                        $('#other_total_amt').val(obj.other_total_amt);

                                        $('#margin_per').val(parseInt(obj.margin));
                                        $('#total_quat_amt').val(parseInt(obj.total_quot_amt));
                                    },
                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        alert("Enter Correct Consignment No 3");
                                        $('#consignment_no').val("");
                                    }
                                });
                            }else{
                                $.ajax({
                                    url: base_url+'checkSurveyComplete/{id}',
                                    type: 'GET',
                                    data: { cn_no: cnno },
                                    success: function (result) {
                                        if(parseInt(result) == 1){
                                            $("#checkSurveyDiv"). show();
                                            $("#importArticalDiv").hide();
                                            $("#surveyPlanDiv"). hide();
                                            $("#schedulePlan"). prop("checked", false);
                                            $("#without_plan"). prop("checked", false);
                                            $("#complete_survey"). prop("checked", true);
                                            $.ajax({
                                                url: base_url+'getConsignmentData/{id}',
                                                type: 'GET',
                                                data: {
                                                    cn_no: cnno
                                                },
                                                success: function (response) {
                                                    var obj = JSON.parse(response);
                                                    var gud_val = parseInt(obj.goods_value);
                                                    $('#customer_name').val(obj.cust_name+" / "+obj.cust_contact);
                                                    $('#source').val(obj.source);
                                                    $('#destination').val(obj.destination);
                                                    $('#src_address').val(obj.src_add_line1);
                                                    $('#dest_address').val(obj.dest_add_line1);
                                                    $('#truck_size').val(obj.vehical_name);
                                                    $('#laboure_req').val(obj.exp_no_of_lab_req);
                                                    $('#total_km').html(obj.kilometer);
                                                    $('#total_cft').html(obj.total_cft);
                                                    if(gud_val!=0) {
                                                        $('#good_value').val(gud_val);
                                                    }else{
                                                        $('#good_value').val("");
                                                    }
                                                    $('#loading_charges').val(parseInt(obj.labour_charges));
                                                    $('#transportation_charges').val(parseInt(obj.transport_charges));
                                                    $('#total_costing_charges').val(parseInt(obj.labour_charges) + parseInt(obj.transport_charges));
                                                    $('#total_pack_mate_amt').val(parseInt(obj.packing_charges));
                                                    $('#survey_amt').val(parseInt(obj.total_amt));
                                                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt(obj.total_amt);
                                                    $('#total_quat_amt').val(marginAmt+parseInt(obj.total_amt));
                                                },
                                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                    alert("Enter Correct Consignment No ");
                                                    $('#consignment_no').val("");
                                                }

                                            });
                                        }else if(parseInt(result) == 22){
                                            $("#checkSurveyDiv"). show();
                                            $("#importArticalDiv").hide();
                                            $("#surveyPlanDiv"). hide();
                                            $("#schedulePlan"). prop("checked", false);
                                            $("#without_plan"). prop("checked", false);
                                            $("#complete_survey"). prop("checked", true);
                                            $.ajax({
                                                url: base_url+'getConsignmentData/{id}',
                                                type: 'GET',
                                                data: {
                                                    cn_no: cnno
                                                },
                                                success: function (response) {
                                                    var obj = JSON.parse(response);
                                                    var gud_val = parseInt(obj.goods_value);
                                                    $('#customer_name').val(obj.cust_name+" / "+obj.cust_contact);
                                                    $('#source').val(obj.source);
                                                    $('#destination').val(obj.destination);
                                                    $('#src_address').val(obj.src_add_line1);
                                                    $('#dest_address').val(obj.dest_add_line1);
                                                    $('#truck_size').val(obj.vehical_name);
                                                    $('#laboure_req').val(obj.exp_no_of_lab_req);
                                                    $('#total_km').html(obj.kilometer);
                                                    $('#total_cft').html(obj.total_cft);
                                                    if(gud_val!=0) {
                                                        $('#good_value').val(gud_val);
                                                    }else{
                                                        $('#good_value').val("");
                                                    }
                                                    $('#loading_charges').val(parseInt(obj.labour_charges));
                                                    $('#transportation_charges').val(parseInt(obj.transport_charges));
                                                    $('#total_costing_charges').val(parseInt(obj.labour_charges) + parseInt(obj.transport_charges));
                                                    $('#total_pack_mate_amt').val(parseInt(obj.packing_charges));
                                                    $('#survey_amt').val(parseInt(obj.total_amt));
                                                    var marginAmt = (parseInt($('#margin_per').val())/100)*parseInt(obj.total_amt);
                                                    $('#total_quat_amt').val(marginAmt+parseInt(obj.total_amt));
                                                },
                                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                    alert("Enter Correct Consignment No 3");
                                                    $('#consignment_no').val("");
                                                }

                                            });

                                        }else{
                                            $("#surveyPlanDiv").show();
                                            $("#checkSurveyDiv").hide();
                                            $("#schedulePlan"). prop("checked", true);
                                            $("#without_plan"). prop("checked", false);
                                            $.ajax({
                                                url: base_url+'getCustomerData/{id}',
                                                type: 'GET',
                                                data: {
                                                    cn_no: cnno
                                                },
                                                success: function (response) {
                                                    var obj = JSON.parse(response);
                                                    $('#customer_name').val(obj.cust_name+" / "+obj.cust_contact);
                                                    $('#source').val(obj.source);
                                                    $('#destination').val(obj.destination);
//                                $('#src_address').val(obj.src_add_line1 + '\n' + obj.src_add_line2 + '\n' + obj.src_city + ' - ' + obj.src_pincode + '\n' + obj.src_state + ' , ' + obj.src_country);
//                                $('#dest_address').val(obj.dest_add_line1 + '\n' + obj.dest_add_line2 + '\n' + obj.dest_city + ' - ' + obj.dest_pincode + '\n' + obj.dest_state + ' , ' + obj.dest_country);
                                                },
                                                error: function (XMLHttpRequest, textStatus, errorThrown) {
                                                    alert("Enter Correct Consignment No ");
                                                    $('#consignment_no').val("");
                                                }

                                            });
                                        }
                                    },
                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        alert("Enter Correct Consignment No ");
                                        $('#consignment_no').val("");
                                    }
                                });
                            }
                        }
                    });
                }
            };
            });
        });
    </script>
@stop