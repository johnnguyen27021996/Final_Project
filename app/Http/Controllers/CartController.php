<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => 1,
                    'price' => $product->price_format,
                    'thumbnail' => $product->thumbnail
                )
            ];
            session()->put('cart', $cart);
        }else{
            $index = -1;
            for ($i=0; $i<count($cart); $i++)
            {
                if($cart[$i]['id'] == $product->id) {
                    $index = $i;
                    break;
                }
            }
            if($index == -1) {
                array_push($cart,
                    array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => 1,
                    'price' => $product->price_format,
                    'thumbnail' => $product->thumbnail
                ));
                session()->put('cart', $cart);
            }else{
                $cart[$index]['qty']++;
                session()->put('cart', $cart);
            }
        }
        return redirect()->back();
    }

    public function update()
    {

    }

    public function remove($cartKey)
    {
        $cart = session()->get('cart');
        array_splice($cart, $cartKey, 1);
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
