@extends('layouts.master')
@section('title','Add New Quiz')
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
        <h1>Add New Quiz</h1>
        <form action="{{route('instructor.quiz.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Quiz Topic</label>
                <input type="text" class="form-control"  name="quizTopic">
            </div>
            <div class="mb-3">
                <label  class="form-label">Course Name</label>
                <select class="form-select" aria-label="Default select example" name="courseId">
                    <option selected>Open this select menu</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
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
