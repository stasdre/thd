<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DWHP::@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/favicon.ico') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">

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
    <div class="container preffered_page_outer">
        @include('layouts.header-nav')
        <main class="home-inspiration-page">
            <div class="home-insipiration">
                <div class="main-container">
                    <div class="center mid-heading py-3 mobile-off pref_mid_headingdiv">
                        <h4 class="pref_mid_heading">Your Dream Home Starts with the Right House Plan + Builder</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mob_padding_0">
                            <div class="pref_head">
                                <div class="pref_whitebg">
                                    <div class="pref_blueheading">
                                        <h2>Preferred Builders</h2>

                                    </div>
                                    <div class="pref_blackheading">
                                        <p class="">Join Our Preferred Builders Program &gt;</p>

                                    </div>
                                </div>
                                <div class="pref_bluelinks_fullwidth">
                                    <div class="bluelinks_fullwidth">
                                        <div class="pref_bluelinks_outer">
                                            <ul>
                                                <form method="GET" action="{{route('builders.search')}}"
                                                    class="pref_builderform">
                                                    <li>FIND A HOME BUILDER</li>
                                                    <li class="mobile-off"><input type="text"
                                                            value="{{Request::get('city')}}" name="city"
                                                            placeholder="City" size="11"></li>
                                                    <li>
                                                        <select name="state">
                                                            <option>State</option>
                                                            @foreach ($states as $item)
                                                            <option @if(Request::get('state')==$item) selected @endif
                                                                value="{{$item}}">{{$item}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                    </li>
                                                    <li><input name="zip" value="{{Request::get('zip')}}" type="text"
                                                            placeholder="Zip Code" size="11"></li>
                                                    <li><input class="pref_searchbtn" type="submit" value="Search"></li>
                                                </form>
                                            </ul>

                                        </div>
                                        <div class="row pref_whitestrip_outer mobile-off">
                                            <div class="enter_city">
                                                <p>Enter city, state or zip code to start your search</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </div>
        </main>
        @include('layouts.footer')
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.promo-popup')
</body>

</html>