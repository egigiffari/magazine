@extends('template_frontend.home')

@section('banner')
        <div id="post-header" class="page-header">
            
			<div class="page-header-bg" style="background-image: url( '/{{ $article->gambar }}' );background-position:center;background-size:cover;" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">Lifestyle</a>
						</div>
						<h1>{{$article->judul}}</h1>
						<ul class="post-meta">
							<li><a href="author.html">John Doe</a></li>
							<li>20 April 2018</li>
							<li><i class="fa fa-eye"></i> {{ $article->views_post }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('content')

                <div class="col-md-8">
					<!-- post content -->
					<div class="section-row">
					{!! $article->content !!}
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
							<ul>
                                <li>TAGS:</li>
                                @foreach($article->tags as $tag)
								<li><a href="{{$tag->slug}}">{{$tag->name}}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>
					<!-- /post tags -->

					<!-- post author -->
					<div class="section-row">
						<div class="section-title">
							<h3 class="title">Written By <a href="#">{{$article->user->name}}</a></h3>
						</div>
						<div class="author media">
							<div class="media-left">
								<a href="author.html">
									<img class="author-img media-object" src="/frontend/img/avatar-1.jpg" alt="">
								</a>
							</div>
						</div>
					</div>
					<!-- /post author -->
				</div>

@endsection