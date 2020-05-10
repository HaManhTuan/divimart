<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model {
	protected $table   = 'product_attr';
	public $timestamps = true;
	public function size() {
		return $this->belongsTo('App\ProductSize', 'size_id', 'id');
	}
	public function product() {
		return $this->belongsTo('App\Product', 'product_id', 'id');
	}
}
