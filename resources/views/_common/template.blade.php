<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $pageTitle }} - CRM2361</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.toast.min.css') }}" />

        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @if (!(Route::is('login_page') || Route::is('register_page')))
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
              @endif
              <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                @if (Route::has('login_page'))
                  @guest
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('register_page') }}">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login_page') }}">Login</a>
                  </li>
                  @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}<img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="{{ route('sign_out') }}">Logout</a></li>
                    </ul>
                  </li>
                  @endguest
                @endif
                
              </ul>
            </div>
          </div>
        </nav>
        <div>
          <div class="max-w-7xl mx-auto p-6 lg:p-8">
              <div class="mt-16">
                  @yield('content')
              </div>
          </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.toast.min.js') }}"></script>
        @if (session()->get('message'))
        <script type="text/javascript">
          $.toast({
              heading: "{{ session()->get('level') }}",
              text: "{{ session()->get('message') }}",
              icon: "{{ strtolower(session()->get('level')) }}",
              loader: true,        // Change it to false to disable loader
              loaderBg: '#9EC600'  // To change the background
          });
        </script>
        @endif
    </body>
</html>
