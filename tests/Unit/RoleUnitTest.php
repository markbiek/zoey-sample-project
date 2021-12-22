<?php

use Zoey\Models\Role;

test('roles_exist', function () {
	expect(Role::all()->count())->toBeGreaterThan(0);
});

test('role_has_permissions', function () {
	foreach (Role::all() as $role) {
		expect($role->permissions()->count())->toBeGreaterThan(0);
	}
});
