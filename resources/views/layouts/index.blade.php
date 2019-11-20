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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es2015"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  @if ($agent->isDesktop() || $agent->isTablet() )

  <div class="container">
    @include('layouts.header-nav')
    @yield('carousel')
    <main>
      @yield('content')
    </main>
    @include('layouts.footer')
  </div>
  @endif
  @if ($agent->isMobile() && !$agent->isIpad())

  <!-- Mobile Content -->
  <div class="d-block d-md-none">
    <header class="px-2 home mobileHeader">
      <div class="row align-items-center">
        <div class="col-md-3 col-sm-3 px-xs-0 width-sm-100">
          <div class="navbar-expand-lg navbar-dark bg-dark custom_nav">
            <span class="float-left">
              <button class="navbar-toggler p-0 border-0 d-inline-block" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <a
                class="d-inline-block align-middle" href="{{route('home')}}"><img
                  src="{{asset('images/icons/logo.png')}}" alt="" class="img-fluid mr-2" style="max-width:160px;"></a>
            </span>
            <span class="float-right">
              <a href="#" class="d-inline-block text-center text-white small align-middle xs-display"
                style="font-size:10px"><i class="fa fa-search d-block" style="font-size:16px;"></i> Search</a>
              <a href="/contact-us" class="d-inline-block text-center text-white small align-middle xs-display"
                style="font-size:10px"><i class="far fa-envelope d-block" style="font-size:16px;"></i> Contact</a>
              <a href="#" class="d-inline-block text-center text-white small align-middle xs-display"
                style="font-size:10px"><i class="fa fa-user d-block" style="font-size:16px;"></i> Account</a>
              <a href="{{route('cart')}}" class="d-inline-block text-center text-white small align-middle xs-display"
                style="font-size:10px"><i class="fa fa-shopping-cart d-block" style="font-size:16px;"></i> Cart</a>
            </span>
          </div>
          <a href="{{route('home')}}" class="d-none d-md-block"><img src="{{asset('images/icons/logo.png')}}" alt=""
              class="img-fluid"></a>
        </div>
        <div class="col-md-7 col-sm-6 text-center z-index-xs width-sm-100">
          <nav class="navbar navbar-dark navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="mb-0 p-0 width_100" style="line-height: 35px;">
                <li class="list-inline-item dropdown"><a href="#">Email</a></li>
                <li class="list-inline-item dropdown"><a href="#">Live Chat</a></li>
                <li class="list-inline-item dropdown"><a href="#">Phone</a></li>
                <li class="list-inline-item dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false" href="#link"><img
                      src="{{asset('images/icons/icon-search.png')}}" alt="search"> House Plans</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('search') }}">Advanced Search</a></li>
                    <li><a href="{{ route('styles') }}">Architectural Styles</a></li>
                    <li><a href="{{ route('collections') }}">Specialty Collections</a></li>
                  </ul>
                </li>
                <li class="list-inline-item"><a href="#link">Reviews</a></li>
                <li class="list-inline-item"><a class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false" href="#link">Builders</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Preferred Building Program</a></li>
                    <li><a href="#">Find a Home Builder</a></li>
                  </ul>
                </li>
                <li class="list-inline-item"><a href="{{route('inspiration')}}">Home Inspiration</a></li>
                <li class="list-inline-item"><a href="/about">About</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <main>
      @yield('content')
    </main>
    @include('layouts.footer')
  </div>
  <!-- Mobile End -->
  @endif
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
  <!-- Custom JS -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    var incrementPlus;
var incrementMinus;

var buttonPlus  = $(".qty-plus");
var buttonMinus = $(".qty-minus");

var incrementPlus = buttonPlus.click(function() {
var $n = $(this)
		.parent("div")
		.find(".qty");
	$n.val(Number($n.val())+1 );
	$n.parent('div').find('.fa-minus').css({'opacity':1 , 'border' : '1px solid black','color' : 'black'});
});
var incrementMinus = buttonMinus.click(function() {
		var $n = $(this)
		.parent("div")
		.find(".qty");
	var amount = Number($n.val());
	if (amount > 1) {
		$n.val(amount-1);
	}
	if (amount == 2) 
	{
		$n.parent('div').find('.fa-minus').css({'opacity':0.6 , 'border' : '1px solid silver','color' : 'black'});
	}
});
  </script>
  @stack('scripts')
</body>

</html>