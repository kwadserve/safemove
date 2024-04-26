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
        .marginCss{
            margin-bottom: 30px;
        }
        .libtn{
            background-color: #1797be;
            border: 1px solid #fff;
            border-radius: 10px;
            margin-left: 50px;
            font-size: 14px;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
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
        .btnCls{
            padding: 5px;
            border: 1px solid #e5e3e3;
            border-radius: 5px;
            width: 100%;
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
                                        <a href="#tab_default_2" data-toggle="tab">All Packing List</a>
                                    </li>
                                    <li>
                                        <a href="#tab_default_1" data-toggle="tab">New Packing List</a>
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
                                                        <th>Value Of Goods</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($allPAckingList as $allListData)
                                                        <tr>
                                                            <td>{{$allListData->cn_no}}</td>
                                                            <td>{{ucwords($allListData->cust_name)}}</td>
                                                            <td>{{$allListData->goods_value}}</td>
                                                            <td>{{date("d-m-Y",strtotime($allListData->created_at))}}</td>
                                                            <td>
                                                                <a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('packingListDetails',base64_encode($allListData->pl_id))}}"><i class="icon fa-eye" aria-hidden="true"></i></a>

                                                                <a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('packingListEdit',base64_encode($allListData->pl_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

                                                                <button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('packingDestroy',base64_encode($allListData->pl_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
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
                                                <form method="POST" role="form" action="{{ url('/packingListPage/addPackingList') }}" accept-charset="UTF-8" enctype="multipart/form-data" autocomplete="off" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control cnnoBox" id="consignment_no" name="consignment_no" placeholder="Enter Consignment No +  Tab" required>
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Packing List No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packing_list_no" name="packing_list_no" value="{{$pl_id}}"  >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" readonly>
                                                            </div>
                                                            <label class="control-label col-md-2" for="">Date</label>
                                                            <div class="form-group input-group date col-md-1" style="padding-left: 15px;width: 330px;">
                                                                <input type="text" class="form-control" placeholder="Select Date..." name="survey_date" type="text" id="survey_date" value="{{date("d-m-Y")}}" readonly>
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Origin</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="source" name="source" placeholder="Origin" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" placeholder="Destination" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Supervisor Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="supervisor_name" name="supervisor_name" placeholder="Enter Supervisor Name" >
                                                            </div>

                                                            <label class="control-label col-md-2" for="">Total Goods Value</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="total_goods_value" name="total_goods_value" placeholder="Enter Total Goods Value" >
                                                            </div>


                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Laboure Name 1</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_1" name="packer_name_1" placeholder="Enter Laboure Name" >
                                                            </div>

                                                            <label class="control-label col-md-2">Laboure Name 2</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_2" name="packer_name_2" placeholder="Enter Laboure Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Laboure Name 3</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_3" name="packer_name_3" placeholder="Enter Laboure Name" >
                                                            </div>

                                                            <label class="control-label col-md-2">Laboure Name 4</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_4" name="packer_name_4" placeholder="Enter Laboure Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Laboure Name 5</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_5" name="packer_name_5" placeholder="Enter Laboure Name" >
                                                            </div>

                                                            <label class="control-label col-md-2">Laboure Name 6</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_6" name="packer_name_6" placeholder="Enter Laboure Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="field_wrapper1">
                                                                <div class="form-group mainDivCls clonedInput1" id="fhMainDiv_1">
                                                                    <label class="control-label col-md-2">Upload Image</label>
                                                                    <div class="form-group col-md-4">
                                                                        <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control-file btnCls" name="packing_image[]">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus icon1" id="addIconFH">&nbsp;</i></a>
                                                                        <br><br>
                                                                    </div>

                                                                    <label class="control-label col-md-2"></label>
                                                                    <div class="form-group col-md-4">
                                                                        <br><br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" id="imageDiv">

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
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                    </div>
                                                    <br>
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

            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            var maxField = 11; //Input fields increment limitation
            var minField1 = 8;
            var minField2 = 10;
            var x = 1; //Initial field counter is 1

            //Once add button is clicked for file uploade
            $('.add_button1').click(function () {
                var num1 = $('.clonedInput1').length;
                var newNum1 = new Number(num1 + 1);
                var fieldHTML = '<div class="form-group mainDivCls clonedInput1" id="fhMainDiv' + newNum1 + '">\n\
                                <label class="control-label col-md-2">Upload Image</label>\n\
                                    <div class="form-group col-md-4">\n\
                                        <input type="file" class="form-control-file btnCls" name="packing_image[]">\n\
                                    </div>\n\
                                    <div class="col-md-2">\n\
                                    <a href="javascript:void(0);" class="remove_button1" id="fhRemoveDiv_' + newNum1 + '"><i class="fa fa-minus icon2" >&nbsp;</i></a>\n\
                                    <br><br>\n\
                                </div>\n\
                <label class="control-label col-md-2"></label>\n\
                    <div class="form-group col-md-4"><br><br>\n\
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

            //get customer deatils of consignment no
            $('#consignment_no').keydown(function(e){
                var base_url= basePath();
                if(e.keyCode == 13) {
                    var cnno = $('#consignment_no').val();
                    if (cnno != "") {
                        $.ajax({
                            url: base_url+'checkPackingListData/{id}',
                            type: 'GET',
                            data: {
                                cn_no: cnno
                            },
                            success: function (response) {
                                if(parseInt(response)==1){
                                    $.ajax({
                                        url: base_url+'getPackingData/{id}',
                                        type: 'GET',
                                        data: {
                                            cn_no: cnno,
                                            tbl_name: 'tbl_delivery'
                                        },
                                        success: function (response) {
                                            var obj = JSON.parse(response);
                                            $('#customer_name').val(obj.cust_name);
                                            $('#source').val(obj.source);
                                            $('#destination').val(obj.destination);
                                            $('#total_goods_value').val(obj.goods_value);
                                        },
                                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                                            alert("Enter Correct Consignment No 2");
                                            $('#consignment_no').val("");
                                        }
                                    });

                                }else{
                                    var obj = JSON.parse(response);
                                    $('#customer_name').val(obj.cust_name);
                                    $('#source').val(obj.source);
                                    $('#destination').val(obj.destination);
                                    $('#packing_list_no').val(obj.pl_id);
                                    $('#supervisor_name').val(obj.supervisor_name);
                                    $('#total_goods_value').val(obj.goods_value);
                                    $('#packer_name_1').val(obj.packer_name1);
                                    $('#packer_name_2').val(obj.packer_name2);
                                    $('#packer_name_3').val(obj.packer_name3);
                                    $('#packer_name_4').val(obj.packer_name4);
                                    $('#packer_name_5').val(obj.packer_name5);
                                    $('#packer_name_6').val(obj.packer_name6);

                                    $.ajax({
                                        url: base_url+'getIamgeData/{id}',
                                        type: 'GET',
                                        data: {
                                            cn_no: cnno
                                        },
                                        success: function (response) {
                                            $('#imageDiv').html(response);
                                        }
                                    });
                                }

                            },
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("Enter Correct Consignment No 1");
                                $('#consignment_no').val("");
                            }

                        });

                    }
                }
            });

        });
    </script>
@stop