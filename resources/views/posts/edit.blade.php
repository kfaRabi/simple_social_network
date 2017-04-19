@extends('layouts.master')

@section('content')
<h1 class="label label-primary custom-heading">Edit Post</h1>

<hr>

<form method="POST" action="/posts/{{$post->id}}/update">

	{{csrf_field()}}

	<div class="form-group">
		<label for="body">Post Body</label>
		<textarea id = "post_body" type="text" class="form-control" name="body"> {{$post->body}} </textarea>
	</div>
	
	<div class="form-group">
		<button @click = "editPost($event, {{$post->id}})" type="submit" class="btn btn-primary">Publish</button>
	</div>
	
	@include('layouts.errors')
</form>

@endsection
