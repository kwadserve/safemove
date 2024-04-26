@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
    <link rel="stylesheet" href="public/global/vendor/jt-timepicker/jquery-timepicker.css">
    <link rel="stylesheet" href="public/assets/examples/css/forms/advanced.css">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link rel="stylesheet" href="public//global/vendor/filament-tablesaw/tablesaw.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}
        hr{
            width: 100%;
            margin-left: -20px;
            border: 1px solid #c1c1c1;
        }
        .card-counter{
            box-shadow: 2px 2px 10px #404040;
            margin: 5px;
            padding: 10px 10px;
            background-color: #fff;
            height: 70px;
            border-radius: 5px;
            transition: .3s linear all;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        .card-counter i{
            font-size: 4em;
            opacity: 0.2;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 30px;
           
            font-size: 15px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 20px;
            display: block;
            font-size: 18px;
        }
        a,a:focus,a:hover{
            color: #fff;
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin: 20px">
                        <div class="form-group">
                            <h3>Inventory Report</h3>
                            <hr>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/enquiryReportPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                <span class="count-numbers">Enquiry</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/surveyReportPage')}}">
                                        <div class="card-counter danger">
                                           <i class="fa fa-line-chart" aria-hidden="true"></i>
                                                <span class="count-numbers">Survey</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/packingListReoprtPage')}}">
                                        <div class="card-counter success">
                                        <i class="fa fa-clipboard"></i>
                                        <span class="count-numbers">Packing List</span>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/quotationReportPage')}}">
                                        <div class="card-counter info">
                                            <i class="fa fa-rupee"></i>
                                            <span class="count-numbers">Quotation</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/transportReportPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-truck"></i>
                                            <span class="count-numbers">Transport</span>
                                        </div>
                                    </a>
                                </div>
                                
                            </div><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/deliveryReportPage')}}">
                                        <div class="card-counter danger">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="count-numbers">Delivery</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/feedbackReportPage')}}">
                                        <div class="card-counter success">
                                            <i class="fa fa-comments"></i>
                                            <span class="count-numbers">Feedback</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/surveyPersonReportPage')}}">
                                        <div class="card-counter info">
                                            <i class="fa fa-user"></i>
                                            <span class="count-numbers">Survey Person</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <h3>Transition Report</h3>
                            <hr>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2" style="width: 283px;">
                                    <a class="" href="{{URL::to('/shipExpReportPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-money"></i>
                                            <span class="count-numbers">Shipping Expenses</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2" style="width: 283px;">
                                    <a class="" href="{{URL::to('/paymentReportPage')}}">
                                        <div class="card-counter danger">
                                            <i class="fa fa-list"></i>
                                            <span class="count-numbers">Payment Receipts</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2" style="width: 283px;">
                                    <a class="" href="{{URL::to('/transPayReport')}}">
                                        <div class="card-counter success">
                                            <i class="fa fa-rupee"></i>
                                            <span class="count-numbers">Transport Payment</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2" style="width: 283px;">
                                    <a class="" href="{{URL::to('/offExpReportPage')}}">
                                        <div class="card-counter info">
                                            <i class="fa fa-home"></i>
                                            <span class="count-numbers">Office Expenses</span>
                                        </div>
                                    </a>
                                </div>
                            </div><br>
                        </div>
                        <br>
                        <div class="form-group">
                            <h3>Analysis Report</h3>
                            <hr>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/insuranceReportPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-shield"></i>
                                            <span class="count-numbers">Insurance</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/')}}">
                                        <div class="card-counter danger">
                                            <i class="fa fa-clipboard"></i>
                                            <span class="count-numbers">Packing Material</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/tdsReportPage')}}">
                                        <div class="card-counter success">
                                            <i class="fa fa-money"></i>
                                            <span class="count-numbers">TDS</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/profitSheetReoprtPage')}}">
                                        <div class="card-counter info">
                                            <i class="fa fa-file-excel-o"></i>
                                            <span class="count-numbers">Profit Sheet</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/cityWiseReportPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-building"></i>
                                            <span class="count-numbers">City Wise</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <h3>Sale Tax Report</h3>
                            <hr>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="" href="{{URL::to('/serviceTaxReportPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-calculator"></i>
                                            <span class="count-numbers">Service Tax</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <h3>Sale Tax Report</h3>
                            <hr>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2" style="width: 283px;">
                                    <a class="" href="{{URL::to('/documentPrintingPage')}}">
                                        <div class="card-counter primary">
                                            <i class="fa fa-print"></i>
                                            <span class="count-numbers">Document Printing</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop