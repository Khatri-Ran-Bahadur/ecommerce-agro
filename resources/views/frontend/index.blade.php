@extends('frontend.common.app')
@section('content')

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="#" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="#" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

 

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			

              @if($products->count() >0 )
              <?php $i=0; ?>
              @foreach($products as $product)  
              <input type="hidden" id="pro_id{{$i}}" value="{{$product->id}}">
              <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                  <a href="{{route('shop.singleProduct',$product->slug)}}" class="img-prod"><img class="img-fluid" src="{{asset($product->thumbnail)}}">
                    <span class="status">{{$product->discount}}%</span>
                    <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                    <p class="alert alert-success" id="success{{$i}}"> </p>
                    <h3><a href="{{route('shop.singleProduct',$product->slug)}}">{{$product->title}}</a></h3>
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
		
		<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Best Price For You</span>
            <h2 class="mb-4">Deal of the day</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            <h3><a href="#">Spinach</a></h3>
            <span class="price">Rs 100 <a href="#">now 50 only</a></span>
            <div id="timer" class="d-flex mt-5">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
						</div>
          </div>
        </div>   		
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
  
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>

        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
            
            @foreach(App\Client::all() as $client)

              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url('<?php echo url('/').'/uploads/clients/'.$client->profile_image; ?>')">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">{{$client->response}}</p>
                    <p class="name">Training: {{$client->name}}</p>
                    <span class="position">{{$client->training_name}}</span>
                  </div>
                </div>
              </div>

              @endforeach


            </div>
          </div>
        </div>
      </div>
    </section>

    <hr>


		
@endsection


@section('scripts')

<script>
  $(document).ready(function(){
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

  });


</script>

@endsection

