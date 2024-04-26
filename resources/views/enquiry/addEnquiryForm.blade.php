@extends('layouts.template')
@section('content') 
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/jt-timepicker/jquery-timepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/assets/examples/css/forms/advanced.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/assets/shiftingHome/commonDashboardCss.css')}}">
<link rel="stylesheet" href="{{URL::asset('public/global/vendor/filament-tablesaw/tablesaw.css')}}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyDfooxpPazjLJeXfxr9AKgyEj6xu57cOvQ"  type="text/javascript"></script>
<style>
p.redcolor{color:red; font-size:16px;}
.spancolor{color:red;}
.help-block{color:red;}
.checkedStar {
	color: orange;
}
.uncheckedStar {
	color: black!important;
}
.fontClass{
	font-size: 25px;
	margin-left: 10px;
}
.checkbox label:after,
.radio label:after {
	content: '';
	display: table;
	clear: both;
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

.datepicker table tr td.active.active{
	color: #fff;
	background-color: #358fe4;
	border-color: #2c8ae3;
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
        					<ul class="nav nav-tabs " id="myTab">
								@if(!isset($cn_noData))
        						<li class="active">
									<a href="#tab_default_3" data-toggle="tab">All Enquiry </a>
        						</li>
        						{{--<li class="{{ Request::is('homeFollowup') ? 'active' : '' }}">--}}
								<li class="">
									<a href="#tab_default_2" data-toggle="tab">Follow Up </a>
        						</li>
								<li class="">
									<a href="#tab_default_1" data-toggle="tab">New Enquiry </a>
								</li>
								@else
									<li class="active">
										<a href="#tab_default_2" data-toggle="tab">Follow Up </a>
									</li>
								@endif
        					</ul>
							{{--{{ Request::is('homeFollowup') ? 'fade in active' : '' }}--}}
        					<div class="tab-content">
								@if(!isset($cn_noData))
        						<div class="tab-pane active" id="tab_default_3">
        						    <div class="row" style="transform: none;">
                                        <div class="col-md-12">
											<table id="example22" class="table table-striped table-bordered no-wrap" style="width:100%">
												<thead>
												<tr>
													<th class="no-sort">CN No</th>
													<th>Name</th>
													<th>Contact</th>
													{{--<th>Email ID</th>--}}
													<th>Date</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												@foreach($allEnquiryList as $allEnquiryListData)
													<tr>
														<td>{{$allEnquiryListData->cn_no}}</td>
														<td>{{ucwords($allEnquiryListData->cust_name)}}</td>
														<td>{{$allEnquiryListData->cust_contact}}</td>
														{{--<td>{{$allEnquiryListData->cust_email}}</td>--}}
														<td>{{date("d-m-Y",strtotime($allEnquiryListData->created_at))}}</td>
														<td>{{$allEnquiryListData->enq_status}}</td>
														<td>
															<a title="{{ trans('app.user_details')}}" data-toggle="tooltip" data-placement="top" data-original-title="View details" class="btn btn-icon btn-primary btn-outline btn-round " href="{{URL::to('enquiryDetails',base64_encode($allEnquiryListData->enq_id))}}"><i class="icon fa-eye" aria-hidden="true"></i></a>

															<a title="{{ trans('app.edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="{{ trans('app.edit')}}" class="btn btn-icon btn-info btn-outline btn-round" href="{{URL::to('enquiryEdit',base64_encode($allEnquiryListData->enq_id))}}"><i class="icon wb-pencil" aria-hidden="true"></i> </a>

															<button data-placement="top" data-toggle="modal" rel="tooltip" title="{{ trans('app.delete')}}"  data-original-title="{{ trans('app.delete')}}"  class="btn btn-icon btn-danger btn-outline btn-round" data-target=".exampleNiftyFlipVertical"  type="button" data-href="{{URL::to('enquiryDestroy',base64_encode($allEnquiryListData->enq_id))}}"><i class="icon fa-remove" aria-hidden="true"></i></button>
														</td>
													</tr>
												@endforeach
												</tbody>
											</table>
                                        </div>
                                    </div>    
        						</div>
								<div class="tab-pane" id="tab_default_2">
									<div class="row" style="transform: none;">
										<div class="col-md-12">
											<form method="POST" role="form" action="{{ url('/homeEnquiry/addFollowup') }}" accept-charset="UTF-8" autocomplete="off">
												{{ csrf_field() }}
												<br>
												<div class="row">
													<div class="form-group col-md-6" >
														<div class="form-group">
															<label for="" class="control-label col-md-3">CN No</label>
															<div class="form-group col-md-8">
																<input type="text" class="form-control" id="followup_cn_no" name="followup_cn_no" placeholder="Enter Consignment No + Enter" style="box-shadow: 1px 1px 5px 3px violet" required>
																<input type="hidden" name="enquiry_id" id="enquiry_id">
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Customer Name</label>
															<div class="form-group col-md-8">
																<input class="form-control" id="cust_name_fup" name="cust_name" placeholder="Customer Name" readonly>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Contact No</label>
															<div class="form-group col-md-8">
																<input class="form-control" id="cust_con_no" name="cust_con_no" placeholder="Contact Number" readonly>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3" for="">Date <span class="spancolor">*</span></label>
															<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">
																<input type="text" class="form-control" placeholder="Select Follow up date..." name="followup_date" type="text" id="followup_date" value="{{ date('d-m-Y') }}" required style="position: unset!important;" readonly>
																<div class="input-group-addon">
																	<span class="glyphicon glyphicon-th"></span>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Conversation <span class="spancolor">*</span></label>
															<div class="form-group col-md-8">
																<textarea class="form-control" id="conversation" name="conversation" placeholder="Enter Conversation" style="height: 100px;"required></textarea>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-md-3">Rating</label>
															<div class="form-group col-md-8" style="margin-top:0px">
																<span class="fa fa-star fontClass" id="star1" onclick="add(this,1)"></span>
																<span class="fa fa-star fontClass" id="star2" onclick="add(this,2)"></span>
																<span class="fa fa-star fontClass" id="star3" onclick="add(this,3)"></span>
																<span class="fa fa-star fontClass" id="star4" onclick="add(this,4)"></span>
																<span class="fa fa-star fontClass" id="star5" onclick="add(this,5)"></span>
															</div>
															<input type="hidden" name="rating" id="rating">
														</div>
													</div>
													<div class="form-group col-md-6">
														<table id="followupTable" class="table table-striped table-bordered no-wrap" style="width:100%">
															<thead>
															<tr>
																<th width="20%">Date</th>
																<th width="60%">Conversation</th>
																<th width="20%">Rating</th>
															</tr>
															</thead>
															<tbody id="followupTableBody">

															</tbody>
														</table>
													</div>
												</div>
												<br>
												<div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
													<div class="form-group col-md-4">
													</div>
													<div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
													</div>
													<div class="form-group col-md-4"></div>
												</div>

												<div class="form-group col-sm-7 pull-right">
													<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
														<i class="fa fa-save"></i> Save
														<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_default_1">
									<div class="row" style="transform: none;">
										<div class="col-md-12">
											<form method="POST" role="form" action="{{ url('/homeEnquiry/adddashboardEnquiry') }}" accept-charset="UTF-8" autocomplete="off">
												{{ csrf_field() }}
												<br>
												<div class="row">
													<div class="form-group">
														<label for="" class="control-label col-md-2">Consignment No&nbsp;&nbsp;</label>
														<div class="form-group col-md-2">
															<input type="text" class="form-control" id="consignment_no" name="consignment_no" value="{{$cnId }}" style="box-shadow: 1px 1px 5px 3px violet" readonly>
														</div>
														<label for="" class="control-label col-md-2">Enquiry No&nbsp;&nbsp;</label>
														<div class="form-group col-md-2">
															<input type="text" class="form-control" id="enquiry_no" name="enquiry_no" value="{{ $enqId+1 }}" readonly >
														</div>
														<label class="control-label col-md-1" for="">Date <span class="spancolor">*</span></label>
														{{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
															{{--<input type="text" class="form-control" style="position: unset!important;" placeholder="Select Enquiry Date..." name="enq_date" type="text" id="enq_date"  value="{{ date('d-m-Y') }}">--}}
															{{--<div class="input-group-addon">--}}
																{{--<span class="glyphicon glyphicon-th"></span>--}}
															{{--</div>--}}
														{{--</div>--}}
														<div class="form-group col-md-3" >
															<div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
																<input type="text" class="form-control" name="enq_date" value="{{ date('d-m-Y')  }}" style="position: unset!important;" placeholder="Select Follow Up Date..." readonly>
															</div>
														</div>

													</div>
													<div class="form-group">
														<label class="control-label col-md-2">Goods Types <span class="spancolor">*</span></label>
														<div class="form-group col-md-2">
															<select class="form-control {{ ($errors->has('good_types'))?'errorBox':'' }}" name="good_types" id="good_types">
																<option value="">Good Types </option>
																@foreach($goodsRS as $goodsData)
																	<option value="{{$goodsData->goods_type}}" {{ (old('good_types') == $goodsData->goods_type)?"selected":"" }}>{{$goodsData->goods_type}}</option>
																@endforeach
															</select>
														</div>

														<label class="control-label col-md-2">Lead Source <span class="spancolor">*</span></label>
														<div class="form-group col-md-2">
															<select class="form-control" name="reference" id="reference" >
																<option value="">Lead Source </option>
																@foreach($sourceRS as $sourceData)
																	<option value="{{$sourceData->lead_source}}" {{ (old('reference') == $sourceData->lead_source)?"selected":"" }}>{{$sourceData->lead_source}}</option>
																@endforeach
															</select>
														</div>

														<label class="control-label col-md-2">Lead Status <span class="spancolor">*</span></label>
														<div class="form-group col-md-2">
															<select class="form-control" name="reference_status" id="reference_status" >
																<option value="">Lead Status </option>
																@foreach($statusRS as $statusData)
																	<option value="{{$statusData->lead_status}}" {{ ('Just Open' == $statusData->lead_status)?"selected":"" }}>{{$statusData->lead_status}}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div id="ref_name_div" style="display:none;">
														<div class="form-group">
															<label class="control-label col-md-2" for="">Reference Name </label>
															<div class="form-group col-md-4">
																<input type="text" class="form-control {{ ($errors->has('reference_name'))?'errorBox':'' }}" id="reference_name" name="reference_name" placeholder="Enter Reference Name" value="{{ old('reference_name') }}">
															</div>

															<label class="control-label col-md-2" for="">Reference Number </label>
															<div class="form-group col-md-4">
																<input type="text" class="form-control {{ ($errors->has('reference_number'))?'errorBox':'' }}" id="reference_number" name="reference_number" placeholder="Enter Reference Number" value="{{ old('reference_number') }}">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-2" for="">Customer Name <span class="spancolor">*</span></label>
														<div class="form-group col-md-4">
															<input type="text" class="form-control {{ ($errors->has('cust_name'))?'errorBox':'' }}" id="cust_name" name="cust_name" placeholder="Enter Customer Name" value="{{ old('cust_name') }}">
														</div>

														<label class="control-label col-md-2">Customer Email <span class="spancolor">*</span></label>
														<div class="form-group col-md-4">
															<input type="email" class="form-control {{ ($errors->has('cust_email'))?'errorBox':'' }}" id="cust_email" name="cust_email" placeholder="Enter Customer Email" value="{{ old('cust_email') }}">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-2" for="">Contact No <span class="spancolor">*</span></label>
														<div class="form-group col-md-4">
															<input type="number" class="form-control {{ ($errors->has('cust_contact'))?'errorBox':'' }}" id="cust_contact" maxlength="10" minlength="10" name="cust_contact" placeholder="Enter Contact No" value="{{ old('cust_contact') }}" >
														</div>
														<label class="control-label col-md-2"> Alternate No  </label>
														<div class="form-group col-md-4">
															<input type="number" class="form-control {{ ($errors->has('cust_alternate_no'))?'errorBox':'' }}" id="cust_alternate_no" maxlength="10" minlength="10" name="cust_alternate_no" placeholder="Enter  Alternate No">
														</div>

													</div>
													<div class="form-group">
														{{--<label class="control-label col-md-2" for="">Source <span class="spancolor">*</span></label>--}}
														{{--<div class="form-group col-md-4">--}}
															{{--<input type="text" class="form-control {{ ($errors->has('source'))?'errorBox':'' }}" id="source" name="source" placeholder="Enter Source"  value="{{ old('source') }}" onkeyup="activatePlacesSearch()">--}}
														{{--</div>--}}
														{{--<label class="control-label col-md-2">Destination <span class="spancolor">*</span></label>--}}
														{{--<div class="form-group col-md-4">--}}
															{{--<input type="text" class="form-control {{ ($errors->has('destination'))?'errorBox':'' }}" id="destination" name="destination" placeholder="Enter Destination" value="{{ old('destination') }}"  onkeyup="activatePlacesSearchDest()">--}}
														{{--</div>--}}

														<label class="control-label col-md-2" for="">Origin <span class="spancolor">*</span></label>
														<div class="form-group col-md-4">
															<input type="text" class="form-control {{ ($errors->has('source'))?'errorBox':'' }}" id="source" name="source"   placeholder="Enter Origin"  value="{{ old('source') }}">
															{{--<input id="origin" name="source" required="" type="hidden" />--}}
														</div>
														<label class="control-label col-md-2">Destination <span class="spancolor">*</span></label>
														<div class="form-group col-md-4">
															<input type="text" class="form-control {{ ($errors->has('destination'))?'errorBox':'' }}" id="destination" name="destination" placeholder="Enter Destination" value="{{ old('destination') }}">
															{{--<input id="destination" name="destination" required="" type="hidden" />--}}
														</div>
														<input type="hidden" name="in_kilo" id="in_kilo">
													</div>
													<div class="form-group">
														<label class="control-label col-md-2" for="">Expected Shifting Date <span class="spancolor">*</span></label>
														{{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
														{{--<input type="text" class="form-control {{ ($errors->has('exp_shifting_date'))?'errorBox':'' }}" style="position: unset!important;" placeholder="Select Shifting Date..." name="exp_shifting_date" type="text" id="exp_shifting_date"value="{{ old('exp_shifting_date') }}" >--}}
														{{--<div class="input-group-addon">--}}
														{{--<span class="glyphicon glyphicon-th"></span>--}}
														{{--</div>--}}
														{{--</div>--}}
														<div class="form-group col-md-4" >
															<div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
																<input type="text" class="form-control {{ ($errors->has('exp_shifting_date'))?'errorBox':'' }}" style="position: unset!important;" name="exp_shifting_date" id="exp_shifting_date" value="{{ old('exp_shifting_date') }}" placeholder="Select Shifting Date..." data-plugin="datepicker" data-date-today-highlight= "true">
															</div>
														</div>

														<label class="control-label col-md-2" for="">Follow Up Date&nbsp;&nbsp;</label>
														{{--<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">--}}
															{{--<input type="text" class="form-control" style="position: unset!important;" placeholder="Select Follow Up Date..." name="follow_up_date" type="text" id="follow_up_date" value="{{ old('follow_up_date') }}" >--}}
															{{--<div class="input-group-addon">--}}
																{{--<span class="glyphicon glyphicon-th"></span>--}}
															{{--</div>--}}
														{{--</div>--}}
														<div class="form-group col-md-4" >
															<div class="input-group">
																<span class="input-group-addon">
																  <i class="icon wb-calendar" aria-hidden="true"></i>
																</span>
																<input type="text" class="form-control" style="position: unset!important;" name="follow_up_date" value="{{ old('follow_up_date') }}" placeholder="Select Follow Up Date..." data-plugin="datepicker" data-date-today-highlight= "true">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="" class="control-label col-md-2">Conversation&nbsp;&nbsp;</label>
														<div class="form-group col-md-4">
															<textarea class="form-control" id="follow_up_convr" name="follow_up_convr" row="3" >{{ old('follow_up_convr') }}</textarea>
														</div>
													</div>
												</div>
												<br>
												<div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
													<div class="form-group col-md-4">
													</div>
													<div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
														<p>
															@if ($errors->has('good_types'))
																<span class="help-block">
                                								<label style="color:red">{{ $errors->first('good_types') }}</label>
                                							</span>
															@endif
														</p>
														<p>
															@if ($errors->has('reference'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('reference') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('reference_status'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('reference_status') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('cust_name'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_name') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('cust_email'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_email') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('cust_contact'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('cust_contact') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('cust_alternate_no'))
																<span class="help-block">
																<label style="color:red">{{ $errors->first('cust_alternate_no') }}</label>
															</span>
															@endif
														</p>
														<p>
															@if ($errors->has('source'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('source') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('destination'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('destination') }}</label>
																</span>
															@endif
														</p>
														<p>
															@if ($errors->has('destination'))
																<span class="help-block">
																	<label style="color:red">{{ $errors->first('exp_shifting_date') }}</label>
																</span>
															@endif
														</p>
														
													</div>
													<div class="form-group col-md-4"></div>
												</div>
												<div class="form-group col-sm-7 pull-right">
													<button type="submit" class="btn btn-primary">
														<i class="fa fa-save"></i> Save
														<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								@else
									<div class="tab-pane active" id="tab_default_2">
										<div class="row" style="transform: none;">
											<div class="col-md-12">
												<form method="POST" role="form" action="{{ url('/homeEnquiry/addFollowup') }}" accept-charset="UTF-8" autocomplete="off">
													{{ csrf_field() }}
													<br>
													<div class="row">
														<div class="form-group col-md-6" >
															<div class="form-group">
																<label for="" class="control-label col-md-3">CN No</label>
																<div class="form-group col-md-8">
																	<input type="text" class="form-control" id="followup_cn_no" name="followup_cn_no" placeholder="Enter Consignment No and enter Tab" style="box-shadow: 1px 1px 5px 3px violet" value="{{$cn_noData->cn_no}}" required>
																	<input type="hidden" name="enquiry_id" id="enquiry_id">
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3">Customer Name</label>
																<div class="form-group col-md-8">
																	<input class="form-control" id="cust_name_fup" name="cust_name" placeholder="Customer Name" value="{{$cn_noData->cust_name}}" readonly>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3">Contact No</label>
																<div class="form-group col-md-8">
																	<input class="form-control" id="cust_con_no" name="cust_con_no" placeholder="Contact Number" value="{{$cn_noData->cust_contact}}" readonly>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3" for="">Date</label>
																<div class="form-group input-group date col-md-1" data-provide="datepicker" style="padding-left: 15px;width: 330px;">
																	<input type="text" class="form-control" placeholder="Select Follow up date..." name="followup_date" type="text" id="followup_date" value="{{ date('d-m-Y') }}"required>
																	<div class="input-group-addon">
																		<span class="glyphicon glyphicon-th"></span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3">Conversation</label>
																<div class="form-group col-md-8">
																	<textarea class="form-control" id="conversation" name="conversation" placeholder="Enter Conversation" style="height: 100px;"required></textarea>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3">Rating</label>
																<div class="form-group col-md-8" style="margin-top:0px">
																	<span class="fa fa-star fontClass" id="star1" onclick="add(this,1)"></span>
																	<span class="fa fa-star fontClass" id="star2" onclick="add(this,2)"></span>
																	<span class="fa fa-star fontClass" id="star3" onclick="add(this,3)"></span>
																	<span class="fa fa-star fontClass" id="star4" onclick="add(this,4)"></span>
																	<span class="fa fa-star fontClass" id="star5" onclick="add(this,5)"></span>
																</div>
																<input type="hidden" name="rating" id="rating">
															</div>
														</div>
														<div class="form-group col-md-6">
															<table id="followupTable" class="table table-striped table-bordered no-wrap" style="width:100%">
																<thead>
																<tr>
																	<th width="20%">Date</th>
																	<th width="60%">Conversation</th>
																	<th width="20%">Rating</th>
																</tr>
																</thead>
																<tbody id="followupTableBody">
																	@if(!empty($followupRs))
																		@foreach($followupRs as $followup)
																			<tr>
																				<td>{{date("d-m-Y",strtotime($followup->followup_date))}}</td>
																				<td>{{$followup->conversation}}</td>
																				<td>
																					<?php
                                                                                    if($followup->rating!=0) {
                                                                                        for ($i = 1; $i <= $followup->rating; $i++) {
                                                                                            echo '<span class="fa fa-star checkedStar"></span>';
                                                                                        }
                                                                                        for ($i = $followup->rating; $i < 5; $i++) {
                                                                                            echo '<span class="fa fa-star"></span>';
                                                                                        }
                                                                                    }
																					?>
																				</td>
																			</tr>
																		@endforeach
																	@endif
																</tbody>
															</table>
														</div>
													</div>
													<br>
													<div style="{{ (!$errors->isEmpty())?'display:block':'display:none'}}">
														<div class="form-group col-md-4">
														</div>
														<div class="form-group col-md-4" align="center" style="background-color: #f2dede;border:1px solid #a94442; border-radius: 20px">
														</div>
														<div class="form-group col-md-4"></div>
													</div>
													<div class="form-group col-sm-7 pull-right">
														<button type="submit" ng-disabled="userForm.$invalid" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left">
															<i class="fa fa-save"></i> Save
															<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								@endif
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
//    $(function() {
//        // add input listeners
//        google.maps.event.addDomListener(window, 'load', function () {
//            var from_places = new google.maps.places.Autocomplete(document.getElementById('source'));
//            var to_places = new google.maps.places.Autocomplete(document.getElementById('destination'));
//            google.maps.event.addListener(from_places, 'place_changed', function () {
//                var from_place = from_places.getPlace();
//                var from_address = from_place.formatted_address;
//                $('#source').val(from_address);
//            });
//            google.maps.event.addListener(to_places, 'place_changed', function () {
//                var to_place = to_places.getPlace();
//                var to_address = to_place.formatted_address;
//                $('#destination').val(to_address);
//            });
//        });
//        // calculate distance
//        function calculateDistance() {
//            var origin = $('#source').val();
//            var destination = $('#destination').val();
//            var service = new google.maps.DistanceMatrixService();
//            service.getDistanceMatrix(
//                {
//                    origins: [origin],
//                    destinations: [destination],
//                    travelMode: google.maps.TravelMode.DRIVING,
//                    unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
//                    // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
//                    avoidHighways: false,
//                    avoidTolls: false
//                }, callback);
//        }
//        // get distance results
//        function callback(response, status) {
//            if (status != google.maps.DistanceMatrixStatus.OK) {
////                $('#result').html(err);
//            } else {
//                var origin = response.originAddresses[0];
//                var destination = response.destinationAddresses[0];
//                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
////                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
//                } else {
//                    var distance = response.rows[0].elements[0].distance;
//                    var duration = response.rows[0].elements[0].duration;
//                    console.log(response.rows[0].elements[0].distance);
//                    var distance_in_kilo = distance.value / 1000; // the kilom
//                    var distance_in_mile = distance.value / 1609.34; // the mile
//                    var duration_text = duration.text;
//                    var duration_value = duration.value;
//                    $('#in_kilo').val(distance_in_kilo.toFixed(2));
//
//                }
//            }
//        }
//        // print results on submit the form
//        $('#destination').on('blur',function(){
////            e.preventDefault();
//            calculateDistance();
//        });
//
//    });

</script>
{{--<script>--}}
	{{--function activatePlacesSearch(){--}}
		{{--var input = document.getElementById("source");--}}
		{{--var autocomplete = new google.maps.places.Autocomplete(input);--}}
	{{--}--}}
{{--</script>--}}
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFVXZqTyVzzubHEY0rldHnncxXsQeTGPg&libraries=places&callback=activatePlacesSearch"></script>--}}
{{--<script>--}}
    {{--function activatePlacesSearchDest(){--}}
        {{--var input = document.getElementById("destination");--}}
        {{--var autocomplete = new google.maps.places.Autocomplete(input);--}}
    {{--}--}}
{{--</script>--}}
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFVXZqTyVzzubHEY0rldHnncxXsQeTGPg&libraries=places&callback=activatePlacesSearchDest"></script>--}}
<script>
    function add(ths,sno){
        for (var i=1;i<=5;i++){
            var cur=document.getElementById("star"+i)
            cur.className="fa fa-star fontClass"
        }

        for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
            if(cur.className=="fa fa-star fontClass")
            {
                cur.className="fa fa-star fontClass checkedStar"
            }
        }

        $("#rating").val(sno);

    }
$(document).ready(function() {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    $('#reference').on('change',function(){
        if($('#reference').val()=="referance"){
            $('#ref_name_div').show();
		}else{
            $('#ref_name_div').hide();
        }

	});
    var followup = null;
    $('#good_types').focus();
    $.fn.datepicker.defaults.format = "dd-mm-yyyy";
	$('.datepicker').datepicker({
        todayHighlight: true,
        minDate: 0,
        startDate: new Date(),
    });

    
    $('#example22').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
		order: [],
        columnDefs: [ { orderable: false}]
    } );

    $("#addEnquiry").validate({
        rules: {
            // simple rule, converted to {required:true}
            cust_name: "required",
            // compound rule
            cust_email: {
                required: true,
                email: true
            }
        }
    });


//    var followup = $('#followupTable').DataTable( {
//        dom: 'Bfrtip',
//        searching: false,
//        paging: false,
//        info: false,
//        columns: [
//            {title: "CN No"},
//            {title: "Date"},
//            {title: "Conversation"}
//        ]
//    } );

    $('#followup_cn_no').keydown(function(e){
        var base_url= basePath();
        if(e.keyCode == 13) {
            var cnno = $('#followup_cn_no').val();
            var flagVar = 0;
            if (cnno != "") {
                $.ajax({
                    url: base_url+'getFollowupId/{id}',
                    type: 'GET',
                    data: {cn_no: cnno},
                    success: function (response) {
                        var obj = JSON.parse(response);
                        $('#cust_name_fup').val(obj.cust_name);
                        if(obj.cust_alt_contact == null){
                        $('#cust_con_no').val(obj.cust_contact);
                        }else{
                           $('#cust_con_no').val(obj.cust_contact+","+obj.cust_alt_contact); 
                        }
                        $('#enquiry_id').val(obj.enq_id);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Enter Correct Consignment No");
                    }

                });
                $.ajax({
                    url: base_url+'getFollowupData/{id}',
                    type: 'GET',
                    data: {cn_no: cnno},
                    success: function (response) {
                        document.getElementById("followupTableBody").innerHTML = response;

                    }
                });
            }
        }
	});
    
});

    function calKilometer(){
        function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
            var R = 6371; // Radius of the earth in km
            var dLat = deg2rad(lat2-lat1);  // deg2rad below
            var dLon = deg2rad(lon2-lon1);
            var a =
                Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon/2) * Math.sin(dLon/2)
            ;
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            var d = R * c; // Distance in km
            alert(d);
        }

        function deg2rad(deg) {
            return deg * (Math.PI/180)
        }

        var lat1=18.53;
		var	lon1=73.84;
		var lat2=20.56;
		var lon2=74.52;
        getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2)
	}
	
</script>
@stop