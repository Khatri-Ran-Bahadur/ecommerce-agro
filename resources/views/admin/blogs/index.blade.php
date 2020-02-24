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
					Blog Lists
				</h3>
			</div>
		</div>
		
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right  m--margin-bottom-30">
			<div class="row align-items-center">
				
				<div class="col-xl-12 order-1 order-xl-12 m--align-right">
					<a href="{{route('admin.blog.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus"></i>
							<span>
								New Blog
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
						<th>Picture</th>
		                <th>Publish Date</th>
		                <th>Author</th>
		                <th>Headline</th>
		                @if(Request::path()=='admin/blog/trash')
		                <th>Deleted Date</th>
		                @else
						<th>Created Date</th>
		                @endif
		                <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@if($blogs->count() > 0)
              @foreach($blogs as $blog)
              <tr>
                <td><img src="{{asset($blog->thumbnail)}}" alt="{{$blog->title}}" class="img-thumbnail" style="height: 100px; width: 150px" /></td>
                <td>{{$blog->created_at}}</td>
                <td>{{$blog->created_by}}</td>
                <td>{{$blog->title}}</td>
                
                @if($blog->trashed())
                <td>{{$blog->deleted_at}}</td>
               
                <td data-field="Actions" class="m-datatable__cell">
					<span style="overflow: visible; width: 110px;">					
					<div class="dropdown ">							
						<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
							<i class="la la-ellipsis-h"></i>   
						</a>						  	
						<div class="dropdown-menu dropdown-menu-right">	

							<a class="dropdown-item" href="{{route('admin.blog.recover',$blog->id)}}">
							<i class="la la-database"></i> Restore</a>

							<a class="dropdown-item btn"  href="javascript:;" onclick="confirmDelete('{{$blog->id}}')">
							<i class="la la-trash" style="color: red;"></i> Delete</a>
							
							<form id="delete-blog-{{$blog->id}}" action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" style="display: none;">
					@csrf
                    @method('DELETE')
                  </form>
	
						</div>
						</div>
	
					</span>
				</td>
                

                @else

				<td>{{$blog->created_at}}</td>
                <td data-field="Actions" class="m-datatable__cell">
					<span style="overflow: visible; width: 110px;">					
					<div class="dropdown ">							
						<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
							<i class="la la-ellipsis-h"></i>   
						</a>						  	
						<div class="dropdown-menu dropdown-menu-right">	

							<a class="dropdown-item" href="{{route('admin.blog.edit',$blog->slug)}}">
							<i class="la la-edit"></i> Edit</a>

							<a class="dropdown-item"  href="{{route('admin.blog.remove',$blog->slug)}}">
							<i class="la la-trash" style="color: red;"></i> Delete</a>
	
						</div>
						</div>
	
					</span>
				</td>
                
               
                @endif
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="10" class="alert alert-info">No blogs Found..</td>
              </tr>
              @endif
				</tbody>

			</table>			
		</div>
		<!--end: Datatable -->
		<div class="row">
				<div class="col-md-12">
					 {{$blogs->links()}}
				</div>
			</div>
	</div>
</div>



@endsection

@section('scripts')
<script type="text/javascript">
  function confirmDelete(id){
    let choice = confirm("Are You sure, You want to Delete this blog ?")
    if(choice){
      document.getElementById('delete-blog-'+id).submit();
    }
  }
</script>
@endsection
