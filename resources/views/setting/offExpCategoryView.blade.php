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
                                            <form method="POST" role="form" action="{{ url('/addOffExpCategory') }}" accept-charset="UTF-8"  >
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-tasks"> </i>&nbsp;Office Expenses Category</h4>
                                                    <hr style="border:1px solid lightgray">
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="" class="control-label col-md-2">Catgory Name <span class="spancolor">*</span></label>
                                                        <div class="form-group col-md-4">
                                                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" >
                                                        </div>
                                                        <label class="control-label col-md-2"></label>
                                                        <div class="form-group col-md-4">
                                                            <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                                <i class="fa fa-plus"></i>   Add
                                                                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('category_name'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('category_name') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                        <br><br>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row" style="transform: none;">
                                                    <div class="col-md-12">
                                                        <table id="example" class="table table-striped" style="width:100%">
                                                            <thead style="background-color: lightgray;">
                                                            <tr>
                                                                <th>Category Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($offExpRs as $offExpdata)
                                                                <tr>
                                                                    <td>{{$offExpdata->category_name}}</td>
                                                                    <td>
                                                                        <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" onclick="editCategory({{$offExpdata->id}})"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                        <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('categoryDestroy',base64_encode($offExpdata->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
        {{($errors->has('edit_agent_name'))?"in":""}}" id="editTransAgentModal" role="dialog"
         style="{{($errors->has('edit_agent_name')|| $errors->has('edit_contact_no')|| $errors->has('edit_contact_email') || $errors->has('edit_address'))?"display:block":""}}">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 885px;">
                <div class="modal-header" style="background-color: #33b5e5;-webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12); ">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close" style="color:white"></i></button>
                    <h4 class="modal-title" style="color:white;font-weight: bold">Edit Expenses Category</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" action="{{ url('/updateOffExpCategory') }}" accept-charset="UTF-8" >
                        {{ csrf_field() }}
                        <div class="row">
                            <br>
                            <div class="form-group">
                                <label for="" class="control-label col-md-2">Category Name <span class="spancolor">*</span></label>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="edit_category_name" name="edit_category_name"  value="{{old('edit_category_name')}}" placeholder="" required>
                                </div>
                                <input type="hidden" id="edit_cat_id" name="edit_cat_id" value="{{old('cat_id')}}">
                                <br><br>
                            </div>
                            <br>
                            <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                <div class="form-group col-md-4">
                                </div>
                                <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                    <p>
                                        @if ($errors->has('edit_category_name'))
                                            <span class="help-block">
                                					<label style="color:red">{{ $errors->first('edit_category_name') }}</label>
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

    <script>
        $(document).ready(function() {
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        });
        function editCategory(id) {
            if(id == ""){
            }else {
                $.ajax({
                    data: {cat_id: id},
                    url: "getOffExpCategoryData/{id}",
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $("#edit_category_name").val(obj.category_name);
                        $("#edit_cat_id").val(obj.id);
                        $("#editTransAgentModal").modal('show');
                    }

                });
            }
        };
    </script>
@stop