@extends('admin.common.app')
@section('breadcrumbs')
<li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Products</a></li>
<li class="breadcrumb-item active" aria-current="page">Add/Edit Product</li>
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
					Product
				</h3>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="@if(isset($product)) {{route('admin.product.update', $product)}} @else {{route('admin.product.store')}} @endif" method="post" accept-charset="utf-8" enctype="multipart/form-data">

		{{ csrf_field() }}
		@if(isset($product))
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
								name="title" placeholder="Enter Title" value="{{@$product->title}}">
								<span class="m-form__help">
									Please enter product title  <span style="float:right; margin-left: 20px;"> <p class="small" >{{config('app.url')}}/<span id="url"></span></p></span>
									<input type="hidden" name="slug" id="slug" value="{{@$product->slug}}">  
								</span>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Description:
							</label>
							<div class="col-lg-10">
								<textarea name="description" class="summernote">{!! @$product->description !!}</textarea>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Price:
							</label>
							<div class="input-group col-lg-10">
								<span class="input-group-addon">$</span>
								<input type="text" class="form-control" name="price" value="{{@$product->price}}"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
								<span class="input-group-addon">.00</span>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Discount:
							</label>
							<div class="input-group col-lg-10">
								<span class="input-group-addon">%</span>
								<input type="text" class="form-control" name="discount" value="{{@$product->discount}}">
								
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-form-label col-lg-2 col-sm-12">
								Quantity:
							</label>
							<div class="input-group col-lg-10">
								<span class="input-group-addon">num</span>
								<input type="number" class="form-control" name="quantity" value="{{@$product->quantity}}">
								
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-3 col-form-label">
								Season:
							</label>
							<div class="col-lg-12 col-xl-8">
								<div class="m-checkbox-inline m--padding-top-3">
									<label class="m-checkbox">
									<input type="checkbox" name="season[]" value="Baisakh" class="checkbox" @if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Baisakh') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 @endif>
										Baisakh
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Jeth" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Jeth') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif>
										Jeth
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Ashadh" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Ashadh') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif>
										Ashadh
										<span></span>
									</label>

									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Srawan" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Srawan') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif>
										Srawan
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Bhadra" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Bhadra') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Bhadra
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Asoj" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Asoj') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif 
									 	>
										Asoj
										<span></span>
									</label>

									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Kartik" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Kartik') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Kartik
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Mansir" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Mansir') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Mansir
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Poush" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Poush') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Poush
										<span></span>
									</label>

									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Magh" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Magh') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Magh
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Falgun" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Falgun') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Falgun
										<span></span>
									</label>
									<label class="m-checkbox">
										<input type="checkbox" name="season[]" value="Chaitra" class="checkbox" 
										@if(isset($product))
										 @foreach(explode(',',$product->season) as $row) 
											 @if($row=='Chaitra') 
											 {{"checked='checked'"}}
											 @endif 
										 @endforeach 
									 	@endif
									 	>
										Chaitra
										<span></span>
									</label>

									<label class="m-checkbox">
										<input type="checkbox" id="select_all">
										Select All
										<span></span>
									</label>
								</div>
							</div>
						</div>

					</div>





					<div class="col-md-2 col-lg-2">
					<ul class="list-group row">
						<li class="list-group-item active"><h5>Status</h5></li>
						<li class="list-group-item">
							<div class="form-group row">
								<select class="form-control" id="status" name="status">
									<option value="0" @if(isset($product) && $product->status == 0) {{'selected'}} @endif >Pending</option>
									<option value="1" @if(isset($product) && $product->status == 1) {{'selected'}} @endif>Publish</option>
								</select>
							</div>
							<div class="form-group row">
								<div class="col-lg-12">
									@if(isset($product))
									<input type="submit" name="submit" class="btn btn-primary btn-block " value="Update Product" />
									@else
									<input type="submit" name="submit" class="btn btn-primary btn-block " value="Add Product" />
									@endif
								</div>

							</div>
						</li>
						<li class="list-group-item active"><h5>Feaured Image</h5></li>
						<li class="list-group-item">

							<div class="form-group">								
								<label class="custom-file">
									<input type="file"  class="custom-file-input" name="thumbnail" id="thumbnail" >
									<span class="custom-file-control"></span>
								</label>
							</div>

							<div class="text-center">
								<img src="@if(isset($product)) {{asset($product->thumbnail)}} @else {{asset('product_img/no-thumbnail.jpeg')}} @endif" id="imgthumbnail" class="img-thumbnail" alt="">
							</div>
						</li>

						


						<li class="list-group-item">
							<div class="input-group m-form__group">
								<span class="input-group-addon">
									<label class="m-checkbox m-checkbox--single">
										<input id="featured" type="checkbox" name="featured" value="@if(isset($product)){{@$product->featured}}@else{{0}}@endif" @if(isset($product) && $product->featured == 1) {{'checked'}} @endif />
										<span></span>
									</label>
								</span>
								<p type="text" class="form-control pull-right" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured Product</p>
								
							</div>
							
						</li>
						@php
						$ids = (isset($product) && $product->categories->count() > 0 ) ? array_pluck($product->categories->toArray(), 'id') : null;
						@endphp
						<li class="list-group-item active"><h5>Select Categories</h5></li>
						<li class="list-group-item ">
							<select class="form-control select2" name="category_id[]" id="category_id" multiple="multiple"
								style="width: 100%;">
								@if(isset($categories))
								<option value="0">Top Level</option>
								@foreach($categories as $cat)
								<option style="color:#000;" value="{{$cat->id}}" @if(!is_null($ids) && in_array($cat->id, $ids)) {{'selected'}} @endif>{{$cat->title}}</option>
								@endforeach
								@endif
								
							</select>
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

    	$('#thumbnail').on('change', function() {
			var file = $(this).get(0).files;
			var reader = new FileReader();
			reader.readAsDataURL(file[0]);
			reader.addEventListener("load", function(e) {
				var image = e.target.result;
				$("#imgthumbnail").attr('src', image);
			});
		});


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

    	

		$('#featured').on('change', function(){
			if($(this).is(":checked"))
				$(this).val(1)
			else
				$(this).val(0)
		});

		$('#category_id').select2({
		    placeholder: "Select a Parent Category",
		    allowClear: true,
		    minimumResultsForSearch: Infinity
		  });


		$('#select_all').on('click',function(){
	        if(this.checked){
	            $('.checkbox').each(function(){
	                this.checked = true;
	            });
	        }else{
	             $('.checkbox').each(function(){
	                this.checked = false;
	            });
	        }
	    });
	    
	    $('.checkbox').on('click',function(){
	        if($('.checkbox:checked').length == $('.checkbox').length){
	            $('#select_all').prop('checked',true);
	        }else{
	            $('#select_all').prop('checked',false);
	        }
	    });


	    $('input[name="price"]').keyup(function(e)
		                                {
		  if (/\D/g.test(this.value))
		  {
		    // Filter non-digits from input value.
		    this.value = this.value.replace(/\D/g, '');
		  }
		});

    })
</script>
@endsection
