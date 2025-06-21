@extends('layouts.master')
@section('title','Response')
@section('css')
    @include('layouts.CSS')
    @push('stylesheet')
        <style>
            .containers{
                display: block;
            }
            table{
                margin-top: 20px;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    @endpush
@endsection
@section('content')
    @include('layouts.flashMessages')
    <div class="containers">
        @include('layouts.Admin.sidebar')
        <h1>Add New Course</h1>
        <form method="POST" action="{{route('admin.addCourse')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$course->id}}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" class="form-control" name="courseName" id="exampleInputEmail1" value="{{$course->courseName}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{$course->courseDescription}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Start At</label>
                <input type="datetime-local" class="form-control" name="courseStart" id="exampleInputPassword1" value="{{$course->courseStart}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course End At</label>
                <input type="datetime-local" class="form-control" name="courseEnd" id="exampleInputPassword1" value="{{$course->courseEnd}}">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" name="file_name">
                <div id="previewImage">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instructor Name</label>
                <select class="form-select" aria-label="Default select example" name="instructorId">
                    <option selected>Choose Instructor</option>
                    @foreach($instructors as $instructor)
                        <option value="{{$instructor->id}}" {{$instructor->id==$course->instructorId?"selected":" "}}>{{$instructor->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')

    @include('layouts.JS')
    @push('table')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example1').DataTable();
            });
        </script>
        @toastr_js
        @toastr_render
        <script>
            const imageInput = document.getElementById('formFile');


            imageInput.addEventListener('change', function() {
                const file = imageInput.files[0];

                if (file) {
                    const reader = new FileReader();
                    const img = document.createElement('img');
                    reader.addEventListener('load', function() {
                        const previewImage = document.getElementById('previewImage');
                        img.src = reader.result;
                        img.style.width="200px";
                        img.style.height="200px";
                        console.log(previewImage);
                        previewImage.appendChild(img);
                    });

                    reader.readAsDataURL(file);
                }
            });
        </script>
    @endpush
@endsection
