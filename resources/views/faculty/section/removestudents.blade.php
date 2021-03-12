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
    <form method="post" action="">
        @csrf
        <table class="table table-dark table-striped table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <td scope="col" style="width: 5%">
                        <label class="check-container">
                            <input type="checkbox" class="student-check-master" id="select-all">
                            <span class=" checkmark"></span>
                        </label>
                        </th>
                    <th scope="col" style="width: 5%">#</th>
                    <th scope="col" style="width: 10%">ID</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            <label class="check-container">
                                <input type="checkbox" class="student-check" name="student[]" value="{{ $student->eid }}">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <th scope="row">{{ $student->id }}</th>
                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                        <td>{{ $student->academicid }}</td>
                        <td>{{ $student->firstname . ' ' . $student->lastname }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($students) == 0)
            <div class="mx-3 text-warning h5">There are no students in this section as of now. To add students use the Add student button from the menu below or <a href="add"><u>click here</u></a></div>
        @endif
        <div class="select-buttons px-4 py-2">
            <button type="submit" class="btn btn-outline-danger">Remove Selected</button>
            <a href="/faculty/section/{{ $section->eid }}/students">
                <button class="btn btn-outline-seablue">Back</button>
            </a>
        </div>
        <script>
            window.addEventListener("load", function() {
                $("#select-all").click(function() {
                    $(".student-check").prop('checked', $(this).prop('checked'));
                });
            });

        </script>
    </form>
@endsection
