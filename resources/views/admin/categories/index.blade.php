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



<div class="m-portlet m-portlet--mobile" ng-controller="categoryManageCtrl">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Category Lists
				</h3>
			</div>
		</div>
		
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right  m--margin-bottom-30">
			<div class="row align-items-center">
				
				<div class="col-xl-12 order-1 order-xl-12 m--align-right">
					<a href="{{route('admin.category.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus"></i>
							<span>
								New Category
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
			<table id="categoryTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				<thead>
					<tr role="row">
						<th>#</th>
						<th>Title</th>
						<th >Description</th>
						<th>Slug</th>
						<th>Categories</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="categories">
					@if($categories->count()>0)						
					@foreach($categories as $category)
					
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->title}}</td>
						<td>{!! $category->description !!}</td>
						<td>{{$category->slug}}</td>
						<td>
							@if($category->childrens()->count() > 0)
							@foreach($category->childrens as $children)
							{{$children->title}},
							@endforeach
							@else
							<strong>{{"Parent Category"}}</strong>
							@endif
						</td>
						@if($category->trashed())
						<td><a class="btn btn-info btn-sm" href="{{route('admin.category.recover',$category->id)}}">Restore</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$category->id}}')">Delete</a>
							<form id="delete-category-{{$category->id}}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;">

								{{method_field('DELETE')}}
								{{ csrf_field() }}
							</form>
						</td>
						@else

						<td data-field="Actions" class="m-datatable__cell">
							<span style="overflow: visible; width: 110px;">					
							<div class="dropdown ">							
								<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
									<i class="la la-ellipsis-h"></i>   
								</a>						  	
								<div class="dropdown-menu dropdown-menu-right">					<a class="dropdown-item" href="{{route('admin.category.edit',$category->id)}}">
									<i class="la la-edit"></i> Edit</a>

									<a id="trash-category-{{$category->id}}" class="dropdown-item" href="{{route('admin.category.remove',$category->slug)}}"><i class="la la-trash" style="color: red;"></i>Delete</a>	
								</div>
								</div>						
								   					
							</span>
						</td>
						
						@endif

					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="5">No Category Found</td>
					</tr>
					@endif
				</tbody>

			</table>			
		</div>
		<!--end: Datatable -->
		<div class="row">
			<div class="col-md-12">
				{{$categories->links()}}
			</div>
		</div>
	</div>
</div>








@endsection

@section('scripts')
<script type="text/javascript">
	function confirmDelete(id){
		let choice = confirm("Are You sure, You want to Delete this record ?")
		if(choice){
			document.getElementById('delete-category-'+id).submit();
		}
	}


	$(document).ready(funcyion(){
		$('#categoryTable').DataTable({
			processing:true,
			serverSide:true,
			ajax:{
				url: "{{ route('admin.category.index')}}",
			},
			columns:[
				{
					data:"title",
					data:"title"
				},
				{
					data:"description",
					data:"description"
				},
				{
					data:"slug",
					data:"slug"
				},
				{
					data:"parent",
					data:"parent"
				},
				{
					data:"action",
					data:"action",
					orderable:false
				}


			]
		})
	});
</script>
@endsection
