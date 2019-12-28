<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use function foo\func;

class ProductController extends Controller
{
    public function index()
    {
        $cates = Category::all();
        $prods = Product::with('cate')->latest()->paginate(8);
        return view('Client.product', compact('cates', 'prods'));
    }

    public function show(Product $product)
    {
        $id = $product->id;
        $cate_id = $product->cate_id;
        $cates = Category::all();
        $relatedProd = Product::with('cate')
                              ->where('id', '<>' , $id)
                              ->whereHas('cate', function ($query) use ($cate_id) {
                                  $query->where('id', $cate_id);
                              })->limit(4)->get();
        $viewProd = Product::orderBy('view_count', 'desc')->limit(6)->get();
        return view('Client.single_product', compact('cates', 'product', 'relatedProd', 'viewProd'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $cate_id = $request->input('cate_id');
        $cates = Category::all();
        $prods = Product::with('cate')
                        ->when($cate_id, function($query, $cate_id) {
                            $query->where('cate_id', $cate_id);
                        }, function ($query) {
                            $query->get();
                        });
        switch ($name)
        {
            case 'ds':
                $prods = $prods->paginate(8);
                break;
            case 'po':
                $prods = $prods->orderBy('view_count', 'desc')->paginate(8);
                break;
            case 'la':
                $prods = $prods->latest()->paginate(8);
                break;
            case 'hp':
                $prods = $prods->orderBy('price', 'desc')->paginate(8);
                break;
            case 'lp':
                $prods = $prods->orderBy('price', 'asc')->paginate(8);
                break;
            default:
                dd('Exception');
        }
        return view('Client.product', compact('cates', 'prods'));
    }
}
