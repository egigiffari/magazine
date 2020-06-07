@extends('template_backend.home')
@section('head_title', 'Add Posts')
@section('title_content', 'Add Posts')
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
            {!! Session('success') !n!}
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="posts">Judul</label>
            <input type="text" name="judul" id="posts" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control selectric">
                <option value="">Please Select One</option>
                @foreach($category as $result)
                    <option value="{{$result->id}}">{{$result->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <select class="form-control select2" name="tags[]" multiple="">
                @foreach($tags as $result)
                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                @endforeach
            </select>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control summernote" cols="30" rows="50"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Thumbnail</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save Posts</button>
        </div>
    </form>

@endsection

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