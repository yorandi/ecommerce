<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addCategory(){
        return view('admin.addcategory');
    }
    public function postAddcategory(Request $request){
        $category = new Category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('category_message' , 'Category Add Successfully');

    }

    public function viewCategory(){
        $categories = Category::all();
        return view ('admin.viewcategory', compact('categories'));
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deletecategory_msg' , 'Category Deleted Successfully');
    }

    public function updateCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.updatecategory', compact('category'));
    }

    public function postUpdateCategory(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->update();
        return redirect()->route('admin.viewcategory')->with('updatecategory_msg' , 'Category Updated Successfully');
    }

    public function addProduct(){
        $categories = Category::all();

        return view('admin.addproduct', compact('categories'));
    }

    public function postAddProduct(Request $request){
        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $image = $request->product_image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();

            $product->product_image = $imageName;
        }

        $product->product_category = $request->product_category;
        $product->save();
        if($image && $product->save()){
            $request->product_image->move('products', $imageName);
        }

        return redirect()->back()->with('product_message' , 'Produk Berhasil Ditambahkan');
    }

    public function viewProduct(){
        $products = Product::paginate(1);
        return view('admin.viewproduct', compact('products'));
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $imagePath = public_path('products/' . $product->product_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        return redirect()->back()->with('deleteproduct_msg' , 'Produk Berhasil Dihapus');
    }

    public function updateProduct($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.updateproduct', compact('product', 'categories'));
    }

    public function postUpdateProduct(Request $request, $id){
        $product = Product::findOrFail($id);

        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $imagePath = public_path('products/' . $product->product_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image = $request->product_image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $product->product_image = $imageName;
        }

        $product->product_category = $request->product_category;
        $product->update();
        if($image && $product->update()){
            $request->product_image->move('products', $imageName);
        }

        return redirect()->route('admin.viewproduct')->with('updateproduct_msg' , 'Produk Berhasil Diupdate');
    }
}
