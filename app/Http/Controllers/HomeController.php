<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $product = Product::inRandomOrder()->limit(3)->get();
        
        return view('home')->with('product', $product);
    }
}
