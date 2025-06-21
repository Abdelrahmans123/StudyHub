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
        <h1>Edit {{$instructor->name}} Instructor</h1>
        <form method="POST" action="{{url('admin/instructors/update')}}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$instructor->id}}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Instructor Name</label>
                <input type="text" class="form-control" name="instructorName" id="exampleInputEmail1" value="{{$instructor->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instructor Email</label>
                <input type="text" class="form-control" name="instructorEmail" id="exampleInputPassword1" value="{{$instructor->email}}">
            </div>
            <div class="mb-3">
                @if($instructor->active)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="active" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Active
                    </label>
                </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="active">
                        <label class="form-check-label" for="flexCheckDefault">
                            Active
                        </label>
                    </div>
                @endif
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
