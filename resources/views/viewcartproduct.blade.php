@extends('maindesign')
@section('hide_slider', '1')
@section('hide_contact', '1')
@section('content')

    @if (session('cart_removed'))
        <div class="container my-5 mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('cart_removed') }}
        </div>
    @endif

    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold fs-5">
                🛒 Keranjang Belanja
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Harga</th>
                            <th class="text-end">Subtotal</th>
                            <th class="text-end">action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $total = 0; @endphp

                        @foreach ($cart_products as $cart_product)
                            @php
                                $subtotal = $cart_product->quantity * $cart_product->product->product_price;
                                $total += $subtotal;
                            @endphp

                            <tr>
                                <!-- Product -->
                                <td>
                                    <div class="d-flex align-items-center text-center gap-3 mx-2">
                                        <div style="height: 100px;">
                                            <img src="{{ asset('products/' . $cart_product->product->product_image) }}"
                                                width="70" class="rounded border"
                                                alt="{{ $cart_product->product->product_name }}">
                                        </div>
                                        <div class="mx-2 justify-content-center">
                                            <div class="fw-semibold">
                                                {{ $cart_product->product->product_name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Quantity -->
                                <td class="text-center">
                                    <span class="badge bg-secondary px-3 py-2">
                                        {{ $cart_product->quantity }}
                                    </span>
                                </td>

                                <!-- Price -->
                                <td class="text-end">
                                    Rp {{ number_format($cart_product->product->product_price, 0, ',', '.') }}
                                </td>

                                <!-- Subtotal -->
                                <td class="text-end fw-semibold">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('removecartproduct', $cart_product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Yakin menghapus produk dari keranjang?')">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Footer Total -->
            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                <span class="fw-bold fs-5">Total</span>
                <span class="fw-bold fs-5 text-danger">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>
            </div>
        </div>
        @if (session('order_confirmed'))
            <div class="container my-5 mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
                {{ session('order_confirmed') }}
            </div>
        @endif
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white fw-bold fs-5">
                            📦 Informasi Pengiriman & Pembayaran
                        </div>

                        <div class="card-body">
                            <form action="{{ route('confirm_order') }}" method="POST">
                                @csrf

                                <!-- Alamat -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Alamat Pengiriman
                                    </label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Masukkan alamat lengkap" required>
                                </div>

                                <!-- Phone -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Nomor Telepon
                                    </label>
                                    <input type="text" class="form-control" name="phone_number"
                                        placeholder="08xxxxxxxxxx" required>
                                </div>

                                <!-- Payment -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Metode Pembayaran
                                    </label>
                                    <select class="form-control" name="payment_method" required>
                                        <option value="" selected disabled>
                                            Pilih metode pembayaran
                                        </option>
                                        <option value="COD">Cash on Delivery</option>
                                        <option value="Transfer">Transfer Bank</option>
                                        <option value="Credit Card">Credit Card</option>
                                    </select>
                                </div>

                                <!-- Submit -->
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                                        🛒 Konfirmasi Pesanan
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
