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
        <h1>Update Course</h1>
        <form method="POST" action="{{url('admin/courses/update')}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$course->id}}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" class="form-control" name="courseName" id="exampleInputEmail1" value="{{$course->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{$course->description}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Start At</label>
                <input type="datetime-local" class="form-control" name="courseStart" id="exampleInputPassword1" value="{{$course->startAt}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course End At</label>
                <input type="datetime-local" class="form-control" name="courseEnd" id="exampleInputPassword1" value="{{$course->endAt}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instructor Name</label>
                <select class="form-select" aria-label="Default select example" name="instructorId">
                    <option selected>Choose Instructor</option>
                    @foreach($instructors as $instructor)
                        <option value="{{$instructor->id}}" {{$instructor->id==$course->instructor_id?"selected":" "}}>{{$instructor->name}}</option>
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

    @endpush
@endsection
