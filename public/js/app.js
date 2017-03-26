
Vue.component('single-post',{
	
	props: ['url', 'userid'],

	data(){
		return {comments_url: ''};
	},

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
			  	<a :href="comments_url" class="no-textdec">
			  		<span class="glyphicon glyphicon-comment"></span>&nbsp<span><slot name="number_of_comments">0 Comment</slot></span>
			  	</a>
			  	&nbsp
			  	<a :href='url' class="no-textdec">
				  	<span class="pull-right" >
				  		Visit Post Page
				  		<span class="glyphicon glyphicon-chevron-right"></span>
				  	</span>
			  	</a>
			  </div>
		</div>
	`,

	mounted(){
		this.comments_url = this.url + "#comments_here";
	}

});

Vue.component('posts-list',{
	
	//props: [],

	template: `
	<div>
		<slot>No Post Found</slot>
	</div>
	`,

	methods: {
		//
	},

	created() {

	},

});


new Vue({
    el: '#root',
    data: {
        showform: true,
        posts: [],
        carbon_strings: [],
        link: '',
        showerrors: true,
        keepshowing: true,
    },
    
    methods: {
    	getLink(){
    		this.link = window.location.href;
    		if(this.link.includes("userid")){
    			var pos = this.link.indexOf("?", 10);
    			this.link = "/all-posts/" + this.link.substring(pos, this.link.length);
    			this.showform = false;
    		}
    		else{
    			this.link = "/all-posts";
    		}
    		console.log(this.link);
    	},
    	getAllPosts(){
    		this.getLink();
    		axios.get(this.link).then(response => {
    			this.posts = response.data[0];
    			this.carbon_strings = response.data[1];
    		});
    		// console.log(window.location.href);
    	},
    	hideForm(){
    		this.showform = false;
    	},
    	stopShowingMessage(){
    		this.keepshowing = false; 
    	}
    },

    computed: {

    },

    mounted(){
    	this.getAllPosts();
    	setInterval(function () {
	     	this.getAllPosts();
	    }.bind(this), 10000000);
    },
});