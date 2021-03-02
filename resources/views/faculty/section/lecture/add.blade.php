@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
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
                            <input type="text" class="form-control date-withicon" placeholder="Select Date" />
                            <div class="input-group-addon seabluebg d-flex align-items-center px-3 rounded-right">
                                <i class="fa fa-calendar-alt h5 m-auto"></i>
                            </div>
                        </div>
                        <script>
                            window.addEventListener("load", function() {
                                $('#bsdp').datepicker({
                                    format: "M dd, yyyy",
                                    startDate: "today",
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
                                <input type="radio" class="form-check-input" name="classtype" id="classtypelab" value="lab" {{ old('classtype1') == 'lab' ? 'checked' : '' }}>
                                Lab
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype" id="classtypetheory" value="theory" {{ old('classtype1') == 'theory' ? 'checked' : '' }}>
                                Theory
                            </label>
                        </div>
                        @error('classtype1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row st1 mt-4">
                    <div class="col">
                        <div class="form-group">
                            <label for="starttime1">Start time</label>
                            @error('starttime1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select id="starttime" class="form-control" name="starttime" value="{{ old('starttime1') }}">
                                <option value="0" {{ old('starttime1') == 0 ? 'selected' : '' }}>8:00 AM</option>
                                <option value="1" {{ old('starttime1') == 1 ? 'selected' : '' }}>8:30 AM</option>
                                <option value="2" {{ old('starttime1') == 2 ? 'selected' : '' }}>9:00 AM</option>
                                <option value="3" {{ old('starttime1') == 3 ? 'selected' : '' }}>9:30 AM</option>
                                <option value="4" {{ old('starttime1') == 4 ? 'selected' : '' }}>10:00 AM</option>
                                <option value="5" {{ old('starttime1') == 5 ? 'selected' : '' }}>10:30 AM</option>
                                <option value="6" {{ old('starttime1') == 6 ? 'selected' : '' }}>11:00 AM</option>
                                <option value="7" {{ old('starttime1') == 7 ? 'selected' : '' }}>11:30 AM</option>
                                <option value="8" {{ old('starttime1') == 8 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="9" {{ old('starttime1') == 9 ? 'selected' : '' }}>12:30 PM</option>
                                <option value="10" {{ old('starttime1') == 10 ? 'selected' : '' }}>1:00 PM</option>
                                <option value="11" {{ old('starttime1') == 11 ? 'selected' : '' }}>1:30 PM</option>
                                <option value="12" {{ old('starttime1') == 12 ? 'selected' : '' }}>2:00 PM</option>
                                <option value="13" {{ old('starttime1') == 13 ? 'selected' : '' }}>2:30 PM</option>
                                <option value="14" {{ old('starttime1') == 14 ? 'selected' : '' }}>3:00 PM</option>
                                <option value="15" {{ old('starttime1') == 15 ? 'selected' : '' }}>3:30 PM</option>
                                <option value="16" {{ old('starttime1') == 16 ? 'selected' : '' }}>4:00 PM</option>
                                <option value="17" {{ old('starttime1') == 17 ? 'selected' : '' }}>4:30 PM</option>
                                <option value="18" {{ old('starttime1') == 18 ? 'selected' : '' }}>5:00 PM</option>
                                <option value="19" {{ old('starttime1') == 19 ? 'selected' : '' }}>5:30 PM</option>
                                <option value="20" {{ old('starttime1') == 20 ? 'selected' : '' }}>6:00 PM</option>
                                <option value="21" {{ old('starttime1') == 21 ? 'selected' : '' }}>6:30 PM</option>
                                <option value="22" {{ old('starttime1') == 22 ? 'selected' : '' }}>7:00 PM</option>
                                <option value="23" {{ old('starttime1') == 23 ? 'selected' : '' }}>7:30 PM</option>
                                <option value="24" {{ old('starttime1') == 24 ? 'selected' : '' }}>8:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="endtime">End time</label>
                            <select id="endtime" class="form-control" name="endtime1" value="{{ old('endtime1') }}">
                                <option value="0" {{ old('endtime1') == 0 ? 'selected' : '' }}>8:00 AM</option>
                                <option value="1" {{ old('endtime1') == 1 ? 'selected' : '' }}>8:30 AM</option>
                                <option value="2" {{ old('endtime1') == 2 ? 'selected' : '' }}>9:00 AM</option>
                                <option value="3" {{ old('endtime1') == 3 ? 'selected' : '' }}>9:30 AM</option>
                                <option value="4" {{ old('endtime1') == 4 ? 'selected' : '' }}>10:00 AM</option>
                                <option value="5" {{ old('endtime1') == 5 ? 'selected' : '' }}>10:30 AM</option>
                                <option value="6" {{ old('endtime1') == 6 ? 'selected' : '' }}>11:00 AM</option>
                                <option value="7" {{ old('endtime1') == 7 ? 'selected' : '' }}>11:30 AM</option>
                                <option value="8" {{ old('endtime1') == 8 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="9" {{ old('endtime1') == 9 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="10" {{ old('endtime1') == 10 ? 'selected' : '' }}>1:00 PM</option>
                                <option value="11" {{ old('endtime1') == 11 ? 'selected' : '' }}>1:30 PM</option>
                                <option value="12" {{ old('endtime1') == 12 ? 'selected' : '' }}>2:00 PM</option>
                                <option value="13" {{ old('endtime1') == 13 ? 'selected' : '' }}>2:30 PM</option>
                                <option value="14" {{ old('endtime1') == 14 ? 'selected' : '' }}>3:00 PM</option>
                                <option value="15" {{ old('endtime1') == 15 ? 'selected' : '' }}>3:30 PM</option>
                                <option value="16" {{ old('endtime1') == 16 ? 'selected' : '' }}>4:00 PM</option>
                                <option value="17" {{ old('endtime1') == 17 ? 'selected' : '' }}>4:30 PM</option>
                                <option value="18" {{ old('endtime1') == 18 ? 'selected' : '' }}>5:00 PM</option>
                                <option value="19" {{ old('endtime1') == 19 ? 'selected' : '' }}>5:30 PM</option>
                                <option value="20" {{ old('endtime1') == 20 ? 'selected' : '' }}>6:00 PM</option>
                                <option value="21" {{ old('endtime1') == 21 ? 'selected' : '' }}>6:30 PM</option>
                                <option value="22" {{ old('endtime1') == 22 ? 'selected' : '' }}>7:00 PM</option>
                                <option value="23" {{ old('endtime1') == 23 ? 'selected' : '' }}>7:30 PM</option>
                                <option value="24" {{ old('endtime1') == 24 ? 'selected' : '' }}>8:00 PM</option>
                            </select>
                            @error('endtime1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="room1">Room</label>
                            <input id="room" class="form-control" type="text" name="room" placeholder="i.e. 1102/D0203" value="{{ old('room1') }}">
                            @error('room1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3 mt-4">
                <button class="btn btn-seablue" type="submit">Add</button>
            </div>
        </form>
    </div>
@endsection
