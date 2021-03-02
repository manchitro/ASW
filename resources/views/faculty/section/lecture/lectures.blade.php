@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
    @endcomponent
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        @if (count($lectures) == 0)
            <div class="text-info h5">You have no lectures scheduled as of now for this section. Please create one using the Add Lecture option from the <i class="fas fa-bars"></i> menu button below or from <u><a href="/faculty/section/{{ $section->eid }}/lectures/add">here.</a></u> </div>
        @endif
        @foreach ($lectures as $lecture)
            <div class="card nightbg soft-shadow mx-5 my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $section->sectionname }}</h5>
                    {{-- <h6 class="card-text">{{ $section->sectiontime }}</h6> --}}
                    @foreach ($section->sectiontimes as $sectiontime)
                        <h6 class="card-text font-italic text-nowrap">{{ '[' . $sectiontime->classtype . '] ' . $sectiontime->weekday . ' ' . $sectiontime->starttime . ' - ' . $sectiontime->endtime . ' at ' . $sectiontime->room }}</h6>
                    @endforeach
                    @if (count($section->sectiontimes) == 1)
                        <h6 class="card-text font-italic text-nowrap"><br></h6>
                    @endif
                    <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                        <a href="/faculty/section/{{ $section->eid }}/students/" class=""><button class="btn btn-outline-seablue">Students</button></a>
                        <a href="/faculty/section/{{ $section->eid }}/classes" class=""><button class="btn btn-outline-seablue">Lectures</button></a>
                        <a href="/faculty/section/{{ $section->eid }}/edit" class=""><button class="btn btn-outline-seablue">Edit</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
