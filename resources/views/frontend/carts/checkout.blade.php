@extends('frontend.common.app')
@section('content')



     <div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <form action="{{route('checkout')}}" class="billing-form" method="POST">
          @csrf
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
            
              <h3 class="mb-4 billing-heading">Contact Detail</h3>
              <div class="row align-items-end">
                
                <div class="w-100"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="streetaddress">Street Address</label>
                    <input type="text" class="form-control" name="address" placeholder="House number and street name" required>
                  </div>
                </div>
                
                <div class="w-100"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="towncity">Town / City</label>
                    <input type="text" name="city" class="form-control" placeholder="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="postcodezip">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="" required>
                  </div>
                </div>
                <div class="w-100"></div>                
              </div>
            
          </div>
          <div class="col-xl-5">
            <div class="row mt-5 pt-3">
              <div class="col-md-12 d-flex mb-5">
                <div class="cart-detail cart-total p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Cart Total</h3>
                  
                  <p class="d-flex total-price">
                    <span>Total</span>
                    <span>Rs {{$total}}</span>
                  </p>
                </div>
              </div>
              
                  <p><button class="btn btn-primary py-3 px-4">Place an order</button></p>
              
            </div>
          </div> <!-- .col-md-8 -->
        </div>

        </form><!-- END -->

      </div>
    </section> <!-- .section -->

    
 

@endsection
