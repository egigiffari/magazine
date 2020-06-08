@extends('template_backend.home')
@section('head_title', 'Add Users')
@section('title_content', 'Add Users')
@section('content')

    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>

        @endforeach
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
             {!! Session('success') !!}
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="post"> 
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control selectric">
                <option value="">Please Select One</option>
                <option value="0">Author</option>
                <option value="1">Administrator</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save Category</button>
        </div>
    </form>

@endsection()

@section('css')
    <link href="/assets/modules/select2/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
@endsection

@section('js')
    <script src="/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/assets/modules/summernote/summernote-bs4.js"></script>
@endsection