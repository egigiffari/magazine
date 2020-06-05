@extends('template_backend.home')
@section('head_title', 'Edit Category')
@section('title_content', 'Edit Category')
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

    <form action="{{ route('category.update', $category->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="category">Category</label>  
            <input type="text" name="name" id="category" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save Category</button>
        </div>
    </form>


@endsection