<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    //
    public function Index() {
        $cart = (new Cart())->getCart();
        return view('cart.index', ['models' => $cart]);
    }


    public function ClearCart(Request $request) {
        $cart = (new Cart())->clearCart();
        return redirect(route('home'));

    }

    public function Add(Request $request) {

    $cart = new Cart();
    if($request->ajax()){
        $model = $cart->addToCart($request['id'], 1);
        return response(view("widgets.cart", ['model' => $model])->render());
    }
    else {
        $model = $cart->addToCart($request['id']);
        return redirect(route('YourCart'));
    }
}

    public function Del(Request $request) {

        $cart = new Cart();
        if($request->ajax()){
            $model = $cart->addToCart($request['id'], -1);
            return response(view("widgets.cart", ['model' => $model])->render());
        }
        else {
            $model = $cart->addToCart($request['id'], -1);
            return redirect(route('YourCart'));
        }
    }

}

