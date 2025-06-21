@extends('layouts.master')
@section('title','Add New Question')
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
        <form action="{{route('instructor.question.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Question Title</label>
                <input type="text" class="form-control"  name="questionTitle">
            </div>
            <div class="mb-3">
                <label  class="form-label">Question Answers<span style="color: red; font-size: smaller">Please separate answers with -</span></label>
                <input type="text" class="form-control"  name="questionAnswer">
            </div>
            <div class="mb-3">
                <label  class="form-label">Question Right Answer</label>
                <input type="text" class="form-control"  name="questionRightAnswer">
            </div>
            <div class="mb-3">
                <label  class="form-label">Question Score</label>
                <input type="text" class="form-control"  name="score">
            </div>
            <div class="mb-3">
                <label  class="form-label">Quiz Name</label>
                <input type="text" class="form-control"  name="quizName" value="{{$quiz->name}}" readonly>
                <input type="hidden" class="form-control"  name="quizId" value="{{$quiz->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    @include('layouts.JS')
@endsection
