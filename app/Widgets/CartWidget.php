<?php


namespace App\Widgets;

use App\Widgets\Contract\ContractWidget;
use App\Models\Cart;

class CartWidget implements ContractWidget
{
    public function execute(){
        $cart = (new Cart())->carts;
        return view('widgets.cart', [
            'model' => $cart
        ]);
    }
}