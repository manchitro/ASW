@extends('layouts.faculty_layout')

@section('content')
    @component('components.right-menu')
        @slot('sectioneid')
            {{ $section->eid }}
        @endslot
        @slot('currentpage')
            {{ 'addstudent' }}
        @endslot
        @slot('rightmenustate')
            {{ $user->rightmenustate }}
        @endslot
    @endcomponent
    <div class="container-fluid main-content py-4 d-flex flex-wrap ">
        <form action="" method="post" class="section-form w-75" enctype="multipart/form-data">
            @csrf
            <div class="border-left pl-3 mt-4 mb-4">
                <h3>Importing excel sheet</h3>
            </div>
            <div class="border-left pl-3 mt-4 mb-4">
                <p>The excel sheet you you'll provide must fulfill the following requirements:</p>
                <ol>
                    <li>
                        <p>Sheet should have at least 2 columns. A Student ID column and a Name column</p>
                    </li>
                    <li>
                        <p>Student ID should be the leftmost column and the name column should follow immediately</p>
                    </li>
                    <li>
                        <p>The first row will be treated as a header row and it will be assumed that header does not contain any student information. Therefore, information processing will start from the second row.</p>
                    </li>
                    <li>
                        <p>Any other column after these will be ignored.</p>
                    </li>
                    <li>
                        <p>The header of the column does no matter. The first column will always be treated as the Student ID column and the 2nd column will be treated as the Name column</p>
                    </li>
                </ol>
                <a href="{{ asset('files/exampleSheet.xlsx') }}" class="color-seablue">Download an example sheet</a>
            </div>
            <div class="border-left pl-3 mt-4 mb-4">
                <div class="input-group mb-3">
                    <input type="file" class="custom-file-input" id="sheet" name="sheet">
                    <label class="custom-file-label" for="customFile">Click to browse excel file</label>
                    @error('sheet')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="border-left pl-3 mt-4 mb-4">
                <button class="btn btn-seablue" type="submit">Upload</button>
            </div>
            <script>
                window.addEventListener('load', function() {
                    $(".custom-file-input").on("change", function() {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    });
                })

            </script>
        </form>
    </div>
@endsection
