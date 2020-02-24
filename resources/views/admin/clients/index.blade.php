@extends('admin.common.app')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{route('admin.admin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Clients</li>
@endsection
@section('content')

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



<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Clients Lists
                </h3>
            </div>
        </div>

    </div>
    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right  m--margin-bottom-30">
            <div class="row align-items-center">

                <div class="col-xl-12 order-1 order-xl-12 m--align-right">
                    <a href="{{route('admin.client.create')}}"
                        class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>
                                New Client
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
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                aria-describedby="example2_info">
                <thead>
                    <tr role="row">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Training Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($clients->count()>0)
                    @foreach($clients as $client)

                    <tr>
                        <td><img src="<?php echo url('/').'/uploads/clients/'.$client->profile_image; ?>" alt="{{$client->name}}" class="img-thumbnail" style="height: 100px; width: 100px" /></td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->training_name}}</td>
                        <td>
                            <div class="m-demo-icon">
                                <div class="m-demo-icon__preview">
                                    <a href="{{route('admin.client.edit', $client->id)}}"><i
                                            class="fa fa-pencil-square-o text-success"></i></a>
                                </div>
                                <div class="m-demo-icon__preview">
                                    <a href="javascript:;" onclick="confirmDelete('{{$client->id}}')">
                                        <i class="fa fa-trash-o text-danger"></i>
                                        <form id="delete-client-{{$client->id}}"
                                            action="{{route('admin.client.destroy', $client->id)}}" method="post"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">Clients not found</td>
                    </tr>
                    @endif
                </tbody>

            </table>
        </div>
        <!--end: Datatable -->
        <div class="row">
            <div class="col-md-12">
                {{$clients->links()}}
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
			document.getElementById('delete-client-'+id).submit();
		}
	}
</script>
@endsection
