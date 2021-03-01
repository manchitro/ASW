@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        @foreach ($sections as $section)
            <div class="card nightbg soft-shadow mx-5 my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $section->sectionname }}</h5>
                    {{-- <h6 class="card-text">{{ $section->sectiontime }}</h6> --}}
                    @foreach ($section->sectiontimes as $sectiontime)
                        <h6 class="card-text font-italic text-nowrap">{{'['.$sectiontime->classtype.'] '. $sectiontime->weekday . ' ' . $sectiontime->starttime . ' - ' . $sectiontime->endtime . ' at ' . $sectiontime->room }}</h6>
                    @endforeach
                    @if (count($section->sectiontimes) == 1)
                        <h6 class="card-text font-italic text-nowrap"><br></h6>
                    @endif
                    <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                        <a href="/faculty/section/{{$section->eid}}/students/" class=""><button class="btn btn-outline-seablue">Students</button></a>
                        <a href="/faculty/section/{{$section->eid}}/classes" class=""><button class="btn btn-outline-seablue">Lectures</button></a>
                        <a href="/faculty/section/{{$section->eid}}/edit" class=""><button class="btn btn-outline-seablue">Edit</button></a>
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
