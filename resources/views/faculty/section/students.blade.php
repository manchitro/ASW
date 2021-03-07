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
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                @foreach ($lectures as $lecture)
                    <th scope="col">{{ substr($lecture->date, 0, -6) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td>{{ $student->academicid }}</td>
                    <td>{{ $student->firstname . ' ' . $student->lastname }}</td>
                    @foreach ($lectures as $lecture)
                        @foreach ($attendances as $attendance)
                            @if ($attendance->studentid == $student->id && $attendance->lectureid == $lecture->id)
                                <td>
                                    <label class="check-container">
                                        <input type="checkbox" class="attendance-check" id="{{ $attendance->eid }}" {{ $attendance->entry == 1 ? 'checked' : '' }} onclick="togglecheck('{{ $attendance->eid }}')">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (count($students) == 0)
        <div class="mx-3 text-warning h5">There are no students in this section as of now. To add students use the Add student button from the menu below or <a href="add"><u>click here</u></a></div>
    @endif
    <script>
        function togglecheck(eid) {
            if ($('#' + eid).is(':checked')) {
                console.log('checked ' + eid)
                // window.open('/faculty/async/toggleattendance/' + eid + '/' + '1')
                $.get('/faculty/async/toggleattendance/' + eid + '/' + '1');
            } else {
                console.log('unchecked ' + eid)
                // window.open('/faculty/async/toggleattendance/' + eid + '/' + '0')
                $.get('/faculty/async/toggleattendance/' + eid + '/' + '0');
            }
            // window.open('/faculty/async/toggleattendance/' + eid + $('#' + eid).is(':checked') ? '1' : '0');
            // $.get('/faculty/async/toggleattendance/' + eid, function(data) {
            //     console.log(data);
            // })
        }

    </script>
@endsection
