<?php
    namespace App;
    class Cart{
        public $product = null;
        public $tonggia = 0;
        public $tongsoluong = 0;
        
        public function __constant($cart){
            if ($cart){
                $this->product = $cart->product;
                $this->tonggia = $cart->tonggia;
                $this->tongsoluong = $cart->tongsoluong;
            }
        }

        public function add_cart($product, $id){
            $newProduct = ['soluong' => 0, 'price' => $product->price, 'productInfo' => $product];
            if($this->product){
                if(array_key_exists($id, $product)){
                    $newProduct = $product[$id];
                }
            } 
            $newProduct['soluong']++;
            $newProduct['price'] = $newProduct['soluong'] * $product->price;
            $this->product[$id] = $newProduct;
            $this->tonggia += $product->price; 
            $this->tongsoluong ++;
        }
    }
?>