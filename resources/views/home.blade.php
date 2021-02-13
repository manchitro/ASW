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
            <div class="login d-inline vw-30">
                <h2 class="mb-4">Login</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email or Academic ID</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
