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
    </style>

    <!--<div class="page-header">
    <h1 class="page-title font_lato"><i class="site-menu-icon wb-help-circle" aria-hidden="true"></i>Enquiry</h1>
    <div class="page-header-actions">
        <ol class="breadcrumb">
    		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
    		<!--<li><a href="{{URL::to('userlist')}}">{{ trans('app.users')}}</a></li>
    		<li class="active">Enquiry</li>
    	</ol>
    </div>
</div>-->

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
                                    <div>
                                        <div class="row" style="transform: none;">
                                            <div class="col-md-12">
                                                <form method="POST" role="form" action="{{ url('/updateCompanyDetails') }}" accept-charset="UTF-8" >
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <h4 style="margin-left: 20px;"><i class="fa fa-info-circle"> </i>&nbsp;Company Details</h4>
                                                        <hr style="border:1px solid lightgray">
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Company Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" value="{{$company->name}}" >
                                                                <input type="hidden" name="company_id" value="{{$company->id}}">
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Legal Name</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_legal_name" name="company_legal_name" value="{{$company->legal_name}}" placeholder="Enter Legel Name" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Contact Person</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{$company->contact_person}}" placeholder="Enter Contact Person Name" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Contact Email</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{$company->contact_email}}" placeholder="Enter Contact Email" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Contact No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="contact_no" name="contact_no" value="{{$company->contact}}" placeholder="Enter Contact Number" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Alternate No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="alternate_no" name="alternate_no" value="{{$company->alt_contact}}" placeholder="Enter Alternate Number" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Addres Line 1</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="address_line1" name="address_line1" value="{{$company->add_line1}}" placeholder="Enter Address Line no 1" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Address Line 2</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="address_line2" name="address_line2" value="{{$company->add_line2}}" placeholder="Enter Address Line no 2" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">City</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_city" name="company_city" value="{{$company->city}}" placeholder="" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Pincode</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_pincode" name="company_pincode" value="{{$company->pincode}}" placeholder="" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">State</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_state" name="company_state"  value="{{$company->state}}" placeholder="" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Country</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_pincode" name="company_country"  value="{{$company->country}}" placeholder="" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="control-label col-md-2">Company Website</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_website" name="company_website" value="{{$company->website}}" placeholder="" >
                                                            </div>

                                                            <label for="" class="control-label col-md-2">Comapny GST No</label>
                                                            <div class="form-group col-md-4">
                                                                <input type="text" class="form-control" id="company_gst_no" name="company_gst_no" value="{{$company->gst_no}}" placeholder="Enter GST Number" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group col-sm-7 pull-right">
                                                        <button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
                                                            <i class="fa fa-save"></i>  Save Changes
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
        });
        var app = angular.module('app', []);

        app.directive("matchPassword", function () {
            return {
                require: "ngModel",
                scope: {
                    otherModelValue: "=matchPassword"
                },
                link: function(scope, element, attributes, ngModel) {

                    ngModel.$validators.matchPassword = function(modelValue) {
                        return modelValue == scope.otherModelValue;
                    };

                    scope.$watch("otherModelValue", function() {
                        ngModel.$validate();
                    });
                }
            };
        });
    </script>
@stop