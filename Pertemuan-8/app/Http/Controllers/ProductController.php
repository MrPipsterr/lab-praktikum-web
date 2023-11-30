<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function showByProductLine($productLine)
    {
        $products = Product::where('productLine', $productLine)->get();
        return view('productline', ['productLine' => $productLine, 'products' => $products]);
    }

    public function showProductDetail($productCode)
    {
        $product = Product::where('productCode', $productCode)->first();
        return view('details', ['products' => [$product]]);
    }
}