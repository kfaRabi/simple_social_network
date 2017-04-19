window.Event = new Vue();
Vue.component('single-post',{
	
	props: ['post_id', 'url', 'userid', 'loged_in_user_id', 'post_body'],

	data(){
		return {
			updated_post_body: '',
			comments_url: '',
			edit_post: false,
		};
	},

	template: `
		<div class="panel panel-primary">
			<div class="panel-heading">
			    <h3 class="panel-title force-inline"><a class="add-textdec" :href='"/?userid=" + userid'><slot name = "username">Dummy Name</slot></a></h3>
			    <span class="post-meta pull-right"><slot name = "createdat">Date Not Found</slot></span>
			 </div>
			 <div class="panel-body">
			 	<div v-if="!edit_post">
			    	<slot name = "body"></slot>
			    </div>
			    <div v-if="edit_post">
			    	<textarea style="height:100%; font-size: 15px !important" v-model="updated_post_body" type="text" class="form-control"
			    	name="body"></textarea>
			    </div>
			 </div>
			  <div class="panel-footer">
			  	<a :href="comments_url" class="no-textdec pull-left" style="display: inline">
			  		<span class="glyphicon glyphicon-comment"></span>&nbsp<span><slot name="number_of_comments">0 Comment</slot></span>
			  	</a>
			  	&nbsp
		  		<div class="pull-right fix-icons" v-if="!edit_post  && userid == loged_in_user_id">
					<a href="#" @click = "deletePost()" ><span style="padding: 10px" class="glyphicon glyphicon-trash"></span></a>
					<a @click = "toggleEditPost(1, $event)" href="#"><span style="padding: 10px; " class="glyphicon glyphicon-pencil"></span></a>
				</div>
				<div class="pull-right fix-icons" v-if="edit_post">
					<a href="#" @click = "savePost($event)" ><span style="padding: 10px" class="glyphicon glyphicon-ok"></span></a>
					<a href="#" @click = "toggleEditPost(0, $event)" ><span style="padding: 10px; " class="glyphicon glyphicon-remove"></span></a>
				</div>
			  </div>
		</div>
	`,

	mounted(){
		this.comments_url = this.url + "#comments_here";
		this.updated_post_body = this.post_body;
	},
	computed: {
	},
	methods: {
		toggleEditPost(showTextArea, event){
			event.preventDefault();
			if(showTextArea)
				this.edit_post = 1;
			else
				this.edit_post = 0;
		},
		savePost(event){
    		var link = '/posts/' + this.post_id + '/update?body=' + this.updated_post_body;
			console.log(link);
			axios.post(link).then( response => {
				console.log(response.data);
				this.toggleEditPost(0, event);
				// Event.$emit("postSaved");
				location.reload();
			}).catch(errors => {
				console.log(errors);
			});
		},
		deletePost(e){
    		var link = '/posts/' + this.post_id + '/delete';
			console.log(link);
			axios.get(link).then( response => {
				console.log(response.data);
				// this.toggleEditPost(0, event);
				Event.$emit("postDeleted");
				location.reload();
			}).catch(errors => {
				console.log(errors);
			});
		}
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


var app = new Vue({
    el: '#root',
    data: {
        showform: true,
        posts: [],
        carbon_strings: [],
        link: '',
        showerrors: true,
        keepshowing: true,
        emnird: false,
    	post_body: "",
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
    			emnird = true;
    		});
    		// console.log(window.location.href);
    	},
    	hideForm(){
    		this.showform = false;
    	},
    	stopShowingMessage(){
    		this.keepshowing = false; 
    	},
    	deletePost(event, id){
    		event.preventDefault();
    		var link = '/posts/' + id + '/delete';
			console.log(link);
			axios.get(link).then( response => {
				// alert(response.data);
				// console.log(response.data);
				// this.toggleEditPost(0, event);
				if(response.data == 'failure')
					location.reload();
				else if(response.data == 'success')
					document.location = 'http://127.0.0.1:8000';
			}).catch(errors => {
				console.log(errors);
			});
    	},
    	ret(){
    		return this.emniemni;
    	},
    	editPost(event, id){
    		event.preventDefault();
    		var body = document.getElementById('post_body').value;
    		var link = '/posts/' + id + '/update?body=' + body;
			console.log(link);
			axios.post(link).then( response => {
				// alert(response.data);
				console.log(response.data);
				// this.toggleEditPost(0, event);
				if(response.data == 'failure')
					location.reload();
				else if(response.data == 'success')
					document.location = 'http://127.0.0.1:8000/posts/' + id;
			}).catch(errors => {
				console.log(errors.data);
			});
    	},
    	ret(){
    		return this.emniemni;
    	}
    },

    computed: {
    	populatePostBody(body){
    		this.post_body = body;
    	}
    },

    mounted(){
    	this.getAllPosts();
    	setInterval(function () {
	     	this.getAllPosts();
	    }.bind(this), 10000000);
	    // Event.$on("postSaved", () => {
	    // 	keepshowing = true;
	    // });
    },
});