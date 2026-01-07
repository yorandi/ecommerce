@extends('admin.maindesign')

@section('viewproduct')
    <div class="container my-4">

        <!-- Alert -->
        @if (session('status_changed_msg'))
            <div class="alert alert-success">
                {{ session('status_changed_msg') }}
            </div>
        @endif



        <!-- Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dash-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">📦 Daftar Order</h5>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th style="max-width: 30px;">alamat</th>
                            <th>Pembeli</th>
                            <th>Telepon</th>
                            <th>Pembayaran</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Gambar Produk</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="fw-semibold">{{ $order->id }}</td>

                                <td style="max-width: 150px">
                                    <div class="fw-semibold">
                                        {{ $order->address }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $order->user->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $order->phone_number }}
                                    </div>
                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $order->payment_method }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">
                                        {{ $order->product->product_name }}
                                    </div>
                                </td>
                                <td>
                                    Rp {{ number_format($order->product->product_price, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ $order->quantity }}
                                </td>
                                <td>
                                    <img src="{{ asset('products/' . $order->product->product_image) }}"
                                        class="img-thumbnail" style="max-width: 80px;">
                                </td>

                                <td class="text-center">
                                    <form action="{{ route('admin.changestatus', $order->id) }}" method="POST">
                                        @csrf
                                        <select name="status" id="" class="form-control">
                                            <option value="{{ $order->status }}" selected>
                                                {{ ucfirst($order->status) }}
                                            </option>

                                            @if ($order->status !== 'pending')
                                                <option value="pending">Pending</option>
                                            @endif

                                            @if ($order->status !== 'completed')
                                                <option value="completed">Completed</option>
                                            @endif
                                        </select>
                                        <input type="submit" value="Update" class="btn btn-primary my-3">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer bg-dash-2">
            </div>
        </div>

    </div>
@endsection
