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
					Backups Lists
				</h3>
			</div>
		</div>
		
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right  m--margin-bottom-30">
			<div class="row align-items-center">
				
				<div class="col-xl-12 order-1 order-xl-12 m--align-right">
					<a href="{{route('admin.backup.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
						<span>
							<i class="la la-plus"></i>
							<span>
								New Backup
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
		                <th>File Name</th>
		                <th>File Size</th>
		                <th>Backup Date</th>
		                <th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="3">Upcomming Features......</td>
					</tr>
				</tbody>

			</table>			
		</div>
		<!--end: Datatable -->
		<div class="row">
				<div class="col-md-12">
					 
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
