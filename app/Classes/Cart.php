<?php

namespace App\Classes;

class Cart
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalPriceTTC = 0;

    //Check if a Cart already exist and add its values to a "new" Cart:
    public function __construct($oldCart){
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalPriceTTC = $oldCart->totalPriceTTC;
        }
    }

    //Add a product:
    public function add($product, $id, $quantity) {

        //Store product infos into an array:
        $ttc = $product->prixTTC();
        $productInCart = ['qty' => $quantity, 'price' => $product->price, 'product' => $product, 'priceWithTax' => $ttc];

        //If the same product already exist in the cart, only add qty to it :
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $productInCart = $this->products[$id];
                $productInCart['qty'] += $quantity;
            }
        }

        //Calculate sub total for this product:
        $productInCart['priceXqty'] = $productInCart['price'] * $productInCart['qty'];

        $productInCart['subtotalTTC'] = $productInCart['priceWithTax'] * $productInCart['qty'];

        //Put all the infos in the class value:
        $this->products[$id] = $productInCart;
        
        //Calculate total quantity and price of the cart:
        $this->calculateQtyAndPrice();
    }

    public function updateQty($id, $quantity) {
        $this->products[$id]['qty'] = $quantity;
        $this->products[$id]['priceXqty'] = $this->products[$id]['price'] * $quantity;
        $this->products[$id]['subtotalTTC'] = $this->products[$id]['priceWithTax'] * $quantity;

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
        $sumPriceTTC = 0;
        foreach($this->products as $product) {
            $sumPrice += $product['priceXqty'];
            $sumPriceTTC += $product['subtotalTTC'];
        }

        $this->totalQty = $sumQty;
        $this->totalPrice = $sumPrice;
        $this->totalPriceTTC = $sumPriceTTC;
    }

}