<!DOCTYPE html>
<html lang="en">
<?php $siteinfo=App\Siteinfo::find(1); ?>
  <head>
    <title>{{@$siteinfo->name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
  </head>
  <body class="goto-here">
    
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">{{@$siteinfo->phone}}</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">{{@$siteinfo->email}}</span>
					    </div>
                        <div class="col-md-3 pr-4 d-flex topper align-items-center text-lg-right">
                            
                        </div>  
                        @guest
                            <div class="col-md-2 pr-4 d-flex topper align-items-center text-lg-right">
                                                                <a href="{{ route('login') }}" class="nav-link" style="color:#fff;">Login</a>
                                                            </div>  
                        @else
                            @if(Auth::user()->hasAnyRole('user')=='user')

                                @guest
                                
                                @else

                                <div class="col-md-2 pr-4 d-flex topper align-items-right text-lg-right">
                                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" style="color:#fff;">
                                            Logout
                                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div> 
                                @endguest

                              
                                @endif
                        @endguest


					    
				    </div>
			    </div>
		    </div>
		  </div>
    </div>