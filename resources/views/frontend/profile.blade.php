@extends('frontend.common.app')
@section('content')


<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Profile</span></p>
        <h1 class="mb-0 bread">Profile</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" >
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">MY Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
      </li>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent" style="background-color: #ffffff;">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="m_datatable">
      <table id="example2" class="table table-bordered table-hover dataTable " role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row">
            <th>#</th>
            <th>Quantity:</th>
            <th>Total Price:</th>
            <th>Order Date:</th>
            <th>Status</th>
            <th>View</th>
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
            <td>{{$order->cart->totalQty}}</td>
            <td>{{$order->cart->totalPrice}}</td>
            <td>{{$order->created_at}}</td>
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
                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View " data-toggle="modal" data-target="#m_modal_{{$order->id}}">  view                          <i class="fa fa-edit"></i>        
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
              Hello, {{$order->user->name}} your orders..
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                ×
              </span>
            </button>
          </div>
          <div class="modal-body">

                        
          <div class="accordion" id="accordionExample" >

          @foreach($order->cart->items as $item)
            <div class="card">
              <div class="card-header bg-dark text-white" id="headingOne{{$item['item']['id']}}{{$order->id}}">
                <h5 class="mb-0">            
               <span >Product Name: <span style="color:yellow;">{{$item['item']['title']}}</span></span>
                   <span style="float: right; margin-left: 30px; color: #fff;">Order Date: {{$order->created_at}}</span>
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
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Profile</div>
    </div>
  </div>
</section>



@endsection