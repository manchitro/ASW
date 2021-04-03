@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
        @slot('currentpage')
            {{ 'editlecture' }}
        @endslot
        @slot('rightmenustate')
            {{ $user->rightmenustate }}
        @endslot
    @endcomponent
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="" method="post" class="section-form w-100">
            <div class="border-left pl-3">
                <h4>Please insert lecture information</h4>
            </div>
            @csrf
            <div class="border-left pl-3">
                <div class="row mt-3">
                    <div class="col-8">
                        Date:
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <div id="bsdp" class="input-group date" data-provide="datepicker">
                            <input type="text" name="date" class="form-control date-withicon" placeholder="Select Date" value="{{ $lecture->date }}" />
                            <div class="input-group-addon seabluebg d-flex align-items-center px-3 rounded-right">
                                <i class="fa fa-calendar-alt h5 m-auto"></i>
                            </div>
                        </div>
                        <script>
                            window.addEventListener("load", function() {
                                $('#bsdp').datepicker({
                                    format: "M dd, yyyy",
                                    maxViewMode: 2,
                                    todayBtn: "linked",
                                    clearBtn: true,
                                    orientation: "auto",
                                    autoclose: true,
                                });
                            })

                        </script>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="border-left pl-3">
                <div class="row mt-3">
                    <div class="col-8">
                        <h5>Autofill using Template:</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    @foreach ($formattedsectiontimes as $sectiontime)
                        <div class="col-6">
                            <div class="card sectiontime-card btn btn-seablue " onclick="fillsectiontime({{ $loop->index }})">
                                <div class="card-body">
                                    <h5 class="card-title">Section Time {{ $loop->iteration }}</h5>
                                    <p class="card-text font-italic ">
                                        <span id="classtype{{ $loop->index }}">{{ '[' . $formattedsectiontimes[$loop->index]->classtype . '] ' }}</span>
                                        <span id="weekday{{ $loop->index }}">{{ $formattedsectiontimes[$loop->index]->weekday . ' ' }}</span>
                                        <span id="starttime{{ $loop->index }}" value="{{ $sectiontimes[$loop->index]->starttime }}">{{ $formattedsectiontimes[$loop->index]->starttime . ' - ' }}</span>
                                        <span id="endtime{{ $loop->index }}" value="{{ $sectiontimes[$loop->index]->endtime }}">{{ $formattedsectiontimes[$loop->index]->endtime . ' at ' }}</span>
                                        <span id="room{{ $loop->index }}">{{ $formattedsectiontimes[$loop->index]->room }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <script>
                        function fillsectiontime(index) {
                            //classtype
                            var classtype = $('#classtype' + index).text().trim();
                            if (classtype == '[Lab]') {
                                $('#classtypelab').prop("checked", true);
                            } else if (classtype == '[Theory]') {
                                $('#classtypetheory').prop("checked", true);
                            }

                            //starttime
                            var starttime = $('#starttime' + index).attr('value');
                            $('#starttime').val(starttime);

                            //endtime
                            var endtime = $('#endtime' + index).attr('value');
                            $('#endtime').val(endtime);

                            //room
                            var room = $('#room' + index).text().trim();
                            $('#room').val(room);
                        }

                    </script>
                </div>
            </div>
            <div class="border-left pl-3">
                <div class="row mt-3">
                    <div class="col">
                        Or fill manually
                    </div>
                </div>
            </div>
            <div class="border-left pl-3">
                <div class="row mt-3">
                    <div class="col">
                        Class Type:
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype" id="classtypelab" value="lab" {{ $lecture->classtype == 'lab' ? 'checked' : '' }}>
                                Lab
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype" id="classtypetheory" value="theory" {{ $lecture->classtype == 'theory' ? 'checked' : '' }}>
                                Theory
                            </label>
                        </div>
                        @error('classtype')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row st1 mt-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="starttime">Start time</label>
                            @error('starttime')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select id="starttime" class="form-control" name="starttime" value="{{ $lecture->starttime }}">
                                <option value="0" {{ $lecture->starttime == 0 ? 'selected' : '' }}>8:00 AM</option>
                                <option value="1" {{ $lecture->starttime == 1 ? 'selected' : '' }}>8:30 AM</option>
                                <option value="2" {{ $lecture->starttime == 2 ? 'selected' : '' }}>9:00 AM</option>
                                <option value="3" {{ $lecture->starttime == 3 ? 'selected' : '' }}>9:30 AM</option>
                                <option value="4" {{ $lecture->starttime == 4 ? 'selected' : '' }}>10:00 AM</option>
                                <option value="5" {{ $lecture->starttime == 5 ? 'selected' : '' }}>10:30 AM</option>
                                <option value="6" {{ $lecture->starttime == 6 ? 'selected' : '' }}>11:00 AM</option>
                                <option value="7" {{ $lecture->starttime == 7 ? 'selected' : '' }}>11:30 AM</option>
                                <option value="8" {{ $lecture->starttime == 8 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="9" {{ $lecture->starttime == 9 ? 'selected' : '' }}>12:30 PM</option>
                                <option value="10" {{ $lecture->starttime == 10 ? 'selected' : '' }}>1:00 PM</option>
                                <option value="11" {{ $lecture->starttime == 11 ? 'selected' : '' }}>1:30 PM</option>
                                <option value="12" {{ $lecture->starttime == 12 ? 'selected' : '' }}>2:00 PM</option>
                                <option value="13" {{ $lecture->starttime == 13 ? 'selected' : '' }}>2:30 PM</option>
                                <option value="14" {{ $lecture->starttime == 14 ? 'selected' : '' }}>3:00 PM</option>
                                <option value="15" {{ $lecture->starttime == 15 ? 'selected' : '' }}>3:30 PM</option>
                                <option value="16" {{ $lecture->starttime == 16 ? 'selected' : '' }}>4:00 PM</option>
                                <option value="17" {{ $lecture->starttime == 17 ? 'selected' : '' }}>4:30 PM</option>
                                <option value="18" {{ $lecture->starttime == 18 ? 'selected' : '' }}>5:00 PM</option>
                                <option value="19" {{ $lecture->starttime == 19 ? 'selected' : '' }}>5:30 PM</option>
                                <option value="20" {{ $lecture->starttime == 20 ? 'selected' : '' }}>6:00 PM</option>
                                <option value="21" {{ $lecture->starttime == 21 ? 'selected' : '' }}>6:30 PM</option>
                                <option value="22" {{ $lecture->starttime == 22 ? 'selected' : '' }}>7:00 PM</option>
                                <option value="23" {{ $lecture->starttime == 23 ? 'selected' : '' }}>7:30 PM</option>
                                <option value="24" {{ $lecture->starttime == 24 ? 'selected' : '' }}>8:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="endtime">End time</label>
                            <select id="endtime" class="form-control" name="endtime" value="{{ $lecture->endtime }}">
                                <option value="0" {{ $lecture->endtime == 0 ? 'selected' : '' }}>8:00 AM</option>
                                <option value="1" {{ $lecture->endtime == 1 ? 'selected' : '' }}>8:30 AM</option>
                                <option value="2" {{ $lecture->endtime == 2 ? 'selected' : '' }}>9:00 AM</option>
                                <option value="3" {{ $lecture->endtime == 3 ? 'selected' : '' }}>9:30 AM</option>
                                <option value="4" {{ $lecture->endtime == 4 ? 'selected' : '' }}>10:00 AM</option>
                                <option value="5" {{ $lecture->endtime == 5 ? 'selected' : '' }}>10:30 AM</option>
                                <option value="6" {{ $lecture->endtime == 6 ? 'selected' : '' }}>11:00 AM</option>
                                <option value="7" {{ $lecture->endtime == 7 ? 'selected' : '' }}>11:30 AM</option>
                                <option value="8" {{ $lecture->endtime == 8 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="9" {{ $lecture->endtime == 9 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="10" {{ $lecture->endtime == 10 ? 'selected' : '' }}>1:00 PM</option>
                                <option value="11" {{ $lecture->endtime == 11 ? 'selected' : '' }}>1:30 PM</option>
                                <option value="12" {{ $lecture->endtime == 12 ? 'selected' : '' }}>2:00 PM</option>
                                <option value="13" {{ $lecture->endtime == 13 ? 'selected' : '' }}>2:30 PM</option>
                                <option value="14" {{ $lecture->endtime == 14 ? 'selected' : '' }}>3:00 PM</option>
                                <option value="15" {{ $lecture->endtime == 15 ? 'selected' : '' }}>3:30 PM</option>
                                <option value="16" {{ $lecture->endtime == 16 ? 'selected' : '' }}>4:00 PM</option>
                                <option value="17" {{ $lecture->endtime == 17 ? 'selected' : '' }}>4:30 PM</option>
                                <option value="18" {{ $lecture->endtime == 18 ? 'selected' : '' }}>5:00 PM</option>
                                <option value="19" {{ $lecture->endtime == 19 ? 'selected' : '' }}>5:30 PM</option>
                                <option value="20" {{ $lecture->endtime == 20 ? 'selected' : '' }}>6:00 PM</option>
                                <option value="21" {{ $lecture->endtime == 21 ? 'selected' : '' }}>6:30 PM</option>
                                <option value="22" {{ $lecture->endtime == 22 ? 'selected' : '' }}>7:00 PM</option>
                                <option value="23" {{ $lecture->endtime == 23 ? 'selected' : '' }}>7:30 PM</option>
                                <option value="24" {{ $lecture->endtime == 24 ? 'selected' : '' }}>8:00 PM</option>
                            </select>
                            @error('endtime')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="room">Room</label>
                            <input id="room" class="form-control" type="text" name="room" placeholder="i.e. 1102/D0203" value="{{ $lecture->room }}">
                            @error('room')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3 mt-4">
                <button class="btn btn-seablue" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
