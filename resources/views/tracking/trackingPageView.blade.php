@extends('layouts.template')
@section('content')
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/forms/advanced.css')}}">
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
        .icon1{
            font-size:20px;
            color:green;
            margin-top: 5px;
        }
        .icon2{
            font-size:20px;
            color:red;
            margin-top: 5px;
        }
        .mainDivCls{
            margin-right: -100px;
            margin-left: 80px;
        }
        .lblCls{
            text-align: left;
            margin-left: 9%;
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
                                        <a href="#tab_default_2" data-toggle="tab">All Tracking</a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Tracking</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>CN NO</th>
                                                        <th>Name</th>
                                                        <th>Origin</th>
                                                        <th>Destination</th>
                                                        <th>Pickup Date/Time</th>
                                                        <th>Invoice ID</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($listData as $listData)
                                                        <tr>
                                                            <td>{{$listData->cn_no}}</td>
                                                            <td>{{ucwords($listData->cust_name)}}</td>
                                                            <td>{{ucwords($listData->source)}}</td>
                                                            <td>{{ucwords($listData->destination)}}</td>
                                                            <td>{{date("d-m-Y",strtotime($listData->start_date))}}</td>
                                                            <td>{{$listData->invoice_no}}</td>
                                                            <td>
                                                                {{--<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('trackingDetails',base64_encode($listData->tr_id))}}"><i class="icon fa-eye" aria-hidden="true"></i></a>--}}

                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editTrackDeatils',base64_encode($listData->tr_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('trackDeatilsDestroy',base64_encode($listData->tr_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/addTrackingData') }}" accept-charset="UTF-8" id="ownSurveyPlanForm" name="ownSurveyPlanForm" autocomplete="off">
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" value="{{old('consignment_no')}}" placeholder="Enter Consignment No + Tab">
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Tracking No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="tracking_no" name="tracking_no" readonly value="{{$tr_id}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{old('customer_name')}}" readonly placeholder="Customer Name">
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date &nbsp;&nbsp;</label>
                                                            {{--<div class="form-group input-group date col-md-1" style="padding-left: 15px;width: 330px;">--}}
                                                                {{--<input type="text" class="form-control" placeholder="Select Date..." name="tracking_date" type="text" id="tracking_date" value="{{date("d-m-Y")}}" style="position: unset!important;" readonly>--}}
                                                                {{--<div class="input-group-addon">--}}
                                                                    {{--<span class="glyphicon glyphicon-th"></span>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                    <input type="text" class="form-control" placeholder="Select Date..." name="tracking_date" type="text" id="tracking_date" value="{{date("d-m-Y")}}" data-date-today-highlight= "true" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" value="{{old('source')}}" readonly placeholder="Origin">
                                                            </div>

                                                            <label class="control-label col-md-2">Destination &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" value="{{old('destination')}}" readonly placeholder="Destination">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin Address &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="src_address" name="src_address" rows="3"  readonly placeholder="Origin Address">{{old('src_address')}}</textarea>
                                                            </div>

                                                            <label class="control-label col-md-2" for="">Destination Address &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="dest_address" name="dest_address" rows="3"  readonly placeholder="Destination address">{{old('dest_address')}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Invoice No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Invoice No" value="{{old('invoice_no')}}">
                                                            </div>
                                                            <label class="control-label col-md-2">Transist Day &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="transist_day" name="transist_day" placeholder="Enter transist day" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Start Date <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                    <input type="text" class="form-control {{ ($errors->has('start_date'))?'errorBox':'' }}" placeholder="Select Date..." name="start_date" type="text" id="start_date" value="{{old('start_date')}}" style="position: unset!important;" data-plugin="datepicker"  data-date-today-highlight= "true">
                                                                </div>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">End Date <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4" >
                                                                <div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
                                                                    <input type="text" class="form-control {{ ($errors->has('end_date'))?'errorBox':'' }}" placeholder="Select Date..." name="end_date" type="text" id="end_date" value="{{old('end_date')}}" style="position: unset!important;" data-plugin="datepicker"  data-date-today-highlight= "true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="control-label lblCls col-md-3" for="">Status &nbsp;&nbsp;</label>
                                                            <label class="control-label lblCls col-md-2" style="margin-left: 0%;margin-right: 7%;">Comment &nbsp;&nbsp;</label>
                                                            <label class="control-label lblCls col-md-2" for="">Date &nbsp;&nbsp;</label>
                                                            <div class="col-md-1"><br><br></div>
                                                        </div>
                                                        <div class="form-group" style="padding-left: 10px;padding-right: 20px">
                                                            <div class="field_wrapper1">
                                                                <div class="form-group mainDivCls clonedInput1" id="fhMainDiv_1">
                                                                    <div class="col-md-3">
                                                                        <select class="form-control statusCls" name="status[]" id="status_1" >
                                                                            <option value="">Select Status</option>
                                                                            <option value="Pick Up">Pick Up</option>
                                                                            <option value="In Transit">In Transit</option>
                                                                            <option value="Delay">Delay</option>
                                                                            <option value="Delivered">Delivered</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" name="comment[]" id="comment_1"     class="form-control commentCls" >
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                              <i class="icon wb-calendar" aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="date" class="form-control enq_dateCls" name="track_date[]" name="track_date_1"  style="position: unset!important;" placeholder="Select Date..." >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus icon1" id="addIconFH">&nbsp;</i></a>
                                                                        <br><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                        <div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
                                                            <p>
                                                                @if ($errors->has('consignment_no'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('consignment_no') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('start_date'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('start_date') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('end_date'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('end_date') }}</label>
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

            var maxField = 11; //Input fields increment limitation
            var minField1 = 8;
            var minField2 = 10;
            var x = 1; //Initial field counter is 1

            //Once add button is clicked for first half
            $('.add_button1').click(function () {
                var num1 = $('.clonedInput1').length;
                var newNum1 = new Number(num1 + 1);
                var fieldHTML = '<div class="form-group mainDivCls clonedInput1" id="fhMainDiv' + newNum1 + '">\n\
                                <div class="col-md-3">\n\
                                    <select class="form-control statusCls" name="status[]" id="status__' + newNum1 + '" >\n\
                                        <option value="">Select Status</option>\n\
                                        <option value="Pick Up">Pick Up</option>\n\
                                        <option value="In Transit">In Transit</option>\n\
                                        <option value="Delay">Delay</option>\n\
                                        <option value="Delivered">Delivered</option>\n\
                                    </select>\n\
                                </div>\n\
                                <div class="col-md-4">\n\
                                    <input type="text" name="comment[]" id="comment_' + newNum1 + '" class="form-control commentCls">\n\
                                </div>\n\
                                <div class="col-md-3">\n\
                                    <div class="input-group">\n\
                                        <span class="input-group-addon">\n\
                                        <i class="icon wb-calendar" aria-hidden="true"></i>\n\
                                        </span>\n\
                                        <input type="date" class="form-control enq_dateCls" name="track_date[]" name="track_date_' + newNum1 + '"  style="position: unset!important;" placeholder="Select Date..." data-plugin="datepicker">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="col-md-2">\n\
                                    <a href="javascript:void(0);" class="remove_button1" id="fhRemoveDiv_' + newNum1 + '"><i class="fa fa-minus icon2" >&nbsp;</i></a>\n\
                                    <br><br>\n\
                                </div>\n\
                            </div>'; //New input field html
                //Check maximum number of input fields

                if (x < maxField) {
                    x++; //Increment field counter
                    $('.field_wrapper1').append(fieldHTML); //Add field html
//                    $("#addIconFH").hide()
                } else {
                    alert("Can not added more than 10 fields");
                }
            });

            //Once remove button is clicked for first half
            $('.field_wrapper1').on('click', '.remove_button1', function (e) {
                var num1 = $('.clonedInput1').length;
                var id = $(this).attr('id');
                var res = id.split("_");
                var divId1 = "#fhMainDiv" + num1;
                e.preventDefault();
                if (num1 == res[1]) {
                    $(divId1).remove(); //Remove field html
                    $("#addIconFH").show()
                } else {
                    alert("Only last field you should delete");
                }
                //num--;
                x--; //Decrement field counter
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
            $('#consignment_no').keydown(function(e){
                var base_url= basePath();
                if(e.keyCode == 13) {
                    var cnno = $('#consignment_no').val();
                    if (cnno != "") {
                        $.ajax({
                            url: base_url+'getTrackingData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                if(obj.tr_id != ""){
                                    $('#tracking_no').val(obj.tr_id);
                                    $('#customer_name').val(obj.cust_name);
                                    $('#source').val(obj.source);
                                    $('#destination').val(obj.destination);
                                    $('#src_address').val(obj.src_add_line1);
                                    $('#dest_address').val(obj.dest_add_line1);
                                    $('#invoice_no').val(obj.invoice_no);
                                    $('#transist_day').val(obj.transist_day);
                                    var parts =obj.start_date.split('-');
                                    var mydate = new Date(parts[0], parts[1], parts[2]);
                                    var day = mydate.getDate();
                                    var month = mydate.getMonth();
                                    var year = mydate.getFullYear();

                                    $('#start_date').val(day+"-"+month+"-"+year);

                                    var parts1 =obj.end_date.split('-');
                                    var mydate1 = new Date(parts1[0], parts1[1], parts1[2]);
                                    var day1 = mydate1.getDate();
                                    var month1 = mydate1.getMonth();
                                    var year1 = mydate1.getFullYear();

                                    $('#end_date').val(day1+"-"+month1+"-"+year1);

                                }else{
                                    $('#customer_name').val(obj.cust_name);
                                    $('#source').val(obj.source);
                                    $('#destination').val(obj.destination);
                                    $('#src_address').val(obj.src_add_line1);
                                    $('#dest_address').val(obj.dest_add_line1);
                                    $('#invoice_no').val(obj.invoice_no);
                                    $('#transist_day').val(obj.transist_day);
                                }
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("Enter Correct Consignment No");
                                $('#consignment_no').val("");
                            }

                        });
                    }
                }
            });
        });
    </script>
@stop