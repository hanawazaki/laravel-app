<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app">
    <div class="row">
      <div class="col-12 col-lg-3 col-navbar d-none d-xl-block border">
        <aside class="sidebar d-flex flex-column">
          <a href="#" class="sidebar-logo">
            <div class="d-flex justify-content-center align-items-center">
              <img src="{{asset('/img/logo.png')}}" alt="logo">
            </div>
          </a>

          <a href="./index.html" class="sidebar-item active">
            <span>Dashboard</span>
          </a>

          <a href="#" class="sidebar-item">
            <span>Master Data</span>
          </a>
        </aside>
      </div>

      <main class="col-12 col-xl-9">
        <div class="nav mb-5 py-3 px-5">
          <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0 ">
            <div class="d-flex flex-row justify-content-between align-items-center">
              <h2 class="nav-title">nav head</h2>
            </div>
            <ul class="navbar-nav ms-auto">
              <!-- Authentication Links -->
              @guest
              @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @endif

              @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
          <div>
            <h5 class="">Home</h5>
          </div>
        </div>
        <div class="content">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>