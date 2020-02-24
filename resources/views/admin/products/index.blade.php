@extends('admin.common.app')
@section('breadcrumbs')
<li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Categories</li>
@endsection
@section('content')

<div class="row d-block">
	<div class="col-sm-12">
		@if (session()->has('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
		@endif
	</div>
</div>



<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Product Lists
				</h3>
			</div>
		</div>
		
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right  m--margin-bottom-30">
			<div class="row align-items-center">
				
				<div class="col-xl-12 order-1 order-xl-12 m--align-right">
					<a href="{{route('admin.product.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus"></i>
							<span>
								New Product
							</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--end: Search Form -->
		<!--begin: Datatable -->
		<div class="m_datatable">
			<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				<thead>
					<tr role="row">
						<th>#</th>
		                <th>Title</th>
		                <th>Description</th>
		                <th>Categories</th>
		                <th>Price</th>
		                <th>Quantity</th>
		                <th>Discount</th>
		                <th>Thumbnail</th>
		                <th>Season</th>
		                <th>Date Created</th>
		                <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if($products->count() > 0)
              @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->title}}</td>
                <td>{!! str_limit($product->description, $limit = 50, $end = '...') !!}</td>
                <td>
                  @if($product->categories()->count() > 0)
                  @foreach($product->categories as $children)
                  {{$children->title}},
                  @endforeach
                  @else
                  <strong>{{"product"}}</strong>
                  @endif
                </td>
                <td>${{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->discount}}%</td>
                <td><img src="{{asset($product->thumbnail)}}" alt="{{$product->title}}" class="img-thumbnail" style="height: 100px; width: 100px" /></td>
                @if($product->trashed())
                <td>{{$product->deleted_at}}</td>
                <td><a class="btn btn-info btn-sm" href="{{route('admin.product.recover',$product->id)}}">Restore</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$product->id}}')">Delete</a>
                  <form id="delete-product-{{$product->id}}" action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: none;">

                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                  </form>
                </td>
                @else
                <td>@foreach(explode(',',$product->season) as $row) @if($row=='Baisakh') {{$row}} @endif @endforeach</td>
                <td>{{$product->created_at}}</td>

                <td data-field="Actions" class="m-datatable__cell">
					<span style="overflow: visible; width: 110px;">					
					<div class="dropdown ">							
						<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
							<i class="la la-ellipsis-h"></i>   
						</a>						  	
						<div class="dropdown-menu dropdown-menu-right">	
							<a class="dropdown-item" href="{{route('admin.product.edit',$product->slug)}}">
							<i class="la la-edit"></i> Edit</a>

							<a id="trash-product-{{$product->id}}" class="dropdown-item" href="{{route('admin.product.remove',$product->slug)}}"><i class="la la-leaf"></i>Tash</a>

							<a class="dropdown-item" href="javascript:;" onclick="confirmDelete('{{$product->id}}')" > <i class="la la-trash" style="color:red;"></i> Delete </a>
                  <form id="delete-product-{{$product->id}}" action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display: none;">

                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                  </form>	
						</div>
						</div>

						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View " data-toggle="modal" data-target="#m_modal_{{$product->id}}">                            <i class="la la-edit"></i>        
						</a>											
						   					
					</span>
				</td>

                @endif
              </tr>


         <div class="modal fade" id="m_modal_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none; ">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style="color: #000;">
							Product Details
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								×
							</span>
						</button>
					</div>
					<div class="modal-body">

											  
					<div class="accordion" id="accordionExample">
					  <div class="card">
					  	<img src="{{asset($product->thumbnail)}}" height="300px" class="card-img-top" alt="{{$product->title}}">
					    <div class="card-header bg-dark text-white" id="headingOne">
					      <h5 class="mb-0">			       
							 <span >Product Name: <span style="color:yellow;">{{$product->title}}</span></span>
					         
					      </h5>
					    </div>

					    <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
					      <div class="card-body" style="background-color: #f2f2f2; color: #000;">
				       		<p style="color: #000;">Quantity: <span>{{$product->quantity}}</span> Price: <span>{{$product->price}}</span></p>

				       		<p style="color: #000;">Discount: <span>{{$product->discount}}</

				       		<p style="color: #000; margin-left: 30%;"  >Season: <span> {{$product->season}} </span></p>
				       		<p style="color: #000;">Discription: <span> Rs. {!! $product->description !!} </span></p>
					      </div>
					      
					    </div>
					  </div>
				</div>



              @endforeach
              @else
              <tr>
                <td colspan="11" class="alert alert-info">No products Found..</td>
              </tr>
              @endif
				</tbody>

			</table>			
		</div>
		<!--end: Datatable -->
		<div class="row">
				<div class="col-md-12">
					 {{$products->links()}}
				</div>
			</div>
	</div>
</div>



@endsection

@section('scripts')
<script type="text/javascript">
  function confirmDelete(id){
    let choice = confirm("Are You sure, You want to Delete this Product ?")
    if(choice){
      document.getElementById('delete-product-'+id).submit();
    }
  }

  
</script>
@endsection
