<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model {
	protected $table   = 'admin_log';
	public $timestamps = false;
	public function admin_Log() {
		return $this->belongsTo('App\User', 'admin_id', 'id');
	}
}
