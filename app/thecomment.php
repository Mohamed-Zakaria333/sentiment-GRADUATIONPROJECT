<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thecomment extends Model
{

	protected $table = 'comments';
        public function user()
    {
        return $this->belongsTo('App\theuser','user_id');
    }
}
