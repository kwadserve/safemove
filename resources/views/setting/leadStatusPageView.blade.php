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
                                            <form method="POST" role="form" action="{{ url('/adddLeadStatus') }}" accept-charset="UTF-8" id="leadsStatusForm" name="leadsStatusForm" >
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-list-ul"> </i>&nbsp;Leads Status</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Leads Status <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="leads_status" name="leads_status" placeholder="Enter Leads Status" >
                                                        </div>
                                                        <label for="" class="control-label col-md-2">Leads Type <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <select class="form-control" id="leads_type" name="leads_type" >
                                                                <option value=""> Select Leads Type</option>
                                                                <option value="Open" selected>Open</option>
                                                                <option value="Close">Close</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Order No &nbsp;&nbsp;</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="order_no" name="order_no" placeholder="Enter Order No" >
                                                        </div>
                                                        <div class="form-group col-md-1 ">
                                                        </div>
                                                        <div class="form-group col-md-1 ">
                                                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                                <i class="fa fa-plus"></i>   Add
                                                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                            </button>
                                                        </div>
                                                        <br><br><br>
                                                    </div>
                                                    <br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('leads_status'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('leads_status') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('leads_type'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('leads_type') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <br>
                                                    <br><br>
                                                    <hr style="border:1px solid lightgray">
                                                </div>
                                                <div class="row" style="transform: none;">
                                                    <div class="col-md-12">
                                                        <table id="example" class="table table-striped" style="width:100%">
                                                            <thead style="background-color: lightgray;">
                                                            <tr>
                                                                <th>Leads Status</th>
                                                                <th>Leads Type</th>
                                                                <th>Order No</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($statusRS as $statusData)
                                                                <tr>
                                                                    <td>{{$statusData->lead_status}}</td>
                                                                    <td>{{$statusData->lead_type}}</td>
                                                                    <td>{{$statusData->orderno}}</td>
                                                                    <td>
                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round " onclick="editStatus({{$statusData->id}})"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('leadStatusDestroy',base64_encode($statusData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Modal -->
                                            <div class="modal fade modal-3d-flip-vertical " id="editStatusModal" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width: 885px;">
                                                        <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                                                            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                                                            <h4 class="modal-title" style="color:white;font-weight: bold">Edit Lead Status</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" role="form" action="{{ url('/updatedLeadStatus') }}" accept-charset="UTF-8" >
                                                                {{ csrf_field() }}
                                                                <div class="row">
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label for="" class="control-label col-md-2">Leads Status <span class="spancolor">*</span></label>
                                                                        <div class="form-group col-md-8">
                                                                            <input type="text" class="form-control" id="edit_leads_status" name="edit_leads_status" placeholder="Enter Leads Status" required>
                                                                        </div>
                                                                        <input type="hidden" id="edit_status_id" name="edit_status_id" value="">
                                                                        <br><br>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="" class="control-label col-md-2">Leads Type <span class="spancolor">*</span></label>
                                                                        <div class="form-group col-md-8">
                                                                            <select class="form-control" id="edit_leads_type" name="edit_leads_type" required>
                                                                                <option value=""> Select Leads Type</option>
                                                                                <option value="Open">Open</option>
                                                                                <option value="Close">Close</option>
                                                                            </select>
                                                                        </div>
                                                                        <br><br>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="" class="control-label col-md-2">Order No &nbsp;&nbsp;</label>
                                                                        <div class="form-group col-md-8">
                                                                            <input type="text" class="form-control" id="edit_order_no" name="edit_order_no" placeholder="Enter Order No" >
                                                                        </div>
                                                                        <br><br>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <div class="pull-right">
                                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                                            <i class="fa fa-save"></i>   Update
                                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                                        </button>
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
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

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        });
        function editStatus(id) {
            if(id == ""){
            }else {
                $.ajax({
                    data: {status_id: id},
                    url: "getLeadStatusData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#edit_leads_status").val(obj.lead_status);
                        $("#edit_leads_type").val(obj.lead_type);
                        $("#edit_order_no").val(obj.orderno);
                        $("#edit_status_id").val(obj.id);
                        $("#editStatusModal").modal('show');
                    }

                });
            }

        };

    </script>
@stop