<header class="px-2 home mobileHeader">
  <div class="row align-items-center">
    <div class="col-md-3 col-sm-3 px-xs-0 width-sm-100">
      <div class="navbar-expand-lg navbar-dark bg-dark custom_nav">
        <span class="float-left">
          <button class="navbar-toggler p-0 border-0 d-inline-block" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
            aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <a
            class="d-inline-block align-middle" href="{{route('home')}}"><img src="{{asset('images/icons/logo.png')}}"
              alt="" class="img-fluid mr-2" style="max-width:160px;"></a>
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