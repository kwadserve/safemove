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
                                            <form method="POST" role="form" action="{{ url('/addAdditionalCFT') }}" accept-charset="UTF-8" id="leadsSourceForm" name="leadsSourceForm" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-truck"> </i>&nbsp;Additional CFT</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Start CFT Range<span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control {{ ($errors->has('start_cft_range'))?'errorBox':'' }}" id="start_cft_range" name="start_cft_range" placeholder="Enter Start Range" value="{{old('start_cft_range')}}">
                                                        </div>
                                                        <label for="" class="control-label col-md-2">End CFT Range<span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control {{ ($errors->has('end_cft_range'))?'errorBox':'' }}" id="end_cft_range" name="end_cft_range" placeholder="Enter End Range" value="{{old('end_cft_range')}}"  >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Additional CFT <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control {{ ($errors->has('additional_cft'))?'errorBox':'' }}" id="additional_cft" name="additional_cft" placeholder="Enter Additional CFT" value="{{old('additional_cft')}}">
                                                        </div>
                                                        <div class="form-group col-md-1 ">
                                                        </div>
                                                        <div class="form-group col-md-1 ">
                                                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                                <i class="fa fa-plus"></i>   Add
                                                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                            </button>
                                                        </div>
                                                        <br><br>
                                                    </div>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <br><br>
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('start_cft_range'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('start_cft_range') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('end_cft_range'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('end_cft_range') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('additional_cft'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('additional_cft') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                        <br><br><br><br><br>
                                                    </div>
                                                    <br><br>
                                                    <hr>
                                                    <br>
                                                </div>
                                                <div class="row" style="transform: none;">
                                                    <div class="col-md-12">
                                                        <table id="example" class="table table-striped" style="width:100%">
                                                            <thead style="background-color: lightgray;">
                                                            <tr>
                                                                <th>CFT Range</th>
                                                                <th>Additional CFT</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($addCft as $addCftData)
                                                                <tr>
                                                                    <td>{{$addCftData->cft_start_range."-".$addCftData->cft_end_range}}</td>
                                                                    <td>{{$addCftData->additional_cft}}</td>
                                                                    <td>
                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="editAdditionalCft({{$addCftData->cft_id}})"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                        {{--<button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('transAgentDestroy',base64_encode($addCftData->cft_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>--}}
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
    <div class="modal fade modal-3d-flip-vertical " id="editAdditionalCftModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 885px;">
                <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                    <h4 class="modal-title" style="color:white;font-weight: bold">Edit Additional CFT</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" action="{{ url('/updateAdditionalCFT') }}" accept-charset="UTF-8" >
                        {{ csrf_field() }}
                        <div class="row">
                            <br>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">CFT Range </label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_cft_range" readonly>
                                </div>
                                <br><br>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Additional CFT <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_additional_cft" name="edit_additional_cft" required>
                                </div>
                                <input type="hidden" id="cft_id" name="cft_id" value="">
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
            $('#start_cft_range').focus();

            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        });
        function editAdditionalCft(id) {
            if(id == ""){
            }else {
                $.ajax({
                    data: {id: id},
                    url: "getAdditionalCFTData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#edit_cft_range").val(obj.cft_start_range+"-"+obj.cft_end_range);
                        $("#edit_additional_cft").val(obj.additional_cft);
                        $("#cft_id").val(obj.cft_id);
                        $("#editAdditionalCftModal").modal('show');
                    }
                });
            }
        };
    </script>
@stop