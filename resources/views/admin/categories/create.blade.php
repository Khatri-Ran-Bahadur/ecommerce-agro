@extends('admin.common.app')
@section('breadcrumbs')
   <li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
  	<li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categories</a></li>
  	<li class="breadcrumb-item active" aria-current="page">Add/Edit Category</li>
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
					Category
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	 <!-- action="@if(isset($category)) {{route('admin.category.update', $category)}} @else {{route('admin.category.store')}} @endif -->
	<form class="m-form" id="categoryForm" action="@if(isset($category)) {{route('admin.category.update', $category)}} @else {{route('admin.category.store')}} @endif" method="post" accept-charset="utf-8">

		{{ csrf_field() }}
		@if(isset($category))
			{{method_field('PUT')}}
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
							name="title" placeholder="Enter Title" value="{{@$category->title}}">
						<span class="m-form__help">
							Please enter category title  <span style="float:right; margin-left: 20px;"> <p class="small" >{{config('app.url')}}/<span id="url"></span></p></span>
							<input type="hidden" name="slug" id="slug" value="{{@$category->slug}}">  
						</span>
					</div>
				</div>
				

				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">
						Description:
					</label>
					<div class="col-lg-6">
						<textarea name="description" id="description" class="summernote form-control m-input" rows="5">{!! @$category->description !!}</textarea>
					</div>
				</div>


				<div class="form-group m-form__group row">
					<label class="col-lg-3 col-form-label">
						Select Parent:
					</label>
					<div class="col-lg-6">
						@php 
						$ids = (isset($category->parents) && $category->parents->count() > 0 ) ? array_pluck($category->parents, 'id') : null
						@endphp
						<label>Select Category:</label>
						<select class="form-control select2" name="parent_id[]" id="parent_id" multiple="multiple"
						style="width: 100%;">
						@if(isset($categories))
						<option value="0">Top Level</option>
						@foreach($categories as $cat)
						<option style="color:#000;" value="{{$cat->id}}" @if(!is_null($ids) && in_array($cat->id, $ids)) {{'selected'}} @endif>{{$cat->title}}</option>
						@endforeach
						@endif
						option
						</select>
					</div>
				</div>
				
			</div>
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions">
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						@if(isset($category))
						<input type="submit" name="submit" id="updateCategory" class="btn btn-primary" value="Update Category" />
						@else
						<input type="submit" name="submit" id="addCategory" class="btn btn-primary" value="Add Category" />
						@endif
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

@section('scripts')
<script>

  $(function(){

   $("#txturl").keyup(function () {
	    var str = $(this).val();
	    str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	    str.replace(/^\s+|\s+$/gm,'');
	    var slug=str.replace(/\s+/g, '-');
	    var trimmed=$.trim(str)
	    var check =slug.toLowerCase();
	    $('#url').html(slug.toLowerCase());
	    $("#slug").val(slug.toLowerCase());
	});

  $('#parent_id').select2({
    placeholder: "Select a Parent Category",
    allowClear: true,
    minimumResultsForSearch: Infinity
  });

  

})
</script>
@endsection
