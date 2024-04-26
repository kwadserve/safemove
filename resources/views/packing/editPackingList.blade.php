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

    </style>
    @foreach($listData as $list)
    @endforeach
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_default_1" data-toggle="tab">Edit Packing List</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_default_1">
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updatePackingList') }}" accept-charset="UTF-8" id="packingListForm" name="packingListForm" >
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Consignment No <span class="spancolor">*</span></label>
                                                            <div class="form-group col-md-4">
                                                                <input type="number" class="form-control cnnoBox" id="consignment_no" name="consignment_no" value="{{$list->cn_no}}" readonly>
                                                                <input type="hidden" class="form-control" id="pl_id" name="pl_id" value="{{$list->pl_id}}"  readonly>
                                                            </div>
                                                            <label for="" class="control-label col-md-2">Packing List No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packing_list_no" name="packing_list_no" value="{{$list->pl_id}}"  readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Customer Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{$list->cust_name}}" readonly>
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
                                                                <input type="text" class="form-control" id="source" name="source" value="{{$list->source}}" readonly>
                                                            </div>

                                                            <label class="control-label col-md-2">Destination</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="destination" name="destination" value="{{$list->destination}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Supervisor Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="supervisor_name" name="supervisor_name" placeholder="Enter Supervisor Name" value="{{$list->supervisor_name}}">
                                                            </div>

                                                            <label class="control-label col-md-2" for="">Total Goods Value</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="total_goods_value" name="total_goods_value" placeholder="" value="{{$list->goods_value}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Laboure Name 1</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_1" name="packer_name_1" placeholder="Enter Laboure Name" value="{{$list->packer_name1}}">
                                                            </div>

                                                            <label class="control-label col-md-2">Laboure Name 2</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_2" name="packer_name_2" placeholder="Enter Laboure Name" value="{{$list->packer_name2}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Laboure Name 3</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_3" name="packer_name_3" placeholder="Enter Laboure Name" value="{{$list->packer_name3}}">
                                                            </div>

                                                            <label class="control-label col-md-2">Laboure Name 4</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_4" name="packer_name_4" placeholder="Enter Laboure Name" value="{{$list->packer_name4}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2" for="">Laboure Name 5</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_5" name="packer_name_5" placeholder="Enter Laboure Name"value="{{$list->packer_name5}}" >
                                                            </div>

                                                            <label class="control-label col-md-2">Laboure Name 6</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="packer_name_6" name="packer_name_6" placeholder="Enter Laboure Name" value="{{$list->packer_name6}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">


                                                            <label class="control-label col-md-2"></label>
                                                            <div class="form-group col-md-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
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
            $(document).on('click', '#close-preview', function(){
                $('.image-preview').popover('hide');
                // Hover befor close the preview
                $('.image-preview').hover(
                    function () {
                        $('.image-preview').popover('show');
                    },
                    function () {
                        $('.image-preview').popover('hide');
                    }
                );
            });

//            $(function() {
//                // Create the close button
//                var closebtn = $('<button/>', {
//                    type:"button",
//                    text: 'x',
//                    id: 'close-preview',
//                    style: 'font-size: initial;',
//                });
//                closebtn.attr("class","close pull-right");
//                // Set the popover default content
//                $('.image-preview').popover({
//                    trigger:'manual',
//                    html:true,
//                    title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
//                    content: "There's no image",
//                    placement:'bottom'
//                });
//                // Clear event
//                $('.image-preview-clear').click(function(){
//                    $('.image-preview').attr("data-content","").popover('hide');
//                    $('.image-preview-filename').val("");
//                    $('.image-preview-clear').hide();
//                    $('.image-preview-input input:file').val("");
//                    $(".image-preview-input-title").text("Browse");
//                });
//                // Create the preview image
//                $(".image-preview-input input:file").change(function (){
//                    var img = $('<img/>', {
//                        id: 'dynamic',
//                        width:250,
//                        height:200
//                    });
//                    var file = this.files[0];
//                    var reader = new FileReader();
//                    // Set preview image into the popover data-content
//                    reader.onload = function (e) {
//                        $(".image-preview-input-title").text("Change");
//                        $(".image-preview-clear").show();
//                        $(".image-preview-filename").val(file.name);
//                        img.attr('src', e.target.result);
//                        $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
//                    }
//                    reader.readAsDataURL(file);
//                });
//            });
        });
    </script>
@stop