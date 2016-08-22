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

    // public function user(){
    //   return $this->belongsTo('App\User' 'created_by', 'id');
    // }
}
