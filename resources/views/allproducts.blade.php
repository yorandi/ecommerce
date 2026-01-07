@extends('maindesign')
@section('content')
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Semua Produk
                </h2>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ route('product_details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('products/' . $product->product_image) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        {{ $product->product_name }}
                                    </h6>
                                    <h6>
                                        Harga
                                        <span>
                                            Rp {{ number_format($product->product_price, 0, ',', '.') }}
                                        </span>
                                    </h6>
                                </div>
                                <div class="new">
                                    <span>
                                        New
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        <div class="btn-box">
            <a href="{{ route('index') }}">
                View Latest Products
            </a>
        </div>
        </div>
    </section>
@endsection()
