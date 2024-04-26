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
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_default_2" data-toggle="tab">All Articals</a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Articals</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Lenght</th>
                                                        <th>Width</th>
                                                        <th>Height</th>
                                                        <th>Square Feet</th>
                                                        <th>CFT</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($articalsRS as $articalsData)
                                                        <tr>
                                                            <td>{{ucwords($articalsData->eq_name)}}</td>
                                                            <td>{{$articalsData->eq_lenght}}</td>
                                                            <td>{{$articalsData->eq_width}}</td>
                                                            <td>{{$articalsData->eq_height}}</td>
                                                            <td>{{$articalsData->eq_sq_feet}}</td>
                                                            <td>{{$articalsData->eq_cft}}</td>
                                                            <td>
                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editArtical',base64_encode($articalsData->home_eq_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('deleteArtical',base64_encode($articalsData->home_eq_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/addArticals') }}" accept-charset="UTF-8" id="addArticalsForm" name="addArticalsForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('width'))?'errorBox':'' }}" id="name" name="name" placeholder="" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Lenght <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('lenght'))?'errorBox':'' }}" id="lenght" name="lenght" placeholder="" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Width <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('width'))?'errorBox':'' }}" id="width" name="width" placeholder="" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">height <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('height'))?'errorBox':'' }}" id="height" name="height" placeholder="" >
                                                            </div>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                            {{--<label for="" class="control-label col-md-2">Square Feet &nbsp;&nbsp;</label>--}}
                                                            {{--<div class="form-group col-md-4">--}}
                                                                {{--<input type="text" class="form-control " id="sq_feet" name="sq_feet" readonly >--}}
                                                            {{--</div>--}}

                                                            {{--<label for="" class="control-label col-md-2">CFT &nbsp;&nbsp;</label>--}}
                                                            {{--<div class="form-group col-md-4">--}}
                                                                {{--<input type="text" class="form-control " id="cft" name="cft" readonly >--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Artical Type <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('artical_types'))?'errorBox':'' }}" name="artical_types" id="artical_types" >
                                                                    <option value="">Select Artical Types </option>
                                                                    <option value="l">Living Room</option>
                                                                    <option value="b">Bedroom</option>
                                                                    <option value="d">Dining Room</option>
                                                                    <option value="k">Kitchen</option>
                                                                    <option value="bth">Bathroom</option>
                                                                    <option value="o">Miscellaneous</option>
                                                                    <option value="cb">Car/Bike</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('name') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('lenght'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('lenght') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('width'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('width') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('height'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('height') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('artical_types'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('artical_types') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Save
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

            $('#example').DataTable( {
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );

            //get customer deatils of consignment no
            $('#consignment_no').on('blur',function(){
                var cnno= $('#consignment_no').val();
                if(cnno !="") {
                    $.ajax({
                        url: 'getConsignmentData/{id}',
                        type: 'GET',
                        data: {
                            cn_no: cnno,
                        },
                        success: function (response) {
                            var obj = JSON.parse(response);
                            $('#customer_name').val(obj.cust_name);
                            $('#source').val(obj.source);
                            $('#destination').val(obj.destination);
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("Enter Correct Consignment No");
                            $('#consignment_no').val("");
                        }

                    });
                }
            });

            $("#good_types").on("change",function(){
                var goodtypes= $('#good_types').val();
                if(goodtypes == 'Home/Office'){
                    $("#homeOffDivId1").show();
                    $("#vehicleDivId1").hide();

                    $("#homeOffDivId2").show();
                    $("#vehicleDivId2").hide();

                    $("#homeOffDivId3").show();
                    $("#vehicleDivId3").hide();
                }
                if(goodtypes == 'Vehicle'){
                    $("#homeOffDivId1").hide();
                    $("#vehicleDivId1").show();

                    $("#homeOffDivId2").hide();
                    $("#vehicleDivId2").show();

                    $("#homeOffDivId3").hide();
                    $("#vehicleDivId3").show();
                }
            });
        });
    </script>
@stop