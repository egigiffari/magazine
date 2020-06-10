@extends('template_backend.home')
@section('head_title', 'About Us')
@section('title_content', 'About Us')
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

    <div class="row">
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>LOGO</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset($about->logo) }}" class="img-fluid" alt="test">
                </div>
                <div class="card-body">
                    <form action="{{ route('about.logo', $about->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="logo" id="logo" class="form-control">
                            <button class="btn btn-info btn-block">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-8">
            <div class="card">
                <div class="card-header">
                    INFORMATION
                </div>
                <div class="card-body">
                    <form action="{{ route('about.update', $about->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Blog Name</label>
                            <input type="text" name="name" value="{{ $about->name }}" class="form-control">
                        </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="desc" value="{{ $about->desc }}" class="form-control">
                            </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $about->email }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                                </div>
                                <input type="text" name="phone" value="{{ $about->phone }}" class="form-control phone-number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" name="address" value="{{ $about->address }}" class="form-control" id="inputAddress" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="content">Our Vision</label>
                            <textarea name="our_vision" id="content" class="form-control summernote" cols="30" rows="50">{{ $about->our_vision }}</textarea>
                        </div>
                        <div class="from-group">
                            <button class="btn btn-primary btn-block">Save Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection()

@section('css')
    <link rel="stylesheet" href="/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
@endsection

@section('js')
    <script src="/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="/assets/modules/summernote/summernote-bs4.js"></script>
@endsection