
<!-- category widget -->
<div class="aside-widget">
	<div class="section-title">
		<h2 class="title">Categories</h2>
	</div>
	<div class="category-widget">
		<ul>
			@foreach($categories as $category)
				@if($category->posts->count() > 0)
				<li><a href="{{ route('blog.categories', $category->slug) }}">{{$category->name}} <span>{{$category->posts->count()}}</span></a></li>
				@endif
			@endforeach
		</ul>
	</div>
</div>
<!-- /category widget -->

<!-- post widget -->
<div class="aside-widget">
	<div class="section-title">
		<h2 class="title">Popular Posts</h2>
	</div>

	@foreach($populer as $post)
	<!-- post -->
	<div class="post post-widget">
		<a class="post-img" href="{{route('blog.home', $post->slug)}}"><img src="/{{$post->gambar}}" alt=""></a>
		<div class="post-body">
			<div class="post-category">
				<a href="{{ route('blog.categories', $post->category->slug) }}">{{$post->category->name}}</a>
			</div>
			<h3 class="post-title"><a href="{{route('blog.home', $post->slug)}}">{{ $post->judul }}</a></h3>
		</div>
	</div>
	@endforeach
	<!-- /post -->
</div>
<!-- /post widget -->