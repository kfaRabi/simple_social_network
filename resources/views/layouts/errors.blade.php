@if(count($errors))
<div v-if="showerrors">
	<hr>
	<div class="alert alert-danger" style="position: relative;">
		<button class="btn btn-link" type="button" @click="showerrors = false" 
		style="position: absolute; margin-top: -12px !important;">
			&times
		</button>
		<ul style="list-style: none">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif