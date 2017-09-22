<?php
// namespace App\Http;
/*
class Helpers {
    public static function FixData($data){
        $d = explode("-", $data);
        return $d[2]."/".$d[1]."/".$d[0];
    }
}*/
use App\Cart;
use Illuminate\Http\Request;

function cart_size($token) {

	// $request = new Request;
	// $data = $request->session()->all();
	// dd($data);

	$size = Cart::where('token', $token)->whereNull('order_id')->count();
	/* SELECT COUNT(*) FROM carts WHERE token = 'sdfjwerwer'... */

	return $size;
}

function cart_amount($token) {

	$carts = Cart::where('token', $token)->whereNull('order_id')->get();
	$amount = 0;

	foreach ($carts as $cart) {
		$amount += $cart->dish->price;
	}

	return number_format($amount, 2);

}