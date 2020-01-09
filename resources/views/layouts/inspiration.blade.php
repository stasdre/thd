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
</head>

<body>
  <div class="container">
    @include('layouts.header-nav')
    <main class="home-inspiration-page">
      <div class="home-insipiration">
        <div class="center top-heading py-3">
          <h2 class="blue-text"> Home Inspiration</h2>
          <h5 class="HI-subheading mobile-off">FROM DAVID WIGGINS HOUSE PLANS</h5>
        </div>
        @isset ($menu)
        <div class="grey-nav-bar d-none d-lg-block">
          <ul class="HI_nav">
            <li><a href="{{route('inspiration')}}">Home Advice</a></li>
            @foreach ($menu as $item)
            @break($loop->iteration == 10)
            <li><a href="{{route('inspiration.page', $item->link)}}">{{$item->name}}</a></li>
            @endforeach
            <li class=""><i class="fa fa-caret-down tablet_only"></i></li>
          </ul>
        </div>
        <div class="grey-nav-bar d-none d-md-block d-lg-none">
          <ul class="HI_nav">
            <li><a href="{{route('inspiration')}}">Home Advice</a></li>
            @foreach ($menu as $item)
            @break($loop->iteration == 7)
            <li><a href="{{route('inspiration.page', $item->link)}}">{{$item->name}}</a></li>
            @endforeach
            <li><i class="fa fa-caret-down"></i></li>
          </ul>
        </div>
        <div class="grey-nav-bar mobile-grey-nav-bar d-none d-sm-block d-md-none" style="width:100%">
          <ul class="HI_nav d-flex justify-content-between">
            <li><a href="{{route('inspiration')}}">Home Advice</a></li>
            @foreach ($menu as $item)
            @break($loop->iteration == 4)
            <li><a href="{{route('inspiration.page', $item->link)}}">{{$item->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="grey-nav-bar mobile-grey-nav-bar d-none d-sm-block d-md-none" style="width:100%">
          <ul class="HI_nav d-flex justify-content-between">
            @foreach ($menu as $item)
            @break($loop->iteration == 7)
            @continue($loop->iteration <= 2) <li><a
                href="{{route('inspiration.page', $item->link)}}">{{$item->name}}</a></li>
              @endforeach
              <li><i class="fa fa-caret-down"></i></li>
          </ul>
        </div>
        @endisset

        <div class="main-container">
          @yield('content')
        </div>
      </div>
    </main>
    @include('layouts.footer')
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>