@extends('layouts.master')
@section('title','Online Session')
@section('css')
    @include('layouts.CSS')
@push('stylesheet')
    <style>

    table{
        margin-top: 20px;
    }

    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@endpush
@endsection
@section('content')
    @include('layouts.sidebar')
        <div class="mt-5">
        <table id="example" class="display" style="width:100%; margin-top: 20px">
            <thead>
            <tr>
                <th>#</th>
                <th>Session Id</th>
                <th>Session Topic</th>
                <th>Start At</th>
                <th>Session Duration</th>
                <th>Join Session</th>
            </tr>
            </thead>
            <tbody>
        @foreach($onlineSession as $session)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$session->meetingId}}</td>
            <td>{{$session->topic}}</td>
            <td>{{$session->startAt}}</td>
            <td>{{$session->duration}}</td>
            <td><a href="{{$session->joinURL}}" target="_blank">Join Meeting</a></td>
        </tr>
        @endforeach
            </tbody>

        </table>
        </div>
@endsection
@section('js')

    @include('layouts.JS')
    @push('table')
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    @endpush
@endsection
