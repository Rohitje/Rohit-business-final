<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <h1 class="logo mr-auto"><a href="{{ url('/') }}"><span>Rohit's</span> Business</a></h1>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="{{ url('/') }}">{{ __('translate.home') }}</a></li>
        <li><a href="{{ route('home.about') }}">{{ __('translate.about') }}</a></li>
        <li><a href="{{ route('portfolio') }}">{{ __('translate.portfolio') }}</a></li>
        <li><a href="{{ route('all.category') }}">{{ __('translate.category') }}</a></li>
        <li><a href="{{ route('home.about') }}">{{ __('translate.blog') }}</a></li>
        <li><a href="{{ route('contact') }}">{{ __('translate.contact') }}</a></li>
        <li><a href="#">{{ __('translate.services') }}</a></li>
        <li><a href="{{ route('login') }}">{{ __('translate.login') }}</a></li>
        
        <li class="nav-item dropdown">
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
        </li>

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