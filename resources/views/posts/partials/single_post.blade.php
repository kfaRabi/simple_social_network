@include('layouts.messages')
<div class="blog-post well">
	<h2 style="display: inline-block; width: 80%;" ><a href="/?userid={{$post->user_id}}">{{$post->user->name}}</a></h2>
	<div style="display: inline; width: 20%; background: white; padding: 10px; border-radius: 5px;">
		<a href="/posts/{{$post->id}}/delete"><span style="padding: 10px" class="glyphicon glyphicon-trash"></span></a>
		<a href="/posts/create"><span style="padding: 10px; " class="glyphicon glyphicon-pencil"></span></a>
	</div>
	<p class="blog-post-meta">On {{$post->created_at->toFormattedDateString()}}</p>

	<p>
		{{$post->body}}
	</p>
</div><!-- /.blog-post -->
