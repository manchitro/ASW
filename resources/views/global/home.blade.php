@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main d-flex flex-row flex-wrap">
            <div class="welcome-msg d-inline mb-2">
                <h1 class="welcome">Welcome to ASW</h1>
                <h4 class="automate">Automate Your Class with Attendance Scanning</h4>
                <div class="steps mw-50">
                    <p>Submit your attendance by scanning the QR code your teacher shows in class using our mobile app.</p>
                </div>
            </div>
            @if (!session()->has('user'))
                @component('components.loginform')
                @endcomponent
            @else
                <a href="/user" class="btn btn-lg btn-outline-success">Go to your portal</a>
            @endif
        </div>
    </div>
@endsection
{{-- @php
echo $users
@endphp --}}
