@extends('layouts.master')
@section('title')
    Edit {{$question->title}}
@endsection
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
        <form action="{{ route('instructor.question.update', $question->id) }}" method="POST">
        @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$question->id}}">
            <div class="mb-3">
                <label  class="form-label">Question Title</label>
                <input type="text" class="form-control"  name="questionTitle" value="{{$question->title}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Question Answers</label>
                <input type="text" class="form-control"  name="questionAnswer" value="{{$question->answers}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Question Right Answer</label>
                <input type="text" class="form-control"  name="questionRightAnswer" value="{{$question->rightAnswer}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Question Score</label>
                <input type="text" class="form-control"  name="score" value="{{$question->score}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Quiz Name</label>
                <input type="text" class="form-control"  name="quizName" value="{{$question->quizzes->name}}" readonly>
                <input type="hidden" class="form-control"  name="quizId" value="{{$question->id}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    @include('layouts.JS')
@endsection
