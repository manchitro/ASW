@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
        @slot('currentpage')
            {{ 'students' }}
        @endslot
        @slot('rightmenustate')
            {{ $user->rightmenustate }}
        @endslot
    @endcomponent
    @if (session('messages'))
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-seablue" data-toggle="modal" data-target="#exampleModalLong">
            Spreadsheet import report
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Spreadsheet import report</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach (session('messages') as $message)
                            <p>{{ $message }}</p>
                        @endforeach

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (count($students) == 0)
        <div class="mx-3 text-warning h5">There are no students in this section as of now. To add students use the Add student button from the menu below or <a href="add"><u>click here</u></a></div>
    @endif
    <div class="table-responsive overflow-auto h-90">
        <table class="table table-dark table-striped table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="width: 5%">#</th>
                    <th scope="col" style="width: 10%">ID</th>
                    <th scope="col" style="width: 30%">Name</th>
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
    </div>
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
