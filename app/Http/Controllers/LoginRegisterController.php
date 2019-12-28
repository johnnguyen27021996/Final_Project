<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function index()
    {
        $cates = Category::all();
        return view('Client.login_register', compact('cates'));
    }
}
