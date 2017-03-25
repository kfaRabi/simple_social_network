@extends('layouts.master')

@section('content')
	@include('posts.partials.single_post')
	@include('posts.partials.comments')
	<hr>
	<div class="card">
		<div class="card-block">
			<form method="POST" action="/posts/{{$post->id}}/comments">

				{{csrf_field()}}

				<div class="form-group">
					<textarea type="text" class="form-control" name="body" placeholder="Enter Your Comment"></textarea>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Comment</button>
				</div>
				
				@include('layouts.errors')

			</form>
		</div>
	</div>
@endsection()