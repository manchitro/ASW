@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main d-flex flex-row flex-wrap">
            <div class="login login-main d-inline vw-30">
                <h2 class="mb-4">Create an ASW account</h2>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="academicId">Academic ID</label>
                        <input id="academicId" class="form-control" type="text" name="academicId" placeholder="XXXX-XXXX-X" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input id="firstName" class="form-control" type="text" name="firstName" placeholder="Enter your first name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" class="form-control" type="text" name="lastName"placeholder="Enter your last name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Academic Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your academic email address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Create a password for your account" required>
                    </div>
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Re-enter your password">
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
