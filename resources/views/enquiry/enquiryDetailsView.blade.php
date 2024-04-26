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
                                        <a href="#tab_default_1" data-toggle="tab">Enquiry Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table class="table table-bordered ">
                                                    <tr>
                                                        <th>Enquiry No</th>
                                                        <td>{{$enquiryData->enq_id}}</td>
                                                        <th>Date </th>
                                                        <td>{{date("d-m-Y",strtotime($enquiryData->ecat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Consignment No</th>
                                                        <td>{{$enquiryData->cn_no}}</td>
                                                        <th>Goods Type </th>
                                                        <td>{{$enquiryData->enquiry_type}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lead Source</th>
                                                        <td>{{$enquiryData->reference}}</td>
                                                        <th>Lead Status </th>
                                                        <td>{{$enquiryData->reference_status}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Customer Name</th>
                                                        <td>{{$enquiryData->cust_name}}</td>
                                                        <th>Customer Email </th>
                                                        <td>{{$enquiryData->cust_email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact No</th>
                                                        <td>{{$enquiryData->cust_contact}}</td>
                                                        <th>Alternate No </th>
                                                        <td>{{$enquiryData->cust_alt_contact}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Origin</th>
                                                        <td>{{$enquiryData->source}}</td>
                                                        <th>Destination</th>
                                                        <td>{{$enquiryData->destination}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Reference Name</th>
                                                        <td>{{$enquiryData->reference_name}}</td>
                                                        <th>Reference Number</th>
                                                        <td>{{$enquiryData->reference_number}}</td>
                                                    </tr>
                                                    {{--<tr>--}}
                                                        {{--<th>Source Address</th>--}}
                                                        {{--<td>--}}
                                                            {{--{{ $enquiryData->src_add_line1 }}--}}
                                                        {{--</td>--}}
                                                        {{--<th>Destination Address</th>--}}
                                                        {{--<td>{{ $enquiryData->dest_add_line1 }}--}}
                                                        {{--</td>--}}
                                                    {{--</tr>--}}
                                                    <tr>
                                                        <th>Created Date</th>
                                                        <td>{{date("d-m-Y",strtotime($enquiryData->ecat))}}</td>
                                                        <th>Updated Date</th>
                                                        <td>{{date("d-m-Y",strtotime($enquiryData->eupat))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>{{$enquiryData->u1fst}} {{$enquiryData->u1lst}}</td>
                                                        <th>Updated By</th>
                                                        <td>{{$enquiryData->u2fst}} {{$enquiryData->u2lst}}</td>
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