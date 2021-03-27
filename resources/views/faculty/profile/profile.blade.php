@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="" method="post" class="section-form w-100">
            @csrf
            <div class=" pl-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="academicid" class="h5">Academid ID</label>
                            <input readonly type="text" name="academicid" id="academicid" class="form-control-plaintext" value="{{ $user->academicid }}">
                            @error('academicid')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname" class="h5">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your first name" value="{{ $user->firstname }}">
                            @error('firstname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="lastname" class="h5">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your last name" value="{{ $user->lastname }}">
                            @error('lastname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email" class="h5">Email</label>
                            <input readonly type="text" name="email" id="email" class="form-control-plaintext" placeholder="Enter your email" value="{{ $user->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class=" pl-3 mt-4">
                <button class="btn btn-seablue" type="submit">Save</button>
                <a href="/faculty/profile/password" class="ml-2 btn btn-outline-seablue">Change Password</a>
            </div>
        </form>
    </div>
@endsection
