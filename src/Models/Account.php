<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {
	const ADMIN = 1;

	public function role() {
		return $this->belongsTo('Zoey\Models\Role');
	}

	public function getIsAdminAttribute() {
		return $this->role_id === Account::ADMIN;
	}

	public function checkACL(string $field, $value): bool {
		// Admins can see everything
		if ($this->role_id === Account::ADMIN) {
			return true;
		}

		// Everyone else needs to have the ACL checked
		return $this->role
			->permissions()
			->where($field, $value)
			->count() > 0;
	}
}
