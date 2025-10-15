<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)
            ->with('category')
            ->latest()
            ->paginate(12);
        
        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();
        
        return view('products.show', compact('product'));
    }

    public function catalogue()
    {
        $categories = Category::with(['products' => function($query) {
            $query->where('is_active', true)->latest();
        }])->get();
        
        return view('catalogue', compact('categories'));
    }
}
