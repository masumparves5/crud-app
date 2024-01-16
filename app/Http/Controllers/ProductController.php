<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }
    public function edit($id)
    {
        return view('product.edit', [
            "product"=>Product::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/product/manage')
            ->with('message', 'Product info Update Successfully');
    }

    public function menage()
    {
        return view('product.manage', [
            'products' => Product::all()
        ]);
    }
    public function store(Request $request)
    {
        Product::newProduct($request);
        return back()
            ->with('message', 'Product info save successfully');
    }
    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect('/product/manage') ->with('message', 'delete Product');
    }
}

