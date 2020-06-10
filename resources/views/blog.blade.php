@extends('template_frontend.home')

@section('banner')
        <div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
            @foreach($top_banner as $post => $result)
                @if($loop->first)
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('blog.home', $result->slug) }}"><img src="{{ $result->gambar }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('blog.categories', $result->category->slug)}}">{{ $result->category->name }}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{ route('blog.home', $result->slug) }}">{{ $result->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="#">{{$result->user->name}}</a></li>
								<li>{{$result->created_at->format('g F Y')}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
                @endif
                @if($post > 0)
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="{{ route('blog.home', $result->slug) }}"><img src="{{ $result->gambar }}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="{{route('blog.categories', $result->category->slug)}}">{{ $result->category->name }}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('blog.home', $result->slug) }}">{{ $result->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="#">{{$result->user->name}}</a></li>
								<li>{{$result->created_at->format('g F Y')}}</li>
							</ul>
						</div>
					</div>
                    <!-- /post -->
				</div>
                @endif
            @endforeach
			</div>
			<!-- /row -->
		</div>
@endsection

@section('content')
        <div class="col-md-8">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Recent posts</h2>
                    </div>
                </div>

                @foreach($top4_posts as $post)
                <!-- post -->
                <div class="col-md-6">
                    <div class="post">
                        <a class="post-img" href="{{ route('blog.home', $post->slug) }}"><img src="{{ $post->gambar }}" alt="{{ $post->slug }}" style=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{route('blog.categories',$post->category->slug)}}">{{ $post->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="{{ route('blog.home', $post->slug) }}">{{ $post->judul }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ $post->user->name }}</a></li>
                                <li>{{ $post->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /post -->
                @endforeach

            </div>
            <!-- /row -->

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
                        <a class="post-img" href="{{route('blog.home', $post->slug)}}"><img src="{{ $post->gambar }}" alt="{{ $post->slug }}"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{ route('blog.categories',$post->category->slug) }}">{{ $post->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="{{$post->slug}}">{{ $post->judul }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ $post->user->name }}</a></li>
                                <li>{{ $post->created_at->diffForHumans() }}</li>
                            </ul>
                            <p>{{ $post->content }}</p>
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