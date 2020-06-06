@extends('template_backend.home')
@section('head_title', 'Tags')
@section('title_content', 'Tags')
@section('content')

@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {!! Session('success') !!}
        </div>
    @endif

    <a href="{{ route('tags.create') }}" class="btn btn-info btn-sm">Add tags</a>
    <br>
    <br>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <th>No</th>
            <th>Tag</th>
            <th>Action</th>
        </thead>
        <tbody>

        @foreach ($tags as $result => $hasil)
            <tr>
                <td> {{ $result + $tags->firstitem() }} </td>
                <td>{{ $hasil->name }}</td>
                <td>
                    <form action="{{ route('tags.destroy', $hasil->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('tags.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this item')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $tags->links() }}


@endsection()