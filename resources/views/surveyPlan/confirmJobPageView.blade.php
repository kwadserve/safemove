@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/forms/advanced.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <style>
        p.redcolor{color:red; font-size:16px;}
        .spancolor{color:red;}
        .help-block{color:red;}

        .paddingRightDiv{
            padding-bottom: 22px;
            text-align: left;
            padding-right: 30px;
        }
        .marginCss {
            padding-bottom: 30px;
            text-align: right;
            padding-right: 30px;
        }
         h4,th{
             font-weight: bold;
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
                                        <a href="#tab_default_2" data-toggle="tab">All Confirm Job</a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Confirm Job</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>CN No</th>
                                                        <th>Name</th>
                                                        <th>Moving Date</th>
                                                        <th>Moving Time</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($allConfirmJob as $allConfirmJobData)
                                                        <tr>
                                                            <td>{{$allConfirmJobData->cn_no}}</td>
                                                            <td>{{ucwords($allConfirmJobData->cust_name)}}</td>
                                                            <td>{{date("d-m-Y",strtotime($allConfirmJobData->moving_date))}}</td>
                                                            <td>{{date("h:i A",strtotime($allConfirmJobData->moving_time))}}</td>
                                                            <td>{{$allConfirmJobData->status}}</td>
                                                            <td>
                                                                <a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('confirmJobDetails',base64_encode($allConfirmJobData->cj_id))}}"><i class="icon fa-eye" aria-hidden="true"></i></a>

                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editConfirmJob',base64_encode($allConfirmJobData->cj_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('confirmJobDestroy',base64_encode($allConfirmJobData->cj_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addConfirmJob') }}" accept-charset="UTF-8" id="confirmJobPageForm" name="confirmJobPageForm" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-3">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control cnnoBox" id="cn_no" name="cn_no" placeholder="Enter Consignment No + Enter" required>
                                                            </div>
                                                            <label for="" class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-3">
                                                                <br><br>
                                                            </div>
                                                            <input type="hidden" name="survey_id" id="survey_id">
                                                        </div>
                                                        <!--<hr style="border:1px solid lightgray;width:100%;">-->
                                                        <h4 style="margin-left: 20px;">Customer Details</h4>
                                                        <div class="form-group" style="padding-left: 10px;padding-right: 20px">
                                                            <table width="100%">
                                                                <tr>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Name</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class="" id="cust_name"></span></td>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Email ID</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class="" id="cust_email"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Contact No</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class="" id="contact"></span></td>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Alternate No</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class=" " id="alternateno"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Origin</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class=" " id="src"> </span></td>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Destination</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class=" " id="dest"> </span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Origin Address</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class=" " id="srcAdd"></span></td>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Destination Address</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class="" id="destAdd"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Amount</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class=" " id="amount"></span></td>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Goods Value</label></th>
                                                                    <td width="25%" class="paddingRightDiv"><span class="" id="goodsValue"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Moving Date <span class="spancolor">*</span></label></th>
                                                                    <td width="25%" class="">
                                                                        <span class="" for="">
                                                                            <div class="form-group" data-width="100%" >
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                      <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                                    </span>
                                                                                    <input type="text" class="form-control" style="position: unset!important;" name="moving_date" id="moving_date" value="{{ old('moving_date') }}" placeholder="Select Moving Date..." required data-plugin="datepicker" data-date-today-highlight= "true">
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                    </td>
                                                                    <th width="25%" class="marginCss"><label class="control-label " for="">Moving Time <span class="spancolor">*</span></label></th>
                                                                    <td width="25%" class="">
                                                                        <div class="form-group col-md-6">
                                                                            <input class="form-control text time1" type="text" id="moving_time" name="moving_time"required >
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('cn_no'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('cn_no') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('moving_date'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('moving_date') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('moving_time'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('moving_time') }}</label>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.time1').datetimepicker({
            format: 'HH:mm a',

        });
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
            $.fn.datepicker.defaults.format = "dd-mm-yyyy";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order: [],
                columnDefs: [ { orderable: false}]
            } );
            //get customer deatils of consignment no
            $('#cn_no').keydown(function(e){
                var base_url= basePath();
                if(e.keyCode == 13) {
                    var cnno = $('#cn_no').val();
                    if (cnno != "") {
                        $.ajax({
                            url: base_url+'getConfirmJobData/{id}',
                            type: 'GET',
                            data: {cn_no: cnno},
                            success: function (response) {
                                var obj = JSON.parse(response);
                                if(typeof(obj.moving_date) != 'undefined' && typeof(obj.moving_time) != 'undefined'){
                                    $("#survey_id").val(obj.survey_id);
                                    $('#cust_name').html(obj.cust_name);
                                    $('#cust_email').html(obj.cust_email);
                                    $('#contact').html(obj.cust_contact);
                                    $('#alternateno').html(obj.cust_alt_contact);
                                    $('#src').html(obj.source);
                                    $('#dest').html(obj.destination);
                                    $('#amount').html(obj.net_amount);
                                    $('#goodsValue').html(obj.goods_value);
                                    $('#srcAdd').html(obj.src_add_line1);
                                    $('#destAdd').html(obj.dest_add_line1);
                                    var parts =obj.moving_date.split('-');
                                    var mydate = new Date(parts[0], parts[1], parts[2]);
                                    var day = mydate.getDate();
                                    var month = mydate.getMonth();
                                    var year = mydate.getFullYear();

                                    $('#moving_date').val(day+"-"+month+"-"+year);
                                    $('#moving_time').val(obj.moving_time);

                                }else {
                                    $("#survey_id").val(obj.survey_id);
                                    $('#cust_name').html(obj.cust_name);
                                    $('#cust_email').html(obj.cust_email);
                                    $('#contact').html(obj.cust_contact);
                                    $('#alternateno').html(obj.cust_alt_contact);
                                    $('#src').html(obj.source);
                                    $('#dest').html(obj.destination);
                                    $('#amount').html(obj.net_amount);
                                    $('#goodsValue').html(obj.goods_value);
                                    $('#srcAdd').html(obj.src_add_line1);
                                    $('#destAdd').html(obj.dest_add_line1);
                                }
                             },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("Enter Correct Consignment No");
                                $('#cn_no').val("");
                            }

                        });
                    }
                }
            });

        });
    </script>
@stop