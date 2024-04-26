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
                                            <form method="POST" role="form" action="{{ url('/printingPage') }}" accept-charset="UTF-8" >
                                                {{ csrf_field() }}
                                            <div class="row">
                                                <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-list"> </i>&nbsp; Document Printing</h4>
                                                <hr style="border:1px solid lightgray">
                                                <br>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-3">CN No / Entry No</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="cn_no" name="cn_no" placeholder="Enter Consignment No" required>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <hr style="border:1px solid lightgray">
                                            </div>
                                            <div class="row" style="transform: none;">
                                                <div class="col-md-12">
                                                    <table align="center"  class="table table-bordered " style="width: 50%;"></tr>
                                                        <tr>
                                                            <td align="right">Survey Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="surveyPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Packing List Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="packListPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Quotation Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="quotationPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Invoice Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="invoicePrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Cash Receipt Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="cashRecPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Transport Payment Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="transPayPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Office Expense Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="offExpPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Delivery Details Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="delDetailsPrint" name="submit">Print</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right">Feedback Printing</td>
                                                            <td><button type="submit" class="btn btn-primary" value="feedbackPrint" name="submit">Print</button></td>
                                                        </tr>
                                                    </table>
                                                </div>
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

    <script>
        function surveyPrint() {
            var cn_no= $("#cn_no").val();

            {{--var win = window.open("{{URL::to('surveyPrinting',cn_no)}}");--}}
            {{--win.focus();--}}
        };
    </script>
@stop