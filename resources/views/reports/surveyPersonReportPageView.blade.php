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
                                                <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-list"> </i>&nbsp;Survey Person Report</h4>
                                                <hr style="border:1px solid lightgray">
                                                <br>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="">From Date</label>
                                                    <div class="form-group col-md-3" >
                                                        <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                            <input type="text" class="form-control" placeholder="Select From Date..." name="from_date" type="text" id="from_date" value="" data-plugin="datepicker" data-date-today-highlight= "true" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <label class="control-label col-md-2" for="">To Date</label>
                                                    <div class="form-group col-md-3" >
                                                        <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                            <input type="text" class="form-control" placeholder="Select To Date..." name="to_date" type="text" id="to_date" value="" data-plugin="datepicker" data-date-today-highlight= "true" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2" for="">Survey Person</label>
                                                    <div class="form-group col-md-3" >
                                                        <select class="form-control" name="survey_person" id="survey_person">
                                                            <option value="">Select</option>
                                                            @foreach($survey_person_list as $survey_person_data)
                                                                <option value="{{$survey_person_data->id}}">{{$survey_person_data->first_name." ".$survey_person_data->last_name}}</option>
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

        });
        function displayData() {
            var from_date= $("#from_date").val();
            var to_date= $("#to_date").val();
            var survey_person= $("#survey_person").val();
            if (from_date == "" || to_date=="" || survey_person=="" ){
                alert("Please Select all");
            }else {
                $.ajax({
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        survey_person: survey_person
                    },
                    url: "getSurveyPersonReportData/{id}",
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
                                    {title: "Customer Name"},
                                    {title: "Date"},
                                    {title: "Status"}
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
            }
        };
    </script>
@stop