<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function about()
    {
        $cates = Category::all();
        return view('Client.about', compact('cates'));
    }

    public function service()
    {
        $cates = Category::all();
        return view('Client.service', compact('cates'));
    }

    public function contact()
    {
        $cates = Category::all();
        return view('Client.contact', compact('cates'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Save contact form to Database

        return redirect()->back();
    }
}
