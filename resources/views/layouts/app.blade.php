<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<!-- mobile offcanvas -->
<div class="mobile-offcanvas">
    <div class="offcanvas-header">
        <ul class="offcanvas-actions">
            <li><a href="{{ route('register') }}">Registration</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </div>
    <div class="offcanvas-body">
        <ul class="offcanvas-menu-list">
            <li><a href="#link">House Plans</a></li>
            <li><a href="#link">Reviews</a></li>
            <li><a href="#link">Builders</a></li>
            <li><a href="#link">Home Inspiration</a></li>
            <li><a href="#link">About</a></li>
        </ul>
    </div>
    <div class="offcanvas-footer">
        <ul class="offcanvas-contact-list">
            <li><a href="mailto:#">Email</a></li>
            <li><a href="#link">Chat</a></li>
            <li><a href="tel:832-521-5820">832-521-5820</a></li>
        </ul>
    </div>
</div>

<div class="wrapper">
    <div class="upper-part">
        @section('header')
            <header class="header-box">
                <div class="container-fluid">
                    <div class="row">
                        <div class="header-inner col-sm-12">
                            <div class="header-side-left">
                                <div class="logo-box">
                                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt="DW house" class="logo-img"></a>
                                </div>
                            </div>
                            <div class="header-side-center">
                                <ul class="header-contact-list">
                                    <li><a href="mailto:#">Email</a></li>
                                    <li><a href="#link">Chat</a></li>
                                    <li><a href="tel:832-521-5820">832-521-5820</a></li>
                                </ul>
                                <nav class="header-nav">
                                    <ul class="header-nav-list">
                                        <li><a href="#link"><i class="icon-search" ></i>House Plans</a></li>
                                        <li><a href="#link">Reviews</a></li>
                                        <li><a href="#link">Builders</a></li>
                                        <li><a href="#link">Home Inspiration</a></li>
                                        <li><a href="#link">About</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-side-right">
                                <ul class="user-actions">
                                    <li class="action-registration" ><a href="{{ route('register') }}">Register</a></li>
                                    <li class="action-login" ><a href="{{ route('login') }}">Login</a></li>
                                    <li class="action-search" ><a href="#search"><i class="icon-search" ></i></a></li>
                                    <li class="action-bag" ><a href="#link"><i class="icon-shopping-cart" ></i></a></li>
                                </ul>

                                <form class="form-search-plan">
                                    <input class="search-plan--input" type="text" placeholder="Plan Name or #" required >
                                    <button class="search-plan--button" type="submit" >GO</button>
                                </form>

                                <button class="header-toggle">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        @show
        <main>
            @yield('content')
        </main>
    </div>
    <div class="down-part">
        @section('footer')
        <footer class="footer-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="footer-block">
                            <h3 class="footer-title">SEARCH OUR HOUSE PLANS</h3>
                            <ul class="footer-links">
                                <li><a href="#link">Advanced Search</a></li>
                                <li><a href="#link">Best-Selling House Plans</a></li>
                                <li><a href="#link">Architectural Styles</a></li>
                                <li><a href="#link">Specialty Collections</a></li>
                                <li><a href="#link">Craftsman House Plans</a></li>
                                <li><a href="#link">Recent Home Builds</a></li>
                                <li><a href="#link">Customer Reviews</a></li>
                                <li><a href="#link">Shipping, Returns, and Exchanges</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-block">
                            <h3 class="footer-title">SEARCH OUR HOUSE PLANS</h3>
                            <ul class="footer-links">
                                <li><a href="#link">Live Chat</a></li>
                                <li><a href="mailto:#">Email</a></li>
                                <li><a href="tel:832-521-5820">832-521-5820</a></li>
                                <li><a href="#link">My Account</a></li>
                                <li><a href="#link">E-Newsletter Signup</a></li>
                                <li><a href="#link">Privacy Policy</a></li>
                                <li><a href="#link">Terms of Use</a></li>
                                <li><a href="#link">Advertise with Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-block">
                            <h3 class="footer-title">ARCHITECT PREFERRED</h3>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        @show
    </div>
</div>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('js/libs.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
