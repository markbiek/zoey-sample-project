<?php
namespace App\Models;

use App\Models\Product;

class ProductList {
	public $id;
	public $name;
	public $products;

	public function __construct(int $id, string $name, array $products) {
		$this->id = $id;
		$this->name = $name;
		$this->products = $products;
	}

	public static function all() {
		$productLists = [];
		$lists = $GLOBALS['productLists'];

		foreach ($lists as $list) {
			$productLists[] = ProductList::find($list['id']);
		}

		return $productLists;
	}

	// This would obviously be slow for a large number of products but it's fine with our mock data.
	// In a real-world app, this would all be database-driven
	public static function find(int $id): ProductList {
		$productList = null;
		$lists = $GLOBALS['productLists'];

		foreach ($lists as $list) {
			if ($list['id'] == $id) {
				$products = [];
				foreach ($list['products'] as $productId) {
					$product = Product::find($productId);
					if (!empty($product)) {
						$products[] = $product;
					}
				}

				$productList = new ProductList(
					$list['id'],
					$list['name'],
					$products,
				);
			}
		}

		return $productList;
	}
}
