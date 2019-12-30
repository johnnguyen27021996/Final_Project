<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function index()
    {
        $cates = Category::all();
        return view('Client.login_register', compact('cates'));
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            return redirect()->route('index');
        }
        return redirect()->back();


    }

    public function logout()
    {
        auth()->logout();
        return redirect()->back();
    }
}
