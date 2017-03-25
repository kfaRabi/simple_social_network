Vue.component('blog-header',{
	
	//props: [],

	template: `
		<div class="blog-header">
	      <div class="container">
	        <h1 class="blog-title"><slot name="title"> My First Blog </slot></h1>
	        <p class="lead blog-description"><slot>An example blog template built with Bootstrap.</slot></p>
	      </div> 
	    </div>
	`,

	//methods: {
	//
	//}

});

Vue.component('single-post',{
	
	// props: ['id', 'title', 'username', 'createdat', 'body'],
	props: ['url'],

	template: `
		<div class="blog-post">
			<h2 class="blog-post-title"><a :href="url"><slot name = "title"></slot></a></h2>
			<p class="blog-post-meta"><slot name = "username"></slot> on <slot name = "createdat"></slot></p>

			<p>
				<slot name = "body"></slot>
			</p>
		</div>
	`,

	//methods: {
	//
	//}

});

Vue.component('posts-list',{
	
	//props: [],

	template: `
	<div>
		<slot>No Post Found</slot>
	</div>
	`,

	data(){
		return {
			// posts: [],
			// url: '/posts/1',
		};
	},

	methods: {
		//
	},

	created() {
		// this.posts = [
		// 	{id: 2, title: "Some Title 1", body: "Some Dummy Body 1", created_at: "Something", username: "user"},
		// 	// {id: 3, title: "Some Title 2", body: "Some Dummy Body 2"},
		// 	// {id: 7, title: "Some Title 3", body: "Some Dummy Body 3"},
		// 	// {id: 5, title: "Some Title 4", body: "Some Dummy Body 4"},
		// ];
		// this.posts = [];
		// axios.get('/all-posts')
		//   .then(function (response) {
		//     console.log(response.data[0]);
		//     this.posts = response.data;
		//     console.log(this.posts[0].user.name);
		//   })
		//   .catch(function (error) {
		//     console.log(error);
		//   });


		// this.id = 3;
		// console.log(this.posts, this.id);
	},

});

var vapp = new Vue({
	el: "#test",

});

new Vue({
    el: '#root',
    data: {
        working: "yes",
        posts: [],
        link: '',
    },
    
    methods: {
    	getLink(){
    		this.link = window.location.href;
    		if(this.link.includes("month") || this.link.includes("year")){
    			var pos = this.link.indexOf("?", 10);
    			this.link = "/all-posts/" + this.link.substring(pos, this.link.length);
    		}
    		else{
    			this.link = "/all-posts";
    		}
    		console.log(this.link);
    	},
    	getAllPosts(){
    		this.getLink();
    		axios.get(this.link).then(response => this.posts = response.data);
    		console.log(window.location.href);
    	},
    },

    computed: {
    },

    mounted(){
    	this.getAllPosts();
    	setInterval(function () {
	     	this.getAllPosts();
	    }.bind(this), 300000);
    },
    });