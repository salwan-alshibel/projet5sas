<?php

namespace App\Classes;

class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    //Check if a Cart already exist and add its values to a "new" Cart:
    public function __construct($oldCart){
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    //Add a product:
    public function add($product, $id, $quantity) {

        //Store product infos into an array:
        $productInCart = ['qty' => $quantity, 'price' => $product->price, 'product' => $product];

        //If the same product already exist in the cart, only add qty to it :
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $productInCart = $this->products[$id];
                $productInCart['qty'] += $quantity;
            }
        }

        //Calculate sub total for this product:
        $productInCart['priceXqty'] = $productInCart['price'] * $productInCart['qty'];

        //Put all the infos in the class value:
        $this->products[$id] = $productInCart;
        
        //Calculate total quantity and price of the cart:
        $this->calculateQtyAndPrice();

        // $sumQty = 0;
        // foreach($this->products as $product) {
        //     $sumQty += $product['qty'];
        // }

        // $sumPrice = 0;
        // foreach($this->products as $product) {
        //     $sumPrice += $product['priceXqty'];
        // }

        // $this->totalQty = $sumQty;
        // $this->totalPrice = $sumPrice;
        // dd($this->products[$id]['qty']);
        //dd($productInCart, $productInCart['qty'], $this->products, $this->totalQty, $total);
    }

    public function updateQty($id, $quantity) {
        $this->products[$id]['qty'] = $quantity;
        $this->products[$id]['priceXqty'] = $this->products[$id]['price'] * $quantity;

        $this->calculateQtyAndPrice();
    }

    public function remove($id) {
        unset($this->products[$id]);

        $this->calculateQtyAndPrice();
    }

    public function calculateQtyAndPrice() {
        $sumQty = 0;
        foreach($this->products as $product) {
            $sumQty += $product['qty'];
        }

        $sumPrice = 0;
        foreach($this->products as $product) {
            $sumPrice += $product['priceXqty'];
        }

        $this->totalQty = $sumQty;
        $this->totalPrice = $sumPrice;
    }

}