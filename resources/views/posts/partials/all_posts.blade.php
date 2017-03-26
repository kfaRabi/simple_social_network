
 <div>
{{--  	<single-post url = "/posts/1">
 		<template slot = "title">Some Title</template>
 		<template slot = "username">Rabi</template>
 		<template slot = "createdat">Jan 15, 2015</template>
 		<template slot = "body">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam culpa facere itaque quasi, vero veniam repellat recusandae non dignissimos. Aspernatur magnam, quas, perspiciatis ex cumque iste? Ipsam expedita ducimus, id.
 		</template>
 	</single-post> --}}
 	{{-- @{{posts}} --}}
 	<posts-list>
		<single-post v-for="(post, ind) in posts" :url= '"/posts/" + post.id' :userid= '"/?userid=" + post.user.id'>
			<template slot="username"> @{{post.user.name}} </template>
			<template slot="createdat"> @{{carbon_strings[ind]}} </template>
			<template slot="body"> @{{post.body.substring(0, 200)}} 
				<a :href='"/posts/" + post.id' v-if="post.body.length > 200">(more...)</a>
			</template>
			<template v-if="post.comments.length" slot="number_of_comments"> @{{post.comments[0].count + " Comments"}} </template>
		</single-post>
 	</posts-list>
 </div>