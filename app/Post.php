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
    	$this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters){
        if($month = $filters['month']){
            $query->whereMonth('created_at' , Carbon::parse($month)->month);
        }
        if($year = $filters['year']){
            $query->whereYear('created_at' , $year);
        }
   }

   public static function archaives(){
        return Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) count')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get();
   }


}
