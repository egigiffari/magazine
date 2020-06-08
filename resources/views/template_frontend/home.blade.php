    @include('template_frontend.header')
	<!-- HEADER -->
	@include('template_frontend.navbar')
	<!-- /HEADER -->

	<!-- SECTION -->
	<div class="section">
		<!-- BANNER -->
		@yield('banner')
		<!-- END BANNER -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<div class="container">
			<div class="row">

                <!-- CONTENT -->
				@yield('content')
                <!-- END CONTENT -->

				<div class="col-md-4">

                    <!-- ALL WIDGET -->
					@include('template_frontend.side')
                    <!-- END ALL WIDGET -->

				</div>
			</div>
		</div>
	</div>
    <!-- /SECTION -->

	<!-- FOOTER -->
	@include('template_frontend.footer')
