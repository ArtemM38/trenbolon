<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        return view('product.details', ['product' => $product]); // Передаем объект $product в шаблон 'product.details'
        $product = Product::find($id); // или другой способ получения
return view('product.page', ['product' => $product]);
    }
    
}