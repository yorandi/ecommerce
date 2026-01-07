@extends('admin.maindesign')

@section('viewcategory')
    @if (session('deletecategory_msg'))
        <div class="mb-4 bg-primary border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('deletecategory_msg') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="padding: 12px;">{{ $category->id }}</td>
                    <td style="padding: 12px;">{{ $category->category }}</td>
                    <td style="padding: 12px;">
                        <a style="text-decoration: none;" class="bg-primary text-white p-2 m-1 rounded text-decoration-none"
                            href="{{ route('admin.categorydelete', $category->id) }}"
                            onclick="return confirm('apakah anda yakin menghapus {{ $category->category }}, dari kategori ?')">Delete</a>
                        <a style="text-decoration: none;" class="bg-success text-white p-2 m-1 rounded text-decoration-none"
                            href="{{ route('admin.categoryupdate', $category->id) }}">Update</a>
                    </td>
                </tr>
            @endforeach;
        </tbody>
    </table>
@endsection()
