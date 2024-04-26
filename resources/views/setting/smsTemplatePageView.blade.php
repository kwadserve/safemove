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
        .libtn{
            background-color: #1797be;
            margin-top: -9px;
        }
        .modal-dialog {
            width: 60%;
        }
        .mce-container> iframe {
            height:300px !important;
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-left">
                                                        <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-pencil-square"> </i>&nbsp; SMS Templates</h4>
                                                    </div>
                                                    <div class=" pull-right">
                                                        <button type="button" class="libtn btn btn-primary" data-toggle="modal" data-target="#myModal" style="color: #fff;"><i class="fa fa-fw fa-plus"> </i>&nbsp; Add Templates</button>
                                                    </div>
                                                </div>
                                                <hr style="border:1px solid lightgray">
                                                <br>
                                                <div class="col-md-12">
                                                    <table class="table table-striped" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>SMS Template Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($tempaletData as $tempaletData)
                                                            <tr>
                                                                <td>{{ $tempaletData->sms_for }} </td>
                                                                <td>
                                                                    <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editSMSTemplate',base64_encode($tempaletData->id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                    {{--<button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('smsTemplateDestroy',base64_encode($tempaletData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>--}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Modal -->
                                                <div id="myModal" class="modal fade modal-3d-flip-vertical " role="dialog" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="width: 75%;">
                                                            <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Add SMS Templates</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row" style="transform: none;">
                                                                    <div class="col-md-12">
                                                                        <form method="POST" role="form" action="{{ url('/addSMSTemplate') }}" accept-charset="UTF-8" id="addEmailTemplateForm" name="addEmailTemplateForm" >
                                                                            {{ csrf_field() }}
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label for="" class="control-label col-md-3">SMS For</label>
                                                                                    <div class="form-group col-md-8">
                                                                                        <input type="text" class="form-control" id="sms_for" name="sms_for" placeholder="Enter SMS For" required>
                                                                                    </div>
                                                                                    <br><br>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="" class="control-label col-md-3">Template Contant</label>
                                                                                    <div class="form-group col-md-8">
                                                                                        <textarea class="form-control" id="sms_body" name="sms_body" rows="5"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <br><br><br><br><br><br><br><br><br>
                                                                                <div class="form-group pull-right">
                                                                                    <button type="submit" class="btn btn-primary" name="addEmailTemplate" id="addEmailTemplate">Add</button>
                                                                                    <div class="form-group col-md-1"></div>
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    <div class="form-group col-md-3"></div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

        });
    </script>
@stop