@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="" method="post" class="section-form w-100">
            @csrf
            <div class=" pl-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="oldpassword" class="h5">Old Password</label>
                            <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter your old password">
                            @error('oldpassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if (session('errorpass'))
                                <div class="text-danger">{{ session('errorpass') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="newpassword" class="h5">New Password</label>
                            <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Enter a new password">
                            @error('newpassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="confirmnewpassword" class="h5">Confirm New Password</label>
                            <input type="password" class="form-control" name="confirmnewpassword" id="confirmnewpassword" placeholder="Confirm your new password">
                            @error('confirmnewpassword')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class=" pl-3 mt-4">
                <button class="btn btn-seablue" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
