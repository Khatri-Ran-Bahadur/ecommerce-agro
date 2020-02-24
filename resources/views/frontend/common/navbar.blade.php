<?php $siteinfo=App\Siteinfo::find(1); ?>
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">{{@$siteinfo->name}}</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link " href="{{route('shop.index')}}">Shop</a>
              
            </li>
	          <li class="nav-item"><a href="{{url('about')}}" class="nav-link">About</a></li>
	          
	          <li class="nav-item"><a href="{{route('blogs.index')}}" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="{{url('contact')}}" class="nav-link">Contact</a></li>
	          
				
				@guest
				
				@else 

		          	@if(Auth::user()->hasAnyRole('user')=='user')
			          	<li class="nav-item"><a href="{{url('/profile')}}" class="nav-link">Profile</a></li>
			         	<li class="nav-item"><a  class="nav-link">{{ Auth::user()->name }}</a></li> 
		            @endif
	            @endguest

	            <li class="nav-item cta cta-colored"><a href="{{route('product.shoppingCart')}}" class="nav-link"><span class="icon-shopping_cart"></span> <span class="badge"></span>[<span id="basketTotal">{{Session::has('cart') ? Session::get('cart')->totalQty:0}}</span>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->