
 <div>
 	<posts-list>
		{{-- <single-post v-for="(post, ind) in posts" :post_id = "post.id" :url= '"/posts/" + post.id' :userid= '"/?userid=" + post.user.id' :loged_in_user_id = "{{auth()->user()->id}}" :post_body="post.body" ref="test"> --}}
		<single-post v-for="(post, ind) in posts" :post_id = "post.id" :url= '"/posts/" + post.id' :userid= 'post.user.id' :loged_in_user_id = "{{auth()->check()?auth()->user()->id:0}}" :post_body="post.body" ref="test">
			<template slot="username"> @{{post.user.name}} </template>
			<template slot="createdat"> @{{carbon_strings[ind]}} </template>
			<template slot="body"> @{{post.body.substring(0, 200)}} 
				<a :href='"/posts/" + post.id' v-if="post.body.length > 200">(more...)</a>
			</template>
			<template v-if="post.comments.length" slot="number_of_comments"> @{{post.comments[0].count + " Comments"}} </template>
		</single-post>

 	</posts-list>
 </div>