<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        
        // Retrieve the current cart from session, or initialize an empty array
        $cart = session()->get('cart', []);

        // If product already exists in cart, increment quantity
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Otherwise, add new item to cart array
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', $product->name . ' added to cart!');
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Item removed!');
        }
    }

    public function update(Request $request)
    {
    $cart = session()->get('cart');

    if(isset($cart[$request->id])) {
        // Increment or Decrement quantity
        $cart[$request->id]['quantity'] += $request->quantity;

        // If quantity drops to 0 or less, remove the item entirely
        if($cart[$request->id]['quantity'] <= 0) {
            unset($cart[$request->id]);
        }
        
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Cart updated!');
    }
}