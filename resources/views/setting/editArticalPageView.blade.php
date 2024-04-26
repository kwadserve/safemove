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
                                        <a href="#tab_default_1" data-toggle="tab">Edit Articals</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateArticals') }}" accept-charset="UTF-8" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <input type="hidden" name="home_eq_id" value="{{$articalsRS->home_eq_id}}">
                                                            <label for="" class="control-label col-md-2">Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('width'))?'errorBox':'' }}" id="name" name="name" placeholder="" value="{{$articalsRS->eq_name}}">
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Lenght <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('lenght'))?'errorBox':'' }}" id="lenght" name="lenght" placeholder="" value="{{$articalsRS->eq_lenght}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Width <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('width'))?'errorBox':'' }}" id="width" name="width" placeholder="" value="{{$articalsRS->eq_width}}">
                                                            </div>

                                                            <label for="" class="control-label col-md-2">height <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('height'))?'errorBox':'' }}" id="height" name="height" placeholder="" value="{{$articalsRS->eq_height}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Artical Type <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control {{ ($errors->has('artical_types'))?'errorBox':'' }}" name="artical_types" id="artical_types" >
                                                                    <option value="">Select Artical Types </option>
                                                                    <option value="l" {{($articalsRS->eq_type == "l")?"selected":""}}>Living Room</option>
                                                                    <option value="b" {{($articalsRS->eq_type == "b")?"selected":""}}>Bedroom</option>
                                                                    <option value="d" {{($articalsRS->eq_type == "d")?"selected":""}}>Dining Room</option>
                                                                    <option value="k" {{($articalsRS->eq_type == "k")?"selected":""}}>Kitchen</option>
                                                                    <option value="bth" {{($articalsRS->eq_type == "bth")?"selected":""}}>Bathroom</option>
                                                                    <option value="o" {{($articalsRS->eq_type == "o")?"selected":""}}>Miscellaneous</option>
                                                                    <option value="cb" {{($articalsRS->eq_type == "cb")?"selected":""}}>Car/Bike</option>
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