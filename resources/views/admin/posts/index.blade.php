@extends('template_backend.home')
@section('head_title', 'Posts')
@section('title_content', 'Posts')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {!! Session('success') !!}
        </div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-info btn-sm">Add posts</a>
    <br>
    <br>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <th>No</th>
            <th>Post</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Creator</th>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <tbody>

        @foreach ($posts as $result => $hasil)
            <tr>
                <td> {{ $result + $posts->firstitem() }} </td>
                <td>{{ $hasil->judul }}</td>
                <td>{{ $hasil->category->name }}</td>
                <td>
                    <ul style="list-style:none;">
                        @foreach($hasil->tags  as $tag)
                        <li><h6><span class="badge badge-info badge-sm">{{ $tag->name }}</span></h6></li>
                        @endforeach
                    </ul>
                </td>
                <td><span class="btn btn-warning btn-sm">{{ $hasil->user->name }}</span></td>
                <td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width:100px;"></td>
                <td>
                    <form action="{{ route('posts.destroy', $hasil->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('posts.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this item')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $posts->links() }}

@endsection()