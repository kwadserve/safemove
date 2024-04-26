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
        .checkbox label:after,
        .radio label:after {
            content: '';
            display: table;
            clear: both;
        }

        .checkbox .cr,
        .radio .cr {
            position: relative;
            display: inline-block;
            border: 1px solid #a9a9a9;
            border-radius: .25em;
            width: 1.3em;
            height: 1.3em;
            float: left;
            margin-right: .5em;
        }

        .radio .cr {
            border-radius: 50%;
        }

        .checkbox .cr .cr-icon,
        .radio .cr .cr-icon {
            position: absolute;
            font-size: .8em;
            line-height: 0;
            top: 50%;
            left: 20%;
        }

        .radio .cr .cr-icon {
            margin-left: 0.04em;
        }

        .checkbox label input[type="checkbox"],
        .radio label input[type="radio"] {
            display: none;
        }

        .checkbox label input[type="checkbox"] + .cr > .cr-icon,
        .radio label input[type="radio"] + .cr > .cr-icon {
            transform: scale(3) rotateZ(-20deg);
            opacity: 0;
            transition: all .3s ease-in;
        }

        .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
        .radio label input[type="radio"]:checked + .cr > .cr-icon {
            transform: scale(1) rotateZ(0deg);
            opacity: 1;
        }

        .checkbox label input[type="checkbox"]:disabled + .cr,
        .radio label input[type="radio"]:disabled + .cr {
            opacity: .5;
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
                                    <div>
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateEmailCredentials') }}" accept-charset="UTF-8" id="emailIntegrationForm" name="emailIntegrationForm" >
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-envelope"> </i>&nbsp;Email Credentials</h4>
                                                        <hr style="border:1px solid lightgray">
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Host Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('host_name'))?'errorBox':'' }}" id="host_name" name="host_name" value="{{$EmailData->host_name}}" >
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Port No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('port_no'))?'errorBox':'' }}" id="port_no" name="port_no"  value="{{$EmailData->port_no}}" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">User Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('user_name'))?'errorBox':'' }}" id="user_name" name="user_name"   value="{{$EmailData->user_name}}">
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Password <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('password'))?'errorBox':'' }}" id="password" name="password"  value="{{$EmailData->password}}" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Encryption <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('encryption'))?'errorBox':'' }}" id="encryption" name="encryption"  value="{{$EmailData->encryption}}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="{{ ($errors->has('encryption') || $errors->has('host_name') || $errors->has('port_no') || $errors->has('user_name') || $errors->has('password'))?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('host_name'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('host_name') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('port_no'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('port_no') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('user_name'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('user_name') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('password'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('password') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('encryption'))
                                                                    <span class="help-block">
																<label style="color:red">{{ $errors->first('encryption') }}</label>
															</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>   update
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
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
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <div class="tab-content">
                                    <div>
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateSMSCredentials') }}" accept-charset="UTF-8" id="smsIntegrationForm" name="smsIntegrationForm" >
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <h4 style="margin-left: 20px;"><i class="fa fa-envelope"> </i>&nbsp;SMS Credentials</h4>
                                                        <hr style="border:1px solid lightgray">
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">User Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('sms_user_name'))?'errorBox':'' }}" id="sms_user_name" name="sms_user_name"  value="{{$SmsData->user_name}}" >
                                                            </div>
                                                            <label for="" class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">Password <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('sms_password'))?'errorBox':'' }}" id="sms_password" name="sms_password" value="{{$SmsData->password}}" >
                                                            </div>
                                                            <label for="" class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">Sender ID <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('sender_id'))?'errorBox':'' }}" id="sender_id" name="sender_id" placeholder="" value="{{$SmsData->sender_id}}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="{{ ($errors->has('sms_user_name')|| $errors->has('sms_password') || $errors->has('sender_id') )?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('sms_user_name'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('sms_user_name') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('sms_password'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('sms_password') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('sender_id'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('sender_id') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>   update
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
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
    </div>

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $("#postmark").click( function () {
                if(document.getElementById('postmark').checked) {
                    $("#postmarkDiv").show();
                } else {
                    $("#postmarkDiv").hide();
                }
            });
        });

    </script>
@stop