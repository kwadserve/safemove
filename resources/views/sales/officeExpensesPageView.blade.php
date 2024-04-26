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
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a href="#tab_default_2" data-toggle="tab">All Company Expenses </a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">Company Expenses </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_2">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <table id="example" class="table table-striped table-bordered no-wrap" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Category</th>
                                                        <th>Expenses By</th>
                                                        <th>Amount</th>
                                                        <th>Payment Mode</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($offExpRs as $offExpData)
                                                        <tr>
                                                            <td>{{date("d-m-Y",strtotime($offExpData->created_at))}}</td>
                                                            <td>{{$offExpData->category_name}}</td>
                                                            <td>{{$offExpData->expenes_by}}</td>
                                                            <td align="right">{{$offExpData->amount}}</td>
                                                            <td>{{$offExpData->payment_mode}}</td>
                                                            <td>
{{--                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('editInvoice',base64_encode($offExpData->id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>--}}

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('officeExpDestroy',base64_encode($offExpData->id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/addOfficeExpanses') }}" accept-charset="UTF-8" autocomplete="off" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Entry No &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="entry_no" name="entry_no" placeholder="" value="{{(empty($offExpId))?old("entry_no"):$offExpId}}" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date &nbsp;&nbsp;</label>
                                                            <div class="form-group input-group date col-md-1" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="entry_date" type="text" id="entry_date" value="{{ date('d-m-Y') }}" readonly>
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Expense By &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control " id="expenses_by" name="expenses_by" placeholder="Enter Expense By" value="{{old("expenses_by")}}">
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Category <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control  {{ ($errors->has('category'))?'errorBox':'' }}" name="category" id="category"  >
                                                                    <option value="">Select...</option>
                                                                    @foreach($offExpCatRs as $offExpCatData)
                                                                        <option value="{{$offExpCatData->id}}">{{$offExpCatData->category_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Payemnt Mode <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control  {{ ($errors->has('payment_mode'))?'errorBox':'' }}" name="payment_mode" id="payment_mode"  >
                                                                    <option value="">Select...</option>
                                                                    @foreach($payModeRs as $payModeData)
                                                                        <option value="{{$payModeData->mode_name}}" {{($payModeData->mode_name=="Cash")?"selected":""}}>{{$payModeData->mode_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="vehicleCat" style="display: none">
                                                            <label for="" class="control-label col-md-2">Vehicle Name <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" name="vehicle_name" id="vehicle_name"  >
                                                                    <option value="">Select...</option>
                                                                    @foreach($vehicalCat as $vehical)
                                                                        <option value="{{$vehical->name}}">{{$vehical->name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Amount <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control {{ ($errors->has('amount'))?'errorBox':'' }}" id="amount" name="amount" placeholder="Enter Amount" value="{{old("amount")}}">
                                                            </div>
                                                        </div>

                                                        <div id="bankNameId" style="display: none">
                                                            <div class="form-group">
                                                                <label for="" class="control-label col-md-2">Bank Name &nbsp;&nbsp;</label>
                                                                <div class="form-group col-md-4">
                                                                    <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter Bank Name" value="{{old("bank_name")}}">
                                                                </div>
                                                                <label for="" class="control-label col-md-2"> &nbsp;&nbsp;</label>
                                                                <div class="form-group col-md-4">
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Narrations &nbsp;&nbsp;</label>
                                                            <div class="form-group col-md-4">
                                                                <textarea class="form-control" id="narrations" name="narrations" placeholder="Enter Narration" rows="3">{{old("narrations")}}</textarea>
                                                            </div>
                                                            <label for="" class="control-label col-md-2"> &nbsp;&nbsp;</label>
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
                                                                @if ($errors->has('category'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('category') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('payment_mode'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('payment_mode') }}</label>
                                							</span>
                                                                @endif
                                                            </p>
                                                            <p>
                                                                @if ($errors->has('amount'))
                                                                    <span class="help-block">
                                								<label style="color:red">{{ $errors->first('amount') }}</label>
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
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                order: [],
                columnDefs: [ { orderable: false}]
            } );
            $('#expanse_at').on("change",function(){
                var expanse_at = $('#expanse_at').val();
                var cn_no = $("#consignment_no").val();
                if(cn_no != "") {
                    if (expanse_at != "") {
                        if (expanse_at == "Source") {
                            $('#sourceExpanseDiv').show();
                            $('#commonExpanseDiv').show();
                            $('#destExpanseDiv').hide();

                        } else if (expanse_at == "Destination") {
                            $('#destExpanseDiv').show();
                            $('#commonExpanseDiv').show();
                            $('#sourceExpanseDiv').hide();
                        } else {
                            $('#sourceExpanseDiv').hide();
                            $('#destExpanseDiv').hide();
                            $('#commonExpanseDiv').hide();
                        }
                    }
                }else{
                    alert("Please Enter Consignment No First.");
                    $("#expanse_at").val($("#expanse_at option:first").val());
                    $('#sourceExpanseDiv').hide();
                    $('#destExpanseDiv').hide();
                    $('#commonExpanseDiv').hide();
                }
            });

            $('.calSrcDestExp').on("keyup",function(){
                var expanse_at = $('#expanse_at').val();
                if (expanse_at != "") {
                    var com_cost1 = parseInt($("#naka_cost").val());
                    var com_cost2 = parseInt($("#fooding_cost").val());
                    var com_cost3 = parseInt($("#misce_cost").val());
                    var com_cost4 = parseInt($("#other1_cost").val());
                    var com_cost5 = parseInt($("#other2_cost").val());
                    var com_cost6 = parseInt($("#other3_cost").val());
                    var com_cost7 = parseInt($("#other4_cost").val());
                    if(isNaN(com_cost1 )){com_cost1=0;}
                    if(isNaN(com_cost2 )){com_cost2=0;}
                    if(isNaN(com_cost3 )){com_cost3=0;}
                    if(isNaN(com_cost4 )){com_cost4=0;}
                    if(isNaN(com_cost5 )){com_cost5=0;}
                    if(isNaN(com_cost6 )){com_cost6=0;}
                    if(isNaN(com_cost7 )){com_cost7=0;}
                    var allcomcost = com_cost1+com_cost2+com_cost3+com_cost4+com_cost5+com_cost6+com_cost7;

                    if (expanse_at == "Source") {
                        var src_cost1 = parseInt($("#pack_mat_cost").val());
                        var src_cost2 = parseInt($("#gud_transp_cost").val());
                        var src_cost3 = parseInt($("#vehi_transp_cost").val());
                        var src_cost4 = parseInt($("#insu_cost").val());
                        var src_cost5 = parseInt($("#aser_tax_costbc").val());
                        var src_cost6 = parseInt($("#local_transp_cost").val());
                        var src_cost7 = parseInt($("#load_chrg_cost").val());
                        var src_cost8 = parseInt($("#lab_chrg_cost").val());
                        if(isNaN(src_cost1 )){src_cost1=0;}
                        if(isNaN(src_cost2 )){src_cost2=0;}
                        if(isNaN(src_cost3 )){src_cost3=0;}
                        if(isNaN(src_cost4 )){src_cost4=0;}
                        if(isNaN(src_cost5 )){src_cost5=0;}
                        if(isNaN(src_cost6 )){src_cost6=0;}
                        if(isNaN(src_cost7 )){src_cost7=0;}
                        if(isNaN(src_cost8 )){src_cost8=0;}

                        $("#source_total").val(src_cost1+src_cost2+src_cost3+src_cost4+src_cost5+src_cost6+src_cost7+src_cost7+allcomcost);
                        var src_total = parseInt($("#source_total").val());
                        var dest_total = parseInt($("#dest_total").val());
                        if(isNaN(src_total )){src_total=0;}
                        if(isNaN(dest_total )){dest_total=0;}
                        $("#src_dest_total").val(src_total+dest_total);
                    }
                    if (expanse_at == "Destination") {
                        var dest_cost1 = parseInt($("#dest_exp_cost").val());
                        var dest_cost2 = parseInt($("#unload_cost").val());
                        var dest_cost3 = parseInt($("#dst_local_tra_cost").val());
                        var dest_cost4 = parseInt($("#convey_cost").val());
                        if(isNaN(dest_cost1 )){dest_cost1=0;}
                        if(isNaN(dest_cost2 )){dest_cost2=0;}
                        if(isNaN(dest_cost3 )){dest_cost3=0;}
                        if(isNaN(dest_cost4 )){dest_cost4=0;}

                        $("#dest_total").val(dest_cost1+dest_cost2+dest_cost3+dest_cost4+allcomcost);
                        var src_total = parseInt($("#source_total").val());
                        var dest_total = parseInt($("#dest_total").val());
                        if(isNaN(src_total )){src_total=0;}
                        if(isNaN(dest_total )){dest_total=0;}
                        $("#src_dest_total").val(src_total+dest_total);
                    }
                }
            });
            $("#payment_mode").on("change",function(){
                if($("#payment_mode").val()=="Cheque"){
                    $("#bankNameId").show();
                }else{
                    $("#bankNameId").hide();
                }
            });
            $("#category").on("change",function(){
                if(parseInt($("#category").val())==5){
                    $("#vehicleCat").show();
                }else{
                    $("#vehicleCat").hide();
                }
            });
        });
    </script>
@stop