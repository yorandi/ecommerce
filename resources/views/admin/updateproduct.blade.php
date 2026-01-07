@extends('admin.maindesign')
<base href="/public">
@section('addproduct')
    {{-- @if (session('product_message'))
        <div class="mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('product_message') }}
        </div>
    @endif --}}


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <h4 class="fw-bold mb-0 text-center">✏️ Update Produk</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.postupdateproduct', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                <!-- Nama Produk -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Produk</label>
                                    <input type="text" name="product_name" class="form-control"
                                        value="{{ $product->product_name }}" required>
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Kategori</label>
                                    <select name="product_category" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category }}"
                                                {{ $product->product_category == $category->category ? 'selected' : '' }}>
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Deskripsi Produk</label>
                                    <textarea name="product_description" rows="5" class="form-control" required>{{ $product->product_description }}</textarea>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Stok</label>
                                    <input type="number" name="product_quantity" class="form-control"
                                        value="{{ $product->product_quantity }}" min="0" required>
                                </div>

                                <!-- Price -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Harga</label>
                                    <input type="number" name="product_price" class="form-control"
                                        value="{{ $product->product_price }}" min="0" required>
                                </div>

                                <!-- Image -->
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Gambar Produk</label>
                                    <input class="form-control" type="file" name="product_image">
                                </div>

                                <!-- Preview Image -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Preview Gambar</label>
                                    <div>
                                        <img src="{{ asset('products/' . $product->product_image) }}" class="img-thumbnail"
                                            style="max-width: 150px;">
                                    </div>
                                </div>

                            </div>

                            <!-- Submit -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-success px-4 fw-semibold">
                                    💾 Update Product
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
