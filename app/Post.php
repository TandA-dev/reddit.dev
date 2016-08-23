<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public static function searchTitle($title){
      return Post::where('title', 'LIKE', "%{$title}%");
    }

    public static function orderedView(){
      return Post::orderBy('created_at', "desc");
    }
}
