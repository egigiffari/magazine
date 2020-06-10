<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categories</h3>
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
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
								@foreach($tags as $tag)
									@if(count($tag->posts) > 0)
									<li><a href="{{ route('blog.tags', $tag->slug) }}">{{ $tag->name }}</a></li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					<ul class="footer-nav">
						<li><a href="/">Home</a></li>
						<li><a href="{{route('blog.articles')}}">All Post</a></li>
						<li><a href="{{route('blog.about')}}">About Us</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="/frontend/js/jquery.min.js"></script>
	<script src="/frontend/js/bootstrap.min.js"></script>
	<script src="/frontend/js/jquery.stellar.min.js"></script>
	<script src="/frontend/js/main.js"></script>

</body>

</html>