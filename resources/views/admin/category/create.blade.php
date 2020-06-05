@extends('template_backend.home')
@section('head_title', 'Add Category')
@section('title_content', 'Add Category')
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

    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="name" id="category" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save Category</button>
        </div>
    </form>

@endsection