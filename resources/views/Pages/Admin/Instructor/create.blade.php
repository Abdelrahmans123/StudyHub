@extends('layouts.master')
@section('title','Add Instructor')
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
        <div class="mt-4">
            <h1 class="mb-4">Add New Instructor</h1>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{url('admin/instructors/store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Instructor Name</label>
                            <input type="text" class="form-control" name="instructorName" id="exampleInputEmail1" placeholder="Enter Instructor Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Instructor Email</label>
                            <input type="email" class="form-control" name="instructorEmail" id="exampleInputPassword1" placeholder="Enter Instructor Email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Instructor Password</label>
                            <input type="password" class="form-control" name="instructorPassword" id="exampleInputPassword2" placeholder="Enter Instructor Password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="active" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

    @include('layouts.JS')
    @push('table')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    @endpush
@endsection
