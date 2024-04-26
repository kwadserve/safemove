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
    .tdlabel{
        padding-bottom: 30px;
        text-align: right;
        padding-right: 30px;
    }
    .checkbox .cr,
    .radio .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #a9a9a9;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .radio .cr {
        border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .radio .cr .cr-icon {
        margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
        display: none;
    }

    .checkbox label input[type="checkbox"] + .cr > .cr-icon,
    .radio label input[type="radio"] + .cr > .cr-icon {
        transform: scale(3) rotateZ(-20deg);
        opacity: 0;
        transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
    .radio label input[type="radio"]:checked + .cr > .cr-icon {
        transform: scale(1) rotateZ(0deg);
        opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled + .cr,
    .radio label input[type="radio"]:disabled + .cr {
        opacity: .5;
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
                            <div class="tab-content">
                                <div class="row" style="transform: none;">
                                    <div class="col-md-12">
                                        <form method="POST" role="form" action="{{ url('/updateInvoiceSetting') }}" accept-charset="UTF-8" id="invoiceSettingForm" name="invoiceSettingForm" >
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <h4 style="margin-left: 20px;"><i class="fa fa-fw fa-money"> </i>&nbsp;Invoice Setting</h4>
                                                <hr style="border:1px solid lightgray">
                                                <br>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-2">Invoice Prefix</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" placeholder="" value="{{$invoice->invoice_prefix}}">
                                                    </div>
                                                    <label for="" class="control-label col-md-2">Quotation Prefix</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="quotation_prefix" name="quotation_prefix" placeholder="" value="{{$invoice->quot_prefix}}" >
                                                    </div>
                                                    <input type="hidden" name="inv_set_id" value="{{$invoice->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-2">Service Tax No</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="service_tax_no" name="service_tax_no" placeholder="" value="{{$invoice->service_tax_no}}" >
                                                    </div>
                                                    <label for="" class="control-label col-md-2">PAN No</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="pan_no" name="pan_no" placeholder="" value="{{$invoice->pan_no}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="control-label col-md-2">Invoicing Currency</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="invoice_currency" name="invoice_currency" placeholder=""  value="{{$invoice->invoice_currency}}">
                                                    </div>
                                                    <label for="" class="control-label col-md-2">Payment Currency</label>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" class="form-control" id="payment_currency" name="payment_currency" placeholder=""  value="{{$invoice->payment_currency}}">
                                                    </div>
                                                </div>
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="" class="control-label col-md-2">Invoice Prefix</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" placeholder="" >--}}
                                                    {{--</div>--}}
                                                    {{--<label for="" class="control-label col-md-2">Increment Invoice No</label>--}}
                                                    {{--<div class="checkbox">--}}
                                                        {{--<label style="font-size: 1.5em">--}}
                                                            {{--<input type="checkbox" id="invoice_incre_no" name="invoice_incre_no" value="1" >--}}
                                                            {{--<span class="cr"><i class="cr-icon fa fa-check"></i></span>--}}
                                                        {{--</label>--}}
                                                        {{--<br><br>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="" class="control-label col-md-2">Invoice Due After</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<input type="text" class="form-control" id="invoice_due" name="invoice_due" placeholder="" >--}}
                                                    {{--</div>--}}
                                                    {{--<label for="" class="control-label col-md-2">Show Item Tax</label>--}}
                                                    {{--<div class="checkbox">--}}
                                                        {{--<label style="font-size: 1.5em">--}}
                                                            {{--<input type="checkbox" id="invoice_incre_no" name="invoice_incre_no" value="1" >--}}
                                                            {{--<span class="cr"><i class="cr-icon fa fa-check"></i></span>--}}
                                                        {{--</label>--}}
                                                        {{--<br><br>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="" class="control-label col-md-2">Invoice Starting No</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<input type="text" class="form-control" id="invoice_start_no" name="invoice_start_no" placeholder="" >--}}
                                                    {{--</div>--}}

                                                    {{--<label for="" class="control-label col-md-2">Invoice View</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<select class="form-control" id="invoice_start_no" name="invoice_start_no" >--}}
                                                            {{--<option value="">Select View</option>--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="" class="control-label col-md-2">State</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<select class="form-control" id="invoice_start_no" name="invoice_start_no" >--}}
                                                            {{--<option value="">Select View</option>--}}
                                                            {{--<option value="Maharashtra" selected>Maharshtra</option>--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                                                    {{--<label class="control-label col-md-2">Upload Image</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<div class="input-group image-preview">--}}
                                                            {{--<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->--}}
                                                            {{--<span class="input-group-btn">--}}
                                                                {{--<button type="button" class="btn btn-default image-preview-clear" style="display:none;">--}}
                                                                    {{--<span class="glyphicon glyphicon-remove"></span> Clear--}}
                                                                {{--</button>--}}
                                                                {{--<div class="btn btn-default image-preview-input">--}}
                                                                    {{--<span class="glyphicon glyphicon-folder-open"></span>--}}
                                                                    {{--<span class="image-preview-input-title">Browse</span>--}}
                                                                    {{--<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->--}}
                                                                {{--</div>--}}
                                                            {{--</span>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label for="" class="control-label col-md-2">Default Terms</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<textarea class="form-control" id="default_terms" name="default_terms" row="2" ></textarea>--}}
                                                    {{--</div>--}}

                                                    {{--<label for="" class="control-label col-md-2">Invoice footer Text</label>--}}
                                                    {{--<div class="form-group col-md-4">--}}
                                                        {{--<textarea class="form-control" id="invoice_footer_text" name="invoice_footer_text"  row="2" ></textarea>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                            <br>
                                            <div class="form-group col-sm-7 pull-right">
                                                <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                    <i class="fa fa-save"></i>   Save Changes
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

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class","close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger:'manual',
                html:true,
                title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function (){
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:250,
                    height:200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });
    });

</script>
@stop