@extends('template_backend.home')
@section('head_title', 'Edit Tags')
@section('title_content', 'Edit Tags')
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
             {{ Session('success') }}
        </div>
    @endif

    <form action="{{ route('tags.update', $tag->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="tag">Tag</label>  
            <input type="text" name="name" id="tag" class="form-control" value="{{ $tag->name }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save Tag</button>
        </div>
    </form>


@endsection