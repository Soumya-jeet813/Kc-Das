<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display the shop page with all products.
     */
    public function index()
    {
        // Fetch all products from the 'products' table
        $products = Product::all();

        // Return the 'shop' view and pass the products data
        return view('shop', compact('products'));
    }

    /**
     * Optional: Show a single product detail page.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-single', compact('product'));
    }
}