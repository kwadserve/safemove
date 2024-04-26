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
                                        <a href="#tab_default_1" data-toggle="tab">Delivery Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Delivery No</th>
                                                        <td>{{$listData->del_id}}</td>
                                                        <th>Date </th>
                                                        <td>{{date("d-m-Y",strtotime($listData->del_cre))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Consignment No</th>
                                                        <td>{{$listData->cn_no}}</td>
                                                        <th>Customer Name</th>
                                                        <td>{{ucwords($listData->cust_name)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Origin</th>
                                                        <td>{{$listData->source}}</td>
                                                        <th>Destination</th>
                                                        <td>{{$listData->destination}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Truck No</th>
                                                        <td>{{$listData->truck_no}}</td>
                                                        <th>No of Packages</th>
                                                        <td>{{$listData->no_of_packages}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Value Of Goods</th>
                                                        <td>{{$listData->value_of_goods}}</td>
                                                        <th>Type Of Packing</th>
                                                        <td>{{$listData->type_of_packing}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mode of Dispatch</th>
                                                        <td>{{$listData->mode_of_dispatch}}</td>
                                                        <th>Risk Type  </th>
                                                        <td>{{$listData->risk_type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Private Mark</th>
                                                        <td>{{$listData->private_mark}}</td>
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
        });
    </script>
@stop