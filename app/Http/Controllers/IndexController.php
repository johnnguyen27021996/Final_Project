<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cates = Category::all();
        $latestProd = Product::latest()->limit(8)->get();
        $viewProd = Product::orderBy('view_count', 'desc')->limit(6)->get();
        return view('index', compact('cates', 'latestProd', 'viewProd'));
    }
}
