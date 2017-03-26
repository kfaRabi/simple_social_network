<hr>
<div class="comments">
	<ul class="list-group">
		<li class="list-group-item active">Comments</li>
		@foreach ($post->comments->sortByDesc('created_at') as $comment)
			<li class="list-group-item">
			<i>{{$comment->created_at->diffForHumans()}}</i> &nbsp
			<strong>{{$comment->user->name}}</strong>: &nbsp
			{{$comment->body}}
			</li>
		@endforeach
	</ul>
</div>