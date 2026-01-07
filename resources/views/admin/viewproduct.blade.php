@extends('admin.maindesign')

@section('viewproduct')
    @if (session('deleteproduct_msg'))
        <div class="mb-4 bg-primary border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('deleteproduct_msg') }}
        </div>
    @endif
    @if (session('updateproduct_msg'))
        <div class="mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('updateproduct_msg') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Quantity</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Description</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Category</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="padding: 12px;">{{ $product->id }}</td>
                    <td style="padding: 12px;">{{ $product->product_name }}</td>
                    <td style="padding: 12px;">{{ $product->product_price }}</td>
                    <td style="padding: 12px;">{{ $product->product_quantity }}</td>
                    <td style="padding: 12px;">{{ Str::limit($product->product_description, 150, '...') }}</td>
                    <td style="padding: 12px;"><img src="{{ asset('products/' . $product->product_image) }}" alt="Image"
                            style="width: 100px; height: auto;"></td>
                    <td style="padding: 12px;">{{ $product->product_category }}</td>
                    <td style="padding: 12px;">
                        <a style="text-decoration: none;" class="bg-primary text-white p-2 m-1 rounded text-decoration-none"
                            href={{ route('admin.deleteproduct', $product->id) }}
                            onclick="return confirm('apakah anda yakin menghapus {{ $product->product_name }}, dari produk ?')">Delete</a>
                        <a style="text-decoration: none;" class="bg-success text-white p-2 m-1 rounded text-decoration-none"
                            href={{ route('admin.updateproduct', $product->id) }}>Update</a>
                    </td>
                </tr>
            @endforeach;

            {{ $products->links() }}
        </tbody>
    </table>
@endsection()
