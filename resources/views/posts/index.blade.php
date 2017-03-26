@extends('layouts.master')

@section('status_form')
	{{-- <p>Just Some Dummy Header</p> --}}
<div v-show="showmindform">
<form method="POST" action="/posts">
		{{csrf_field()}}
    <div class="blog-header">
      <div class="container">
        <div class="panel panel-success">
			 <div class="panel-body">
				<textarea style="font-size: 25px !important" placeholder="what's going on in that beautiful mind?" type="text" class="form-control" name="body" style="height:100px"></textarea>
				@include('layouts.errors')	
			 </div>
			  <div class="panel-footer">
					<button type="submit" class="btn btn-success">Publish</button>
					<a style="padding:0; margin: 0;color:gray" class="pull-right" v-on:click='hideForm'>leave me alone</a>
			  </div>
		</div>
      </div> 
    </div>
</form>
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