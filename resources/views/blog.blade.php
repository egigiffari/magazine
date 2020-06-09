@extends('template_frontend.home')

@section('banner')
        <div class="container">
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="/frontend/img/hot-post-1.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="/frontend/img/hot-post-2.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="blog-post.html"><img src="/frontend/img/hot-post-3.jpg" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">Fashion</a>
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">John Doe</a></li>
								<li>20 April 2018</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
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
                        <a class="post-img" href="{{ route('blog.post', $post->slug) }}"><img src="{{ $post->gambar }}" alt="{{ $post->slug }}" style="height:200px"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#">{{ $post->category->name }}</a>
                            </div>
                            <h3 class="post-title"><a href="#">{{ $post->judul }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="author.html">{{ $post->user->name }}</a></li>
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
                <div class="col-md-8">

                    @foreach($all_posts as $post)
                    <!-- post -->
                    <div class="post post-row">
                        <a class="post-img" href="{{$post->slug}}"><img src="{{ $post->gambar }}" alt="{{ $post->slug }}"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="{{ $post->category->slug }}">{{ $post->category->name }}</a>
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
                    
                    <div class="section-row loadmore text-center">
                        <a href="#" class="primary-button">Load More</a>
                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>
@endsection