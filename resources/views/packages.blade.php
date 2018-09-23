@extends('base')

@section('content')
<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="banner-bottom-info">
				<h3>Check out our various weekend getaway deals here!</h3>
			</div>

			<div class="banner-bottom-grids">
				@foreach($packages as $package)
				
				<div class="col-md-4 weekend-grids">
					<div class="weekend-grid">
						<a href="products.html">
							<img src="images/w1.jpg" alt="" />
							<div class="deals-info-grid">
								<div class="deals-grids">
									<div class="col-md-8 deals-rating">
										<h3>{{ $package->title }}</h3>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
									</div>
									<div class="col-md-4 deals-price">
										<p class="now">$ {{ $package->price }}</p>
										<p>$ {{ $package->price - $package->discount }}</p>
									</div>
									<div class="clearfix"> </div>
								</div>
			  				</div>
						</a>
					</div>
				</div>
				
				@endforeach
				
				<div class="clearfix"> </div>
			</div>

			
		</div>
		<!-- //container -->
</div>
@endsection
