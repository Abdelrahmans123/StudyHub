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
        @include('layouts.Instructor.sidebar')
        <h1>Add New Course</h1>
        <form method="POST" action="{{route('instructor.response.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" class="form-control" name="courseName" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Start At</label>
                <input type="datetime-local" class="form-control" name="courseStart" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course End At</label>
                <input type="datetime-local" class="form-control" name="courseEnd" id="exampleInputPassword1">
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
