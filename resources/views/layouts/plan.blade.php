<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'DWHP') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .select-styled {
            font-weight: 700;
        }
    </style>
</head>

<body>
<div class="container xs-pd-portrait_0">
    <header class="px-2 home">
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-3 px-xs-0 width-sm-100">
                <div class="navbar-expand-lg navbar-dark bg-dark custom_nav d-block d-sm-block d-md-none">
            <span class="float-left">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
           		<a class="d-inline-block align-middle" href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="" class="img-fluid mr-2" style="max-width:160px;"></a>
            </span>
                    <span class="float-right">
               <a href="#" class="d-inline-block text-center text-white small align-middle xs-display" style="font-size:10px"><i class="fa fa-search d-block" style="font-size:16px;"></i> Search</a>
               <a href="#" class="d-inline-block text-center text-white small align-middle xs-display" style="font-size:10px"><i class="fa fa-phone d-block" style="font-size:16px;"></i> Contact</a>
               <a href="#" class="d-inline-block text-center text-white small align-middle xs-display" style="font-size:10px"><i class="fa fa-user d-block" style="font-size:16px;"></i> Account</a>
               <a href="#" class="d-inline-block text-center text-white small align-middle xs-display" style="font-size:10px"><i class="fa fa-shopping-cart d-block" style="font-size:16px;"></i> Cart</a>
     		</span>
                </div>
                <a href="{{ route('home') }}" class="d-none d-md-block"><img src="{{ asset('images/icons/logo.png') }}" alt="" class="img-fluid"></a>
            </div>
            <div class="col-md-7 col-sm-6 text-center z-index-xs width-sm-100">
                <ul class="list-inline text-center mb-4 toplinks  d-none d-md-block">
                    <li class="list-inline-item"><a href="mailto:#">Email</a></li>
                    <li class="list-inline-item"><a href="#link">Chat</a></li>
                    <li class="list-inline-item"><a href="tel:832-521-5820">832-521-5820</a></li>
                </ul>

                <nav class="navbar navbar-dark navbar-expand-lg">

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="mb-0 p-0 width_100">
                            <li class="list-inline-item dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#link"><img src="{{ asset('images/icons/icon-search.png') }}" alt="search"> House Plans</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('search') }}">Advanced Search</a></li>
                                    <li><a href="{{ route('styles') }}">Architectural Styles</a></li>
                                    <li><a href="{{ route('collections') }}">Specialty Collections</a></li>
                                </ul>
                            </li>
                            <li class="list-inline-item"><a href="#link">Reviews</a></li>
                            <li class="list-inline-item"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#link">Builders</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Preferred Building Program</a></li>
                                    <li><a href="#">Find a Home Builder</a></li>
                                </ul>
                            </li>
                            <li class="list-inline-item"><a href="{{route('inspiration')}}">Home Inspiration</a></li>
                            <li class="list-inline-item"><a href="#link">About</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-2 col-sm-3 xs-set-position d-none d-md-block">
                <ul class="list-inline text-center text-sm-right text-small text-uppercase mt-1 mb-3">
                    <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                    <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
                    <li class="list-inline-item"><a href="#link"><img src="{{ asset('images/icons/icon-cart.png') }}" alt="" class="img-fluid"></a></li>
                </ul>
                <div class="input-group input-group-sm mb-1 plan_name_search">
                    <input type="text" class="form-control rounded-0 border-secondary" placeholder="Plan Name, # or Topic">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button">GO</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
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
                    <li><a href="">Email</a></li>
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



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>