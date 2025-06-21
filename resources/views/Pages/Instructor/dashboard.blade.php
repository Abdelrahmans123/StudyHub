@php
    use Carbon\Carbon;
@endphp
@extends('layouts.master')
@section('title','Instructor Dashboard')
@section('css')
    @include('layouts.CSS')
@endsection
@section('content')
    <div class="containers ">
        <div class="menuBar">
            <button id="menu-btn">
                <i class="fa-solid fa-bars menuIcon"></i>
            </button>
        </div>


        <div class="d-flex justify-content-between">
            <div class="theme-toggle">
                <i class="fa-solid fa-sun theme-toggle--icon active"></i>
                <i class="fa-solid fa-moon theme-toggle--icon"></i>
            </div>
            <div class="profile">
                <div class="info">
                    <p>Hey,<b>{{auth()->user()->name}}</b></p>
                    <small class="text-muted">Instructor</small>
                </div>
            </div>
        </div>
        @include('layouts.Instructor.sidebar')
        <h1>Instructor Dashboard</h1>
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Student Who enrolled course</h5>
                        <p class="card-text">{{$studentCount}}</p>
                        <a href="{{route('instructor.student.index')}}" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courses enrolled</h5>
                        <p class="card-text">{{$courseCount}}</p>
                        <a href="{{route('instructor.attendance.index')}}" class="btn btn-primary">Show</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <h2>Today Sessions</h2>
            <table id="example" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Session Id</th>
                    <th>Session Topic</th>
                    <th>Start At</th>
                    <th>Session Duration</th>
                    <th>Start Session</th>
                    <th>Course Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($onlineSession as $session)
                    @php
                        $date = Carbon::parse($session->startAt)->format('Y-m-d');
                        $givenDate = Carbon::parse($date);
                    @endphp
                    @if ($givenDate->isToday())
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$session->meetingId}}</td>
                            <td>{{$session->topic}}</td>
                            <td>{{$session->startAt}}</td>
                            <td>{{$session->duration}}</td>
                            <td><a href="{{$session->startURL}}" target="_blank">Start Meeting</a></td>
                            <td>{{$session->course->name}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection
@section('js')
    @include('layouts.JS')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
