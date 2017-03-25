
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
		<single-post v-for="post in posts" :url= '"/posts/" + post.id'>
			<template slot="title"> @{{post.title}} </template>
			<template slot="username"> @{{post.user.name}} </template>
			<template slot="createdat"> @{{post.created_at}} </template>
			<template slot="body"> @{{post.body}} </template>
		</single-post>
 	</posts-list>
 </div>