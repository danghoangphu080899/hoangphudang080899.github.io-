<?php
	namespace App;
	class Cart{
		public $products =null;
		public $totalPrice = 0;
		public $totalQuanty = 0;

		public function __construct($cart){
			if($cart){
				$this->products = $cart->products;
				$this->totalPrice = $cart->totalPrice;
				$this->totalQuanty = $cart->totalQuanty;
			}
		}

		public function AddCart($product, $id)
		{
			$newProduct = ['quanty' => 0,'price'=> $product->Gia, 'productInfo'=> $product];

			if ($this->products) {
				if (array_key_exists($id,$this->products)) {
					$newProduct = $this->products[$id];
				}
			}
			$newProduct['quanty']++;
			$newProduct['price'] = $newProduct['quanty']*$product->Gia;
			$this->products[$id] = $newProduct;
			$this->totalPrice +=  $product->Gia;
			$this->totalQuanty ++;
		}
		public function DeleteItem($id)
		{
			$this->totalQuanty -= $this->products[$id]['quanty'];
			$this->totalPrice -= $this->products[$id]['price'];
			unset($this->products[$id]);
		}
		public function UpdateItem($id, $quanty)
		{
			$this->totalQuanty -= $this->products[$id]['quanty'];
			$this->totalPrice -= $this->products[$id]['price'];

			$this->products[$id]['quanty'] = $quanty;
			$this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->Gia;

			$this->totalQuanty += $this->products[$id]['quanty'];
			$this->totalPrice += $this->products[$id]['price'];

		}
		public function AddsCart($product, $id, $quanty)
		{
			$newProduct = ['quanty' => 0,'price'=> $product->Gia, 'productInfo'=> $product];

			if ($this->products) {
				if (array_key_exists($id,$this->products)) {
					$newProduct = $this->products[$id];

				}	
			} 
			$oldPrice = $newProduct['quanty'] *$product->Gia;
			$newProduct['quanty'] += $quanty;
			$newProduct['price'] = $newProduct['quanty']*$product->Gia;
			$this->products[$id] = $newProduct;
			$this->totalPrice = $this->totalPrice -$oldPrice+  $newProduct['price'];
			$this->totalQuanty += $quanty;
			
			
		}
	}
?>