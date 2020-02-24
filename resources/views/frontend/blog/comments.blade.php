<h3 class="mb-5">{{$comments->count()}} Comments</h3>
  <ul class="comment-list">
@foreach($comments as $comment)
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
  @endforeach
 <li class="comment">
        <div class="col-md-4">
  {{$comments->links()}}

        </div>
          
      </li>
  </ul>
  