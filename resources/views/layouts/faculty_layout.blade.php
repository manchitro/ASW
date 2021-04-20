<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Faculty Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/datepicker.js') }}" defer></script>
    <script src="{{ asset('js/qrdisplay.js') }}" defer></script>
    <script src="{{ asset('js/qrcode.min.js') }}" defer></script>

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
        <main class="py-0 d-flex flex-row h-100">
            <nav id="sidebar" class="shadow-lg">
                <a href="/faculty">
                    <div class="sidebar-header shadow-lg">
                        <h3>ASW Faculty Portal</h3>
                        <strong>FP</strong>
                    </div>
                </a>
                <ul class="list-unstyled components shadow-lg m-0">
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
                    <li class="{{ $currpage == 'Help' ? 'active' : '' }}">
                        <a href="/faculty/help">
                            <i class="fas fa-question-circle"></i>
                            Help
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
                    <h5 class="sidebar-title">Today's Lectures</h5>
                    <ul class="list-unstyled" id="todays-list">
                    </ul>
                </div>
            </nav>
            <div class="container-fluid fullscreen-flex px-0">
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
    {{-- <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="qrcode">
        </div>
    </div> --}}
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" id="qrcode" role="document">
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            loadtodaysclasses();
        })

        function loadtodaysclasses() {
            $.get("/faculty/todaysclasses", function(data) {
                var lectures = JSON.parse(data);
                $('#todays-list').empty();
                if (lectures.length == 0) {
                    var p = '<p class="p-2 border-top">No Lectures today</p>'
                    $('#todays-list').append(p);
                }
                lectures.forEach(function(lecture) {
                    var li =
                        '<li class="border-top">' +
                        '<div class="today-class p-2">' +
                        '<table class="table table-dark table-sm table-transparent table-borderless">' +
                        '<tr>' +
                        '<td class="font-weight-bold">' + lecture.sectionname + '</td>' +
                        '<td rowspan="3" class="qricon px-2">' +
                        '<button class="btn btn-lg btn-outline-seablue qr-button" id="' + lecture.eid + '" onclick="qrbuttonclick(\'' + lecture.eid + '\')">' +
                        '<i class="fas fa-qrcode"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td class="font-italic">' + lecture.starttime + ' - ' + lecture.endtime + ' [' + lecture.classtype + ']</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td class="font-italic">at ' + lecture.room + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        (lecture.qrstart == null ? '<td>QR not shown yet</td>' : '<td class="font-italic">QR shown from ' + lecture.qrstart.substring(10, lecture.qrstart.length) + ' to ' + lecture.qrend.substring(10, lecture.qrstart.length) + '</td>') +
                        '</tr>' +
                        '</table>' +
                        '</div>' +
                        '</li>';
                    $('#todays-list').append(li);
                })

            })
        }

    </script>
    @include('popper::assets')
</body>

</html>
