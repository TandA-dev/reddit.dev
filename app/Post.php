<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    //
    use SoftDeletes;
    public static $rules = [
      'title' => 'required|max:100',
      'url'   => 'required|active_url'
    ];

    // SELECT  * FROM users WHERE id = $post->created_by;
    public function user(){
      return $this->belongsTo(User::class, 'created_by');
    }

    public function votes() {
        return $this->hasMany(Vote::class);
    }

    public static function searchTitle($title){
      return Post::where('title', 'LIKE', "%{$title}%");
    }

    public static function orderedView(){
      return Post::orderBy('created_at', "desc");
    }

    public static function withVotes(){
      return Post::select('posts.*', DB::raw('SUM( CASE WHEN votes.vote = "up" THEN 1 ELSE 0 END ) AS positive_votes'), DB::raw('SUM( CASE WHEN votes.vote = "down" THEN 1 ELSE 0 END ) AS negative_votes'))->leftJoin('votes', 'votes.post_id', '=', 'posts.id')->groupBy('posts.id');//Query()->toSql();
    }
}
