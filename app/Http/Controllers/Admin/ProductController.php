<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use  App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Product::with('cate')->latest()->paginate(5);

        return view('Admin.product.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::all();

        return view('Admin.product.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $cate_id = $request->input('cate_id');
        $file = $request->file('thumbnail');

        $new = new Product();
        $new->name = $name;
        $new->description = $description;
        $new->price = $price;
        $new->cate_id = $cate_id;
        if($file != null)
        {
            $thumbnail = time().$file->getClientOriginalName();
            $file->move('uploads/product/', $thumbnail);
            $new->thumbnail = $thumbnail;
        }
        $new->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cates = Category::all();
        return view('Admin.product.edit', compact('product', 'cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'thumbnail' => 'image',
        ]);

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $file = $request->file('thumbnail');
        $cate_id = $request->input('cate_id');
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->cate_id = $cate_id;
        if($file != null){
            if(file_exists('uploads/product/'.$product->thumbnail) && $product->thumbnail != 'product_thumbnail.png') {
                unlink('uploads/product/'.$product->thumbnail);
            }
            $thumbnail = time().$file->getClientOriginalName();
            $file->move('uploads/product/', $thumbnail);
            $product->thumbnail = $thumbnail;
        }
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(file_exists('uploads/product/'.$product->thumbnail) && $product->thumbnail != 'product_thumbnail.png')
        {
            unlink('uploads/product/'.$product->thumbnail);
        }
        $product->delete();

        return redirect()->route('product.index');
    }
}
