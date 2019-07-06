<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theuser extends Model
{
	protected $table = 'users';
       public function comment()
    {
        return $this->hasmany('App\thecomment','user_id');
    }
}
