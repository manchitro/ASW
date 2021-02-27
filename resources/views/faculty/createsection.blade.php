@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="/faculty/section/create" method="post" class="section-form w-100">
            @csrf
            <div class="border-left pl-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="sectionname" class="h3">Section Name</label>
                            <input type="text" name="sectionname" id="sectionname" class="form-control" placeholder="i.e. Programming Language 1 [A]" value="{{ old('sectionname') }}">
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
                                <input type="radio" class="form-check-input" name="classtype1" value="lab" {{ old('classtype1') == 'lab' ? 'checked' : '' }}>
                                Lab
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype1" value="theory" {{ old('classtype1') == 'theory' ? 'checked' : '' }}>
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
                                <option value="0" {{ old('weekday1') == 0 ? 'selected' : '' }}>Sunday</option>
                                <option value="1" {{ old('weekday1') == 1 ? 'selected' : '' }}>Monday</option>
                                <option value="2" {{ old('weekday1') == 2 ? 'selected' : '' }}>Tuesday</option>
                                <option value="3" {{ old('weekday1') == 3 ? 'selected' : '' }}>Wednesday</option>
                                <option value="4" {{ old('weekday1') == 4 ? 'selected' : '' }}>Thursday</option>
                                <option value="5" {{ old('weekday1') == 5 ? 'selected' : '' }}>Friday</option>
                                <option value="6" {{ old('weekday1') == 6 ? 'selected' : '' }}>Saturday</option>
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
                            <label class="no-wrap no-wrap" for="endtime1">End time</label>
                            <select id="endtime1" class="form-control" name="endtime1" value="{{ old('endtime1') }}">
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
                            <input id="room1" class="form-control" type="text" name="room1" placeholder="i.e. 1102/D0203" value="{{ old('room1') }}">
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
                            <input id="oneclass" class="form-check-input" type="checkbox" name="oneclass" value="true" data-toggle="collapse" data-target="#st2collapse" aria-expanded="true" role="button" {{ old('oneclass') == 'true' ? 'checked' : '' }}>
                            <label for="oneclass" class="form-check-label">Check this if your section has only one lecture per week (Section time 2 will be ignored)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse {{ old('oneclass') == 'true' ? '' : 'show' }}" id="st2collapse">
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
                                    <input type="radio" class="form-check-input" name="classtype2" value="lab" {{ old('classtype2') == 'lab' ? 'checked' : '' }}>
                                    Lab
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="no-wrap form-check-label">
                                    <input type="radio" class="form-check-input" name="classtype2" value="theory" {{ old('classtype2') == 'theory' ? 'checked' : '' }}>
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
                                    <option value="0" {{ old('weekday2') == 0 ? 'selected' : '' }}>Sunday</option>
                                    <option value="1" {{ old('weekday2') == 1 ? 'selected' : '' }}>Monday</option>
                                    <option value="2" {{ old('weekday2') == 2 ? 'selected' : '' }}>Tuesday</option>
                                    <option value="3" {{ old('weekday2') == 3 ? 'selected' : '' }}>Wednesday</option>
                                    <option value="4" {{ old('weekday2') == 4 ? 'selected' : '' }}>Thursday</option>
                                    <option value="5" {{ old('weekday2') == 5 ? 'selected' : '' }}>Friday</option>
                                    <option value="6" {{ old('weekday2') == 6 ? 'selected' : '' }}>Saturday</option>
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
                                    <option value="0" {{ old('starttime2') == 0 ? 'selected' : '' }}>8:00 AM</option>
                                    <option value="1" {{ old('starttime2') == 1 ? 'selected' : '' }}>8:30 AM</option>
                                    <option value="2" {{ old('starttime2') == 2 ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="3" {{ old('starttime2') == 3 ? 'selected' : '' }}>9:30 AM</option>
                                    <option value="4" {{ old('starttime2') == 4 ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="5" {{ old('starttime2') == 5 ? 'selected' : '' }}>10:30 AM</option>
                                    <option value="6" {{ old('starttime2') == 6 ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="7" {{ old('starttime2') == 7 ? 'selected' : '' }}>11:30 AM</option>
                                    <option value="8" {{ old('starttime2') == 8 ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="9" {{ old('starttime2') == 9 ? 'selected' : '' }}>12:30 PM</option>
                                    <option value="10" {{ old('starttime2') == 10 ? 'selected' : '' }}>1:00 PM</option>
                                    <option value="11" {{ old('starttime2') == 11 ? 'selected' : '' }}>1:30 PM</option>
                                    <option value="12" {{ old('starttime2') == 12 ? 'selected' : '' }}>2:00 PM</option>
                                    <option value="13" {{ old('starttime2') == 13 ? 'selected' : '' }}>2:30 PM</option>
                                    <option value="14" {{ old('starttime2') == 14 ? 'selected' : '' }}>3:00 PM</option>
                                    <option value="15" {{ old('starttime2') == 15 ? 'selected' : '' }}>3:30 PM</option>
                                    <option value="16" {{ old('starttime2') == 16 ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="17" {{ old('starttime2') == 17 ? 'selected' : '' }}>4:30 PM</option>
                                    <option value="18" {{ old('starttime2') == 18 ? 'selected' : '' }}>5:00 PM</option>
                                    <option value="19" {{ old('starttime2') == 19 ? 'selected' : '' }}>5:30 PM</option>
                                    <option value="20" {{ old('starttime2') == 20 ? 'selected' : '' }}>6:00 PM</option>
                                    <option value="21" {{ old('starttime2') == 21 ? 'selected' : '' }}>6:30 PM</option>
                                    <option value="22" {{ old('starttime2') == 22 ? 'selected' : '' }}>7:00 PM</option>
                                    <option value="23" {{ old('starttime2') == 23 ? 'selected' : '' }}>7:30 PM</option>
                                    <option value="24" {{ old('starttime2') == 24 ? 'selected' : '' }}>8:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="no-wrap no-wrap" for="endtime2">End time</label>
                                <select id="endtime2" class="form-control" name="endtime2" value="{{ old('endtime2') }}">
                                    <option value="0" {{ old('endtime2') == 0 ? 'selected' : '' }}>8:00 AM</option>
                                    <option value="1" {{ old('endtime2') == 1 ? 'selected' : '' }}>8:30 AM</option>
                                    <option value="2" {{ old('endtime2') == 2 ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="3" {{ old('endtime2') == 3 ? 'selected' : '' }}>9:30 AM</option>
                                    <option value="4" {{ old('endtime2') == 4 ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="5" {{ old('endtime2') == 5 ? 'selected' : '' }}>10:30 AM</option>
                                    <option value="6" {{ old('endtime2') == 6 ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="7" {{ old('endtime2') == 7 ? 'selected' : '' }}>11:30 AM</option>
                                    <option value="8" {{ old('endtime2') == 8 ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="9" {{ old('endtime2') == 9 ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="10" {{ old('endtime2') == 10 ? 'selected' : '' }}>1:00 PM</option>
                                    <option value="11" {{ old('endtime2') == 11 ? 'selected' : '' }}>1:30 PM</option>
                                    <option value="12" {{ old('endtime2') == 12 ? 'selected' : '' }}>2:00 PM</option>
                                    <option value="13" {{ old('endtime2') == 13 ? 'selected' : '' }}>2:30 PM</option>
                                    <option value="14" {{ old('endtime2') == 14 ? 'selected' : '' }}>3:00 PM</option>
                                    <option value="15" {{ old('endtime2') == 15 ? 'selected' : '' }}>3:30 PM</option>
                                    <option value="16" {{ old('endtime2') == 16 ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="17" {{ old('endtime2') == 17 ? 'selected' : '' }}>4:30 PM</option>
                                    <option value="18" {{ old('endtime2') == 18 ? 'selected' : '' }}>5:00 PM</option>
                                    <option value="19" {{ old('endtime2') == 19 ? 'selected' : '' }}>5:30 PM</option>
                                    <option value="20" {{ old('endtime2') == 20 ? 'selected' : '' }}>6:00 PM</option>
                                    <option value="21" {{ old('endtime2') == 21 ? 'selected' : '' }}>6:30 PM</option>
                                    <option value="22" {{ old('endtime2') == 22 ? 'selected' : '' }}>7:00 PM</option>
                                    <option value="23" {{ old('endtime2') == 23 ? 'selected' : '' }}>7:30 PM</option>
                                    <option value="24" {{ old('endtime2') == 24 ? 'selected' : '' }}>8:00 PM</option>
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
                                <input id="room2" class="form-control" type="text" name="room2" placeholder="i.e. 1102/D0203" value="{{ old('room2') }}">
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
