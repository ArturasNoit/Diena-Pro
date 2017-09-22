<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items() {
        return $this->hasMany('App\Cart', 'order_id', 'id');
    }

    public function user() {
    	return $this->hasOne('App\User', 'id', 'user_id');
    } 
}
