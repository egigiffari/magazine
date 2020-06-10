@extends('template_frontend.home')

@section('banner')
<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 text-center">
						<h1 class="text-uppercase">About Us</h1>
						<p class="lead">{{$about->desc}}</p>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('content')

<div class="col-md-8">
					<div class="section-row">
						<div class="section-title">
							<h2 class="title">Contact Information</h2>
						</div>
						<p>{{$about->desc}}</p>
						<ul class="contact">
							<li><i class="fa fa-phone"></i> {{$about->phone}}</li>
							<li><i class="fa fa-envelope"></i> <a href="#">{{$about->email}}</a></li>
							<li><i class="fa fa-map-marker"></i> {{$about->address}}</li>
						</ul>
					</div>

				</div>

@endsection