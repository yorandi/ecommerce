@extends('admin.maindesign')

@section('addproduct')
    @if (session('product_message'))
        <div class="mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('product_message') }}
        </div>
    @endif

    <div class="container-fluid mx-2">
        <form action="{{ route('admin.postaddproduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center items-center mb-5">Masukan Nama Produk</h1>
            <input type="text" name="product_name" class="form-control mb-3 rounded" placeholder="Input Nama Produk">
            <textarea name="product_description" class="form-control mb-3 rounded" cols="30" rows="10">DESKRIPSI PRODUK.....</textarea>
            <input type="number" name="product_quantity" class="form-control mb-3 rounded"
                placeholder="Input Jumlah Produk">
            <input type="number" name="product_price" id="price" class="form-control mb-3 rounded"
                placeholder="Input Harga Produk">
            <div class="mb-3">
                <input class="form-control" type="file" name="product_image" id="formFile">
            </div>
            <select name="product_category" id="category" class="form-control mb-3 rounded">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                @endforeach
            </select>
            <div class="items-center text-center w-full mb-5">
                <input type="submit" class="btn btn-success" value="add product" name="submit"></input>
            </div>
        </form>
    </div>
@endsection
