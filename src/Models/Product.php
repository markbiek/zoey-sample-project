<?php
namespace App\Models;

use App\Models\ProductList;

class Product {
	public $id;
	public $name;
	public $sku;
	public $price;

	public function __construct(
		int $id,
		string $name,
		string $sku,
		float $price
	) {
		$this->id = $id;
		$this->name = $name;
		$this->sku = $sku;
		$this->price = $price;
	}

	public function __get(string $name) {
		// Simulate a belongsTo relationship to ProductList
		if ($name == 'product_list') {
			$lists = $GLOBALS['productLists'];

			foreach ($lists as $list) {
				if (in_array($this->id, $list['products'])) {
					return ProductList::find($list['id']);
				}
			}
		}
	}

	public static function find(int $id): ?Product {
		$product = null;
		$products = $GLOBALS['products'];

		foreach ($products as $product) {
			if ($product['id'] == $id) {
				$product = new Product(
					$product['id'],
					$product['name'],
					$product['sku'],
					$product['price'],
				);
				break;
			}
		}

		return $product;
	}
}
