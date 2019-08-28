<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name', 'DWHP') }}::@yield('title')</title>
	<meta name="keywords" content="@yield('keywords')" />
	<meta name="description" content="@yield('description')" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/favicon.ico') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">

	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
	<div class="container">
		<header class="px-2">
			<div class="row align-items-center">
				<div class="col-sm-3"> <a href="#"><img src="{{asset('images/icons/logo.png')}}" alt="" class="img-fluid"></a> </div>
				<div class="col-sm-7">
					<ul class="list-inline text-center mb-4 toplinks">
						<li class="list-inline-item"><a href="{{ route('contact-us') }}">Email</a></li>
						<li class="list-inline-item"><a href="#link">Chat</a></li>
						<li class="list-inline-item"><a href="tel:832-521-5820">832-521-5820</a></li>
					</ul>
					<ul class="d-sm-flex d-none justify-content-around text-center mb-0 p-0">
						<li class="list-inline-item dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button"
								aria-haspopup="true" aria-expanded="false" href="#link"><img src="images/icons/icon-search.png"
									alt="search"> House Plans</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('advanced-search') }}">Advanced Search</a></li>
								<li><a href="{{ route('styles') }}">Architectural Styles</a></li>
								<li><a href="{{ route('collections') }}">Specialty Collections</a></li>
							</ul>
						</li>
						<li class="list-inline-item"><a href="#link">Reviews</a></li>
						<li class="list-inline-item"><a href="#link">Builders</a></li>
						<li class="list-inline-item"><a href="{{route('inspiration')}}">Home Inspiration</a></li>
						<li class="list-inline-item"><a href="#link">About</a></li>
					</ul>
				</div>
				<div class="col-sm-2">
					<ul class="list-inline text-center text-sm-right text-small text-uppercase mt-1 mb-3">
							@auth
							<li class="list-inline-item"><a href="{{ route('logout') }}">Logout</a></li>                
					@endauth

					@guest
							<li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
							<li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>                  
					@endguest
					<li class="list-inline-item"><a href="#link"><img src="{{ asset('images/icons/icon-cart.png') }}" alt=""
									class="img-fluid"></a></li>
					</ul>
					<form class="input-group input-group-sm mb-1 plan_name_search" method="GET" action="{{ route('search') }}">
							<input type="text" name="txt" class="form-control rounded-0 border-secondary" placeholder="Plan Name, # or Topic">
							<div class="input-group-append">
									<button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="submit">GO</button>
							</div>
					</form>
				</div>
			</div>
		</header>
		<main class="home-inspiration-page">
			<div class="home-insipiration">
				<div class="center top-heading py-3">
					<h2 class="blue-text"> Home Inspiration</h2>
					<h5 class="HI-subheading mobile-off">FROM DAVID WIGGINS HOUSE PLANS</h5>
				</div>
				<div class="grey-nav-bar mobile-off">
					<ul class="HI_nav">
						<li><a href="">Home Advice</a></li>
						<li><a href="">Kitchen</a></li>
						<li><a href="">Bed + Bath</a> </li>
						<li><a href="">Smart Home</a></li>
						<li><a href="">Flooring</a></li>
						<li><a href="">Windows</a> </li>
						<li><a href="">Stone</a></li>
						<li><a href="">Garages</a></li>
						<li><a href="">Roofing</a></li>
						<li><a href="">Exterior</a></li>
						<li class=""><i class="fa fa-caret-down tablet_only"></i></li>
					</ul>
				</div>
				<div class="grey-nav-bar mobile-grey-nav-bar desktop-off tablet-on">
					<ul class="HI_nav">
						<li><a href="">Home Advice</a></li>
						<li><a href="">Kitchen</a></li>
						<li><a href="">Bed + Bath</a> </li>
						<li><a href="">Roofing</a></li>
					</ul>
				</div>
				<div class="grey-nav-bar mobile-grey-nav-bar desktop-off tablet-on">
					<ul class="HI_nav">
						<li><a href="">Flooring</a></li>
						<li><a href="">Windows</a></li>
						<li><a href="">Smart Home</a></li>
						<li><a href="">Stone</a></li>
						<li><i class="fa fa-caret-down"></i></li>

					</ul>
				</div>
				<div class="main-container">
						@yield('content')
				</div>
			</div>
		</main>
		<footer class="py-3 mt-4">
			<div class="row">
				<div class="col-sm-4">
					<h3 class="font-weight-bold mb-3">SEARCH OUR HOUSE PLANS</h3>
					<ul class="list-inline text-center">
						<li><a href="{{ route('search') }}">Advanced Search</a></li>
						<li><a href="">Best-Selling House Plans</a></li>
						<li><a href="{{ route('styles') }}">Architectural Styles</a></li>
						<li><a href="{{ route('collections') }}">Specialty Collections</a></li>
						<li><a href="">Craftsman House Plans</a></li>
						<li><a href="">Recent Home Builds</a></li>
						<li><a href="">Customer Reviews</a></li>
						<li><a href="">Shipping, Returns, and Exchanges</a></li>
					</ul>
				</div>
				<div class="col-sm-4">
					<h3 class="font-weight-bold mb-3">CONTACT US</h3>
					<ul class="list-inline text-center">
						<li><a href="">Live Chat</a></li>
						<li><a href="{{ route('contact-us') }}">Email</a></li>
						<li><a href="">832-521-5820</a></li>
						<li><a href="">E-Newsletter Signup</a></li>
						<li><a href="">Privacy Policy</a></li>
						<li><a href="">Terms of Use</a></li>
						<li><a href="">Advertise with Us</a></li>
					</ul>
				</div>
				<div class="col-sm-4">
					<h3 class="font-weight-bold mb-3">ARCHITECT PREFERRED</h3>
				</div>
			</div>
		</footer>
	</div>

</body>

</html>