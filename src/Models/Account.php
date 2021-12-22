<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {
	public function role() {
		return $this->belongsTo('Zoey\Models\Role');
	}
}
