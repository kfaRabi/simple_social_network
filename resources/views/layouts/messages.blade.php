@if(session()->has('message'))
	<div v-if="keepshowing" class='alert alert-{{session("message")[1]}}'>
		<p style="width: 90%; display: inline-block;">{{session("message")[0]}}</p>
		<button type="button" style="color:red;" class="btn btn-link" @click="stopShowingMessage">x</button>
	</div>
@endif