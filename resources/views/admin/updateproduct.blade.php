@extends('admin.maindesign')
<base href="/public">
@section('addproduct')
    {{-- @if (session('product_message'))
        <div class="mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('product_message') }}
        </div>
    @endif --}}


    <div class="container-fluid mx-2">
        <form action="{{ route('admin.postupdateproduct', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center items-center mb-5">Update Produk</h1>
            <input type="text" name="product_name" class="form-control mb-3 rounded" value="{{ $product->product_name }}">
            <textarea name="product_description" class="form-control mb-3 rounded" cols="30" rows="10">{{ $product->product_description }}</textarea>
            <input type="number" name="product_quantity" class="form-control mb-3 rounded"
                placeholder="Input Jumlah Produk" value="{{ $product->product_quantity }}">
            <input type="number" name="product_price" id="price" class="form-control mb-3 rounded"
                placeholder="Input Harga Produk" value="{{ $product->product_price }}">
            <div class="mb-3">
                <img src="{{ asset('products/' . $product->product_image) }}" alt="image"
                    style="width: 100px; height: auto;">
            </div>
            <input class="form-control mb-3" type="file" name="product_image" id="formFile">
            <select name="product_category" id="category" class="form-control mb-3 rounded">
                @foreach ($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                @endforeach
            </select>
            <div class="items-center text-center w-full mb-5">
                <input type="submit" class="btn btn-success" value="Update Product" name="submit"></input>
            </div>
        </form>
    </div>
@endsection
