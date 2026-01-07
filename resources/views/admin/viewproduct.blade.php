@extends('admin.maindesign')

@section('viewproduct')
    <div class="container my-4">

        <!-- Alert -->
        @if (session('deleteproduct_msg'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ session('deleteproduct_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('updateproduct_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateproduct_msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dash-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">📦 Daftar Produk</h5>
                <span class="text-muted">Total: {{ $products->total() }} Produk</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="fw-semibold">{{ $product->id }}</td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $product->product_name }}
                                    </div>
                                </td>

                                <td>
                                    Rp {{ number_format($product->product_price, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span
                                        class="badge bg-{{ $product->product_quantity > 0 ? 'success' : 'danger' }} text-white">
                                        {{ $product->product_quantity }}
                                    </span>
                                </td>

                                <td class="text-muted" style="max-width: 250px;">
                                    {{ Str::limit($product->product_description, 100) }}
                                </td>

                                <td>
                                    <img src="{{ asset('products/' . $product->product_image) }}" class="img-thumbnail"
                                        style="max-width: 80px;">
                                </td>

                                <td>
                                    <span class="badge bg-secondary text-white">
                                        {{ $product->product_category }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('admin.updateproduct', $product->id) }}"
                                        class="btn btn-sm btn-success me-1">
                                        ✏️
                                    </a>

                                    <a href="{{ route('admin.deleteproduct', $product->id) }}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin menghapus {{ $product->product_name }}?')">
                                        🗑️
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer bg-dash-2">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>
@endsection
