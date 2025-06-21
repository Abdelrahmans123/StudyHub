@php
    use Carbon\Carbon;
@endphp
@extends('layouts.master')
@section('title', 'Student Dashboard')
@section('css')
    @include('layouts.CSS')
    <style>
        .containers {
            position: relative;
            height: 100vh;
            left: 269px;
            width: calc(100% - 269px);
            transition: all 0.5s ease;
            padding: 10px;
        }
    </style>
@endsection
@section('content')



    @include('layouts.sidebar')
    @include('layouts.mainSection')
    @include('layouts.recentCourse')
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
                @foreach ($onlineSession as $session)
                    @php
                        $date = Carbon::parse($session->startAt)->format('Y-m-d');
                        $givenDate = Carbon::parse($date);
                    @endphp
                    @if ($givenDate->isToday())
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $session->meetingId }}</td>
                            <td>{{ $session->topic }}</td>
                            <td>{{ $session->startAt }}</td>
                            <td>{{ $session->duration }}</td>
                            <td><a href="{{ $session->startURL }}" target="_blank">Start Meeting</a></td>
                            <td>{{ $session->course->name }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>


    @endsection
    @section('js')

        @include('layouts.JS')
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    @endsection
