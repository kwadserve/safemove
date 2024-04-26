@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}

        .paddingRightDiv{
            padding-bottom: 22px;
            text-align: left;
            padding-right: 30px;
        }
        .marginCss {
            padding-bottom: 30px;
            text-align: right;
            padding-right: 30px;
        }

    </style>
    @foreach($listData as $list)
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
                                        <a href="#tab_default_1" data-toggle="tab">Edit Survey Schedule</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <form method="POST" role="form" action="{{ url('/updateSchedule') }}" accept-charset="UTF-8" id="schedulePageForm" name="schedulePageForm" >
                                                {{ csrf_field() }}
                                                <br>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-3">Consignment No <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="number" class="form-control cnnoBox" id="cn_no" name="cn_no" placeholder="Enter Consignment No and Tab" value="{{$list->cn_no}}" readonly>
                                                        </div>
                                                        <label for="" class="control-label col-md-2"></label>
                                                        <div class="form-group col-md-3">
                                                            <br><br>
                                                        </div>
                                                        <input type="hidden" name="sch_id" id="sch_id" value="{{$list->sch_id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-3">Customer Name &nbsp;&nbsp;</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="cust_name" name="cust_name" value="{{ $list->cust_name }}" readonly>
                                                        </div>
                                                        <label for="" class="control-label col-md-2"></label>
                                                        <div class="form-group col-md-3">
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label class="control-label col-md-3" for="">Date <span class="spancolor">*</span></label>
                                                        <div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">
                                                            <input type="text" class="form-control" placeholder="Select Schedule Date..." name="schedule_date" type="text" id="schedule_date" value="{{ date('d-m-Y',strtotime($list->schedule_date)) }}">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-th"></span>
                                                            </div>
                                                        </div>

                                                        <label for="" class="control-label col-md-3">Time <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-2">
                                                            <input class="form-control text time1" type="text" id="schedule_time" name="schedule_time" value="{{ date('h:i a',strtotime($list->schedule_time)) }}">
                                                        </div>
                                                        <div class="form-group col-md-7 "><br><br></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Assign Employee <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-3">
                                                            <select class="form-control" name="assing_emp" id="assing_emp" >
                                                                <option value="">Select Employee </option>
                                                                @foreach($allEmp as $allEmpData)
                                                                    <option value="{{ $allEmpData->id }}" {{ ($list->assing_emp == $allEmpData->id )?"selected":"" }}>{{$allEmpData->first_name." ".$allEmpData->last_name }} </option>
                                                                @endforeach
                                                            </select>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.time1').datetimepicker({
            format: 'HH:mm a',

        });
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