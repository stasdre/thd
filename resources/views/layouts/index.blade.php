<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container d-none d-md-block">
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
    @yield('carousel')
    <main>
        @yield('content')
    </main>
    <footer class="py-3 mt-4">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">SEARCH OUR HOUSE PLANS</h3>
                <ul class="list-inline text-center">
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Best-Selling House Plans</a></li>
                    <li><a href="#">Architectural Styles</a></li>
                    <li><a href="#">Specialty Collections</a></li>
                    <li><a href="#">Craftsman House Plans</a></li>
                    <li><a href="#">Recent Home Builds</a></li>
                    <li><a href="#">Customer Reviews</a></li>
                    <li><a href="#">Shipping, Returns, and Exchanges</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">CONTACT US</h3>
                <ul class="list-inline text-center">
                    <li><a href="#">Live Chat</a></li>
                    <li><a href="#">Email</a></li>
                    <li><a href="#">832-521-5820</a></li>
                    <li><a href="#">E-Newsletter Signup</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Advertise with Us</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">ARCHITECT PREFERRED</h3>
            </div>
        </div>
    </footer>
</div>

<!-- Mobile Content -->
<div class="d-block d-md-none">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-block">
        <button class="navbar-toggler p-0 border-0 d-inline-block" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="d-inline-block align-middle" href="#"><img src="{{ asset('images/icons/logo.png') }}" alt="" class="img-fluid mr-2" style="max-width:160px;"></a>
        <a href="#" class="d-inline-block text-center text-white small align-middle" style="font-size:10px"><i class="fa fa-search d-block" style="font-size:16px;"></i> Search</a>
        <a href="#" class="d-inline-block text-center text-white small align-middle" style="font-size:10px"><i class="fa fa-phone d-block" style="font-size:16px;"></i> Contact</a>
        <a href="#" class="d-inline-block text-center text-white small align-middle" style="font-size:10px"><i class="fa fa-user d-block" style="font-size:16px;"></i> Account</a>
        <a href="#" class="d-inline-block text-center text-white small align-middle" style="font-size:10px"><i class="fa fa-shopping-cart d-block" style="font-size:16px;"></i> Cart</a>
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
    @yield('mobile-americans')
    <div class="search-wrap p-2 text-center bg-white">
        <form class="form-main-search text-center">
            <div class="row no-gutters">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" placeholder="Plan Number" >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" placeholder="Min sq. ft." >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" placeholder="Max sq. ft." >
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-6">
                    <div class="form-group">
                        <div class="select-custom-wrap select-custom-wrap-lg">
                            <select name="select-custom-style" class="select-custom" >
                                <option value="hide">Styles \ Collections</option>
                                <option value="Collection1">Collection1</option>
                                <option value="Collection2">Collection2</option>
                                <option value="Collection3">Collection3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="select-custom-wrap select-custom-wrap-sm">
                            <select name="select-custom-beds" class="select-custom">
                                <option value="hide">Beds</option>
                                <option value="Bed1">1</option>
                                <option value="Bed2">2</option>
                                <option value="Bed3">3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="select-custom-wrap select-custom-wrap-sm">
                            <select name="select-custom-baths" class="select-custom"  >
                                <option value="hide">Baths</option>
                                <option value="Bath1">1</option>
                                <option value="Bath2">2</option>
                                <option value="Bath3">3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm">
                    <div class="form-group px-5">
                        <button type="submit" class="btn btn-block btn-primary rounded-0 text-uppercase" >Search House Plans</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="text-center text-uppercase lead font-weight-normal align-middle py-2"> <a href="#" class="align-middle text-primary">Live Chat</a> | <a href="#" class="align-middle text-primary">Email</a> | <a href="#" class="align-middle text-secondary">xxx-xxx-xxxx</a> </div>
    @yield('mobile-new')
    <div class="container">
        @yield('mobile-content')
    </div>
    <footer class="py-3 mt-4">
        <div class="row no-gutters">
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">SEARCH OUR HOUSE PLANS</h3>
                <ul class="list-inline text-center">
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">Best-Selling House Plans</a></li>
                    <li><a href="#">Architectural Styles</a></li>
                    <li><a href="#">Specialty Collections</a></li>
                    <li><a href="#">Craftsman House Plans</a></li>
                    <li><a href="#">Recent Home Builds</a></li>
                    <li><a href="#">Customer Reviews</a></li>
                    <li><a href="#">Shipping, Returns, and Exchanges</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">CONTACT US</h3>
                <ul class="list-inline text-center">
                    <li><a href="#">Live Chat</a></li>
                    <li><a href="#">Email</a></li>
                    <li><a href="#">832-521-5820</a></li>
                    <li><a href="#">E-Newsletter Signup</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Advertise with Us</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3 d-none d-md-block">ARCHITECT PREFERRED</h3>
            </div>
        </div>
    </footer>
</div>
<!-- Mobile End -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('.mh-1').matchHeight({ property: 'min-height' });
    $('[data-fancybox]').fancybox({
        youtube : {
            controls : 0,
            showinfo : 0
        }
    });
</script>
</body>
</html>