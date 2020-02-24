
@if($products->count() >0 )
  <?php $i=0; ?>
  @foreach($products as $product)  
  <input type="hidden" id="pro_id{{$i}}" value="{{$product->id}}">
 <!-- return message -->
  <div class="col-md-6 col-lg-3 ">
      
      
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
       @if($paginate==True)
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

