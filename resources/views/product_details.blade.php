@extends('maindesign')
@section('hide_slider', '1')
@section('hide_contact', '1')
@section('content')
    @if (session('cart_added'))
        <div class="container my-5 mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('cart_added') }}
        </div>
    @endif
    <section class="shop_section layout_padding">
        <div class="container my-5">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-5">
                    <div class="card">
                        <img src="{{ asset('products/' . $product->product_image) }}" class="card-img-top" alt="Nama Produk">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-md-7">

                    <h3 class="fw-bold">{{ $product->product_name }}</h3>

                    <p class="text-muted mb-1">Kategori: {{ $product->product_category }}</p>

                    <h4 class="text-danger fw-bold">
                        Rp {{ number_format($product->product_price, 0, ',', '.') }}
                    </h4>

                    <!-- Rating -->
                    <div class="mb-3">
                        ⭐⭐⭐⭐☆ <small class="text-muted">(120 ulasan)</small>
                    </div>

                    <!-- Description -->
                    <p>
                        {{ $product->product_description }}
                    </p>

                    <form action="{{ route('addtocart', $product->id) }}" method="POST">
                        @csrf

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jumlah</label>
                            <input type="number" class="form-control w-25" name="quantity" value="1" min="1">
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-outline-primary px-4">
                            🛒 Add to Cart
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
