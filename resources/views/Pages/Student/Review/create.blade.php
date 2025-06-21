@extends('layouts.master')
@section('title','Add New Fee')
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
        @include('layouts.sidebar')
        <h1>Add New Review</h1>
        <form action="{{route('student.review.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$course->id}}">
            <div class="mb-3">
                <label  class="form-label">Course Name</label>
                <input type="text" class="form-control"  name="courseName" value="{{$course->name}}" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Review</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="review" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    @include('layouts.JS')
@endsection
