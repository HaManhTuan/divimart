<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {
	protected $table   = 'orderdetail';
	public $timestamps = true;
	public function product() {
		return $this->belongsTo('App\Product', 'product_id', 'id');
	}
}
