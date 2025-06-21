@extends('layouts.master')
@section('title','Profile')
@section('css')
    @include('layouts.CSS')
@endsection
@section('content')
        @include('layouts.sidebar')
<div class="card-body">

    <section style="background-color: #eee;">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{URL::asset('assets/images/'.$student->img)}}"
                             alt="avatar"
                             class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                        <h5 style="font-family: Cairo" class="my-3">{{$student->name}}</h5>
                        <p class="text-muted mb-1">{{$student->email}}</p>
                        <p class="text-muted mb-4">Student</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('student.profile.update',$student->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Student Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="text" name="name"
                                               value="{{ $student->name}}"
                                               class="form-control">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Password</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </p><br><br>
                                    <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                           id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Show</label>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- row closed -->
@endsection
@section('js')
    @include('layouts.JS')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
