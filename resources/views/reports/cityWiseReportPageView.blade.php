@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
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
                                <div class="tab-content">
                                    <div class="row" style="transform: none;">
                                        <div class="col-md-12">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-list"> </i>&nbsp;City Wise Report</h4>
                                                <hr style="border:1px solid lightgray">
                                                <br>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Source <span class="spancolor">*</span></label>
                                                    <div class="form-group col-md-3">
                                                        <select class="form-control" name="src_city" id="src_city">
                                                            <option value="">Select... </option>
                                                            <option value = "All" selected>All</option>
                                                            @foreach($srcCity as $srcCityData)
                                                                <option value="{{$srcCityData->source}}" >{{$srcCityData->source}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label class="control-label col-md-2">Destination&nbsp;&nbsp;</label>
                                                    <div class="form-group col-md-3">
                                                        <select class="form-control" name="dest_city" id="dest_city" >
                                                            <option value="">Select.. </option>
                                                            <option value = "All" selected>All</option>
                                                            @foreach($destCity as $destCityData)
                                                                <option value="{{$destCityData->destination}}" >{{$destCityData->destination}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="form-group col-sm-7 pull-right">
                                                    <button type="button" class="btn btn-primary" onclick="displayData()" >
                                                        Display
                                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                    </button>
                                                </div>
                                                <br><br><br>
                                                <hr style="border:1px solid lightgray;width:100%;">
                                            </div>
                                            <div class="row" style="transform: none;">
                                                <div class="col-md-12">
                                                    <table align="center" id="roprtTable" class="table table-bordered table-striped">
                                                        {{--<thead>--}}
                                                        {{--<tr>--}}
                                                        {{--<th>CN No</th>--}}
                                                        {{--<th>Name</th>--}}
                                                        {{--<th>Contact</th>--}}
                                                        {{--<th>Email ID</th>--}}
                                                        {{--<th>Date</th>--}}
                                                        {{--<th>Status</th>--}}
                                                        {{--</tr>--}}
                                                        {{--</thead>--}}
                                                        {{--<tbody id="tbodyData">--}}
                                                        {{--</tbody>--}}
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
    </div>

    <script>
        var tbl = null;
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

//            var tbl= $('#roprtTable').dataTable({
//                dom: 'Bfrtip',
//                buttons: [
//                    'copy', 'csv', 'excel', 'pdf', 'print'
//                ],
//            });
        });
        function displayData() {
            var src_city= $("#src_city").val();
            var dest_city= $("#dest_city").val();
            if(src_city != "" && dest_city != "") {
                $.ajax({
                    data: {
                        src_city: src_city,
                        dest_city: dest_city
                    },
                    url: "getCityWiseReportData/{id}",
                    success: function (response) {
//                    alert(response);
                        var obj = JSON.parse(response);
                        if (tbl == null) {
                            var tbl = $('#roprtTable').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ],
                                data: obj,
                                columns: [
                                    {title: "CN No"},
                                    {title: "Name"},
                                    {title: "Source"},
                                    {title: "Destination"}
                                ]
                            });
                            if (obj) {
                                tbl.clear();
                                tbl.rows.add(obj);
                                tbl.draw();
                            } else {
                                tbl.clear();
                                tbl.draw();
                            }
                        } else {
                            if (obj) {
                                tbl.clear();
                                tbl.rows.add(obj);
                                tbl.draw();
                            } else {
                                tbl.clear();
                                tbl.draw();
                            }
                        }
                    }
                });
            }else{
                alert("Please Select Source And Destination City");
            }
        };
    </script>
@stop