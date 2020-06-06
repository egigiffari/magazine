@extends('template_backend.home')
@section('head_title', 'Add Tags')
@section('title_content', 'Add Tags')
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

    <form action="{{ route('tags.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="name" id="tags" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save Tags</button>
        </div>
    </form>

@endsection