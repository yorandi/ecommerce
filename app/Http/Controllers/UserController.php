<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;

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
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = 0;
        }
        $products = Product::latest()->take(1)->get();
        return view('index', compact('products', 'count'));
    }

    public function productDetails($id){
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = 0;
        }
        $product = Product::findOrFail($id);
        return view('product_details', compact('product', 'count'));
    }

    public function viewAllProducts(){
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = 0;
        }
        $products = Product::all();
        return view('allproducts', compact('products', 'count'));
    }

    public function addToCart(Request $request, $id){
        $product = Product::findOrFail($id);
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;
        $product_cart->quantity = $request->quantity;
        $product_cart->save();

        return redirect()->back()->with('cart_added', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function cartProduct(){
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
              $cart_products = ProductCart::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $count = "";
        }
        $user_id = Auth::id();

        $count = ProductCart::where('user_id', $user_id)->count();
        return view('viewcartproduct', compact('cart_products', 'count'));
    }

    public function removeCartProduct($id){
        $cart_product = ProductCart::findOrFail($id);
        $cart_product->delete();
        return redirect()->back()->with('cart_removed', 'Produk berhasil dihapus dari keranjang!');
    }
}
