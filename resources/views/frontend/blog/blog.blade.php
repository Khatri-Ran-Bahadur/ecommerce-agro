@extends('frontend.common.app')
@section('content')


<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="#">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </div>

  <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
            <div class="row">

			@foreach($posts as $post)
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="{{route('blogs.show',$post->slug)}}"> <img src="{{asset($post->thumbnail)}}" alt="" class="img-thumbnail" style="height: 300px; width: 500px;">
                  </a>
                  <div class="text d-block pl-md-4">
                    <div class="meta mb-3">
                      <div><a href="{{route('blogs.show',$post->slug)}}">{{$post->created_at}}</a></div>
                      <div><a href="{{route('blogs.show',$post->slug)}}">{{$post->created_by}}</a></div>
                      <div><a href="{{route('blogs.show',$post->slug)}}" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                    </div>
                    <h3 class="heading"><a href="{{route('blogs.show',$post->slug)}}">{{$post->title}}</a></h3>
                    <p>{{str_limit($post->meta_description, $limit = 200, $end = '...')}}</p>
                    <p><a href="{{route('blogs.show',$post->slug)}}" class="btn btn-primary py-2 px-3">Read more</a></p>
                  </div>
                </div>
              </div>
			@endforeach
			

			<div style="margin-left: 300px;">{{$posts->links()}}</div>
			</div>
     </div> <!-- .col-md-8 -->


           <div class="col-lg-4 sidebar ftco-animate">
            
            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                @foreach(App\Category::all() as $category)
                <li><a href="{{route('shop.categoryProduct',$category->slug)}}">{{$category->title}} <span>({{$category->products->count()}})</span></a></li>
                @endforeach
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Recent Blog</h3>

              @foreach(App\Blog::orderBy('created_at', 'desc')->paginate(4) as $post)

              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" href="{{route('blogs.show',$post->slug)}}" ><img src="{{asset($post->thumbnail)}}" alt="" class="" style="height: 100%; width: 100%;"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="{{route('blogs.show',$post->slug)}}">{{$post->title}}</a></h3>
                  <div class="meta">
                    <div><a href="{{route('blogs.show',$post->slug)}}"><span class="icon-calendar"></span> {{$post->created_at}}</a></div>
                    <div><a href="{{route('blogs.show',$post->slug)}}"><span class="icon-person"></span> {{$post->created_by}}</a></div>
                    <div><a href="{{route('blogs.show',$post->slug)}}"><span class="icon-chat"></span> 
                      <?php $count=0; 

                        foreach ($comments as $comment) {
                          if($comment->blog_id==$post->id){
                            $count++;
                          }
                        }
                        echo $count;
                    ?> 
                  </a></div>
                  </div>
                </div>
              </div>
              @endforeach

             
             
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">fruits</a>
                <a href="#" class="tag-cloud-link">tomatoe</a>
                <a href="#" class="tag-cloud-link">mango</a>
                <a href="#" class="tag-cloud-link">apple</a>
                <a href="#" class="tag-cloud-link">carrots</a>
                <a href="#" class="tag-cloud-link">orange</a>
                <a href="#" class="tag-cloud-link">pepper</a>
                <a href="#" class="tag-cloud-link">eggplant</a>
              </div>
            </div>

            
          </div>

        </div>
      </div>
    </section> <!-- .section -->


@endsection