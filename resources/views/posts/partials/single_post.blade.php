<div class="blog-post well">
	<h2 ><a href="/?userid={{$post->user_id}}">{{$post->user->name}}</a></h2>
	<p class="blog-post-meta">On {{$post->created_at->toFormattedDateString()}}</p>

	<p>
		{{$post->body}}
	</p>
</div><!-- /.blog-post -->
