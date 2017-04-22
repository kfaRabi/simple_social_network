@extends('layouts.master')

@section('status_form')

@include('layouts.messages')

<form method="POST" action="/posts" v-if="showform">
	{{csrf_field()}}
    <div class="blog-header">
      <div class="container">
        <div class="panel panel-success">
			 <div class="panel-body">
				<textarea style="font-size: 25px !important" placeholder="what's going on in that beautiful mind?" type="text" class="form-control" name="body" style="height:100px" @keyup="showerrors = false"></textarea>
				@include('layouts.errors')	
			 </div>
			  <div class="panel-footer">
					<button type="submit" class="btn btn-success">Publish</button>
					<button type="button" style="color:gray" class="pull-right btn btn-link" @click="hideForm">leave me alone</a>
			  </div>
		</div>
      </div> 
    </div>
</form>

@endsection


@section('content')

	@include("posts.partials.all_posts")

@endsection

@section('sidebar')

	@include('layouts.sidebar')
	
@stop