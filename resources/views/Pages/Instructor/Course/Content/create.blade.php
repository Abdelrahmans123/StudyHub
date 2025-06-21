@extends('layouts.master')
@section('title','Add New Content')
@section('css')
    @include('layouts.CSS')
    @push('stylesheet')
        <style>
            .containers{
                grid-template-columns: 14rem auto !important;
            }
            form{
                margin-top: 20px;
                width: 100%;
            }
            .containers{
                display: block;
            }
        </style>
    @endpush
@endsection
@section('content')
    <div class="containers">
        @include('layouts.Instructor.sidebar')
        <h1>Add New Content</h1>
        <form action="{{route('instructor.content.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Content Title</label>
                <input type="text" class="form-control"  name="contentTitle">
            </div>
            <div class="mb-3">
                <label  class="form-label">Content Type</label>
                <input type="text" class="form-control"  name="contentType">
            </div>
            <div class="mb-3">
                <label  class="form-label">Content</label>
                <input type="text" class="form-control"  name="courseContent">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Content File</label>
                <input class="form-control" type="file" id="formFile" name="file_name">
            </div>
            <div class="mb-3">
                <label  class="form-label">Course Name</label>
                <input type="hidden" name="id" value="{{$courses->id}}">
                <input class="form-control" type="text" value="{{$courses->name}}" aria-label="Disabled input example" disabled readonly>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    @include('layouts.JS')
@endsection
