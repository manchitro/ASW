@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
        @slot('sectionname')
            {{ $section->sectionname }}
        @endslot
    @endcomponent
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="" method="post" class="section-form w-100">
            <div class="border-left pl-3 mb-4">
                <h3>Add a student</h3>
                <p>If the student is not in our database, a new entry will be created. Otherwise we'll match existing student using Academic ID</p>
            </div>
            @csrf
            <div class="border-left pl-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="academicid" class="h5">Academid ID</label>
                            <input type="text" name="academicid" id="academicid" class="form-control" placeholder="Enter student's Academic ID" value="{{ old('academicid') }}">
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
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter student's first name" value="{{ old('firstname') }}">
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
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter student's last name" value="{{ old('lastname') }}">
                            @error('lastname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3 mt-4">
                <button class="btn btn-seablue" type="submit">Add Student</button>
            </div>
        </form>
    </div>
@endsection
