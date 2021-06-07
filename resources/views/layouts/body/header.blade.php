<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <h1 class="logo mr-auto"><a href="{{ url('/') }}"><span>Rohit's</span> Business</a></h1>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="{{ route('home.about') }}">Over</a></li>
        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
        <li><a href="{{ route('all.category') }}">Categories</a></li>
        <li><a href="{{ route('home.about') }}">Blog</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="#">Diensten</a></li>
        @auth
        <li><a href="{{ route('login') }}">{{ auth() -> user() -> name }}</a></li>
        <li>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" style="border:none; background: none;">Uitloggen</button>
          </form>
        </li>
        @endauth

        @guest
          <li>
            <a href="{{ route('login') }}">Inloggen</a>
          </li>
          <li>
            <a href="{{ route('register') }}">Registreren</a>
          </li>
        @endguest
        
        {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              @foreach (Config::get('languages') as $lang => $language)
                  @if ($lang != App::getLocale())
                          <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                  @endif
              @endforeach
            </div>
        </li> --}}

      </ul>
    </nav><!-- .nav-menu -->

    <div class="header-social-links">
      <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
      <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      <a href="https://be.linkedin.com/in/rohit-goukens-207101103/nl-nl?trk=people-guest_people_search-card" target="_blank" class="linkedin"><i class="icofont-linkedin"></i></i></a>
    </div>
  </div>
</header><!-- End Header -->