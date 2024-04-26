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
        .holiday{
            background-color: #66a3ff;
            height: 170px;
        }
        .normalDay{
            height: 170px;
        }
        .currentDay{
            background-color: #ccffe6;
            height: 170px;
        }
        .visitDay{
            background-color: #ffb366;
            height: 170px;
        }
        .emptyDay{
            background-color:  #f0f0f0;
            height: 170px;
        }
        .boldP{
            font-weight: bold;
            margin-top: -78px;
        }
        .fontSize{
            font-size: 27px;
        }
        p {
            margin: -61px 0 -32px;
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
                                        <a href="#tab_default_1" data-toggle="tab">Schedule Calender</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <div class="form-group"><br>
                                                    <label class="control-label col-md-3">Month <span class="spancolor">*</span></label>
                                                    <div class="form-group col-md-2">
                                                        <select class="form-control " name="month" id="month" >
                                                            <option value="">Select month </option>
                                                            <option value="01" <?php echo (date("m") == "01") ? "selected" : "" ?>>January</option>
                                                            <option value="02" <?php echo (date("m") == "02") ? "selected" : "" ?>>February</option>
                                                            <option value="03" <?php echo (date("m") == "03") ? "selected" : "" ?>>March</option>
                                                            <option value="04" <?php echo (date("m") == "04") ? "selected" : "" ?>>April</option>
                                                            <option value="05" <?php echo (date("m") == "05") ? "selected" : "" ?>>May</option>
                                                            <option value="06" <?php echo (date("m") == "06") ? "selected" : "" ?>>June</option>
                                                            <option value="07" <?php echo (date("m") == "07") ? "selected" : "" ?>>July</option>
                                                            <option value="08" <?php echo (date("m") == "08") ? "selected" : "" ?>>August</option>
                                                            <option value="09" <?php echo (date("m") == "09") ? "selected" : "" ?>>September</option>
                                                            <option value="10" <?php echo (date("m") == "10") ? "selected" : "" ?>>October</option>
                                                            <option value="11" <?php echo (date("m") == "11") ? "selected" : "" ?>>November</option>
                                                            <option value="12" <?php echo (date("m") == "12") ? "selected" : "" ?>>December</option>
                                                        </select>
                                                    </div>
                                                    <br><br>
                                                </div>
                                                <hr style="border: 1px solid gray;width:100%;">
                                                <div class="form-group">
                                                    <div class="col-md-3"><i class="fas fa-square" style="color: #ffb366;"></i> Schedule Visit Day</div>
                                                    <div class="col-md-3"><i class="fas fa-square" style="color: #ccffe6;"></i> Current Day</div>
                                                </div>
                                                <br>
                                                <div class="form-group col-md-12" id="calendarDiv">

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

            $("#month").on("change", function () {
                var month = $(this).val();
                if(month==""){
                    alert("Please select correct month");
                    document.getElementById("calendarDiv").innerHTML = "";
                }else {
                    showCalendar(month);
                }
            });
            $("#month").trigger("change");
        });

        function showCalendar(month) {
            $.ajax({
                url: 'getCalendarData/{id}',
                type: 'GET',
                data: {month: month},
                success: function (response) {
                    document.getElementById("calendarDiv").innerHTML = response;
                }
            });
        }
    </script>
@stop