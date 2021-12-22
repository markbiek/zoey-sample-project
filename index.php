<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

require_once __DIR__ . '/bootstrap.php';

use App\Models\{Account, Product, ProductList};

$matches = [];
preg_match('/^(.*?)(\?.*$)/', $_SERVER['REQUEST_URI'], $matches);

$impersonating = isset($_GET['impersonate'])
	? Account::find($_GET['impersonate'])
	: null;

$route = !empty($matches) ? $matches[1] : '/';

if ($route == '/') {
	render('homepage', [
		'accounts' => Account::all(),
		'impersonating' => $impersonating,
		'productLists' => ProductList::all(),
	]);
} elseif ($route == '/checkout') {
	render('checkout', [
		'impersonating' => $impersonating,
	]);
} elseif ($route == '/product') {
	render('product', [
		'impersonating' => $impersonating,
		'product' => Product::find($_GET['id']),
	]);
}
