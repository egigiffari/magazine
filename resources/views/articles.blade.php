@extends('template_frontend.home')

@section('content')

        <div class="col-md-8">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">All posts</h2>
                    </div>
                </div>
                <div id="all-post" class="col-md-8">

                    @foreach($all_posts as $post)
                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="{{route('blog.home',$post->slug)}}"><img src="/{{ $post->gambar }}" alt="{{ $post->slug }}"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{ route('blog.categories',$post->category->slug) }}">{{ $post->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="{{route('blog.home',$post->slug)}}">{{ $post->judul }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ $post->user->name }}</a></li>
                                <li>{{ $post->created_at->diffForHumans() }}</li>
                            </ul>
                            <p>{!! Str::limit($post->content, 100) !!}</p>
                        </div>
                    </div>
                    <!-- /post -->
                    
                    @endforeach
                    {{ $all_posts->links() }}
                </div>
            </div>
            <!-- /row -->

        </div>

@endsection