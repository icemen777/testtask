<?php


namespace App\Widgets;

use App\Widgets\Contract\ContractWidget;
use App\Cart;

class CartWidget implements ContractWidget
{
    public function execute(){
        $cart = (new Cart())->getCart();
        return view('widgets.cart', [
            'model' => $cart
        ]);
    }
}