@extends('layouts.faculty_layout')

@section('content')
    <div class="container-fluid main-content py-4 px-5">
        <h1 class="mb-2">Welcome to the Help Section</h1>
        <h5 class="mb-3">What do you need help with?</h5>
        <ul class="list-group dark-list">
            <a class="" data-toggle="collapse" href="#qrcode" role="button" aria-expanded="false" aria-controls="collapseExample">
                <li class="list-group-item first-child">QR Codes</li>
            </a>
            <div class="collapse" id="qrcode">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
            <a class="" data-toggle="collapse" href="#sections" role="button" aria-expanded="false" aria-controls="collapseExample">
                <li class="list-group-item last-child">Sections</li>
            </a>
            <div class="collapse" id="sections">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
            <a class="" data-toggle="collapse" href="#lectures" role="button" aria-expanded="false" aria-controls="collapseExample">
                <li class="list-group-item last-child">Lectures</li>
            </a>
            <div class="collapse" id="lectures">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
        </ul>
    </div>
@endsection
