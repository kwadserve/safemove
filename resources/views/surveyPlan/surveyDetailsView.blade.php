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
                                        <a href="#tab_default_1" data-toggle="tab">Survey Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Survey No</th>
                                                        <td>{{$surveyData->survey_id}}</td>
                                                        <th>Date </th>
                                                        <td>{{date("d-m-Y",strtotime($surveyData->created_at))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: center" colspan="4"> Costing Details</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Truck Size</th>
                                                        <td>{{$surveyData->survey_id}}</td>
                                                        <th>Laboure Required </th>
                                                        <td>{{$surveyData->created_at}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Goods Value</th>
                                                        <td>{{$surveyData->survey_id}}</td>
                                                        <th>Remark </th>
                                                        <td>{{$surveyData->created_at}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Truck Size</th>
                                                        <td>{{$surveyData->loading_chrg}}</td>
                                                        <th>Laboure Required </th>
                                                        <td>{{$surveyData->local_transp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Loading Charges</th>
                                                        <td>{{$surveyData->loading_chrg}}</td>
                                                        <th>Local Transportation </th>
                                                        <td>{{$surveyData->local_transp}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Transportation Charges</th>
                                                        <td>{{$surveyData->transportation_chrg}}</td>
                                                        <th>Unloading Charges </th>
                                                        <td>{{$surveyData->unloading_chrg}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delivery Charges</th>
                                                        <td>{{$surveyData->delivery_chrg}}</td>
                                                        <th>Car Transportation Charges</th>
                                                        <td>{{$surveyData->car_transp_chrg}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Other Charges</th>
                                                        <td>{{$surveyData->other_chrg}}</td>
                                                        <th>Total Costing Amount</th>
                                                        <td>{{$surveyData->total_costing}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Packing Material Amount</th>
                                                        <td>{{$surveyData->total_pack_mat_amt}}</td>
                                                        <th>Survey Amount</th>
                                                        <td>{{$surveyData->total_costing+$surveyData->total_pack_mat_amt}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Margin %</th>
                                                        <td>{{$surveyData->margin}}</td>
                                                        <th>Total Quotation Amount</th>
                                                        <td>{{$surveyData->total_quot_amt}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created Date</th>
                                                        <td>{{date("d-m-Y",strtotime($surveyData->scat))}}</td>
                                                        <th>Updated Date</th>
                                                        <td>{{date("d-m-Y",strtotime($surveyData->supat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>{{$surveyData->u1fst}}{{$surveyData->u1lst}}</td>
                                                        <th>Updated By</th>
                                                        <td>{{$surveyData->u2fst}}{{$surveyData->u2lst}}</td>
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
                order:["0","desc"]
            } );

        });
    </script>
@stop