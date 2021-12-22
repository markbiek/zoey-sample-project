<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zoey\Traits\HasRole;

class Account extends Model {
	use HasRole;

	const ADMIN = 1;

	public function getIsAdminAttribute() {
		return $this->role_id === Account::ADMIN;
	}
}
