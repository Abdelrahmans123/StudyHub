@extends('layouts.master')
@section('title','Add New Session')
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
        <h1>Add New Session</h1>
        <form action="{{route('instructor.onlineSession.store')}}" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Session Topic</label>
                <input type="text" class="form-control"  name="sessionTopic">
            </div>
            <div class="mb-3">
                <label  class="form-label">Start Date</label>
                <input type="datetime-local" class="form-control" name="startDate">
            </div>
            <div class="mb-3">
                <label  class="form-label">Duration</label>
                <input type="text" class="form-control"  name="duration">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Course Name</label>
                <select class="form-select" aria-label="Default select example" name="courseId">
                    <option selected>Choose Course</option>
                    @foreach($course as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    @include('layouts.JS')
@endsection
