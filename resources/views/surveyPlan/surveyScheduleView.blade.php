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

        .libtn {
            background-color: #1797be;
            border: 1px solid #260df7;
            border-radius: 10px;
            font-size: 17px;
            padding: 5px;
            text-align: center;
        }
        .libtn2 {
            background-color: #17be60;
            border: 1px solid #0df732;
            border-radius: 10px;
            font-size: 17px;
            padding: 5px;
            text-align: center;
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
                                        <a href="#tab_default_1" data-toggle="tab">All Survey Schedule</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>CN No</th>
                                                        <th>Name</th>
                                                        <th>Survey Date</th>
                                                        <th>Survey Time</th>
                                                        <th>Assigned</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        <th>Import</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($allSurveyData as $allSurveyData)
                                                        <tr>
                                                            <td>{{$allSurveyData->cn_no}}</td>
                                                            <td>{{ucwords($allSurveyData->cust_name)}}</td>
                                                            <td>{{date("d-m-Y",strtotime($allSurveyData->schedule_date))}}</td>
                                                            <td>{{date("h:i A",strtotime($allSurveyData->schedule_time))}}</td>
                                                            <td>{{$allSurveyData->first_name." ".$allSurveyData->last_name}}</td>
                                                            <td>{{$allSurveyData->schedule_status}}</td>
                                                            <td>
                                                                {{--<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('scheduleDetails',base64_encode($allSurveyData->sch_id))}}"><i class="icon fa-eye" aria-hidden="true"></i></a>--}}

                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editSchedule',base64_encode($allSurveyData->sch_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('scheduleDestroy',base64_encode($allSurveyData->sch_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                            </td>
                                                            <td>
                                                                @if($allSurveyData->schedule_status == "Assinged")
                                                                    <div class="libtn">
                                                                        <a href="{{ URl::to('/importArticlesHome',base64_encode($allSurveyData->cn_no)) }}" style="color: #fff;text-decoration: none;">Articals</a>
                                                                    </div>
                                                                @else
                                                                    <div class="libtn2">
                                                                        <a href="{{ URl::to('/editArticlesHome',base64_encode($allSurveyData->cn_no)) }}" style="color: #fff;text-decoration: none;">Edit Articals</a>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
        $('.time1').datetimepicker({
            format: 'HH:mm a',

        });
        $(document).ready(function() {
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
        });
    </script>
@stop