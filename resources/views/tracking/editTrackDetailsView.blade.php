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
        .tdlabel{
            padding-bottom: 30px;
            text-align: right;
            padding-right: 30px;
        }
    </style>
    @foreach($listData as $listData)
    @endforeach
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
                                        <a href="#tab_default_1" data-toggle="tab">Edit Tracking</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateTrackingData') }}" accept-charset="UTF-8" id="ownSurveyPlanForm" name="ownSurveyPlanForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no"  value="{{ $listData->cn_no }}" readonly="">
                                                                <input type="hidden" name="tr_id" value="{{ $listData->tr_id }}">
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Customer Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" readonly  value="{{ $listData->cust_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source"  value="{{ $listData->source }}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" value="{{ $listData->destination }}"  readonly>
                                                            </div>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                            {{--<label class="control-label col-md-2" for="">Origin Address &nbsp;&nbsp;</label>--}}
                                                            {{--<div class="form-group col-md-4">--}}
                                                                {{--<textarea class="form-control" id="src_address" name="src_address" rows="3"  readonly></textarea>--}}
                                                            {{--</div>--}}

                                                            {{--<label class="control-label col-md-2" for="">Destination Address &nbsp;&nbsp;</label>--}}
                                                            {{--<div class="form-group col-md-4">--}}
                                                                {{--<textarea class="form-control" id="dest_address" name="dest_address" rows="3"  readonly></textarea>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Invoice No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="invoice_no" name="invoice_no"  value="{{ $listData->invoice_no }}" >
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Start Date <span class="spancolor">*</span></label>
                                                            <div class="form-group input-group date col-md-4" data-provide="datepicker" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control {{ ($errors->has('start_date'))?'errorBox':'' }}" placeholder="Select Date..." name="start_date" type="text" id="start_date"  value="{{ date("d-m-Y",strtotime($listData->start_date)) }}">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Transist Day &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="transist_day" name="transist_day" value="{{ $listData->transist_day }}" >
                                                            </div>
                                                            <label class="control-label col-md-2" for="">End Date <span class="spancolor">*</span></label>
                                                            <div class="form-group input-group date col-md-4" data-provide="datepicker" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control {{ ($errors->has('end_date'))?'errorBox':'' }}" placeholder="Select Date..." name="end_date" type="text" id="end_date" value="{{ date("d-m-Y",strtotime($listData->end_date)) }}">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group" style="padding-left: 10px;padding-right: 20px">
                                                            <table width="100%" >
                                                            @php ($i = 1)
                                                            @foreach($trackData as $trackData)
                                                                <tr>
                                                                    <td width="15%" class="tdlabel">
                                                                        <label class="control-label">Status</label>
                                                                        <input type="hidden" class="form-control" id="trd_id_{{$i}}" name="trd_id_{{$i}}" value="{{ $trackData->trd_id }}">
                                                                    </td>
                                                                    <td width="15%"><div class="form-group">
                                                                            <select class="form-control" name="status_{{$i}}" id="status_{{$i}}" >
                                                                                <option value="">Select Status</option>
                                                                                <option value="Pick Up" {{ ($trackData->tracking_status=="Pick Up")?'selected':'' }}>Pick Up</option>
                                                                                <option value="In Transit" {{ ($trackData->tracking_status=="In Transit")?'selected':'' }}>In Transit</option>
                                                                                <option value="Delay" {{ ($trackData->tracking_status=="Delay")?'selected':'' }}>Delay</option>
                                                                                <option value="Delivered" {{ ($trackData->tracking_status=="Delivered")?'selected':'' }}>Delivered</option>
                                                                            </select>
                                                                        </div></td>
                                                                    <td width="15%" class="tdlabel"><label class="control-label" for="">Comment</label></td>
                                                                    <td width="20%"><div class="form-group">
                                                                            <input type="text" class="form-control" id="comment_{{$i}}" name="comment_{{$i}}" placeholder="Enter Comment" value="{{ $trackData->comment }}">
                                                                        </div></td>
                                                                    <td width="15%" class="tdlabel"><label class="control-label" for="">Date</label></td>
                                                                    <td width="20%"><div class="form-group input-group date" data-provide="datepicker" style="padding-left: 15px;width: auto;">
                                                                            <input type="text" class="form-control" placeholder="Select Date..." name="track_date_{{$i}}" type="text" id="track_date_{{$i}}" value="{{ date("d-m-Y",strtotime($trackData->	tracking_date)) }}">
                                                                            <div class="input-group-addon">
                                                                                <span class="glyphicon glyphicon-th"></span>
                                                                            </div>
                                                                        </div></td>
                                                                </tr>
                                                                @php ($i++)
                                                                @endforeach
                                                            </table>
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
                                                                @if ($errors->has('start_date'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('start_date') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('end_date'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('end_date') }}</label>
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

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        });
    </script>
@stop