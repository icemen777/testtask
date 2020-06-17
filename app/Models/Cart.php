<?php

namespace App\Models;


use App\Services\CartService;

/**
 * App\Cart
 */
class Cart
{
    private $realcart; /* in magic methods __set __get used $carts -  Использованы магинческие методы */

    public function __construct()
    {
        $this->realcart = CartService::getCart();
    }

    public function clearCart()
    {
        $this->realcart = null;
        CartService::clearCart();
    }

    public function addToCart($id, $count = 1)
    {
        $count = (int)$count;
        $id = abs((int)$id);

        $product = Product::find($id);
        if (empty($product)) {
            return;
        }

        $cart = $this->realcart;

        if ((isset($cart['products'][$product->id])) && ($cart['products'][$product->id]['count'] > 0)) { // такой товар
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
        $this->carts = $cart;
        return $cart;
    }

    public function __get($var)
    {
        if ($var == 'carts') {
            if ($this->realcart == null) $this->realcart = CartService::getCart();
            return $this->realcart;
        }
        abort('404', 'This is Unknown variable name.');
    }

    public function __set($var, $value)
    {
        if ($var == 'carts') {
            $this->realcart = $value;
            CartService::saveCart($value);
            return true;
        }
        abort('404', 'Unknown variable name.');
    }
}
