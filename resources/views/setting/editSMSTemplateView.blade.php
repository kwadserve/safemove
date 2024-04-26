@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">

    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}

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
                                        <a href="#tab_default_1" data-toggle="tab">Edit SMS Template </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateSMSTemplate') }}" accept-charset="UTF-8" id="updateEmailTemplateForm" name="updateEmailTemplateForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Email For</label>
                                                            <div class="form-group col-md-9">
                                                                <input type="text" class="form-control" id="SMS_for" name="SMS_for" placeholder="Enter SMS For" value="{{ $tempalet->sms_for }}" readonly required>
                                                            </div>
                                                            <input type="hidden" name="etid" value="{{$tempalet->id}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Template Contant</label>
                                                            <div class="form-group col-md-9">
                                                                <textarea class="form-control" id="sms_body" name="sms_body" rows="5" >{{$tempalet->sms_body }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Update
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
@stop