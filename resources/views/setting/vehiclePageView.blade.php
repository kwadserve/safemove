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
                                            <form method="POST" role="form" action="{{ url('/addVehicle') }}" accept-charset="UTF-8" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-truck"> </i>&nbsp;Vehicle</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Vehicle Name <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" placeholder="Enter Vehicle Name" required>
                                                        </div>
                                                        <label for="" class="control-label col-md-2">No of Labour <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="no_of_labour" name="no_of_labour" placeholder="Enter No of Labour Required" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">CFT Start Range <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="cft_start_range" name="cft_start_range" placeholder="Enter CFT Start Range" required>
                                                        </div>
                                                        <label for="" class="control-label col-md-2">CFT End Range <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="cft_end_range" name="cft_end_range" placeholder="Enter CFT End Range" >
                                                        </div>
                                                    </div><div class="form-group">
                                                        <label for="" class="control-label col-md-2">Vehicle Dimension &nbsp;&nbsp;</label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="vehical_dimension" name="vehical_dimension" placeholder="Enter Vehicle Dimension" >
                                                        </div>
                                                        <label for="" class="control-label col-md-2"></label>
                                                        <div class="form-group col-md-4">

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left" required>
                                                            <i class="fa fa-plus"></i>   Add
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
                                                    </div>
                                                    <br><br><br><br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('vehicle_name'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('vehicle_name') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('no_of_labour'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('no_of_labour') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cft_start_range'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cft_start_range') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('cft_end_range'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cft_end_range') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                        <br><br><br>
                                                    </div>
                                                </div>
                                                <div class="row" style="transform: none;">
                                                    <div class="col-md-12">
                                                        <table id="example" class="table table-striped" style="width:100%">
                                                            <thead style="background-color: lightgray;">
                                                            <tr>
                                                                <th>Vehical Name</th>
                                                                <th>Labour Required</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($vehicleRS as $vehicle)
                                                                <tr>
                                                                    <td>{{$vehicle->vehical_name}}</td>
                                                                    <td>{{$vehicle->labour_required}}</td>
                                                                    <td>
                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="editSource({{$vehicle->vehical_id}})"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                        {{--<button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('leadSourceDestroy',base64_encode($sourceData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>--}}
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
    <div class="modal fade modal-3d-flip-vertical " id="editSourceModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 885px;">
                <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                    <h4 class="modal-title" style="color:white;font-weight: bold">Edit Vehicle</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" action="{{ url('/updatedVehicle') }}" accept-charset="UTF-8" >
                        {{ csrf_field() }}
                        <div class="row">
                            <br>
                            <div class="form-group">
                                <input type="hidden" id="edit_veh_id" name="edit_veh_id" value="">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Vehicle Name <span class="spancolor">*</span></label>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="edit_vehicle_name" name="edit_vehicle_name" placeholder="Enter Vehicle Name" required>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">No of Labour <span class="spancolor">*</span></label>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="edit_no_of_labour" name="edit_no_of_labour" placeholder="Enter No of Labour Required" >
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">CFT Start Range <span class="spancolor">*</span></label>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="edit_cft_start_range" name="edit_cft_start_range" placeholder="Enter CFT Start Range" required>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">CFT End Range <span class="spancolor">*</span></label>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="edit_cft_end_range" name="edit_cft_end_range" placeholder="Enter CFT End Range" >
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Vehicle Dimension &nbsp;&nbsp;</label>
                                <div class="form-group col-md-7">
                                    <input type="text" class="form-control" id="edit_vehical_dimension" name="edit_vehical_dimension" placeholder="Enter Vehicle Dimension" >
                                </div>
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

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        });
        function editSource(id) {
            if(id == ""){
            }else {
                $.ajax({
                    data: {veh_id: id},
                    url: "getVehicleData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#edit_veh_id").val(obj.vehical_id);
                        $("#edit_vehicle_name").val(obj.vehical_name);
                        $("#edit_no_of_labour").val(obj.labour_required);
                        $("#edit_cft_start_range").val(obj.cft_start_range);
                        $("#edit_cft_end_range").val(obj.cft_end_range);
                        $("#edit_vehical_dimension").val(obj.vehical_dimension);
                        $("#editSourceModal").modal('show');
                    }

                });
            }

        };
    </script>
@stop