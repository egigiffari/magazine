@extends('template_backend.home')
@section('head_title', 'Users')
@section('title_content', 'Users')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {!! Session('success') !!}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-info btn-sm">Add Users</a>
    <br>
    <br>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Action</th>
        </thead>
        <tbody>

        @foreach ($users as $result => $hasil)
            <tr>
                <td> {{ $result + $users->firstitem() }} </td>
                <td>{{ $hasil->name }}</td>
                <td>{{ $hasil->email }}</td>
                <td><h6><span class="badge {{ ($hasil->type ? 'badge-warning':'badge-primary') }} badge-sm">{{ ($hasil->type ? 'Administrator':'Author') }}</span></h6>
                </td>
                <td>
                    <form action="{{ route('users.destroy', $hasil->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('users.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete this item')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $users->links() }}

@endsection()