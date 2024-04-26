@extends('layouts.template')
@section('content')
 <!-- Stylesheets -->
<link rel="stylesheet" href="{{URL::assset('public/assets/examples/css/pages/profile.css')}}">
<div class="page-header">
  <h1 class="page-title font_lato">Customer Details</h1>
  <div class="page-header-actions">
	<ol class="breadcrumb">
		<li><a href="{{URL::to('/dashboard')}}">{{ trans('app.home')}}</a></li>
		<li><a href="{{URL::to('customers')}}">Customers</a></li>
		<li class="active">{{$customerdata->first_name}} {{$customerdata->last_name}}</li>
	</ol>
  </div>
</div>
<div class="page-content container-fluid page-profile">
  <div class="row">
	<div class="col-md-3">
	  <!-- Page Widget -->
	  <div class="widget widget-shadow text-center">
		<div class="widget-header">
		  <div class="widget-header-content">
			<a class="avatar avatar-lg" href="javascript:void(0)">
			@if(!empty($customerdata->image))
				<img class="img-responsive img-circle" src="{{URL::asset('public/uploads')}}/{{$customerdata->image}}" width="170" height="170"  />
			@else
				@if($customerdata->gender == 'Female')
					<img class="img-responsive img-circle" src="{{URL::asset('public/images/female.png')}}" width="170" height="170"  />	
				@else
				<img class="img-responsive img-circle" src="{{URL::asset('public/images/default.png')}}" width="170" height="170"  />
				@endif
			@endif
			</a>
			<h4 class="profile-user">{{$customerdata->first_name}} {{$customerdata->last_name}}</h4>
		             
			<div class="profile-social">
			   <a class="icon bd-google-plus" target="_blank" href="{{$customerdata->google}}"></a>
			  <a class="icon bd-facebook" target="_blank" href="{{$customerdata->facebook}}"></a>			 
			  <a class="icon bd-twitter" target="_blank" href="{{$customerdata->twitter}}"></a>
			  <a class="icon bd-dribbble" target="_blank" href="{{$customerdata->dribbble}}"></a>
			  <a class="icon bd-linkedin" target="_blank" href="{{$customerdata->linkedin}}"></a>
			 
			</div>
		  </div>
		</div>
		
	  </div>
	  <!-- End Page Widget -->
	</div>
	
	
	<div class="col-md-9">
	  <!-- Panel -->
	  <div class="panel">
		<div class="panel-body nav-tabs-animate nav-tabs-horizontal">
		<!------------------------start insert, update, delete message ---------------->
			<div class="col-lg-12">
			@if(session('msg_success'))
				<div class="alert dark alert-icon alert-success alert-dismissible alertDismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				  <i class="icon wb-check" aria-hidden="true"></i> 
				  {{session('msg_success')}}
				</div>
			@endif
			@if(session('msg_update'))
				<div class="alert dark alert-icon alert-info alert-dismissible alertDismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				  <i class="icon wb-check" aria-hidden="true"></i> 
				  {{session('msg_update')}}
				</div>
			@endif
			@if(session('msg_delete'))
				<div class="alert dark alert-icon alert-danger alert-dismissible alertDismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				  <i class="icon wb-check" aria-hidden="true"></i> 
				  {{session('msg_delete')}}
				</div>
			@endif
			</div>
			
				
		  <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">			
			<li role="presentation" class=""><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-expanded="false">{{ trans('app.profile')}}</a></li>
			
			<li class="dropdown" role="presentation" style="display: none;">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
				<span class="caret"></span>Menu </a>
			  <ul class="dropdown-menu" role="menu">				
				<li role="presentation" style="display: none;"><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab">{{ trans('app.profile')}}</a></li>
			  </ul>
			</li>
		  </ul>
		  <div class="tab-content">

<!------- Profile tab------------->
			<div class="tab-pane animation-slide-left active" id="profile" role="tabpanel">
			<table class="table table-hover table-details">
				<thead>
					<tr>
						<th rowspan="4">{{ trans('app.contact_informations')}}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ trans('app.email')}}</td>
						<td><a href="#">{{$customerdata->email}}</a></td>
					</tr>  
					<tr>
						<td>{{ trans('app.username')}}</td>
						<td><a href="#">{{$customerdata->username}}</a></td>
					</tr>                        
				 </tbody>
			</table>
			<p style="border-bottom:1px dashed green;"></p>

			<table class="table table-hover dataTable table-striped width-full dtr-inline">
				<thead>
				<tr>
					<th rowspan="4">{{ trans('app.additional_informations')}}</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>{{ trans('app.country')}}</td>
					<td>{{$customerdata->country}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.gender')}}</td>
					<td>{{$customerdata->gender}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.phone')}}</td>
					<td>{{$customerdata->phone}}</td>
				</tr>
				
				
				<tr>
					<td>{{ trans('app.date_of_birth')}}</td>
					<td>{{$customerdata->date_of_birth}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.status')}}</td>
					<td>{{$customerdata->status}}</td>
				</tr>
				<tr>
					<td>{{ trans('app.address')}}</td>
					<td>{{$customerdata->address}}</td>
				</tr>
				
				</tbody>
			</table>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- End Panel -->
	</div>
  </div>
</div>

<br/>
@stop