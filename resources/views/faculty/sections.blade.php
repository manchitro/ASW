@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        @foreach ($sections as $section)
            <div class="card nightbg soft-shadow mx-5 my-3" style="width: 18rem;">
                <div class="card-body no-wrap">
                    <h5 class="card-title">{{ $section->sectionname }}</h5>
                    <h6 class="card-text mb-2 font-italic text-nowrap">Sunday 8:00 - 10:00 [Theory] at 1115<br>Tuesday 8:00 - 11:00 [Lab] at D0203</h6>
                    <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                        <a href="#" class=""><button class="btn btn-outline-seablue">Students</button></a>
                        <a href="#" class=""><button class="btn btn-outline-seablue">Classes</button></a>
                        <a href="#" class=""><button class="btn btn-outline-seablue">Edit</button></a>
                    </div>
                </div>
            </div>
        @endforeach
        <button class="btn btn-seablue float soft-shadow px-3">
            <a href="/faculty/section/create" class="">
                <i class="fa fa-plus"></i>
                <p class="d-inline create">Create Section</p>
            </a>
        </button>
    </div>
@endsection
