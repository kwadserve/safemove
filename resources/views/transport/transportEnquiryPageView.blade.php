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
                                        <a href="#tab_default_2" data-toggle="tab">All Transport Enquiry</a>
                                    </li>
                                    <li>
                                    <a href="#tab_default_1" data-toggle="tab">New Transport Enquiry</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>CN No</th>
                                                        <th>Agent Name</th>
                                                        <th>Amount</th>
                                                        <th>Time</th>
                                                        <th>Type Of Goods</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($listData as $listData)
                                                        <tr>
                                                            <td>{{$listData->cn_no}}</td>
                                                            @if($listData->good_type != "Vehicale")
                                                                <td>{{ucwords($listData->good_trans_agent)}}</td>
                                                                <td>{{$listData->good_amount}}</td>
                                                                <td>{{$listData->gud_transist_time}}</td>
                                                            @else
                                                                <td>{{ucwords($listData->vehi_trans_agent)}}</td>
                                                                <td>{{$listData->vehical_amount}}</td>
                                                                <td>{{$listData->veh_transist_time}}</td>
                                                            @endif
                                                            <td>{{$listData->good_type}}</td>
                                                            <td>{{date("d-m-Y",strtotime($listData->created_at))}}</td>
                                                            <td>
                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editTransEnq',base64_encode($listData->id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('transportEnqDestroy',base64_encode($listData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addTransportEnquiry') }}" accept-charset="UTF-8" id="transportEnquiryForm" name="transportEnquiryForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Tab"  value="{{old('consignment_no')}}">
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Transport Enquiry No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="transport_enq_no" name="transport_enq_no" placeholder="" value="{{$trpId}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{old('customer_name')}}" placeholder="Customer Name" readonly >
                                                            </div>
                                                            <label class="control-label col-md-2">Goods Types <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4" >
                                                                <select class="form-control {{ ($errors->has('good_types'))?'errorBox':'' }}" name="good_types" id="good_types">
                                                                    <option value="">Select Good Types </option>
                                                                    @foreach($goodsRS as $goodsData)
                                                                        <option value="{{$goodsData->goods_type}}" {{ (old('good_types') == $goodsData->goods_type)?"selected":"" }}>{{$goodsData->goods_type}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" placeholder="Enter Origin"  value="{{old('source')}}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" placeholder="Enter Destination"  value="{{old('destination')}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Vehicle Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" placeholder="Vehicle Name"  value="{{old('vehicle_name')}}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Total CFT</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="total_cft" name="total_cft" placeholder="Total CFT"  value="{{old('total_cft')}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">

                                                            <label class="control-label col-md-2" for="">Goods Transport Agent</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="good_trans_agent" id="good_trans_agent" >
                                                                    <option value="">Select Goods Transport Agent</option>
                                                                    @foreach($trasnAgent as $trasnAgentData)
                                                                        <option value="{{$trasnAgentData->trans_agent_name}}" {{ (old('good_trans_agent') == $trasnAgentData->trans_agent_name)?"selected":"" }}>{{$trasnAgentData->trans_agent_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <label class="control-label col-md-2">Vehicle Transport Agent</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="vehi_trans_agent" id="vehi_trans_agent"  >
                                                                    <option value="">Select Vehicle Transport Agent </option>
                                                                    @foreach($trasnAgent as $trasnAgentData)
                                                                        <option value="{{$trasnAgentData->trans_agent_name}}" {{ (old('vehi_trans_agent') == $trasnAgentData->trans_agent_name)?"selected":"" }}>{{$trasnAgentData->trans_agent_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="contactNo" style="display:none;">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-2" for="">Agent Contact</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="agent_contact" name="agent_contact" placeholder="" >
                                                                </div>
                                                                <label class="control-label col-md-2"></label>
                                                                <div class="form-group col-md-4">
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Amount</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="goods_amount" name="goods_amount" value="{{old('goods_amount')}}" placeholder="Enter Goods Amount" >
                                                            </div>
                                                            <label class="control-label col-md-2">Amount</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="vehicle_charges" name="vehicle_charges" value="{{old('vehicle_charges')}}" placeholder="Enter Vehicle Charges" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Goods Transist Time</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="good_transist_time" name="good_transist_time" placeholder="Enter Goods Transist Time"  value="{{old('good_transist_time')}}">
                                                            </div>
                                                            <label class="control-label col-md-2">Vehicle Transist Time</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="vehicle_trasist_time" name="vehicle_trasist_time" placeholder="Enter Vehicle Transist Time"  value="{{old('vehicle_trasist_time')}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Narration</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="narration" name="narration" placeholder="Enter Narration"  rows="3">{{old('narrations')}}</textarea>
                                                            </div>
                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                                <br><br>
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
                                                                @if ($errors->has('good_types'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('good_types') }}</label>
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
                            url: base_url+'getConsignmentData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno,
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                $('#customer_name').val(obj.cust_name);
                                $('#source').val(obj.source);
                                $('#destination').val(obj.destination);
                                $('#vehicle_name').val(obj.vehical_name);
                                $('#total_cft').val(obj.total_cft);
                                var type = obj.enquiry_type;
                                $('[name="good_types"] option').filter(function() {
                                    return ($(this).text() == type); //To select Blue
                                }).prop('selected', true);
                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("Enter Correct Consignment No");
                                $('#consignment_no').val("");
                            }

                        });
                    }
                }
            });

            $("#good_trans_agent").on("change",function(){
                var base_url= basePath();
                var trans_agent= $('#good_trans_agent').val();
                if (trans_agent != "") {
                    $.ajax({
                        url: base_url+'getAgentData/{id}',
                        type: 'GET',
                        data: {
                            trans_agent: trans_agent,
                        },
                        success: function (response) {
                            var obj = JSON.parse(response);
                            $("#agent_contact").val(obj.contact_no);
                            $("#contactNo").show();
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#contactNo").hide();
                        }
                    });
                }else{
                    $("#contactNo").hide();
                }

            });
            $("#vehi_trans_agent").on("change",function(){
                var base_url= basePath();
                var trans_agent= $('#vehi_trans_agent').val();
                if (trans_agent != "") {
                    $.ajax({
                        url: base_url+'getAgentData/{id}',
                        type: 'GET',
                        data: {
                            trans_agent: trans_agent,
                        },
                        success: function (response) {
                            var obj = JSON.parse(response);
                            $("#agent_contact").val(obj.contact_no);
                            $("#contactNo").show();
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#contactNo").hide();
                        }
                    });
                }else{
                    $("#contactNo").hide();
                }

            });
        });
    </script>
@stop