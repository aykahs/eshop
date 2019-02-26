<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title></title>



        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        @yield('style')
        <style>
                a:link {
                    text-decoration: none;
                  }

        </style>
    </head>
    <body>

          <div>
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                          <li>
                                <a href="">
                                        <span class="badge">{{ Session::has('cart')  ? Session::get('cart')->totalQty:'' }}</span>
                                </a>
                          </li>
                          <li>

                          </li>


                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>

                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->Name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

          </div>

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="columns is-gapless">
                        <div class="column is-one-fifth" id="side" style="background-color:white; hight:600px;">
                                <aside class="menu">
                                        <p class="menu-label">
                                         <h6> General</h6>

                                        <ul class="menu-list">
                                          <li><a>Dashboard</a></li>

                                        </ul>
                                        <p class="menu-label">
                                          Administration
                                        </p>
                                        <ul class="menu-list">
                                          <li><a href="{{ route('add.employer')}}">Add Employer</a></li>
                                          <li>
                                        <a >add</a>
                                          </li>
                                          <li><a>Invitations</a></li>
                                          <li><a>Cloud Storage</a></li>
                                          <li><a>Authentication</a></li>
                                        </ul>
                                        <p class="menu-label">
                                          Transactions
                                        </p>
                                        <ul class="menu-list">
                                          <li><a>Payments</a></li>
                                          <li><a>Transfers</a></li>
                                          <li><a>Balance</a></li>
                                        </ul>
                                      </aside>
                        </div>
                            <div class="column">
                                <div id="app">
                                    <div class="container is-fluid">
                                    @yield('content')
                                    </div>
                                </div>
                            </div>
                </div>

            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>


        <footer class="footer">
                <div class="content has-text-centered">
                  <p>
                    <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                  </p>
                </div>
        </footer>
    </body>
</html>
