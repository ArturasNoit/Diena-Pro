<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
 	public function dish() {
 		return $this->hasOne('App\Dish', 'id', 'dish_id');
 	}
}
