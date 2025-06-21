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
    @include('layouts.flashMessages')
    <div class="containers">
        @include('layouts.Admin.sidebar')
        <h1>Add New Instructor</h1>
        <form method="POST" action="{{url('admin/instructors/store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Instructor Name</label>
                <input type="text" class="form-control" name="instructorName" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instructor Email</label>
                <input type="text" class="form-control" name="instructorEmail" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instructor Password</label>
                <input type="password" class="form-control" name="instructorPassword" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="active">
                    <label class="form-check-label" for="flexCheckDefault">
                        Active
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')

    @include('layouts.JS')
    @push('table')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    @endpush
@endsection
