@foreach ($comments as $comment)
  <div class="single-review">
    <div class="review-heading">
      <div><a href="#"><i class="fa fa-user-o"></i> {{$comment->user->name}}</a></div>
      <div><i class="fa fa-clock-o"></i> {{$comment->created_at}}</div>
    </div>
    <div class="review-body">
      <p>
        {{$comment->content}}
        <a href="comment/destroy/{{$comment->id}}" class="pull-right"><i class="fa fa-close"></i></a>
      </p>
      
    </div>
  </div>

@endforeach
{{ $comments->links()}}