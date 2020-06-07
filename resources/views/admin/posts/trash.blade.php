@extends('template_backend.home')
@section('head_title', 'Trash Posts')
@section('title_content', 'Trash Posts')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {!! Session('success') !!}
        </div>
    @endif

    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <th>No</th>
            <th>Post</th>
            <th>Category</th>
            <th>Tags</th>
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
                        <li><span class="badge badge-info">{{ $tag->name }}</span></li>
                        @endforeach
                    </ul>
                </td>
                <td><img src="{{ asset($hasil->gambar) }}" class="img-fluid" style="width:100px;"></td>
                <td>
                    <form action="{{ route('posts.kill', $hasil->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('posts.restore', $hasil->id) }}" class="btn btn-primary btn-sm">Restore</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this item')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $posts->links() }}

@endsection()