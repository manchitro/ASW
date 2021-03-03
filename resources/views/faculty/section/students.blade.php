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
@endsection
