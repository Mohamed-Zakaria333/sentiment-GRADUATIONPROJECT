<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theproduct extends Model
{
   	protected $table = 'products';
        public function comments()
    {
        return $this->hasmany('App\thcomment','product_id');
    }
}
