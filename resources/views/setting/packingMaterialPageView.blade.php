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
{{--                                            <form method="POST" role="form" action="{{ url('/adddLeadSource') }}" accept-charset="UTF-8" id="leadsSourceForm" name="leadsSourceForm" >--}}
                                                {{ csrf_field() }}
                                                <div class="row" style="transform: none;">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-certificate"> </i>&nbsp;Packing Material</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="col-md-12">
                                                        <table id="example" class="table table-striped" style="width:100%">
                                                            <thead style="background-color: lightgray;">
                                                            <tr>
                                                                <th>Material Type</th>
                                                                <th>Price for 1 Quntity</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($packing_list as $packingListData)
                                                                <tr>
                                                                    <td>{{$packingListData->material_type}}</td>
                                                                    <td>{{$packingListData->rate}}</td>
                                                                    <td>
                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="editSource({{$packingListData->id}})"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('packingMaterialDestroy',base64_encode($packingListData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            {{--</form>--}}
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
    <div class="modal fade modal-3d-flip-vertical " id="editMaterialModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 885px;">
                <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                    <h4 class="modal-title" style="color:white;font-weight: bold">Edit Packing Material</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" action="{{ url('/updatePackingMaterial') }}" accept-charset="UTF-8" >
                        {{ csrf_field() }}
                        <div class="row">
                            <h4 style="margin-left: 20px;"><span id="editMaterialType"> </span></h4>
                            <hr style="border:1px solid lightgray">
                            <br>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Rate<span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_rate" name="edit_rate" required>
                                    <label for="" class="control-label"> ( Price for 1 Quntity )</label>
                                </div>
                                <input type="hidden" id="edit_id" name="edit_id" value="">
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
                    data: {id: id},
                    url: "getPackingMaterialData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#editMaterialType").html(obj.material_type);
                        $("#edit_rate").val(obj.rate);
                        $("#edit_id").val(obj.id);
                        $("#editMaterialModal").modal('show');
                    }

                });
            }

        };
    </script>
@stop