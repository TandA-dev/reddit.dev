<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\
class Vote extends Model
{
	public function post() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public static function votesUp() {
    	// return Vote::where('vote', '=', 'up')->groupBy('post_id')->get()->count();

    	return DB::table('votes')
    		->select(DB::raw('post_id, count(*)'))
    		->where('vote', '=', 'up')
    		->groupBy('post_id')
    		->get();
    }
    public static function votesDown() {
    	return Vote::where('vote', '=', 'down')->groupBy('post_id')->get()->count();
    }
}
