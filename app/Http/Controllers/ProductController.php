<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Diplom\Product;
use Diplom\Category;

class ProductController extends Controller
{
    /*
         * Показать список товаров
         */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products', [
            'products' => $products
        ]);
    }

    /*
     * Показать детали товара
     */
    public function show($url)
    {
        $product = Product::where('url', '=', $url)->firstOrFail();
        $images = $product->images()->get();

        return view('product', [
            'product' => $product,
            'images' => $images
        ]);
    }

    public function searchResult(Request $request)
    {
        $query = $request->input('search');
        $search = Product::where('name', 'LIKE', "%{$query}%")->paginate(10);

        return view('products', [
            'products' => $search
        ]);
    }
}
