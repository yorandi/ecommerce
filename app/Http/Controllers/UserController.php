<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->usertype == 'user') {
            return view('dashboard');

        } else if(Auth::check() && Auth::user()->usertype == 'admin') {
            return view('admin.dashboard');
        }

    }

    public function home()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('index', compact('categories', 'products'));
    }

    public function productDetails($id){
        $product = Product::findOrFail($id);
        return view('product_details', compact('product'));
    }
}
