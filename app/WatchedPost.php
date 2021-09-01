<?php
	namespace App;
	class WatchedPost{
		public $posts =null;

		public function __construct($cart){
			if($cart){
				$this->posts = $cart->posts;
			}
		}

		public function AddWatchedPost($post, $id)
		{
			$newPost = ['postInfo'=> $post];

			if ($this->posts) {
				if (array_key_exists($id,$this->posts)) {
					$newPost = $this->posts[$id];
				}
			}
			$this->posts[$id] = $newPost;
			if (count($this->posts)==6) {
				unset($this->posts[array_key_first($this->posts)]);
				
			}

		}
		
	}
?>