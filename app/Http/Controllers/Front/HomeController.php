<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('frontEnd.home.home',[
            'products' => Product::where('status',1)->get(),
        ]);
    }
    public function category(){
        return view('frontEnd.shop.shop');
    }
    public function detailProduct($id){
        return view('frontEnd.shop.detail', [
            'product' => Product::find($id)
        ]);
    }
    public function cart(){
        return view('frontEnd.cart.cart');
    }
    public function checkout(){
        return view('frontEnd.checkout.checkout');
    }
}
