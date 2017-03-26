<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    //ORM
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }
    //not using it
    public function addComment($body){
    	// $this->comments()->create(['body' => $body]);
        $user_id = auth()->id();
    	$this->comments()->create(compact('body', 'user_id'));
    }

    public function scopeFilter($query, $filters){
        if($userid = $filters['userid']){
            $query->where('user_id' , $userid);
        }
   }

   public static function postsGroupedByMembers(){
        return Post::selectRaw('user_id, count(*) count')
        ->groupBy('user_id')
        ->orderByRaw('user_id desc')
        ->get();
   }


}
