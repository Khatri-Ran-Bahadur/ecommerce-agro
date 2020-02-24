@extends('frontend.common.app')
@section('content')


<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>
<div id="testdata"></div>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 mb-5 text-center">
            <ul class="product-category">
              <li><a id="fetchAllProduct" class="active">All</a></li>
              @foreach(App\Category::all() as $category)
              <li id="cat{{$category->id}}" value="{{$category->id}}"><a id="activeClass{{$category->id}}">
                  {{$category->title}}
                </a></li>
                
              @endforeach
            </ul>
          </div>
        </div>
        <div class="row" id="catProducts">

              @if($products->count() >0 )
              <?php $i=0; ?>
              @foreach($products as $product)  
              <input type="hidden" id="pro_id{{$i}}" value="{{$product->id}}">
             <!-- return message -->
              <div class="col-md-6 col-lg-3 ftco-animate">
                  
                  
                <div class="product">
                  <a href="{{route('shop.singleProduct',$product->slug)}}" class="img-prod"><img class="img-fluid" src="{{asset($product->thumbnail)}}">
                    <span class="status">{{$product->discount}}%</span>
                    <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                     <p class="alert alert-success" id="success{{$i}}">
                    </p>
                    <h3><a href="{{route('shop.singleProduct',$product->slug)}}">{{$product->title}} {{$product->id}}  </a></h3>
                    <div class="d-flex">
                      <div class="pricing">
                        <p class="price"><span class="mr-2 price-dc">Rs {{$product->price}}</span><span class="price-sale">Rs {{ $product->price - (($product->price * $product->discount)/100 )}} </span>  </p>
                        <p >Discount {{$product->discount}}% </p>
                      </div>
                    </div>
                    <div class="bottom-area d-flex px-3">
                      <div class="m-auto d-flex">
                        
                        <a   id="addCart{{$i}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                          <span><i class="ion-ios-cart"></i></span>
                        </a>
                       
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                    @if(isset($products))
                      {{$products->links()}}
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          <?php $i++; ?>

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
     var reloadFunction=function(){
  <?php
    
    $maxP=count($products);

    for($i=0; $i<$maxP;$i++){ ?>

        $("#success{{$i}}").hide();

         $('#addCart{{$i}}').click(function(){
            var pro_id=$("#pro_id{{$i}}").val();
            var url='{{url("cart/addProduct")}}/'+pro_id;
          $.ajax({
            type:'get',
            url: url,
            data: {},
            success:function(data){
              $("#success{{$i}}").show();
              $("#success{{$i}}").html("Product Added In Cart.");
              $("#success{{$i}}").fadeOut(500);
              $('#basketTotal').html(data);
            }
          });
      
         });

<?php } 
    ?>
  }
  reloadFunction();

   
    @foreach(App\Category::all() as $category)

      $('#cat{{$category->id}}').click(function(){
        $("#catProducts").html("<div class='row mt-5'><div class='col text-center'> <div class='block-27'><div style='margin-left:500px;' class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div></div></div> </div>");
        $('.active').removeClass('active');
          $('#activeClass{{$category->id}}').addClass('active');
          var cat_id=$('#cat{{$category->id}}').val();
          var url='{{url("shop/products")}}/'+cat_id;
          
          $.ajax({
            type:'get',
            url: url,
            dataType:'html',
            data: {},
            success:function(response){
              $("#catProducts").html(response);
              reloadFunction();
              //$("#catProducts").show();

            }
          });

      });

    @endforeach


    $('#fetchAllProduct').click(function(){
        $('.active').removeClass('active');
        $("#catProducts").html("<div class='row mt-5'><div class='col text-center'> <div class='block-27'><div style='margin-left:500px;' class='spinner-border text-primary' role='status'><span class='sr-only'>Loading...</span></div></div></div> </div>");
          $('#fetchAllProduct').addClass('active');
          var url='{{url("shop/products")}}/'+-1;
          
          $.ajax({
            type:'get',
            url: url,
            dataType:'html',
            data: {},
            success:function(response){
              $("#catProducts").html(response);
              reloadFunction();
              //$("#catProducts").show();

            }
          });

      });



    
  });


</script>

@endsection