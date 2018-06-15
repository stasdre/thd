<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="container d-none d-md-block">
    @section('header')
    <header class="px-2 home">
        <div class="row align-items-center">
            <div class="col-sm-3"> <a href="{{ route('home') }}"><img src="{{ asset('images/icons/logo.png') }}" alt="" class="img-fluid"></a> </div>
            <div class="col-sm-7">
                <ul class="list-inline text-center mb-4 toplinks">
                    <li class="list-inline-item"><a href="mailto:#">Email</a></li>
                    <li class="list-inline-item"><a href="#link">Chat</a></li>
                    <li class="list-inline-item"><a href="tel:832-521-5820">832-521-5820</a></li>
                </ul>
                <ul class="d-sm-flex d-none justify-content-around text-center mb-0 p-0">
                    <li class="list-inline-item dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#link"><img src="{{ asset('images/icons/icon-search.png') }}" alt="search"> House Plans</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Advanced Search</a></li>
                            <li><a href="#">Architectural Styles</a></li>
                            <li><a href="#">Specialty Collections</a></li>
                        </ul>
                    </li>
                    <li class="list-inline-item"><a href="#link">Reviews</a></li>
                    <li class="list-inline-item"><a href="#link">Builders</a></li>
                    <li class="list-inline-item"><a href="#link">Home Inspiration</a></li>
                    <li class="list-inline-item"><a href="#link">About</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <ul class="list-inline text-center text-sm-right text-small text-uppercase mt-1 mb-3">
                    <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                    <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
                    <li class="list-inline-item"><a href="#link"><img src="{{ asset('images/icons/icon-cart.png') }}" alt="" class="img-fluid"></a></li>
                </ul>
                <div class="input-group input-group-sm mb-1">
                    <input type="text" class="form-control rounded-0 border-secondary" placeholder="Plan Name or #">
                    <div class="input-group-append">
                        <button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold" type="button">GO</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @show
    @section('slider')
    @show
    <main>
        @yield('content')
    </main>
    @section('footer')
    <footer class="py-3 mt-4">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">SEARCH OUR HOUSE PLANS</h3>
                <ul class="list-inline text-center">
                    <li><a href="">Advanced Search</a></li>
                    <li><a href="">Best-Selling House Plans</a></li>
                    <li><a href="">Architectural Styles</a></li>
                    <li><a href="">Specialty Collections</a></li>
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
    @show
</div>

<!-- Mobile Content -->
<div class="d-block d-md-none">
    @section('mobile-nav')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-block">
        <button class="navbar-toggler p-0 border-0 d-inline-block" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <a class="d-inline-block w-50 ml-5 mr-4" href="#"><img src="{{ asset('images/icons/logo.png') }}" alt="" class="img-fluid"></a> <a href="#"><img src="{{ asset('images/icons/icon-search-w.png') }}" alt="" class="img-fluid" style="max-width:25px;"></a> <a href="{{ route('login') }}" class="text-white">login</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active"> <a class="nav-link" href="{{ route('home') }}">Home</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Link</a> </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    @show
    @section('favorite-mobile')
    @show
    @section('search-mobile')
    @show
    @section('home-mobile-content')
    @show
    @section('footer-mobile')
    <footer class="py-3 mt-4">
        <div class="row no-gutters">
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">SEARCH OUR HOUSE PLANS</h3>
                <ul class="list-inline text-center">
                    <li><a href="">Advanced Search</a></li>
                    <li><a href="">Best-Selling House Plans</a></li>
                    <li><a href="">Architectural Styles</a></li>
                    <li><a href="">Specialty Collections</a></li>
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
                <h3 class="font-weight-bold mb-3 d-none d-md-block">ARCHITECT PREFERRED</h3>
            </div>
        </div>
    </footer>
    @show
</div>
<!-- Mobile End -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('.mh-1').matchHeight({ property: 'min-height' });
</script>

</body>
</html>