<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Cart

 */
class Cart
{
    /**
    Добавить в корзину и расчитать сумму
     */
    public function addToCart($id, $count = 1) {
        $count = (int)$count;

        $id = abs((int)$id);
        $product = Product::find($id);
        if (empty($product)) {
            return;
        }
        if ($count > 10) {
            $count = 10;
        }

        if (!session()->has('cart')) {
            session()->put('cart', []);
            $cart = [];
        } else {
            $cart = session()->get('cart');
        }
        if ((isset($cart['products'][$product->id])) && ($cart['products'][$product->id]['count']>0)) { // такой товар
            // уже
            // есть?
            $count = $cart['products'][$product->id]['count'] + $count;
            if ($count > 100) {
                $count = 100;
            }
            $cart['products'][$product->id]['count'] = $count;
        } else { // такого товара еще нет
            if ($count == 1) {
                $cart['products'][$product->id]['name'] = $product->title;
                $cart['products'][$product->id]['price'] = $product->price;
                $cart['products'][$product->id]['count'] = $count;
            }
        }
        $summa = 0.0;
        foreach ($cart['products'] as $item) {
            $summa = $summa + $item['price'] * $item['count'];
        }
        $cart['summa'] = $summa;
        session()->put('cart', $cart);
        return $cart;
    }

    /**
     * Метод удаляет товар из корзины
     */
    public function removeFromCart($id) {
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
    }

    function getCart() {
        if (session()->has('cart')) {
            $b = session()->get('cart');
            return $b;
        } else {
            return [];
        }
    }

    function setCart($cart) {
        session()->put(['Cart', $cart]);
    }

    public function clearCart() {
        if (session()->has('cart')) {
            session()->put('cart', []);
        }
    }   //
}
