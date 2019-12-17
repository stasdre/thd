<header class="px-2 home">
  <div class="row align-items-center">
    <div class="col-md-3 col-sm-3 px-xs-0 width-sm-100">
      <div class="navbar-expand-lg navbar-dark bg-dark custom_nav d-block d-sm-block d-md-none">
        <span class="float-left">
          <button class="navbar-toggler p-0 border-0 d-inline-block" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="d-inline-block align-middle" href="{{route('home')}}"><img src="{{asset('images/icons/logo.png')}}"
              alt="" class="img-fluid mr-2" style="max-width:160px;"></a>
        </span>
        <span class="float-right">
          <a href="#"
            class="dropdown-toggle dropdown-toggle-search-mobile d-inline-block text-center text-white small align-middle xs-display"
            style="font-size:10px" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i
              class="fa fa-search d-block" style="font-size:16px; margin-right: 10px;"></i></a>
          <ul class="dropdown-menu dropdown-toggle-search-mobile">
            <li><a href="{{ route('advanced-search') }}">Advanced Search</a></li>
            <li><a href="{{ route('styles') }}">Architectural Styles</a></li>
            <li><a href="{{ route('collections') }}">Specialty Collections</a></li>
          </ul>
          <a href="tel:832-521-5820" class="d-inline-block text-center text-white small align-middle xs-display"
            style="font-size:10px"><i class="fa fa-phone d-block" style="font-size:16px; margin-right: 10px;"></i></a>
          <a href="/saved-plans" class="d-inline-block text-center text-white small align-middle xs-display"
            style="font-size:10px"><i class="fa fa-user d-block" style="font-size:16px; margin-right: 10px;"></i></a>
          <a href="{{route('cart')}}" class="d-inline-block text-center text-white small align-middle xs-display"
            style="font-size:10px"><i class="fa fa-shopping-cart d-block" style="font-size:16px;"></i></a>
        </span>
      </div>
      <a href="{{route('home')}}" class="d-none d-lg-block"><img src="{{asset('images/icons/logo.png')}}" alt=""
          class="img-fluid"></a>
    </div>
    <div class="col-md-7 col-sm-6 text-center z-index-xs width-sm-100">
      <ul class="list-inline text-center mb-4 toplinks  d-none d-lg-block">
        <li class="list-inline-item"><a href="{{ route('contact-us') }}">Email</a></li>
        <li class="list-inline-item"><a href="{{ route('contact-us') }}">Chat</a></li>
        <li class="list-inline-item"><a href="tel:832-521-5820">832-521-5820</a></li>
      </ul>

      <nav class="navbar navbar-dark navbar-expand-lg">

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="mb-0 p-0 width_100">
            <li class="list-inline-item dropdown d-lg-none"><a href="{{ route('contact-us') }}">Email</a></li>
            <li class="list-inline-item dropdown d-lg-none"><a href="{{ route('contact-us') }}">Live Chat</a></li>
            <li class="list-inline-item dropdown d-lg-none"><a href="tel:832-521-5820">Phone</a></li>
            <li class="list-inline-item dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false" href="#link"><img
                  src="{{asset('images/icons/icon-search.png')}}" alt="search"> House Plans</a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('advanced-search') }}">Advanced Search</a></li>
                <li><a href="{{ route('styles') }}">Architectural Styles</a></li>
                <li><a href="{{ route('collections') }}">Specialty Collections</a></li>
              </ul>
            </li>
            <li class="list-inline-item"><a href="#link">Reviews</a></li>
            <li class="list-inline-item"><a class="dropdown-toggle" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false" href="#link">Builders</a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('builders-home.index') }}">Preferred Building Program</a></li>
                <li><a href="{{ route('builders-home.index') }}">Find a Home Builder</a></li>
              </ul>
            </li>
            <li class="list-inline-item"><a href="{{route('inspiration')}}">Home Inspiration</a></li>
            <li class="list-inline-item"><a href="/about-us">About</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="col-md-2 col-sm-3 xs-set-position d-none d-lg-block">
      <ul class="list-inline text-center text-sm-right text-small text-uppercase mt-1 mb-3">
        @auth
        <li class="list-inline-item"><a href="/saved-plans">Dashboard</a></li>
        <li class="list-inline-item"><a href="{{ route('logout') }}">Logout</a></li>
        @endauth

        @guest
        <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
        <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
        @endguest

        <li class="list-inline-item"><a href="{{route('cart')}}"><img src="{{ asset('images/icons/icon-cart.png') }}"
              alt="" class="img-fluid"></a></li>
      </ul>
      <form class="input-group input-group-sm mb-1 plan_name_search" method="GET" action="{{ route('search') }}">
        <input type="text" name="txt" class="form-control rounded-0 border-secondary"
          placeholder="Plan Name, # or Topic">
        <div class="input-group-append">
          <button class="btn btn-primary rounded-0 text-uppercase text-dark font-weight-semi-bold"
            type="submit">GO</button>
        </div>
      </form>
    </div>
  </div>
</header>