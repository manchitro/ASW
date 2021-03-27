@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
        @slot('rightmenustate')
            {{ $user->rightmenustate }}
        @endslot
    @endcomponent
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        @if (count($lectures) == 0)
            <div class="text-info h5">You have no lectures scheduled as of now for this section. Please create one using the Add Lecture option from the <i class="fas fa-bars"></i> menu button below or from <u><a href="/faculty/section/{{ $section->eid }}/lectures/add">here.</a></u> </div>
        @endif
        @foreach ($lectures as $lecture)
            <div class="card nightbg soft-shadow mx-3 my-3">
                <div class="card-body">
                    <h6 class="card-title">{{ $section->sectionname }}</h6>
                    <h4 class="card-title">{{ $lecture->classtype }}</h4>
                    <h6 class="card-text">{{ 'on ' . $lecture->date }}</h6>
                    <h6 class="card-text font-italic text-nowrap mt-2">{{ 'from ' . $lecture->starttime . ' to ' . $lecture->endtime . ' at ' . $lecture->room }}</h6>
                    <div class="d-flex flex-row justify-content-between align-items-center mt-3">
                        <a href="/faculty/section/{{ $section->eid }}/lectures/{{ $lecture->eid }}/attendances" class=""><button class="btn btn-outline-seablue">Attendances</button></a>
                        <a href="/faculty/section/{{ $section->eid }}/lectures/{{ $lecture->eid }}/edit" class="" @if (strtotime($lecture->date) < strtotime('today')) echo {{ Popper::trigger(true, true, true)->position('bottom')->arrow()->danger('Cannot edit past classes. You can delete this class and create a new one.') }} @endif><button class="btn btn-outline-seablue mx-4" @if (strtotime($lecture->date) < strtotime('today')) echo disabled @endif>Edit</button></a>
                        <a href="/faculty/section/{{ $section->eid }}/lectures/{{ $lecture->eid }}/delete" class="" onclick="return confirm('Are you sure you want to delete this lecture? All attendance data of this lecture will be permanently deleted!')"><button class="btn btn-outline-danger">Delete</button></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
