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
                                        <a href="#tab_default_2" data-toggle="tab">All Delivery</a>
                                    </li>
                                    <li>
                                    <a href="#tab_default_1" data-toggle="tab">New Delivery</a>
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
                                                        <th>Name</th>
                                                        <th>No Of Package</th>
                                                        <th>Value Of Goods</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($listData as $listData)
                                                        <tr>
                                                            <td>{{$listData->cn_no}}</td>
                                                            <td>{{ucwords($listData->cust_name)}}</td>
                                                            <td>{{$listData->no_of_packages}}</td>
                                                            <td align="right">{{$listData->value_of_goods}}</td>
                                                            <td>{{date("d-m-Y",strtotime($listData->created_at))}}</td>
                                                            <td>
                                                                <a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('displaydeliveryDetails',base64_encode($listData->cn_no))}}" target="_blank"><i class="icon fa-eye" aria-hidden="true"></i></a>

                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editDelivery',base64_encode($listData->del_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('deliveryDestroy',base64_encode($listData->del_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addDelivery') }}" accept-charset="UTF-8" id="deliveryPageForm" name="deliveryPageForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('consignment_no'))?'errorBox':'cnnoBox' }}" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No + Tab" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Delivery No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="delivery_no" name="delivery_no" placeholder="" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date &nbsp;&nbsp;</label>
                                                            <div class="form-group input-group date col-md-1" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="delivery_date" type="text" id="delivery_date" value="{{date("d-m-Y")}}" readonly>
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Truck No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('truck_no'))?'errorBox':'' }}" id="truck_no" name="truck_no" placeholder="Enter truck no" >
                                                            </div>

                                                            <label class="control-label col-md-2">No of Packages <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('no_of_packages'))?'errorBox':'' }}" id="no_of_packages" name="no_of_packages" placeholder="Enter no of packages" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Value Of Goods <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('value_of_goods'))?'errorBox':'' }}" id="value_of_goods" name="value_of_goods" placeholder="Enter valu of good" >
                                                            </div>

                                                            <label class="control-label col-md-2">Type Of Packing &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="type_of_packing" id="type_of_packing" >
                                                                    <option value="">Select Type Of Packing</option>
                                                                    @foreach($typePackRS as $typePackData)
                                                                        <option value="{{$typePackData->type_name}}" >{{$typePackData->type_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Mode of Dispatch &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control {{ ($errors->has('trans_type'))?'errorBox':'' }}" id="trans_type" name="trans_type">
                                                            </div>
                                                            <!--<div class="form-group col-md-4">-->
                                                            <!--    <select class="form-control" name="mode_of_dispatch" id="mode_of_dispatch" >-->
                                                                    
                                                            <!--        <option value="">Select Mode Of Dispatch</option>-->
                                                            <!--        @foreach($disModeRS as $disModeData)-->
                                                            <!--            <option value="{{$disModeData->type_name}}" >{{$disModeData->type_name}}</option>-->
                                                            <!--        @endforeach-->
                                                            <!--    </select>-->
                                                            <!--</div>-->

                                                            <label class="control-label col-md-2">Risk Type &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="risk_type" id="risk_type" >
                                                                    <option value="">Select Risk Type</option>
                                                                    @foreach($riskTypeRS as $riskTypeData)
                                                                        <option value="{{$riskTypeData->risk_name}}" >{{$riskTypeData->risk_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Private Mark &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="private_mark" name="private_mark" row="3" ></textarea>
                                                            </div>

                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">

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
                                                                @if ($errors->has('truck_no'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('truck_no') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('no_of_packages'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('no_of_packages') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('value_of_goods'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('value_of_goods') }}</label>
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
                            url: base_url+'getDeliveryData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno
                            },
                            success: function (response) {
                                var obj = JSON.parse(response);
                                $('#customer_name').val(obj.cust_name);
                                $('#source').val(obj.source);
                                $('#destination').val(obj.destination);
                                $('#value_of_goods').val(obj.goods_value);
                                $('#trans_type').val(obj.trans_type);
                                
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