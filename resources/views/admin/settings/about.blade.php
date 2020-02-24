@extends('admin.common.app')
@section('breadcrumbs')
   <li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
  	<li class="breadcrumb-item"><a href="#">About</a></li>
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
					About
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<?php $about=App\About::find(1); ?>
	<form class="m-form"   action="@if(isset($about)) {{route('admin.about.update',$about->id)}} @else {{route('admin.about.add')}} @endif" method="post" accept-charset="utf-8">

		@csrf
		@if(isset($about))
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
			<div class="m-form__section m-form__section--first">
				<div class="form-group m-form__group row">
					<label class="col-lg-3 col-form-label">
						Title:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" id="txturl"
							name="title" placeholder="Enter Title" value="{{@$about->title}}">
					</div>
				</div>
				

				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">
						Description:
					</label>
					<div class="col-lg-6">
						<textarea name="description" class="summernote form-control m-input" rows="5">{!! @$about->description !!}</textarea>
					</div>
				</div>

				<div class="form-group m-form__group row">
					<label class="col-lg-3 col-form-label">
						Video Link:
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control m-input" 
							name="video_link" placeholder="Enter Title" value="{{@$about->video_link}}">
					</div>
				</div>

			

			</div>
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions">
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
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


