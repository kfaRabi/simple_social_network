@extends('layouts.master')

@section('blog_header')
	{{-- <p>Just Some Dummy Header</p> --}}
    <div id="test">
	    <blog-header>
	    	<template slot="title">
	    		Simple BS Blog
	    	</template>
	    	Stay Connected and Share Your Thoughts.
	    </blog-header>
    </div>
@endsection


@section('content')

	{{-- @foreach ($posts as $post)
		@include("posts.partials.single_post")
	@endforeach --}}

{{-- 	<nav class="blog-pagination">
		<a class="btn btn-outline-primary" href="#">Older</a>
		<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	</nav> --}}
	@include("posts.partials.all_posts")
@endsection

@section('sidebar')
	@include('layouts.sidebar')
@stop