@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">About</h1>
        <h3 class="subtitle">Purpose of <strong>Attendance Scanning Wizard</strong></h3>
        <p class="desc">ASW is another step towards classroom automation. Where traditional roll-calling takes 5-10 minutes
            to finish, ASW focuses on trimming it down to 5-10 seconds. Although ASW automates the process, it doesn't
            completely remove the manual entries. Faculty can still manually edit attenadances.</p>
        <h3 class="subtitle" id="process">How It Works</h3>
        <p>ASW was designed to be used by the Faculties and Students of American International University-Bangladesh. It
            works in the following way:</p>
        <p>
            <strong>Step 1:</strong> Faculty logs in to the website on his/her laptop in the classroom.<br><br>
            <strong>Step 2:</strong> After login, faculty will be able to manage(create, update, delete) his/her sections,
            students, classes etc.<br><br>
            <strong>Step 3:</strong> For each lecture, a QR code will be generated and available to be
            displayed on that class day. This should be shown using the projector during class time. It will be available
            for the whole duration of the class. Faculty should project it only when the class is ready to
            scan.<br><br>
            <strong>Step 4:</strong> Students login with VUES credentials on the website or their smartphone
            app and scan the QR code<br><br>
            <strong>Step 5:</strong> Students' app will then automatically submit the
            attendance for that lecture to the ASW server when online. The data will then be updated on the server and in
            turn, on faculty's account.
        </p>
    </div>
@endsection
