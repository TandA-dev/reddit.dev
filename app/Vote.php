<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database;
class Vote extends Model
{
	public function post() {
        return $this->belongsTo(Post::class);
    }

}
