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
        input[type="radio"] {
            box-sizing: border-box;
            padding: 0;
            margin-right: 7px;
            margin-left: 11px;
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
                                        <a href="#tab_default_2" data-toggle="tab">All Feedback</a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Feedback</a>
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
                                                        <th>Rating</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($feedRs as $feedRsData)
                                                        <tr>
                                                            <td>{{$feedRsData->cn_no}}</td>
                                                            <td>{{ucwords($feedRsData->cust_name)}}</td>
                                                            <td>{{$feedRsData->rating}}</td>
                                                            <td>

{{--                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editFeedbackDeatils',base64_encode($feedRsData->id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('feedBackDeatilsDestroy',base64_encode($feedRsData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addFeedbackData') }}" accept-charset="UTF-8" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" value="{{old('consignment_no')}}" placeholder="Enter Consignment No + Tab">
                                                            </div>

                                                            <label class="control-label col-md-3" for="">Date &nbsp;&nbsp;</label>
                                                            <div class="form-group input-group date col-md-3" style="padding-left: 15px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="tracking_date" type="text" id="tracking_date" value="{{date("d-m-Y")}}" readonly>
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{old('customer_name')}}" readonly placeholder="Customer Name">
                                                            </div>
                                                            <label for="" class="control-label col-md-3">Customer Contact &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="customer_contact" name="customer_contact" value="{{old('customer_contact')}}" readonly placeholder="Customer Contact no">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="source" name="source" value="{{old('source')}}" readonly placeholder="Origin">
                                                            </div>

                                                            <label class="control-label col-md-3">Destination &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" id="destination" name="destination" value="{{old('destination')}}" readonly placeholder="Destination">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Skill of the Packing Staff &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" name="skill" id="skill" >
                                                                    <option value="">Select Status</option>
                                                                    @foreach($FeedStatusRs as $FeedStatusData)
                                                                        <option value="{{$FeedStatusData->status_name}}">{{$FeedStatusData->status_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label class="control-label col-md-3">Quality of the Packing Material &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" name="quality" id="quality" >
                                                                    <option value="">Select Status</option>
                                                                    @foreach($FeedStatusRs as $FeedStatusData)
                                                                        <option value="{{$FeedStatusData->status_name}}">{{$FeedStatusData->status_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Time Delivery &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" name="time_delivery" id="time_delivery" >
                                                                    <option value="">Select Status</option>
                                                                    @foreach($FeedStatusRs as $FeedStatusData)
                                                                        <option value="{{$FeedStatusData->status_name}}">{{$FeedStatusData->status_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label class="control-label col-md-3"> Experience with the office staff &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" name="experience" id="experience" >
                                                                    <option value="">Select Status</option>
                                                                    @foreach($FeedStatusRs as $FeedStatusData)
                                                                        <option value="{{$FeedStatusData->status_name}}">{{$FeedStatusData->status_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Breakage/Losses &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" name="breakage" id="breakage" >
                                                                    <option value="">Select Status</option>
                                                                    @foreach($FeedStatusRs as $FeedStatusData)
                                                                        <option value="{{$FeedStatusData->status_name}}">{{$FeedStatusData->status_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <label class="control-label col-md-3">General Attributes(Courtesy, etc) &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <select class="form-control" name="attributes" id="attributes" >
                                                                    <option value="">Select Status</option>
                                                                    @foreach($FeedStatusRs as $FeedStatusData)
                                                                        <option value="{{$FeedStatusData->status_name}}">{{$FeedStatusData->status_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="">Work Start On Time &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="radio" name="work_start_time" value="Yes">Yes
                                                                <input type="radio" name="work_start_time" value="No">No
                                                            </div>

                                                            <label class="control-label col-md-2">Date Of Birth &nbsp;&nbsp;</label>
                                                            <div class="form-group input-group date col-md-3" data-provide="datepicker" style="padding-left: 15px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="dob" type="text" id="dob" >
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" for="">Labours commite &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="radio" name="labour_commit" value="Yes">Yes
                                                                <input type="radio" name="labour_commit" value="No">No
                                                            </div>

                                                            <label class="control-label col-md-2">Working Company &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="text" class="form-control" name="working_company" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Correct Vehical &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <input type="radio" name="correct_vehical" value="Yes">Yes
                                                                <input type="radio" name="correct_vehical" value="No">No
                                                            </div>

                                                            <label class="control-label col-md-2">Suggestion &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-3">
                                                                <textarea class="form-control" name="suggestion" ></textarea>
                                                            </div>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                            {{--<label for="" class="control-label col-md-2">Rating  <span class="spancolor">*</span></label>--}}
                                                            {{--<div class="form-group col-md-3">--}}
                                                                {{--<input type="text" class="form-control {{ ($errors->has('rating'))?'errorBox':'' }}" id="rating" name="rating" value="{{old('rating')}}" placeholder="Enter Rating">--}}
                                                            {{--</div>--}}
                                                            {{--<label for="" class="control-label col-md-2"> &nbsp;&nbsp;</label>--}}
                                                            {{--<div class="form-group col-md-5">--}}
                                                                {{--<br><br>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <br>
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
                                                                @if ($errors->has('rating'))
                                                                    <span class="help-block">
																	<label style="color:red">{{ $errors->first('rating') }}</label>
																</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" name="submit" value="save" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Save
                                                            <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
                                                        </button>
                                                        <button type="submit" name="submit" value="print" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-print"></i>  Print
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
                            url: base_url+'getFeedBackData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                $('#customer_name').val(obj.cust_name);
                                $('#source').val(obj.source);
                                $('#destination').val(obj.destination);
                                $('#customer_contact').val(obj.cust_contact);
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