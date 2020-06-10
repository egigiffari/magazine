<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">	

					<!-- logo -->
					<div class="nav-logo">
						<a href="/" class="logo"><img src="/frontend/img/logo.png" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form action="{{ route('blog.search') }}" method="get">
								<input class="input" name="search" placeholder="Enter your search...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						<li><a href="/">Home</a></li>
						<li class="has-dropdown">
							<a href="#">Categories</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										@foreach($categories as $category)
											@if($category->posts->count() > 0)
											<li><a href="{{ route('blog.categories', $category->slug) }}">{{$category->name}}</a></li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
						</li>
						<li><a href="{{route('blog.articles')}}">All Post</a></li>
						<li><a href="{{route('blog.about')}}">About Us</a></li>
					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="/">Home</a></li>
					<li class="has-dropdown"><a>Categories</a>
						<ul class="dropdown">
						@foreach($categories as $category)
							@if($category->posts->count() > 0)
							<li><a href="{{ route('blog.categories', $category->slug) }}">{{$category->name}}</a></li>
							@endif
						@endforeach
						</ul>
					</li>
					<li><a href="{{route('blog.about')}}">About Us</a></li>
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>