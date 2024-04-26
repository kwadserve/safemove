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
        th{
            font-weight: bold;
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
                                                <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-list"> </i>&nbsp;Profit Sheet Report</h4>
                                                <hr style="border:1px solid lightgray">
                                                <br>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-3">Consignment No</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="cn_no" name="cn_no" placeholder="Enter Consignment No" required>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <button type="button" class="btn btn-primary" onclick="displayData()" >
                                                            Display
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <hr style="border:1px solid lightgray">
                                            </div>
                                            <div class="row" style="transform: none;">
                                                <div class="col-md-12">
                                                    <table align="center"  class="table table-bordered ">
                                                        <tr>
                                                            <th colspan="4"><b>Customer Details</b></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <td id="cust_name"></td>
                                                            <th>CN No</th>
                                                            <td id="cn_no"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Customer Email</th>
                                                            <td id="cust_email"></td>
                                                            <th>Customer Contact</th>
                                                            <td id="cust_contact"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Source</th>
                                                            <td id="source"></td>
                                                            <th>Destination</th>
                                                            <td id="destination"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Source Address</th>
                                                            <td id="src_address"></td>
                                                            <th>Destination Address</th>
                                                            <td id="dest_address"></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4"><b>Invoice Details</b></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Invoice No</th>
                                                            <td id="inv_id"></td>
                                                            <th>Invoice Date</th>
                                                            <td id="inv_date"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Invoice Amount</th>
                                                            <td id="inv_amount"></td>
                                                            <th>Payment Mode</th>
                                                            <td id="inv_pay_mode"></td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="4"><b>Shipping Details</b></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Source Amount</th>
                                                            <td id="src_total"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Destination Amount</th>
                                                            <td id="dest_total"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Amount</th>
                                                            <td id="src_dest_total"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Profit :</th>
                                                            <td id="profitAmount"></td>
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
            var cn_no= $("#cn_no").val();
            $.ajax({
                data: {
                    cn_no: cn_no
                },
                url: "getProfitSheetReportData/{id}",
                success: function (response) {
                    var obj = JSON.parse(response);
                    $("#cust_name").html(obj.cust_name);
                    $("#cn_no").html(obj.cnno);
                    $("#cust_email").html(obj.cust_email);
                    $("#cust_contact").html(obj.cust_contact);
                    $("#source").html(obj.source);
                    $("#destination").html(obj.destination);
                    $("#src_address").html(obj.src_add_line1);
                    $("#dest_address").html(obj.dest_add_line1);
                    $("#inv_id").html(obj.inv_id);
                    $("#inv_date").html(obj.inv_create);
                    $("#inv_amount").html(obj.invoice_amount);
                    $("#inv_pay_mode").html(obj.payment_mode);
                    $("#src_total").html(obj.source_total);
                    $("#dest_total").html(obj.dest_total);
                    $("#src_dest_total").html(obj.total);
                    $("#profitAmount").html(parseInt(obj.invoice_amount)-parseInt(obj.total));
                }
            });
        };
    </script>
@stop