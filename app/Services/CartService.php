<?php

namespace App\Services;

class CartService
{


    /**
     * Метод удаляет товар из корзины
     */
   /* public function removeFromCart($id) {
        $id = abs((int)$id);

        if (!session()->has('cart')) {
            return;
        }
        $cart = session()->get('cart');
        if (!isset($basket['products'][$id])) {
            return;
        }
        unset($cart['products'][$id]);
        if (count($cart['products']) == 0) {
            session()->put('Cart', []);
            return;
        }
        $amount = 0.0;
        foreach ($cart['products'] as $item) {
            $amount = $amount + $item['price'] * $item['count'];
        }
        $cart['summa'] = $amount;

        session()->put('cart', $cart);
    }*/

    static public function getCart():array {
        if (session()->has('cart')) {
            $b = session()->get('cart');
            return $b;
        } else {
            return [];
        }
    }

    static public function saveCart($cart) {
        session()->put('cart', $cart);
    }

    static public function clearCart() {
        if (session()->has('cart')) {
            session()->forget('cart');
        }
    }   //

}