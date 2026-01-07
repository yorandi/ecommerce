@extends('admin.maindesign')

@section('addcategory')
    @if (session('category_message'))
        <div class="mb-4 bg-success border border-green-400 text-white px-4 py-3 rounded relative">
            {{ session('category_message') }}
        </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.postaddcategory') }}" method="post">
            @csrf

            <input type="text" name="category" class="form-control mb-3" placeholder="Input New Category">
            <div class="items-center text-center w-full mb-5">
                <input type="submit" class="btn btn-primary" value="add category" name="submit"></input>
            </div>
        </form>
    </div>
@endsection
