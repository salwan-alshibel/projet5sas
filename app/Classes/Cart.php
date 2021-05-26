<?php

namespace App\Classes;

class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    //Always check if a Cart already exist and add its values to a "new" Cart:
    public function __construct($oldCart){
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    //Add a new product:
    public function add($product, $id, $quantity) {
        //Store product infos in an array:
        $storedProduct = ['qty' => $quantity, 'price' => $product->price, 'product' => $product];
        //If the same product already exist in the cart, only add qty to it :
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedProduct = $this->products[$id];
                $storedProduct['qty'] += $quantity;
            }
        }

        $storedProduct['totalprice'] = $product->price * $storedProduct['qty'];

        $this->products[$id] = $storedProduct;
        $this->totalQty = $storedProduct['qty'];
        $this->totalPrice = $storedProduct['totalprice'];
    }

}