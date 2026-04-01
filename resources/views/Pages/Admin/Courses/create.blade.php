@extends('layouts.master')
@section('title','Add Course')
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
        <div class="mt-4">
            <h1 class="mb-4">Add New Course</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{url('admin/courses/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Course Name</label>
                <input type="text" class="form-control @error('courseName') is-invalid @enderror" name="courseName" id="exampleInputEmail1" value="{{ old('courseName') }}">
                @error('courseName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="exampleInputPassword1" value="{{ old('description') }}">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Start At</label>
                <input type="datetime-local" class="form-control @error('courseStart') is-invalid @enderror" name="courseStart" id="exampleInputPassword1" value="{{ old('courseStart') }}">
                @error('courseStart')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course End At</label>
                <input type="datetime-local" class="form-control @error('courseEnd') is-invalid @enderror" name="courseEnd" id="exampleInputPassword1" value="{{ old('courseEnd') }}">
                @error('courseEnd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Course Image / File</label>
                <input class="form-control @error('file_name') is-invalid @enderror" type="file" id="formFile" name="file_name">
                @error('file_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instructor Name</label>
                <select class="form-select @error('instructorId') is-invalid @enderror" aria-label="Default select example" name="instructorId">
                    <option value="" disabled @if(old('instructorId') === null) selected @endif>Choose Instructor</option>
                    @foreach($instructors as $instructor)
                        <option value="{{$instructor->id}}" @if(old('instructorId') == $instructor->id) selected @endif>{{$instructor->name}}</option>
                    @endforeach
                </select>
                @error('instructorId')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
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
