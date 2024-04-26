@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link rel="stylesheet" href="public//global/vendor/filament-tablesaw/tablesaw.css">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
        th{
            font-weight: bold;
            color: gray;
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Confirm Job Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Confirm Job No</th>
                                                        <td>{{$cjData->cj_id}}</td>
                                                        <th>Date </th>
                                                        <td>{{date("d-m-Y",strtotime($cjData->cjcat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Consignment No</th>
                                                        <td>{{$cjData->cn_no}}</td>
                                                        <th>Status </th>
                                                        <td>{{$cjData->status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Moving Date</th>
                                                        <td>{{date("d-m-Y",strtotime($cjData->moving_date))}}</td>
                                                        <th>Moving Time </th>
                                                        <td>{{date("d-m-Y",strtotime($cjData->moving_time))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created Date</th>
                                                        <td>{{date("d-m-Y h:i A",strtotime($cjData->cjcat))}}</td>
                                                        <th>Updated Date</th>
                                                        <td>{{date("d-m-Y h:i A",strtotime($cjData->cjupat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>{{$cjData->u1fst}}{{$cjData->u1lst}}</td>
                                                        <th>Updated By</th>
                                                        <td>{{$cjData->u2fst}}{{$cjData->u2lst}}</td>
                                                    </tr>
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
    </script>
@stop