@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
    @endcomponent
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="/faculty/section/edit" method="post" class="section-form w-100">
            @csrf
            <div class="border-left pl-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="sectionname" class="h3">Section Name</label>
                            <input type="text" name="sectionname" id="sectionname" class="form-control" placeholder="i.e. Programming Language 1 [A]" value="{{ $section->sectionname }}">
                            @error('sectionname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3">
                <div class="row mt-4">
                    <div class="col">
                        <h5>Section Time 1</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        Class Type:
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype1" value="lab" {{ $sectiontimes[0]->classtype == 'lab' ? 'checked' : '' }}>
                                Lab
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype1" value="theory" {{ $sectiontimes[0]->classtype == 'theory' ? 'checked' : '' }}>
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
                            <label for="weekday1">Weekday</label>
                            @error('weekday1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select id="weekday1" class="form-control" name="weekday1">
                                <option value="0" {{ $sectiontimes[0]->weekday == 0 ? 'selected' : '' }}>Sunday</option>
                                <option value="1" {{ $sectiontimes[0]->weekday == 1 ? 'selected' : '' }}>Monday</option>
                                <option value="2" {{ $sectiontimes[0]->weekday == 2 ? 'selected' : '' }}>Tuesday</option>
                                <option value="3" {{ $sectiontimes[0]->weekday == 3 ? 'selected' : '' }}>Wednesday</option>
                                <option value="4" {{ $sectiontimes[0]->weekday == 4 ? 'selected' : '' }}>Thursday</option>
                                <option value="5" {{ $sectiontimes[0]->weekday == 5 ? 'selected' : '' }}>Friday</option>
                                <option value="6" {{ $sectiontimes[0]->weekday == 6 ? 'selected' : '' }}>Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="starttime1">Start time</label>
                            @error('starttime1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select id="starttime1" class="form-control" name="starttime1" value="{{ old('starttime1') }}">
                                <option value="0" {{ $sectiontimes[0]->starttime == 0 ? 'selected' : '' }}>8:00 AM</option>
                                <option value="1" {{ $sectiontimes[0]->starttime == 1 ? 'selected' : '' }}>8:30 AM</option>
                                <option value="2" {{ $sectiontimes[0]->starttime == 2 ? 'selected' : '' }}>9:00 AM</option>
                                <option value="3" {{ $sectiontimes[0]->starttime == 3 ? 'selected' : '' }}>9:30 AM</option>
                                <option value="4" {{ $sectiontimes[0]->starttime == 4 ? 'selected' : '' }}>10:00 AM</option>
                                <option value="5" {{ $sectiontimes[0]->starttime == 5 ? 'selected' : '' }}>10:30 AM</option>
                                <option value="6" {{ $sectiontimes[0]->starttime == 6 ? 'selected' : '' }}>11:00 AM</option>
                                <option value="7" {{ $sectiontimes[0]->starttime == 7 ? 'selected' : '' }}>11:30 AM</option>
                                <option value="8" {{ $sectiontimes[0]->starttime == 8 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="9" {{ $sectiontimes[0]->starttime == 9 ? 'selected' : '' }}>12:30 PM</option>
                                <option value="10" {{ $sectiontimes[0]->starttime == 10 ? 'selected' : '' }}>1:00 PM</option>
                                <option value="11" {{ $sectiontimes[0]->starttime == 11 ? 'selected' : '' }}>1:30 PM</option>
                                <option value="12" {{ $sectiontimes[0]->starttime == 12 ? 'selected' : '' }}>2:00 PM</option>
                                <option value="13" {{ $sectiontimes[0]->starttime == 13 ? 'selected' : '' }}>2:30 PM</option>
                                <option value="14" {{ $sectiontimes[0]->starttime == 14 ? 'selected' : '' }}>3:00 PM</option>
                                <option value="15" {{ $sectiontimes[0]->starttime == 15 ? 'selected' : '' }}>3:30 PM</option>
                                <option value="16" {{ $sectiontimes[0]->starttime == 16 ? 'selected' : '' }}>4:00 PM</option>
                                <option value="17" {{ $sectiontimes[0]->starttime == 17 ? 'selected' : '' }}>4:30 PM</option>
                                <option value="18" {{ $sectiontimes[0]->starttime == 18 ? 'selected' : '' }}>5:00 PM</option>
                                <option value="19" {{ $sectiontimes[0]->starttime == 19 ? 'selected' : '' }}>5:30 PM</option>
                                <option value="20" {{ $sectiontimes[0]->starttime == 20 ? 'selected' : '' }}>6:00 PM</option>
                                <option value="21" {{ $sectiontimes[0]->starttime == 21 ? 'selected' : '' }}>6:30 PM</option>
                                <option value="22" {{ $sectiontimes[0]->starttime == 22 ? 'selected' : '' }}>7:00 PM</option>
                                <option value="23" {{ $sectiontimes[0]->starttime == 23 ? 'selected' : '' }}>7:30 PM</option>
                                <option value="24" {{ $sectiontimes[0]->starttime == 24 ? 'selected' : '' }}>8:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="endtime1">End time</label>
                            <select id="endtime1" class="form-control" name="endtime1" value="{{ old('endtime1') }}">
                                <option value="0" {{ $sectiontimes[0]->endtime == 0 ? 'selected' : '' }}>8:00 AM</option>
                                <option value="1" {{ $sectiontimes[0]->endtime == 1 ? 'selected' : '' }}>8:30 AM</option>
                                <option value="2" {{ $sectiontimes[0]->endtime == 2 ? 'selected' : '' }}>9:00 AM</option>
                                <option value="3" {{ $sectiontimes[0]->endtime == 3 ? 'selected' : '' }}>9:30 AM</option>
                                <option value="4" {{ $sectiontimes[0]->endtime == 4 ? 'selected' : '' }}>10:00 AM</option>
                                <option value="5" {{ $sectiontimes[0]->endtime == 5 ? 'selected' : '' }}>10:30 AM</option>
                                <option value="6" {{ $sectiontimes[0]->endtime == 6 ? 'selected' : '' }}>11:00 AM</option>
                                <option value="7" {{ $sectiontimes[0]->endtime == 7 ? 'selected' : '' }}>11:30 AM</option>
                                <option value="8" {{ $sectiontimes[0]->endtime == 8 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="9" {{ $sectiontimes[0]->endtime == 9 ? 'selected' : '' }}>12:00 PM</option>
                                <option value="10" {{ $sectiontimes[0]->endtime == 10 ? 'selected' : '' }}>1:00 PM</option>
                                <option value="11" {{ $sectiontimes[0]->endtime == 11 ? 'selected' : '' }}>1:30 PM</option>
                                <option value="12" {{ $sectiontimes[0]->endtime == 12 ? 'selected' : '' }}>2:00 PM</option>
                                <option value="13" {{ $sectiontimes[0]->endtime == 13 ? 'selected' : '' }}>2:30 PM</option>
                                <option value="14" {{ $sectiontimes[0]->endtime == 14 ? 'selected' : '' }}>3:00 PM</option>
                                <option value="15" {{ $sectiontimes[0]->endtime == 15 ? 'selected' : '' }}>3:30 PM</option>
                                <option value="16" {{ $sectiontimes[0]->endtime == 16 ? 'selected' : '' }}>4:00 PM</option>
                                <option value="17" {{ $sectiontimes[0]->endtime == 17 ? 'selected' : '' }}>4:30 PM</option>
                                <option value="18" {{ $sectiontimes[0]->endtime == 18 ? 'selected' : '' }}>5:00 PM</option>
                                <option value="19" {{ $sectiontimes[0]->endtime == 19 ? 'selected' : '' }}>5:30 PM</option>
                                <option value="20" {{ $sectiontimes[0]->endtime == 20 ? 'selected' : '' }}>6:00 PM</option>
                                <option value="21" {{ $sectiontimes[0]->endtime == 21 ? 'selected' : '' }}>6:30 PM</option>
                                <option value="22" {{ $sectiontimes[0]->endtime == 22 ? 'selected' : '' }}>7:00 PM</option>
                                <option value="23" {{ $sectiontimes[0]->endtime == 23 ? 'selected' : '' }}>7:30 PM</option>
                                <option value="24" {{ $sectiontimes[0]->endtime == 24 ? 'selected' : '' }}>8:00 PM</option>
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
                            <input id="room1" class="form-control" type="text" name="room1" placeholder="i.e. 1102/D0203" value="{{ $sectiontimes[0]->room }}">
                            @error('room1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3">
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-check">
                            <input id="oneclass" class="form-check-input" type="checkbox" name="oneclass" value="true" data-toggle="collapse" data-target="#st2collapse" aria-expanded="true" role="button" {{ count($sectiontimes) == 1 ? 'checked' : '' }}>
                            <label for="oneclass" class="form-check-label">Check this if your section has only one lecture per week (Section time 2 will be ignored)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse {{ count($sectiontimes) == 1 ? '' : 'show' }}" id="st2collapse">
                <div class="border-left pl-3">
                    <div class="row mt-4">
                        <div class="col">
                            <h5>Section Time 2</h5>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            Class Type:
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <label class="no-wrap form-check-label">
                                    <input type="radio" class="form-check-input" name="classtype2" value="lab" {{ isset($sectiontimes[1]) && $sectiontimes[1]->classtype == 'lab' ? 'checked' : '' }}>
                                    Lab
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="no-wrap form-check-label">
                                    <input type="radio" class="form-check-input" name="classtype2" value="theory" {{ isset($sectiontimes[1]) && $sectiontimes[1]->classtype == 'theory' ? 'checked' : '' }}>
                                    Theory
                                </label>
                            </div>
                            @error('classtype2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row st1 mt-4">
                        <div class="col">
                            <div class="form-group">
                                <label for="weekday2">Weekday</label>
                                <select id="weekday2" class="form-control" name="weekday2">
                                    <option value="0" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 0 ? 'selected' : '' }}>Sunday</option>
                                    <option value="1" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 1 ? 'selected' : '' }}>Monday</option>
                                    <option value="2" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 2 ? 'selected' : '' }}>Tuesday</option>
                                    <option value="3" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 3 ? 'selected' : '' }}>Wednesday</option>
                                    <option value="4" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 4 ? 'selected' : '' }}>Thursday</option>
                                    <option value="5" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 5 ? 'selected' : '' }}>Friday</option>
                                    <option value="6" {{ isset($sectiontimes[1]) && $sectiontimes[1]->weekday == 6 ? 'selected' : '' }}>Saturday</option>
                                </select>
                                @error('weekday2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="starttime2">Start time</label>
                                @error('starttime2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <select id="starttime2" class="form-control" name="starttime2" value="{{ old('starttime2') }}">
                                    <option value="0" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 0 ? 'selected' : '' }}>8:00 AM</option>
                                    <option value="1" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 1 ? 'selected' : '' }}>8:30 AM</option>
                                    <option value="2" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 2 ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="3" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 3 ? 'selected' : '' }}>9:30 AM</option>
                                    <option value="4" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 4 ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="5" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 5 ? 'selected' : '' }}>10:30 AM</option>
                                    <option value="6" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 6 ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="7" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 7 ? 'selected' : '' }}>11:30 AM</option>
                                    <option value="8" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 8 ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="9" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 9 ? 'selected' : '' }}>12:30 PM</option>
                                    <option value="10" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 10 ? 'selected' : '' }}>1:00 PM</option>
                                    <option value="11" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 11 ? 'selected' : '' }}>1:30 PM</option>
                                    <option value="12" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 12 ? 'selected' : '' }}>2:00 PM</option>
                                    <option value="13" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 13 ? 'selected' : '' }}>2:30 PM</option>
                                    <option value="14" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 14 ? 'selected' : '' }}>3:00 PM</option>
                                    <option value="15" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 15 ? 'selected' : '' }}>3:30 PM</option>
                                    <option value="16" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 16 ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="17" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 17 ? 'selected' : '' }}>4:30 PM</option>
                                    <option value="18" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 18 ? 'selected' : '' }}>5:00 PM</option>
                                    <option value="19" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 19 ? 'selected' : '' }}>5:30 PM</option>
                                    <option value="20" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 20 ? 'selected' : '' }}>6:00 PM</option>
                                    <option value="21" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 21 ? 'selected' : '' }}>6:30 PM</option>
                                    <option value="22" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 22 ? 'selected' : '' }}>7:00 PM</option>
                                    <option value="23" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 23 ? 'selected' : '' }}>7:30 PM</option>
                                    <option value="24" {{ isset($sectiontimes[1]) && $sectiontimes[1]->starttime == 24 ? 'selected' : '' }}>8:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="no-wrap no-wrap" for="endtime2">End time</label>
                                <select id="endtime2" class="form-control" name="endtime2" value="{{ old('endtime2') }}">
                                    <option value="0" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 0 ? 'selected' : '' }}>8:00 AM</option>
                                    <option value="1" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 1 ? 'selected' : '' }}>8:30 AM</option>
                                    <option value="2" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 2 ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="3" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 3 ? 'selected' : '' }}>9:30 AM</option>
                                    <option value="4" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 4 ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="5" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 5 ? 'selected' : '' }}>10:30 AM</option>
                                    <option value="6" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 6 ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="7" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 7 ? 'selected' : '' }}>11:30 AM</option>
                                    <option value="8" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 8 ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="9" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 9 ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="10" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 10 ? 'selected' : '' }}>1:00 PM</option>
                                    <option value="11" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 11 ? 'selected' : '' }}>1:30 PM</option>
                                    <option value="12" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 12 ? 'selected' : '' }}>2:00 PM</option>
                                    <option value="13" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 13 ? 'selected' : '' }}>2:30 PM</option>
                                    <option value="14" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 14 ? 'selected' : '' }}>3:00 PM</option>
                                    <option value="15" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 15 ? 'selected' : '' }}>3:30 PM</option>
                                    <option value="16" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 16 ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="17" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 17 ? 'selected' : '' }}>4:30 PM</option>
                                    <option value="18" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 18 ? 'selected' : '' }}>5:00 PM</option>
                                    <option value="19" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 19 ? 'selected' : '' }}>5:30 PM</option>
                                    <option value="20" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 20 ? 'selected' : '' }}>6:00 PM</option>
                                    <option value="21" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 21 ? 'selected' : '' }}>6:30 PM</option>
                                    <option value="22" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 22 ? 'selected' : '' }}>7:00 PM</option>
                                    <option value="23" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 23 ? 'selected' : '' }}>7:30 PM</option>
                                    <option value="24" {{ isset($sectiontimes[1]) && $sectiontimes[1]->endtime == 24 ? 'selected' : '' }}>8:00 PM</option>
                                </select>
                                @error('endtime2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label class="no-wrap no-wrap" for="room2">Room</label>
                                <input id="room2" class="form-control" type="text" name="room2" placeholder="i.e. 1102/D0203" value="{{ isset($sectiontimes[1]) ? $sectiontimes[1]->room :''}}">
                                @error('room2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3 mt-4">
                <button class="btn btn-seablue" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
