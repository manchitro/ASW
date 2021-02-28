@extends('layouts.faculty_layout')

@section('content')
    <button class="btn seabluebg floating-menu floating-menu-collapsed shadow" id="floating-menu" type="button">
        <i class="fas fa-bars"></i>
    </button>
    <div id="right-menu" class="right-menu right-menu-collapsed shadow">
        <nav id="sidebar-menu" class="seabluebg round-border-right-menu py-2 pl-2">
            <ul class="list-unstyled components m-0">
                <li>
                    <a href="/faculty/section/{{$section->eid}}/students/add">
                        <i class="fas fa-user-plus"></i>
                        Add Students
                    </a>
                </li>
                <li>
                    <a href="/faculty/section/{{$section->eid}}/students/remove">
                        <i class="fas fa-user-minus"></i>
                        Remove Students
                    </a>
                </li>
                <li>
                    <a href="/faculty/section/{{$section->eid}}/edit">
                        <i class="fas fa-edit"></i>
                        Edit Section
                    </a>
                </li>
                <li>
                    <a href="/faculty/section/{{$section->eid}}/classes">
                        <i class="fas fa-calendar-alt"></i>
                        View Classes
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <script>
        window.addEventListener('load', function() {
            $("#floating-menu").click(function() {
                if ($("#floating-menu").hasClass("floating-menu-collapsed")) {
                    $("#floating-menu").removeClass("floating-menu-collapsed")
                    $("#floating-menu").addClass("floating-menu-shown")
                } else {
                    $("#floating-menu").removeClass("floating-menu-shown")
                    $("#floating-menu").addClass("floating-menu-collapsed")
                }
                if ($("#right-menu").hasClass("right-menu-collapsed")) {
                    $("#right-menu").removeClass("right-menu-collapsed")
                    $("#right-menu").addClass("right-menu-shown")
                } else {
                    $("#right-menu").removeClass("right-menu-shown")
                    $("#right-menu").addClass("right-menu-collapsed")
                }
            })
        })

    </script>
@endsection
