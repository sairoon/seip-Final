<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function create(){ //add product
        return view('backend.product.create',[
            'categories' => Category::where('status', 1)->get(),
        ]);
    }
    public function index(){ //manage product
        return view('backend.product.index',[
            'products' => Product::all(),
        ]);
    }
    public function store(Request $request){ //add product
        Product::createProduct($request);
        return back()->with('success', 'Product Created successfully');
    }
    public function edit($id){
        return view('backend.product.edit',[
            'product'       => Product::find($id),
            'categories'    => Category::where('status', 1)->get(),
        ]);
    }
    public function update(Request $request, $id){
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('success', 'Product updated successfully');
    }
    public function destroy($id){
        $this->product = Product::find($id);
        if (file_exists($this->product->image)){
            unlink($this->product->image);
        }
        $this->product->delete();
        return back()->with('success', 'Product deleted successfully');
    }
}
