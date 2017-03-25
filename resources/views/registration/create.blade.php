@extends('layouts.master')

@section('content')
<h1 class="label label-primary">Register</h1>

<hr>

<form method="POST" action="/register">

	{{csrf_field()}}

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control" name="name">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" name="password">
	</div>
	
	<div class="form-group">
		<label for="password_confirmation">Password Confirmation</label>
		<input type="password" class="form-control" name="password_confirmation">
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Register</button>
	</div>
	
	@include('layouts.errors')
</form>

@endsection