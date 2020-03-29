<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $table   = 'orders';
	public $timestamps = true;
	public function orders() {
		return $this->hasMany('App\OrderDetail', 'order_id');
	}
	public static function getOrderDetails($order_id) {
		$getOrderDetails = Orders::where('id', $order_id)->first();
		return $getOrderDetails;
	}
}
