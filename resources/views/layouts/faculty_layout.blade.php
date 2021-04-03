<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Faculty Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/datepicker.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}" type="image/x-icon" />
    <link href="{{ asset('css/faculty.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="vh-100">
        {{-- <nav class="navbar navbar-expand-sm nightbg navbar-dark blur5 shadow-lg" id="main-nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto version">
                        0.1.0 alpha
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto nav-profile h5">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle d-flex flex-row justify-content-center align-items-center px-2 py-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                <a class="nav-link" href="{{ url('/') }}">{{ $user->firstname . ' ' . $user->lastname }}</a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="btn text-dark font-weight-bold dropdown-item" type="button" href="/faculty/profile">Your Profile</a>
                                <a class="btn text-danger font-weight-bold dropdown-item" type="button" href="/logout">Logout</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav> --}}
        <main class="py-0 d-flex flex-row h-100">
            <nav id="sidebar" class="shadow-lg">
                <div class="sidebar-header shadow-lg">
                    <h3>ASW Faculty Portal</h3>
                    <strong>FP</strong>
                </div>
                <ul class="list-unstyled components shadow-lg">
                    <li class="{{ $currpage == 'Sections' ? 'active' : '' }}">
                        <a href="/faculty">
                            <i class="fas fa-user-friends"></i>
                            Sections
                        </a>
                    </li>
                    <li class="{{ $currpage == 'Search' ? 'active' : '' }}">
                        <a href="/faculty/search">
                            <i class="fas fa-search"></i>
                            Search
                        </a>
                    </li>
                    <li class="{{ $currpage == 'Profile' ? 'active' : '' }}">
                        <a href="/faculty/profile">
                            <i class="fas fa-user-circle"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="/logout" class="text-danger">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
                <div class="sidebar-today overflow-auto h-50 color-blanco">
                    <h5 class="sidebar-title">Today's Classes</h5>
                    <ul class="list-unstyled ">
                        <li class="border-top">
                            <div class="today-class p-2">
                                <table class="table table-dark table-sm table-transparent table-borderless">
                                    <tr>
                                        <td class="font-weight-bold">OBJECT ORIENTED PROGRAMMING 2 [H]</td>
                                        <td rowspan="3" class="qricon px-2"><i class="fas fa-qrcode"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">8:00 - 10:00 [Lab]</td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">at 1115</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="border-top">
                            <div class="today-class p-2">
                                <table class="table table-dark table-sm table-transparent table-borderless">
                                    <tr>
                                        <td class="font-weight-bold">OBJECT ORIENTED PROGRAMMING 2 [H]</td>
                                        <td rowspan="3" class="qricon px-2"><i class="fas fa-qrcode"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">8:00 - 10:00 [Lab]</td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">at 1115</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="border-top">
                            <div class="today-class p-2">
                                <table class="table table-dark table-sm table-transparent table-borderless">
                                    <tr>
                                        <td class="font-weight-bold">OBJECT ORIENTED PROGRAMMING 2 [H]</td>
                                        <td rowspan="3" class="qricon px-2"><i class="fas fa-qrcode"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">8:00 - 10:00 [Lab]</td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">at 1115</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                        <li class="border-top">
                            <div class="today-class p-2">
                                <table class="table table-dark table-sm table-transparent table-borderless">
                                    <tr>
                                        <td class="font-weight-bold">OBJECT ORIENTED PROGRAMMING 2 [H]</td>
                                        <td rowspan="3" class="qricon px-2"><i class="fas fa-qrcode"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">8:00 - 10:00 [Lab]</td>
                                    </tr>
                                    <tr>
                                        <td class="font-italic">at 1115</td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid px-0">
                <nav class="navbar navbar-expand-lg nightbg d-flex justify-content-start align-items-center shadow-lg">
                    <button type="button" id="sidebarCollapse" class="btn btn-seablue mr-3">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h2 class="px-3 border-left">{{ $pagetitle }}</h2>
                    <div class="ml-auto text-success">
                        {{ session('message') }}
                    </div>
                    <div class="ml-auto text-warning">
                        {{ session('warning') }}
                    </div>
                    <div class="ml-auto text-danger">
                        {{ session('error') }}
                    </div>
                    <div class="ml-auto" id="nav-name">
                        <div class="dropdown d-flex flex-row justify-content-center align-items-center">
                            <a class="h5 m-0 text-shadow text-info" href="{{ url('/faculty/profile') }}">{{ 'Welcome, ' . $user->firstname . ' ' . $user->lastname }}</a>
                        </div>
                    </div>
                </nav>
                @yield('content')
            </div>
        </main>
    </div>
    @include('popper::assets')
</body>

</html>
