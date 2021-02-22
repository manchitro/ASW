@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="" class="section-form w-100">
            @csrf
            <div class="border-left pl-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="sectionname" class="h3">Section Name</label>
                            <input type="text" name="sectionname" id="sectionname" class="form-control" placeholder="i.e. Programming Language 1 [A]">
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
                <div class="row st1 mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="weekday1">Weekday</label>
                            <select id="weekday1" class="form-control" name="weekday1">
                                <option value="0">Sunday</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="starttime1">Start time</label>
                            <select id="starttime1" class="form-control" name="starttime1">
                                <option value="0">8:00 AM</option>
                                <option value="1">8:30 AM</option>
                                <option value="2">9:00 AM</option>
                                <option value="3">9:30 AM</option>
                                <option value="4">10:00 AM</option>
                                <option value="5">10:30 AM</option>
                                <option value="6">11:00 AM</option>
                                <option value="7">11:30 AM</option>
                                <option value="8">12:00 PM</option>
                                <option value="9">12:00 PM</option>
                                <option value="10">1:00 PM</option>
                                <option value="11">1:30 PM</option>
                                <option value="12">2:00 PM</option>
                                <option value="13">2:30 PM</option>
                                <option value="14">3:00 PM</option>
                                <option value="15">3:30 PM</option>
                                <option value="16">4:00 PM</option>
                                <option value="17">4:30 PM</option>
                                <option value="18">5:00 PM</option>
                                <option value="19">5:30 PM</option>
                                <option value="20">6:00 PM</option>
                                <option value="21">6:30 PM</option>
                                <option value="22">7:00 PM</option>
                                <option value="23">7:30 PM</option>
                                <option value="24">8:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="endtime1">End time</label>
                            <select id="endtime1" class="form-control" name="endtime1">
                                <option value="0">8:00 AM</option>
                                <option value="1">8:30 AM</option>
                                <option value="2">9:00 AM</option>
                                <option value="3">9:30 AM</option>
                                <option value="4">10:00 AM</option>
                                <option value="5">10:30 AM</option>
                                <option value="6">11:00 AM</option>
                                <option value="7">11:30 AM</option>
                                <option value="8">12:00 PM</option>
                                <option value="9">12:00 PM</option>
                                <option value="10">1:00 PM</option>
                                <option value="11">1:30 PM</option>
                                <option value="12">2:00 PM</option>
                                <option value="13">2:30 PM</option>
                                <option value="14">3:00 PM</option>
                                <option value="15">3:30 PM</option>
                                <option value="16">4:00 PM</option>
                                <option value="17">4:30 PM</option>
                                <option value="18">5:00 PM</option>
                                <option value="19">5:30 PM</option>
                                <option value="20">6:00 PM</option>
                                <option value="21">6:30 PM</option>
                                <option value="22">7:00 PM</option>
                                <option value="23">7:30 PM</option>
                                <option value="24">8:00 PM</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Class Type:
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype1" id="" value="lab" checked>
                                Lab
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype1" id="" value="theory">
                                Theory
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="room1">Room</label>
                            <input id="room1" class="form-control" type="text" name="room1" placeholder="i.e. 1102/D0203">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left pl-3">
                <div class="row mt-4">
                    <div class="col">
                        <h5>Section Time 2</h5>
                    </div>
                </div>
                <div class="row st1 mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="weekday2">Weekday</label>
                            <select id="weekday2" class="form-control" name="weekday2">
                                <option value="0">Sunday</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="starttime2">Start time</label>
                            <select id="starttime2" class="form-control" name="starttime2">
                                <option value="0">8:00 AM</option>
                                <option value="1">8:30 AM</option>
                                <option value="2">9:00 AM</option>
                                <option value="3">9:30 AM</option>
                                <option value="4">10:00 AM</option>
                                <option value="5">10:30 AM</option>
                                <option value="6">11:00 AM</option>
                                <option value="7">11:30 AM</option>
                                <option value="8">12:00 PM</option>
                                <option value="9">12:00 PM</option>
                                <option value="10">1:00 PM</option>
                                <option value="11">1:30 PM</option>
                                <option value="12">2:00 PM</option>
                                <option value="13">2:30 PM</option>
                                <option value="14">3:00 PM</option>
                                <option value="15">3:30 PM</option>
                                <option value="16">4:00 PM</option>
                                <option value="17">4:30 PM</option>
                                <option value="18">5:00 PM</option>
                                <option value="19">5:30 PM</option>
                                <option value="20">6:00 PM</option>
                                <option value="21">6:30 PM</option>
                                <option value="22">7:00 PM</option>
                                <option value="23">7:30 PM</option>
                                <option value="24">8:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="no-wrap no-wrap" for="endtime2">End time</label>
                            <select id="endtime2" class="form-control" name="endtime2">
                                <option value="0">8:00 AM</option>
                                <option value="1">8:30 AM</option>
                                <option value="2">9:00 AM</option>
                                <option value="3">9:30 AM</option>
                                <option value="4">10:00 AM</option>
                                <option value="5">10:30 AM</option>
                                <option value="6">11:00 AM</option>
                                <option value="7">11:30 AM</option>
                                <option value="8">12:00 PM</option>
                                <option value="9">12:00 PM</option>
                                <option value="10">1:00 PM</option>
                                <option value="11">1:30 PM</option>
                                <option value="12">2:00 PM</option>
                                <option value="13">2:30 PM</option>
                                <option value="14">3:00 PM</option>
                                <option value="15">3:30 PM</option>
                                <option value="16">4:00 PM</option>
                                <option value="17">4:30 PM</option>
                                <option value="18">5:00 PM</option>
                                <option value="19">5:30 PM</option>
                                <option value="20">6:00 PM</option>
                                <option value="21">6:30 PM</option>
                                <option value="22">7:00 PM</option>
                                <option value="23">7:30 PM</option>
                                <option value="24">8:00 PM</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Class Type:
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype2" id="" value="lab" checked>
                                Lab
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="no-wrap form-check-label">
                                <input type="radio" class="form-check-input" name="classtype2" id="" value="theory">
                                Theory
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="room2">Room</label>
                            <input id="room2" class="form-control" type="text" name="room2" placeholder="i.e. 1102/D0203">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
