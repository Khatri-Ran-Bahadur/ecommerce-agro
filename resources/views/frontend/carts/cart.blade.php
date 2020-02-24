@extends('frontend.common.app')
@section('content')



     <div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

      <div class="row ">
          <div class="col-md-12">                      
            <tr>
              <td colspan="8">
                 <div id="success" class="alert alert-success">
                    
                  </div>
              </td>
            </tr>
          </div>
        </div>

  <div id="cartdata">

     <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="cart-list">
              <a href="{{url('shop')}}">Continue Shopping.....</a>
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>


                  <div class="col-lg-7 product-details pl-md-5 ftco-animate">
                    


                  @if(Session::has('cart'))
                  <?php  $total=0;?>
                  @if(Session::get('cart')->totalQty>0)
                  <?php $i=0; ?>
                  @foreach($products as $product)
                  <?php $total+=$product['price']-($product['price'] * $product['item']['discount'] )/100 ;?>
                   <input type="hidden" id="pro_id{{$i}}" value="{{$product['item']['id']}}">
                  <tr class="text-center">
                    <td class="product-remove"><a  id="removeProduct{{$i}}" ><span class="ion-ios-close"></span></a></td>
                    <?php  $image=url($product['item']['thumbnail']); ?>
                    <td class="image-prod"><img src="<?php echo $image ?>" style="width: 80%; height: 10%;" alt=""></td>
                    
                    <td class="product-name">
                      <h3><a href="{{route('shop.singleProduct',$product['item']['slug'])}}">{{$product['item']['title']}}</a></h3>
                      <p> {!! str_limit($product['item']['description'], $limit = 40, $end = '...') !!}</p>
                    </td>
                    
                    <td class="price">{{$product['item']['price']}}</td>
                    
                    <td class="quantity">
                      <form method="POST" name="updateProduct">
                        @csrf
                      <div class="input-group mb-1">
                        <input type="text" name="quantity" id="quantity{{$i}}" style="width: 10px;" class=" form-control input-number" value="{{$product['qty']}}">
                      </div>
                      <button id="updateProduct{{$i}}" class="btn btn-primary py-1 px-4" >Update</button>
                      </form>
                    </td>

                    <td class="product-discount">
                      {{ $product['item']['discount'] }}%
                    </td>
                    
                    <td class="subtotal"><strike> Rs {{$product['price']}} </strike></td>
                    <td class="total">Rs {{($product['price']-($product['price'] * $product['item']['discount'] )/100 )}}</td>
                  </tr><!-- END TR-->
                  <?php $i++; ?>
                  @endforeach
                  @else
                    <tr>
                      <td colspan="5"><h1>Empty Carts</h1></td>
                    </tr>

                  @endif
                  @endif
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row justify-content-end">
          @if(Session::has('cart'))
          @if(Session::get('cart')->totalQty>0)
          <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
              <h3>Cart Totals</h3>
              <p class="d-flex">
                <span>Subtotal</span>
                <span><strike>Rs {{ $totalPrice }}</strike></span>
              </p>
              
              <hr>
              <p class="d-flex total-price">
                <span>Total</span>
                <span>Rs {{$total}}</span>
              </p>
            </div>
            <p><a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
          </div>
          @endif
          @endif
        </div>
      </div>
    </section>

  </div>


   
    
 

@endsection

@section('scripts')

  <script type="text/javascript">
     $(document).ready(function(){
      $('#success').hide();


    var reloadFunction=function(){  
       <?php $maxP=count($products);



    for($i=0; $i<$maxP;$i++){ ?>
       $("#removeProduct{{$i}}").click(function(){
          var pro_id=$("#pro_id{{$i}}").val();
          var url='{{url("prodcutRemove")}}/'+pro_id;     
          $.ajax({
            type:'get',
            url: url,
            data: {},
            success:function(data){
              $("#success").show();
              $("#success").html("Product Added In Cart.");
              $("#success").fadeOut(500);
              $('#cartdata').html(data);
              var totalItemInCart=$('#totalItemInCart').val();
              $('#basketTotal').html(totalItemInCart);

              reloadFunction();
            }
          });   
        });

       $("#updateProduct{{$i}}").click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            _token:         $('input[name="_token"]').val(),
            quantity:         $('#quantity{{$i}}').val()
        }
        var url='{{url("cart/updateProduct")}}/'+$("#pro_id{{$i}}").val();
        $.ajax({
           type:'POST',
           url:url,
           data:formData,
           success:function(data){
              $("#success").show();
              $("#success").html("Product Added In Cart.");
              $("#success").fadeOut(500);
              $('#cartdata').html(data);
              var totalItemInCart=$('#totalItemInCart').val();
              $('#basketTotal').html(totalItemInCart);
              reloadFunction();
           }

        });  

    });

     <?php }; ?>
   }
   reloadFunction();    

      });
  </script>

@endsection
