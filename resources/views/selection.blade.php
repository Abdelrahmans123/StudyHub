
@extends('layouts.master')

@section('title','User Type')
@section('css')
    @include('layouts.CSS')
@endsection



@section('content')
    @include('layouts.nav')

    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
                 style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">Who you are</h3>
                            <div class="form-inline">
                                @php
                                    $student='student';
                                    $instructor='instructor';
                                    $admin='admin';
                                @endphp
                                @if($type=== 'login')
                                    <a class="btn btn-default col-lg-4 " title="Student" href="{{route('login.show',$student)}}">
                                        <img alt="user-img" width="100px;" class="imgs" src="{{URL::asset('assets/images/student.png')}}">
                                    </a>
                                    <a class="btn btn-default col-lg-4" title="Instructor" href="{{route('login.show',$instructor)}}">
                                        <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                    </a>

                                    <a class="btn btn-default col-lg-4" title="Admin" href="{{route('login.show',$admin)}}">
                                        <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                    </a>
                                @endif
                                @if($type=== 'register')
                                    <a class="btn btn-default col-lg-4 " title="Student" href="{{route('register.show',$student)}}">
                                        <img alt="user-img" width="100px;" class="imgs" src="{{URL::asset('assets/images/student.png')}}">
                                    </a>
                                    <a class="btn btn-default col-lg-4" title="Instructor" href="{{route('register.show',$instructor)}}">
                                        <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                    </a>
                                @endif
                            </div>
                            <div class="form-inline">
                                <p>Student</p>
                                <p>Instructor</p>
                                @if($type=== 'login')
                                    <p>Admin</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
    login-->

    </div>



    <!-- toastr -->
    @yield('js')
    <!-- custom -->
@endsection


