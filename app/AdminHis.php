<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminHis extends Model {
	protected $table   = 'admin_his';
	public $timestamps = false;
	public function admin_His() {
		return $this->belongsTo('App\User', 'admin_id', 'id');
	}
}
