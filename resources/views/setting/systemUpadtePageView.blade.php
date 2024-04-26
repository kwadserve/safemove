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
        .alert-css {
            padding: 8px;
            margin-bottom: 21px;
            border: 1px solid transparent;
        }
        .alert-info {
            background-color: #23b7e5;
            color: #fff;
        }
    </style>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <div class="tab-content">
                                    <div class="row" style="transform: none;">
                                        <div class="col-md-12">
                                            <form method="POST" role="form" action="" accept-charset="UTF-8" id="systemUpdateForm" name="systemUpdateForm" >
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-pencil-square-o"> </i>&nbsp;System Update</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Purches Key</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="purchse_key" name="purchse_key" placeholder="Enter Your Purches Key" >
                                                        </div>
                                                        <label for="" class="control-label col-md-1">Buyer</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="buyer" name="buyer" placeholder="unique_coder" >
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group" >
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-3 text-center">
                                                            <div class="alert-css alert-info">
                                                                <h4 class="bold" style="color:#fff">Your Version</h4>
                                                                <p class="font-medium bold">1.3.7</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <div class="alert-css alert-info">
                                                                <h4 class="bold" style="color:#fff">Latest Version</h4>
                                                                <p class="font-medium bold">1.3.7</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"> <br><br><br><br><br><br></div>
                                                    </div>
                                                    <hr style="border:1px solid lightgray">
                                                    <div class="col-md-12 text-center">
                                                        <h4 style="color:#27c24c"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp; Your using Latest Version</h4>
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
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        });

    </script>
@stop