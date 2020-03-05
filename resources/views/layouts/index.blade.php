<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
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
    @if (App::environment('production'))
    <!-- Start Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157886202-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-157886202-1');
    </script>
    <!-- End Global site tag (gtag.js) - Google Analytics -->
    @endif
</head>

<body>
    @if ($agent->isDesktop() || $agent->isTablet() )

    <div class="container">
        @include('layouts.header-nav')
        @yield('carousel')
        <main>
            @if (session()->has('message'))
            @component('partials.alert', ['type'=>session()->get('message')['type'],
            'autoHide'=>session()->get('message')['autoHide']])
            @slot('title')
            {{ session()->get('message')['title'] }}
            @endslot
            {{ session()->get('message')['message'] }}
            @endcomponent
            @endif
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
    @endif
    @if ($agent->isMobile() && !$agent->isIpad())

    <!-- Mobile Content -->
    <div class="d-block d-md-none">
        @include('layouts.header-nav')
        <main>
            @if (session()->has('message'))
            @component('partials.alert', ['type'=>session()->get('message')['type'],
            'autoHide'=>session()->get('message')['autoHide']])
            @slot('title')
            {{ session()->get('message')['title'] }}
            @endslot
            {{ session()->get('message')['message'] }}
            @endcomponent
            @endif
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
    @include('layouts.promo-popup')
</body>

</html>