<?php

use App\Models\{Account, ProductList};

test('admin_account_exists', function () {
	expect(Account::where('role_id', Account::ADMIN)->count())->toBeGreaterThan(
		0,
	);
});

test('admin_can_access_all_product_lists', function () {
	$productLists = ProductList::all();
	expect($productLists)->not->toBeEmpty();

	$admin = Account::where('role_id', Account::ADMIN)->first();

	foreach ($productLists as $list) {
		expect($admin->hasProductListACL($list))->toBeTrue();
	}
});

test('widget_account_can_access_widget_products', function () {
	$account = Account::where('role_id', 2)->first();
	expect($account)->not->toBeEmpty();

	$list = ProductList::find(1);
	expect($list)->not->toBeEmpty();

	expect($account->hasProductListACL($list))->toBeTrue();
});

test('widget_account_cannot_access_gizmo_products', function () {
	$account = Account::where('role_id', 2)->first();
	expect($account)->not->toBeEmpty();

	$list = ProductList::find(2);
	expect($list)->not->toBeEmpty();

	expect($account->hasProductListACL($list))->toBeFalse();
});
