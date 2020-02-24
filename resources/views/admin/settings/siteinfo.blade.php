@extends('admin.common.app')
@section('breadcrumbs')
   <li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
  	<li class="breadcrumb-item"><a href="#">Site Information</a></li>
@endsection

@section('content')










<div class="m-portlet">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="la la-gear"></i>
				</span>
				<h3 class="m-portlet__head-text">
					Site Information
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<?php $siteinfo=App\Siteinfo::find(1); ?>
	<form  action="@if(isset($siteinfo)) {{route('admin.siteinfo.update',$siteinfo->id)}} @else {{route('admin.siteinfo.add')}} @endif" method="post" accept-charset="utf-8" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
		@csrf
		@if(isset($siteinfo))
			@method('PUT')
		@endif

		<div class="col-sm-12">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
		<div class="col-sm-12">
			@if (session()->has('message'))
			<div class="alert alert-success">
				{{session('message')}}
			</div>
			@endif
		</div>
		<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<label class="col-lg-1 col-form-label">
						Site Name:
					</label>
					<div class="col-lg-3">
						<input type="test" class="form-control m-input" name="name" placeholder="Full name" value="{{@$siteinfo->name}}">
					
					</div>
					<label class="col-lg-1 col-form-label">
						Email:
					</label>
					<div class="col-lg-3">
						<input type="email" name="email" class="form-control m-input" placeholder="Email" value="{{@$siteinfo->email}}">
						
					</div>
					<label class="col-lg-1 col-form-label">
						Phone:
					</label>
					<div class="col-lg-3">
						<input type="text" class="form-control m-input" name="phone" placeholder="Enter contact number" value="{{@$siteinfo->phone}}">
						
					</div>
				</div>
				<div class="form-group m-form__group row">
					
					<label class="col-lg-1 col-form-label">
						Address:
					</label>
					<div class="col-lg-3">
						<div class="m-input-icon m-input-icon--right">
							<input type="text" class="form-control m-input" name="address" placeholder="Enter your address" value="{{@$siteinfo->address}}">
							<span class="m-input-icon__icon m-input-icon__icon--right">
								<span>
									<i class="la la-map-marker"></i>
								</span>
							</span>
						</div>
						
					</div>
					<label class="col-lg-1 col-form-label">
						Website:
					</label>
					<div class="col-lg-3">
						<input type="text" class="form-control m-input" name="website_link" placeholder=" Enter website" value="{{@$siteinfo->website_link}}">
						
					</div>
					<label class="col-lg-1 col-form-label">
						Location:
					</label>
					<div class="col-lg-3">
						<input type="text" name="location" class="form-control m-input" placeholder="Select location" value="{{@$siteinfo->location}}">
						
					</div>
				</div>
				
			</div>
			<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-5"></div>
						<div class="col-lg-7">
							<button type="submit" class="btn btn-brand">
								Submit
							</button>
							<button type="reset" class="btn btn-secondary">
								Cancel
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	<!--end::Form-->
</div>










@endsection


