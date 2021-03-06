@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main d-flex flex-row flex-wrap">
            @if (!session()->has('user'))
                @component('components.loginform')
                @endcomponent
            @else
                <div class="h2 w-100">You are already logged in!</div>
                <a href="/user" class="btn btn-lg btn-outline-success">Go to your portal</a>
            @endif
            {{-- <div class="login login-main d-inline vw-30">
                <h2 class="mb-4">Login</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email or Academic ID</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter your academic ID or Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="buttons d-flex flex-row justify-content-between align-items-center">
                        <button type="submit" class="btn btn-outline-dark">Login</button>
                        <a href="/register" class="btn btn-primary">Create An Account</a>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
@endsection
