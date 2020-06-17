<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;


class CartController extends Controller
{
    //
    public function index() {
        $cart = new Cart();
        return view('cart.index', ['models' => $cart]);
    }


    public function clearCart(Request $request) {
        $cart = (new Cart())->clearCart();
        return redirect(route('home'));

    }

    public function add(Request $request) {

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

    public function del(Request $request) {

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

