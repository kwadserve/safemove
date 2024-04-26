@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/forms/advanced.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/filament-tablesaw/tablesaw.css')}}">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
    </style>
    @foreach($enquiryData as $enquiryData)

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
                                        <a href="#tab_default_1" data-toggle="tab">Edit Enquiry </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{URL::to('updateEnquiry')}}" accept-charset="UTF-8" id="editEnquiryForm" name="editEnquiryForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Enquiry No&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="enquiry_no" name="enquiry_no" value="{{$enquiryData->enq_id}}" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date <span class="spancolor">*</span></label>
                                                            {{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
                                                                {{--<input type="text" class="form-control" placeholder="Select Enquiry Date..." name="enq_date" type="text" id="enq_date" value="{{ date('d-m-Y') }}" readonly>--}}
                                                                {{--<div class="input-group-addon">--}}
                                                                    {{--<span class="glyphicon glyphicon-th"></span>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                    <input type="text" class="form-control" name="enq_date" value="{{ date('d-m-Y')  }}" style="position: unset!important;" placeholder="Select Follow Up Date..." data-plugin="datepicker">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="enq_id" value="{{$enquiryData->enq_id}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="consignment_no" name="consignment_no" value="{{$enquiryData->cn_no}}" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2">Goods Types <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('good_types'))?'errorBox':'' }}" name="good_types" id="good_types" >
                                                                    <option value="">Select Good Types </option>
                                                                    @foreach($goodsRS as $goodsData)
                                                                        <option value="{{$goodsData->goods_type}}" {{ ($enquiryData->enquiry_type == $goodsData->goods_type)?"selected":"" }}>{{$goodsData->goods_type}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Lead Source&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="reference" id="reference" >
                                                                    <option value="">Select Lead Source </option>
                                                                    @foreach($sourceRS as $sourceData)
                                                                        <option value="{{$sourceData->lead_source}}" {{ ($enquiryData->reference == $sourceData->lead_source)?"selected":"" }}>{{$sourceData->lead_source}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <label class="control-label col-md-2">Lead Status&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="reference_status" id="reference_status" >
                                                                    <option value="">Select Lead Status </option>
                                                                    @foreach($statusRS as $statusData)
                                                                        <option value="{{$statusData->lead_status}}" {{ ($enquiryData->reference_status == $statusData->lead_status)?"selected":"" }}>{{$statusData->lead_status}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Customer Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('cust_name'))?'errorBox':'' }}" id="cust_name" name="cust_name" placeholder="Enter Customer Name" value="{{$enquiryData->cust_name}}">
                                                            </div>


                                                            <label class="control-label col-md-2">Customer Email&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="email" class="form-control {{ ($errors->has('cust_email'))?'errorBox':'' }}" id="cust_email" name="cust_email" placeholder="Enter Customer Email" value="{{$enquiryData->cust_email}}">

                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Contact No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('cust_contact'))?'errorBox':'' }}" id="cust_contact" name="cust_contact" placeholder="Enter Contact No" value="{{$enquiryData->cust_contact}}" >
                                                            </div>
                                                            <label class="control-label col-md-2"> Alternate No&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('cust_alternate_no'))?'errorBox':'' }}" id="cust_alternate_no" name="cust_alternate_no" placeholder="Enter  Alternate No" value="{{$enquiryData->cust_alt_contact}}">
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('source'))?'errorBox':'' }}" id="source" name="source" placeholder="Enter Source"  value="{{$enquiryData->source}}" >
                                                            </div>
                                                            <label class="control-label col-md-2">Destination <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('destination'))?'errorBox':'' }}" id="destination" name="destination" placeholder="Enter Destination" value="{{$enquiryData->destination}}"  >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Expected Shifting Date <span class="spancolor">*</span></label>
                                                            {{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
                                                            {{--<input type="text" class="form-control {{ ($errors->has('exp_shifting_date'))?'errorBox':'' }}" placeholder="Select Shifting Date..." name="exp_shifting_date" type="text" id="exp_shifting_date" value="{{ date("d-m-Y",strtotime($enquiryData->exp_shifting_date)) }}" >--}}
                                                            {{--<div class="input-group-addon">--}}
                                                            {{--<span class="glyphicon glyphicon-th"></span>--}}
                                                            {{--</div>--}}
                                                            {{--</div>--}}
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                    <input type="text" class="form-control {{ ($errors->has('exp_shifting_date'))?'errorBox':'' }}" style="position: unset!important;" name="exp_shifting_date" id="exp_shifting_date" value="{{ date("d-m-Y",strtotime($enquiryData->exp_shifting_date)) }}" placeholder="Select Shifting Date..." data-plugin="datepicker" data-date-today-highlight= "true">
                                                                </div>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Follow Up Date&nbsp;&nbsp;</label>
                                                            {{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
                                                                {{--<input type="text" class="form-control" placeholder="Select Follow Up Date..." name="follow_up_date" type="text" id="follow_up_date" value="{{ date("d-m-Y",strtotime($enquiryData->follow_up_date)) }}" >--}}
                                                                {{--<div class="input-group-addon">--}}
                                                                    {{--<span class="glyphicon glyphicon-th"></span>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                    <input type="text" class="form-control" name="follow_up_date" style="position: unset!important;" value="{{ date("d-m-Y",strtotime($enquiryData->follow_up_date)) }}" placeholder="Select Follow Up Date..." data-plugin="datepicker" data-date-today-highlight= "true">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Conversation&nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="follow_up_convr" name="follow_up_convr" row="3" >{{ $enquiryData->follow_up_convr }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('good_types'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('good_types') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cust_name'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_name') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cust_email'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_email') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cust_contact'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_contact') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cust_alternate_no'))
                                                                    <span class="help-block">
																<label style="color:red">{{ $errors->first('cust_alternate_no') }}</label>
															</span>
                                                                @endif
                                                            </p>

                                                            <p>
                                                                @if ($errors->has('source'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('source') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('destination'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('destination') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>

                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i> Update
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
                ],
                order:["1","desc"]
            } );

        });
        var app = angular.module('app', []);

        app.directive("matchPassword", function () {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=matchPassword"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.matchPassword = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                    });
                }
            };
        });
    </script>
@stop