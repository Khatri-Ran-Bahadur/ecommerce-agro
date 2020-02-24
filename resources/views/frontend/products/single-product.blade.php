@extends('frontend.common.app')
@section('content')


<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span class="mr-2"><a href="{{url('shop')}}">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>




 <form action="{{route('product.updateToCart',$product->id)}}" method="POST" >
    <section class="ftco-section">
      <div class="container">

       
        <div class="row">
          <div class="col-lg-5 mb-5 ftco-animate">
            <a href="#" class="image-popup"><img src="{{asset($product->thumbnail)}}" class="img-fluid" alt="{{$product->title}}" ></a>
          </div>

          @csrf
          <div class="col-lg-7 product-details pl-md-5 ftco-animate">
            <div class="row ">
            <div class="col-md-12">
              @if (session()->has('message'))
              <div class="alert alert-success">
                {{session('message')}}
              </div>
              @endif
            </div>
          </div>


            <h3>{{$product->title}}</h3>
            
            <div class="d-flex">
                <div class="pricing">
                  <p >Discount {{$product->discount}}% </p>
                </div>
              </div>
                  
            <p class="price"><span class="mr-1"><strike style="color:#c9c9c9; font-size: 22px;">Rs {{$product->price}}</strike></span><span style="color:#000; font-size: 22px;"> Rs {{ $product->price - (($product->price * $product->discount)/100 )}}</span></p>
            <p>{!! $product->description !!} 
            </p>
            <div class="row mt-4">
              
              <div class="w-150"></div>

              <div class="input-group mb-3">
               

              </div>
              <label >Quantity</label>
              <div class="input-group col-md-6  mb-3">

                <div class="input-group-prepend">
                    <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                     <i class="ion-ios-remove"></i>
                    </button>
                  </div>
                  <?php $count=0;
                      if(Session::get('cart')){
                          foreach (Session::get('cart')->items as  $item) {
                            if($item['item']['id']==$product->id){
                              $count=$item['qty'];
                            }
                          }
                      }  

                  ?>
                 <input type="text" id="quantity" name="quantity" aria-describedby="basic-addon1" class="form-control input-number" value="{{$count}}">
                <div class="input-group-prepend">
                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                       <i class="ion-ios-add"></i>
                   </button>
                 </div>
              </div>
              <div class="w-100"></div>
              
            </div>
            <p><input type="submit" name="submit" value="Add to Cart" class="btn btn-success"></p>
          </div>
        
        </div>

      </div>
    </section>
</form>

    <section class="ftco-section" style="margin-top: -100px;">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>      
      </div>
      <div class="container">
        <div class="row">

          @if($products->count() >0 )
          @foreach($products as $product)

          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product">
              <a href="{{route('shop.singleProduct',$product->slug)}}" class="img-prod"><img class="img-fluid" src="{{asset($product->thumbnail)}}" alt="">
                <span class="status">{{$product->discount}}%</span>
                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="{{route('shop.singleProduct',$product->slug)}}">{{$product->title}}</a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span class="mr-2 price-dc">Rs {{$product->price}}</span><span class="price-sale">Rs {{ $product->price - (($product->price * $product->discount)/100 )}} </span>  </p>
                    <p >Discount {{$product->discount}}%</p>
                  </div>
                </div>
                <div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                   
                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endforeach
          @else
            <p style="margin-left: 30%;">Sorry Product is not Available ...</p>

          @endif  
        

        </div>
      </div>
    </section>

    


@endsection

@section('scripts')

<script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
  </script>

@endsection