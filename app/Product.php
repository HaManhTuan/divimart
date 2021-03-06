<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $table    = 'products';
	protected $fillable = ['name', 'url', 'color', 'category_id','author_id', 'description', 'status', 'image', 'price', 'promotional_price', 'sale', 'count','content','infor'];
	public $timestamps  = true;
	public function attributes() {
		return $this->hasMany('App\ProductAttr', 'product_id');
	}
	public function category() {
		return $this->belongsTo('App\Category', 'category_id', 'id');
	}
}
