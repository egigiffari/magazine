@extends('template_backend.home')
@section('head_title', 'Category')
@section('title_content', 'Category')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {!! Session('success') !!}
        </div>
    @endif

    <a href="{{ route('category.create') }}" class="btn btn-info btn-sm">Add Category</a>
    <br>
    <br>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <th>No</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>

        @foreach ($category as $result => $hasil)
            <tr>
                <td> {{ $result + $category->firstitem() }} </td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <form action="{{ route('category.destroy', $hasil->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('category.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this item')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $category->links() }}

@endsection()