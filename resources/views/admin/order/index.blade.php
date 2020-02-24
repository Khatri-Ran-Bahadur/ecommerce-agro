@extends('admin.common.app')
@section('breadcrumbs')
<li class="breadcrumb-item" ><a href="{{route('admin.admin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Order</li>
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
				Confirmed Orders
				</h3>
			</div>
		</div>
		
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right  m--margin-bottom-30">
			<div class="row align-items-center">
			</div>
		</div>
		<!--end: Search Form -->
		<!--begin: Datatable -->
		<div class="m_datatable">
			<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
				<thead>
					<tr role="row">
						<th>#</th>
						<th >Order By:</th>
						<th>Quantity:</th>
						<th>Total Price:</th>
						<th>Order Date:</th>
						<th>Address:</th>
						<th>Phone No:</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					$count =0;
					?>
					@if($orders->count()>0)
					@foreach($orders as $order)
					<?php
					
					$order->cart=unserialize($order->cart);
					?>
					
					<tr>
						<td>{{++$count}}</td>
						<td>{{$order->user->name}}</td>
						<td>{{$order->cart->totalQty}}</td>
						<td>{{$order->cart->totalPrice}}</td>
						<td>{{$order->created_at}}</td>
						<td>{{$order->address}}</td>
						<td>{{$order->phone}}</td>
						<td>
							@if($order->confirm_order==false)
							
							<span style="width: 110px;"><span class="m-badge  m-badge--primary m-badge--wide">Pending</span></span>
							@else
							<span style="width: 110px;"><span class="m-badge  m-badge--default m-badge--wide">Confirmed</span></span>
							@endif
						</td>
						@if($order->trashed())
						<td><a class="btn btn-info btn-sm" href="{{route('admin.order.recover',$order->id)}}">Restore</a> | <a class="btn btn-danger btn-sm" href="javascript:;" onclick="confirmDelete('{{$order->id}}')">Delete</a>
						<form id="delete-order-{{$order->id}}" action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display: none;">
							{{method_field('DELETE')}}
							{{csrf_field()}}
						</form>
					</td>
					@else
					<td data-field="Actions" class="m-datatable__cell">
						<span style="overflow: visible; width: 110px;">
							<div class="dropdown ">
								<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
									<i class="la la-ellipsis-h"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{route('admin.order.confirm',$order->id)}}">
									<i class="fa fa-check" style="color:blue;"></i> Confirm Order</a>
									<a class="dropdown-item" href="#">
									<i class="fa fa-close"></i> Cancel Order</a>
									<a class="dropdown-item"  href="{{route('admin.order.remove',$order->id)}}">
									<i class="la la-trash" style="color: red;"></i> Delete</a>
									
								</div>
							</div>
							<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View " data-toggle="modal" data-target="#m_modal_{{$order->id}}">                            <i class="la la-edit"></i>
							</a>
							
						</span>
					</td>
					
					@endif
					
				</tr>
				<div class="modal fade" id="m_modal_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none; ">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel" style="color: #000;">
								Order By: {{$order->user->name}}
								</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									×
								</span>
								</button>
							</div>
							<div class="modal-body">
								
								<div class="accordion" id="accordionExample">
									@foreach($order->cart->items as $item)
									<div class="card">
										<div class="card-header bg-dark text-white" id="headingOne{{$item['item']['id']}}{{$order->id}}">
											<h5 class="mb-0">
											<span >Product Name: <span style="color:yellow;">{{$item['item']['title']}}</span></span>
											<span style="float: right; margin-left: 30px;">Order Date: {{$order->created_at}}</span>
											</h5>
										</div>
										<div id="collapseOne{{$item['item']['id']}}{{$order->id}}" aria-labelledby="headingOne{{$item['item']['id']}}{{$order->id}}" data-parent="#accordionExample">
											<div class="card-body" style="background-color: #f2f2f2; color: #000;">
												<p style="color: #000;">Quantity: <span>{{$item['qty']}}</span> Single Price: <span>{{$item['item']['price']}}</span></p>
												<p style="color: #000;"></p>
												<p style="color: #000;">Discount Per Item: <span>{{$item['item']['discount']}}%</span></p>
												<p style="color: #000;">Total Price: <span> <strike>Rs. {{$item['price']}} </strike></span></p>
												<p style="color: #000;">After Discount: <span> Rs. {{$item['price']-($item['price']*$item['item']['discount']/100)}} </span></p>
											</div>
											
										</div>
									</div>
									@endforeach
								</div>
								<div class="card-footer">
									<h3 style="color: #000;">Total Price: <span> <span style="color:red;">Rs. {{$order->cart->totalPrice}}</span></span></h3>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@else
					<tr>
						<td colspan="5">No Order Found</td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	function confirmDelete(id){
		let choice = confirm("Are You sure, You want to Delete this record ?")
		if(choice){
			document.getElementById('delete-order-'+id).submit();
		}
	}
</script>
@endsection