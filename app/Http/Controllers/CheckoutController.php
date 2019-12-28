<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cates = Category::all();
        return view('Client.checkout', compact('cates'));
    }
}
