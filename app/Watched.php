<?php
	namespace App;
	class Watched{
		public $products =null;

		public function __construct($cart){
			if($cart){
				$this->products = $cart->products;
			}
		}

		public function AddWatched($product, $id)
		{
			$newProduct = ['productInfo'=> $product];

			if ($this->products) {
				if (array_key_exists($id,$this->products)) {
					$newProduct = $this->products[$id];
				}
			}
			$this->products[$id] = $newProduct;
			if (count($this->products)==5) {
				unset($this->products[array_key_first($this->products)]);
				
			}

		}
		
	}
?>