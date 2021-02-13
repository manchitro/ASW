@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login login-main d-inline vw-30">
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
@endsection
