@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main d-flex flex-row flex-wrap">
            <div class="login login-main d-inline vw-30">
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
                        <a href="/register" class="">Create An Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
