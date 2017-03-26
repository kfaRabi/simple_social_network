
Vue.component('single-post',{
	
	// props: ['id', 'title', 'username', 'createdat', 'body'],
	props: ['url', 'userid'],

	template: `
		<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title force-inline"><a class="add-textdec" :href="userid"><slot name = "username">Dummy Name</slot></a></h3>
			    <span class="post-meta pull-right"><slot name = "createdat">Date Not Found</slot></span>
			 </div>
			 <div class="panel-body">
			    <slot name = "body">Dummy Body Text</slot>
			 </div>
			  <div class="panel-footer">
			  	<a :href="url" class="no-textdec">
			  		<span class="glyphicon glyphicon-comment"></span>&nbsp<span><slot name="number_of_comments">0 Comment</slot></span>
			  	</a>
			  	&nbsp
			  	<a :href="url" class="no-textdec">
				  	<span class="pull-right" >
				  		View Full Post
				  		<span class="glyphicon glyphicon-chevron-right"></span>
				  	</span>
			  	</a>
			  </div>
		</div>
	`,
// <div class="blog-post">
// 			<h2 class="blog-post-title"><a :href="url"><slot name = "title"></slot></a></h2>
// 			<p class="blog-post-meta"><slot name = "username"></slot> on <slot name = "createdat"></slot></p>

// 			<p>
// 				<slot name = "body"></slot>
// 			</p>
// 		</div>
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

// var vapp = new Vue({
// 	el: "#test",

// });

new Vue({
    el: '#root',
    data: {
        showmindform: true,
        posts: [],
        carbon_strings: [],
        link: '',
    },
    
    methods: {
    	getLink(){
    		this.link = window.location.href;
    		if(this.link.includes("userid")){
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
    		axios.get(this.link).then(response => {this.posts = response.data[0]; this.carbon_strings = response.data[1]; });
    		console.log(window.location.href);
    	},
    	hideForm(){
    		console.log(this.showmindform);
    		this.showmindform = false;
    		console.log(this.showmindform);
    	},
    },

    computed: {

    },

    mounted(){
    	this.getAllPosts();
    	setInterval(function () {
	     	this.getAllPosts();
	     	// console.log(this.posts.comments[0].count);
	    }.bind(this), 5000000);
	    this.hideForm();
    },
    });