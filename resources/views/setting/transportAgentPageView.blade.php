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
                                            <form method="POST" role="form" action="{{ url('/addTransportAgentName') }}" accept-charset="UTF-8" id="leadsSourceForm" name="leadsSourceForm" >
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-truck"> </i>&nbsp;Transport Agents</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Transport Name <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="trans_name" name="trans_name" placeholder="Enter Transport Name" >
                                                        </div>
                                                        <label for="" class="control-label col-md-2">Agent Name <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="agent_name" name="agent_name" placeholder="Enter Agent Name" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Email Id <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Enter Email Id">
                                                        </div>
                                                        <label class="control-label col-md-2">Contact No <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact no" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Contact No 2</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="number" class="form-control" id="contact_no2" name="contact_no2" placeholder="Enter Contact no 2" >
                                                        </div>

                                                        <label class="control-label col-md-2" for="">Contact No 3</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="number" class="form-control" id="contact_no3" name="contact_no3" placeholder="Enter Contact no 3" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2" for="">Address <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Full Address"></textarea>
                                                        </div>
                                                        <label class="control-label col-md-2"></label>
                                                        <div class="form-group col-md-4">
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2"></label>
                                                        <div class="form-group col-md-4"></div>
                                                        <div class="form-group col-md-1 ">
                                                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                                <i class="fa fa-plus"></i>   Add
                                                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                            </button>
                                                        </div>
                                                        <div class="form-group col-md-5"><br><br></div>
                                                    </div>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('trans_name'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('trans_name') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('agent_name'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('agent_name') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('contact_no'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('contact_no') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('contact_email'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('contact_email') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('address'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('address') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                        <br><br>
                                                    </div>
                                                </div>
                                                <div class="row" style="transform: none;">
                                                    <div class="col-md-12">
                                                        <table id="example" class="table table-striped" style="width:100%">
                                                            <thead style="background-color: lightgray;">
                                                            <tr>
                                                                <th>Agent Name</th>
                                                                <th>Contact No</th>
                                                                {{--<th>Email Id</th>--}}
                                                                {{--<th>Address</th>--}}
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($agent_list_rs as $agent_list_data)
                                                                <tr>
                                                                    <td>{{$agent_list_data->trans_agent_name}}</td>
                                                                    <td>{{$agent_list_data->contact_no}}</td>
                                                                    {{--<td>{{$agent_list_data->contact_email}}</td>--}}
                                                                    {{--<td>{{$agent_list_data->address}}</td>--}}
                                                                    <td>
                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="showTransportAgent({{$agent_list_data->id}})"><i class="icon wb-eye" aria-hidden="true"></i> </a>

                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="editTransportAgent({{$agent_list_data->id}})"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('transAgentDestroy',base64_encode($agent_list_data->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
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
    <!-- Modal -->
    <div class="modal fade modal-3d-flip-vertical
        {{($errors->has('edit_agent_name')|| $errors->has('edit_contact_no')|| $errors->has('edit_contact_email') || $errors->has('edit_address'))?"in":""}}" id="editTransAgentModal" role="dialog"
        style="{{($errors->has('edit_agent_name')|| $errors->has('edit_contact_no')|| $errors->has('edit_contact_email') || $errors->has('edit_address'))?"display:block":""}}">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 885px;">
                <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                    <h4 class="modal-title" style="color:white;font-weight: bold">Edit Transport Agent</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" action="{{ url('/updatetransportAgent') }}" accept-charset="UTF-8" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Transport Name <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_trans_name" name="edit_trans_name"  value="{{old('edit_trans_name')}}" placeholder="" required>
                                </div>
                                <input type="hidden" id="tagnt_id" name="tagnt_id" value="{{old('tagnt_id')}}">
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Agent Name <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_agent_name" name="edit_agent_name"  value="{{old('edit_agent_name')}}" placeholder="" required>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Contact No <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="number" class="form-control" id="edit_contact_no" name="edit_contact_no" value="{{old('edit_contact_no')}}" placeholder="" required>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Contact No 2 </label>
                                <div class="form-group col-md-8">
                                    <input type="number" class="form-control" id="edit_contact_no2" name="edit_contact_no2" value="{{old('edit_contact_no2')}}" placeholder="" >
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Contact No 3</label>
                                <div class="form-group col-md-8">
                                    <input type="number" class="form-control" id="edit_contact_no3" name="edit_contact_no3" value="{{old('edit_contact_no3')}}" placeholder="" >
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Email Id <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="email" class="form-control" id="edit_contact_email" name="edit_contact_email" value="{{old('edit_contact_email')}}" placeholder="" required>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Address <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_address" name="edit_address"  value="{{old('edit_address')}}" required>
                                </div>
                                <br><br>
                            </div>
                            <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                <div class="form-group col-md-4">
                                </div>
                                <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                    <p>
                                        @if ($errors->has('edit_trans_name'))
                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('edit_trans_name') }}</label>
                                							</span>
                                        @endif
                                    </p>
                                    <p>
                                        @if ($errors->has('edit_agent_name'))
                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('edit_agent_name') }}</label>
                                							</span>
                                        @endif
                                    </p>
                                    <p>
                                        @if ($errors->has('edit_contact_no'))
                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('edit_contact_no') }}</label>
                                							</span>
                                        @endif
                                    </p>
                                    <p>
                                        @if ($errors->has('edit_contact_email'))
                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('edit_contact_email') }}</label>
                                							</span>
                                        @endif
                                    </p>
                                    <p>
                                        @if ($errors->has('edit_address'))
                                            <span class="help-block">
                                								<label style="color:red">{{ $errors->first('edit_address') }}</label>
                                							</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="form-group col-md-4"></div>
                                <br><br>
                            </div>
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



    <div class="modal fade modal-3d-flip-vertical " id="showTransAgentModal" role="dialog"  style="{{($errors->has('edit_agent_name')|| $errors->has('edit_contact_no')|| $errors->has('edit_contact_email') || $errors->has('edit_address'))?"display:block":""}}">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 885px;">
                <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                    <h4 class="modal-title" style="color:white;font-weight: bold">Transport Agent Details</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Transport Name  </label>
                            <div class="form-group col-md-8">
                                <span id="show_trans_name"> </span>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Agent Name  </label>
                            <div class="form-group col-md-8">
                                <span id="show_name"> </span>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Contact No  </label>
                            <div class="form-group col-md-8">
                                <span id="show_contact"> </span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Contact No 2 </label>
                            <div class="form-group col-md-8">
                                <span id="show_contact2"> </span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Contact No 4</label>
                            <div class="form-group col-md-8">
                                <span id="show_contact3"> </span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Email Id  </label>
                            <div class="form-group col-md-8">
                                <span id="show_email"> </span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="" class="control-label col-md-2">Address  </label>
                            <div class="form-group col-md-8">
                                <span id="show_address"> </span>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer justify-content-center">
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
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
        function editTransportAgent(id) {
            if(id == ""){
            }else {
                $.ajax({
                    data: {tagnt_id: id},
                    url: "gettransAgentData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#edit_trans_name").val(obj.trans_name);
                        $("#edit_agent_name").val(obj.trans_agent_name);
                        $("#edit_contact_no").val(obj.contact_no);
                        $("#edit_contact_no2").val(obj.contact_no2);
                        $("#edit_contact_no3").val(obj.contact_no3);
                        $("#edit_contact_email").val(obj.contact_email);
                        $("#edit_address").val(obj.address);
                        $("#tagnt_id").val(obj.id);
                        $("#editTransAgentModal").modal('show');
                    }

                });
            }

        };

        function showTransportAgent(id) {
            if(id == ""){
            }else {
                $.ajax({
                    data: {tagnt_id: id},
                    url: "gettransAgentData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#show_trans_name").val(obj.trans_name);
                        $("#show_name").html(obj.trans_agent_name);
                        $("#show_contact").html(obj.contact_no);
                        $("#show_contact2").html(obj.contact_no2);
                        $("#show_contact3").html(obj.contact_no3);
                        $("#show_email").html(obj.contact_email);
                        $("#show_address").html(obj.address);
                        $("#showTransAgentModal").modal('show');
                    }

                });
            }

        };
    </script>
@stop