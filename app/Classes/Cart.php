<?php

namespace App\Classes;

class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice =0;

    //Always check if a Cart already exist and add its values to a "new" Cart:
    public function __construct($oldCart){
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    //Add a new product:
    public function add($product, $id) {
        $storedProduct = ['qty' => 0, 'price' => $product->price, 'product' => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedProduct = $this->products[$id];
            }
        }
        $storedProduct['qty']++;
        $storedProduct['price'] = $product->price * $storedProduct['qty'];

        $this->products[$id] = $storedProduct;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }

}