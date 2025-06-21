@extends('layouts.master')
@section('title','Response')
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
    <div class="containers">
        @include('layouts.Instructor.sidebar')

        <div class="mt-5">
            <table id="example1" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Description</th>
                    <th>Course Start Date</th>
                    <th>Course End Date</th>
                    <th>Instructor Name</th>
                </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>{{$courses->name}}</td>
                        <td>{{$courses->description}}</td>
                        <td>{{$courses->startAt}}</td>
                        <td>{{$courses->endAt}}</td>
                        <td>{{$courses->instructor->name}}</td>
                    </tr>
                </tbody>

            </table>
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
