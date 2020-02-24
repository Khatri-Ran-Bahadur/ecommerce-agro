<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::where('status', true)->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.index',compact('products'));
    }
}
