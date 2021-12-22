<?php

/**
 * This file contains our mock product & product list data. In the interest of time, we opted to fake this instead of having it in the database
 */

$GLOBALS['products'] = [
	[
		'id' => 1,
		'name' => 'Widget 100',
		'sku' => 'wdg-100',
		'price' => 10.0,
	],
	[
		'id' => 2,
		'name' => 'Widget 200',
		'sku' => 'wdg-200',
		'price' => 20.0,
	],
	[
		'id' => 3,
		'name' => 'Widget 300',
		'sku' => 'wdg-300',
		'price' => 30.0,
	],
	[
		'id' => 4,
		'name' => 'Gizmo 100',
		'sku' => 'giz-100',
		'price' => 10.0,
	],
	[
		'id' => 5,
		'name' => 'Gizmo 200',
		'sku' => 'giz-200',
		'price' => 20.0,
	],
	[
		'id' => 6,
		'name' => 'Gizmo 300',
		'sku' => 'giz-300',
		'price' => 30.0,
	],
];

$GLOBALS['productLists'] = [
	[
		'id' => 1,
		'name' => 'Widgets',
		'products' => [1, 2, 3],
	],
	[
		'id' => 2,
		'name' => 'Gizmos',
		'products' => [4, 5, 6],
	],
];
