@extends('layouts.master')
@section('title','Admin Dashboard')
@section('css')
    @include('layouts.CSS')
@endsection
@section('content')
    <div class="containers ">
        @include('layouts.Admin.sidebar')
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Student</h5>
                        <p class="card-text">{{$studentCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Instructors</h5>
                        <p class="card-text">{{$instructorCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">{{$courseCount}}</p>
                    </div>
                </div>
            </div>
        </div>
        <h1>The Last Updates</h1>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Student</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Instructors</button>
            </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <table id="example1" class="display" style="width:100%; margin-top: 20px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Student::latest()->take(5)->get() as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <table id="example" class="display" style="width:100%; margin-top: 20px">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Instructor::latest()->take(5)->get() as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            </div>
                    </div>

@endsection
@section('js')
    @include('layouts.JS')
    @push('table')
        <script>
            $(document).ready(function () {
                $('#example1').DataTable();
            });
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    @endpush
@endsection
