@extends('layouts.master')

@section('content')
<h1 class="label label-primary">Create New Post</h1>

<hr>

<form method="POST" action="/posts">

	{{csrf_field()}}

	<div class="form-group">
		<label for="body">Post Body</label>
		<textarea type="text" class="form-control" name="body"></textarea>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Publish</button>
	</div>
	
	@include('layouts.errors')
</form>

@endsection