@extends('admin.common.app')
@section('breadcrumbs')
<li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.blog.index')}}">Blogs</a></li>
<li class="breadcrumb-item active" aria-current="page">Add/Edit Blog</li>
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
					Blog
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="@if(isset($blog)) {{route('admin.blog.update', $blog)}} @else {{route('admin.blog.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">

		{{ csrf_field() }}
		@if(isset($blog))
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
			<div class="form-group m-form__group row">
				
			
			<div class="row">
					<div class="col-md-8">
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">
								Title:
							</label>
							<div class="col-lg-10">
								<input type="text" class="form-control m-input" id="txturl"
								name="title" placeholder="Enter Title" value="{{@$blog->title}}">
								<span class="m-form__help">
									Please enter blog title  <span style="float:right; margin-left: 20px;"> <p class="small" >{{config('app.url')}}/<span id="url"></span></p></span>
									<input type="hidden" name="slug" id="slug" value="{{@$blog->slug}}">  
								</span>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Description:
							</label>
							<div class="col-lg-10">
								<textarea name="description" class="summernote">{!! @$blog->description !!}</textarea>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Meta Description:
							</label>
							<div class="input-group col-lg-10">
								<input type="text" class="form-control" name="meta_description" value="{{@$blog->meta_description}}">
								
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Keywords:
							</label>
							<div class="input-group col-lg-10">
								<input type="text" class="form-control" name="keyword" value="{{@$blog->keyword}}">
								
							</div>
						</div>

					</div>





					<div class="col-md-2 col-lg-2">
					<ul class="list-group row">
						<li class="list-group-item active"><h5>Status</h5></li>
						<li class="list-group-item">
							<div class="form-group row">
								<select class="form-control" id="status" name="status">
									<option value="0" @if(isset($blog) && $blog->status == 0) {{'selected'}} @endif >Pending</option>
									<option value="1" @if(isset($blog) && $blog->status == 1) {{'selected'}} @endif>Publish</option>
								</select>
							</div>
							<div class="form-group row">
								<div class="col-lg-12">
									@if(isset($blog))
									<input type="submit" name="submit" class="btn btn-primary btn-block " value="Update Blog" />
									@else
									<input type="submit" name="submit" class="btn btn-primary btn-block " value="Add Blog" />
									@endif
								</div>

							</div>
						</li>
						<li class="list-group-item active"><h5>Feaured Image</h5></li>
						<li class="list-group-item">

							<div class="form-group">								
								<label class="custom-file">
									<input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
									<span class="custom-file-control"></span>
								</label>
							</div>

							<div class="text-center">
								<img src="@if(isset($blog)) {{asset($blog->thumbnail)}} @else {{asset('blog_img/no-thumbnail.jpeg')}} @endif" id="imgthumbnail" class="img-thumbnail" alt="">
							</div>
						</li>

						


						<li class="list-group-item">
							<div class="input-group m-form__group">
								<span class="input-group-addon">
									<label class="m-checkbox m-checkbox--single">
										<input id="featured" type="checkbox" name="featured" value="@if(isset($blog)){{@$blog->featured}}@else{{0}}@endif" @if(isset($blog) && $blog->featured == 1) {{'checked'}} @endif />
										<span></span>
									</label>
								</span>
								<p type="text" class="form-control pull-right" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured blog</p>
								
							</div>
							
						</li>
						
						</ul>
					</div>
					<div class="col-md-2"></div>
					
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

    	$('#thumbnail').on('change', function() {
			var file = $(this).get(0).files;
			var reader = new FileReader();
			reader.readAsDataURL(file[0]);
			reader.addEventListener("load", function(e) {
				var image = e.target.result;
				$("#imgthumbnail").attr('src', image);
			});
		});

		$('#featured').on('change', function(){
			if($(this).is(":checked"))
				$(this).val(1)
			else
				$(this).val(0)
		});

		
	    

    })
</script>
@endsection
