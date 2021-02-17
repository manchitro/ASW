@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main d-flex flex-row flex-wrap">
            <div class="login login-main d-inline vw-30">
                <h2 class="mb-4">Create an ASW account</h2>
                <form method="post" action="/register">
                    @csrf
                    <div class="form-group">
                        <label for="academicId">Academic ID</label>
                        <input id="academicId" class="form-control" type="text" name="academicid" placeholder="XXXX-XXXX-X"
                            required value="{{ old('academicid') }}">
                        @error('academicid')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input id="firstname" class="form-control" type="text" name="firstname"
                            placeholder="Enter your first name" required value="{{ old('firstname') }}">
                        @error('firstname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input id="lastname" class="form-control" type="text" name="lastname"
                            placeholder="Enter your last name" required value="{{ old('lastname') }}">
                        @error('lastname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Academic Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            aria-describedby="emailHelp" placeholder="Enter your academic email address" required
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                            placeholder="Create a password for your account" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirmPassword"
                            placeholder="Re-enter your password">
                        @error('confirm_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="buttons d-flex flex-row justify-content-between align-items-center">
                        <a href="/login" class="btn btn-primary">Already have an account? Login!</a>
                        <button type="submit" class="btn btn-outline-success">Signup</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
