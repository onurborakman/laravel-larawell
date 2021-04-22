<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Larawell</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <style>
        body {
            background-image: url("{{asset('images/layout3.jpg')}}");
            background-size: cover;
            background-attachment: fixed;
        }

        .card-body {
            background-color: #525252;
            color: #fff;
        }
    </style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg shadow-sm navbar-dark border-bottom border-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Welcome
            </a>
            <button class="navbar-toggler" id="toggle-button" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon" id="toggle-image"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">


                </ul>
                <!-- Middle Side Of Navbar -->
                <ul class="navbar-nav mr-auto ml-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{URL::to('https://documenter.getpostman.com/view/10920906/TzCV3QST')}}" class="nav-link">{{__('API')}}</a>
                        </li>
                    @else


                        @if(Auth::user()->isAdmin == 1)
                            <a href="{{route('post.job')}}" class="nav-link mr-3">Post Job</a>
                            <a href="{{route('group.create')}}" class="nav-link mr-3">{{__('Create Group')}}</a>
                            <li class="nav-item dropdown mr-3">
                                <a id="adminDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Administration') }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="adminDropdown">
                                    <a href="{{route('admin')}}" class="dropdown-item">Manage Users</a>
                                    <a href="{{route('admin.job')}}" class="dropdown-item">Manage Jobs</a>
                                    <a href="{{route('admin.group')}}" class="dropdown-item">Manage Groups</a>
                                </div>
                            </li>
                        @endif
                    <!-- SEARCH -->
                        <form action="{{route('search')}}" class="form-inline my-2 my-lg-0 mr-5">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search"
                                   aria-label="Search" autocomplete="off">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{route('profile')}}" class="dropdown-item">{{__('My Profile')}}</a>
                                <a href="{{route('portfolio')}}" class="dropdown-item">{{__('My Portfolio')}}</a>
                                <a href="{{route('memberships')}}" class="dropdown-item">{{__('My Memberships')}}</a>
                                <a href="{{route('applications')}}" class="dropdown-item">{{__('My Applications')}}</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
        @yield('admin.content')
    </main>
</div>
</body>
</html>
