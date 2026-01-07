@extends('admin.maindesign')

@section('updatecategory')
    @if (session('updatecategory_msg'))
        <div class="mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('updatecategory_msg') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.postupdatecategory', $category->id) }}" method="post">
            @csrf

            <input type="text" name="category" class="form-control" value="{{ $category->category }}">
            <input type="submit" class="btn btn-primary" value="update category" name="submit"></input>
        </form>
    </div>
@endsection
