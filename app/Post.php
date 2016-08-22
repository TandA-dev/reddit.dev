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

<<<<<<< HEAD
    public function user()
   {
       return $this->belongsTo('App\User', 'created_by', 'id');
   }
    // public function user(){
    //   return $this->belongsTo('App\User' 'created_by', 'id');
    // }
=======
    public function user(){
      return $this->belongsTo('App\User', 'created_by', 'id');
    }
>>>>>>> e0cb0df81e204038bd402f3e0c6739e9b72d49be
}
