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
						<h2 class="mb-3">{{$post->title}}</h2>
            {!! $post->description !!}
           
            

            <div class="pt-5 mt-5">
              <div id="commentsId">
                <h3 class="mb-5">{{$comments->count()}} Comments</h3>
                <ul class="comment-list">
              @foreach($comments as $comment)
                @if($comment->blog_id==$post->id)
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="{{asset('images/person_1.jpg')}}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>{{$comment->name}}</h3>
                      <div class="meta">{{$comment->create_at}}</div>
                      <p>{{$comment->comment}}</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>
                  </li>
                  @endif
                @endforeach

                   <li class="comment">
                    <div class="col-md-4">
              {{$comments->links()}}
            
                    </div>
                      
                  </li>
                </ul>

              </div>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form  class="p-5 bg-light" method="POST" id="comment-form">
                  @csrf
                  <input type="hidden" name="blog_id" id="blog_id" value="{{$post->id}}">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="user_name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="user_email" name="email">
                  </div>
                  
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="comment" id="user_comment" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" id="addComment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
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
                    <div><a href="{{route('blogs.show',$post->slug)}}"><span class="icon-chat"></span>  <?php $count=0; 

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

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){

       $("#addComment").click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var formData = {
            _token:         $('input[name="_token"]').val(),
            blog_id:         $('#blog_id').val(),
            name:         $('#user_name').val(),
            email:         $('#user_email').val(),
            comment:         $('#user_comment').val()
        }
        var url='{{route("comments.store")}}';
        console.log(url);
        console.log(formData);

        $.ajax({
           type:'POST',
           url:url,
           data:formData,
           success:function(data){
            console.log(data);
              $('#commentsId').html(data);
              $('#comment-form')[0].reset();
           }

        });  

    });
  })
</script>

@endsection