@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        @if (count($sections) == 0)
            <div class="text-warning h5">You have no sections. Please create one using the Create Section button below or from <u><a href="/faculty/section/create">here.</a></u> </div>
        @endif
        @foreach ($sections as $section)
            <div class="card nightbg soft-shadow mx-3 my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $section->sectionname }}</h5>
                    {{-- <h6 class="card-text">{{ $section->sectiontime }}</h6> --}}
                    @foreach ($section->sectiontimes as $sectiontime)
                        <h6 class="card-text font-italic text-nowrap mb-2">{{ '[' . $sectiontime->classtype . '] ' . $sectiontime->weekday . ' ' . $sectiontime->starttime . ' - ' . $sectiontime->endtime . ' at ' . $sectiontime->room }}</h6>
                    @endforeach
                    @if (count($section->sectiontimes) == 1)
                        <h6 class="card-text font-italic text-nowrap"><br></h6>
                    @endif
                    <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                        <a href="/faculty/section/{{ $section->eid }}/students/" class="btn btn-seablue">Students</a>
                        <a href="/faculty/section/{{ $section->eid }}/lectures/" class="btn btn-seablue">Lectures</a>
                        <a href="/faculty/section/{{ $section->eid }}/edit/" class="btn btn-seablue">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="/faculty/section/create" class="">
            <button class="btn btn-seablue float soft-shadow px-3">
                <i class="fa fa-plus"></i>
                <p class="d-inline create">Create Section</p>
            </button>
        </a>
    </div>
@endsection
