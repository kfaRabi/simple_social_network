<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth')->only(['store', 'destroy','edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->getAllPosts();
        // dd(Post::with(['user' => function($query){
        //     $query->addSelect(['id', 'name']);
        // }])->get());
        // get all the posts from database
        ////$query = Post::latest()->filter(request(['month', 'year']));
        // if($month = request('month')){
        //     $query->whereMonth('created_at' , Carbon::parse($month)->month);
        // }
        // if($year = request('year')){
        //     $query->whereYear('created_at' , $year);
        // }
        ////$posts = $query->get();



        // $archaives = Post::archaives();

        // pass all the posts to the view and return the view
        return view('posts.index');
        // return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // public function store(Request $request)
    public function store()
    {
        

        $this->validate(request(), [
            'body' => 'required'
        ]);

        /*
        //using store(Request $request)

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        */

        /*
        //using store()

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        */

        //best & shortest way when there were no user:
        //must add protected $fillable or $guarded varible in the model
        //still possible with user, but have get the id using auth()->user()->id manually and pass it
        //Post::create(request(['title', 'body']));


        auth()->user()->publish(
            new Post(request(['body']))
        );

        return redirect()->back();
    }

    public function getAllPosts(){
        // return ['A', 'B'];
        $posts = Post::latest()
                ->filter(request(['userid']))
                ->with(['user' => function($query){
                    $query->addSelect(['id', 'name']);
                }])
                ->with(['comments' => function($query){
                    $query->selectRaw('post_id, count(*) as count')->groupBy('post_id');
                }])
                ->get();
        // return $posts;
        $carbon_strings = array();;
        foreach ($posts as $post) {
            array_push($carbon_strings, $post->created_at->diffForHumans());
        }
        return [$posts, $carbon_strings];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    // public function show(Post $post)
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(auth()->check() && auth()->user()->id == $post->user_id){
            return view('posts.edit',compact('post'));
        }
        else{
            session()->flash('message', ['You don not have the permissons to edit this post', 'danger']);
            return redirect('/posts/'.$post->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {

        $this->validate(request(),[
                'body' => 'required|min:5'
            ]);

        if(auth()->check() && auth()->user()->id == $post->user_id){
            $post->body = request('body');
            $post->save();
            session()->flash('message', ['Your post has been successfully updated', 'success']);
            return redirect('/posts/'.$post->id);
        }
        else{
            session()->flash('message', ['You don not have the permissons to edit this post', 'danger']);
            return redirect('/posts/'.$post->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(auth()->check() && $post->user_id == auth()->user()->id){
            $post->comments()->delete();
            $post->delete();
            session()->flash('message', ['Your post wass successfully deleted', 'success']);
            return redirect('/');
        }
        else{
            session()->flash('message', ['Sorry, You have to be the owner of the post to delete it','warning']);
            return redirect()->back();
        }
    }
}
