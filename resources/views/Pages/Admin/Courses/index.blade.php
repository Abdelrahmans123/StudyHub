@extends('layouts.master')
@section('title','Courses List')
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



            .button-18 {
                margin-top: 20px;
                align-items: center;
                height: fit-content;
                background-color: #0A66C2;
                border: 0;
                border-radius: 100px;
                box-sizing: border-box;
                color: #ffffff;
                cursor: pointer;
                display: inline-flex;
                font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
                font-size: 16px;
                font-weight: 600;
                justify-content: center;
                line-height: 20px;
                max-width: 480px;
                min-height: 40px;
                min-width: 0;
                overflow: hidden;
                padding: 0 20px;
                text-align: center;
                touch-action: manipulation;
                transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
                user-select: none;
                -webkit-user-select: none;
                vertical-align: middle;
            }

            .button-18:hover,
            .button-18:focus {
                background-color: #16437E;
                color: #ffffff;
            }

            .button-18:active {
                background: #09223b;
                color: rgb(255, 255, 255, .7);
            }

            .button-18:disabled {
                cursor: not-allowed;
                background: rgba(0, 0, 0, .08);
                color: rgba(0, 0, 0, .3);
            }
        </style>

    @endpush
@endsection
@section('content')
    <div class="containers">
        @include('layouts.Admin.sidebar')
        <!-- HTML !-->
        <a href="{{url('admin/courses/create')}}" class="button-18" role="button">Add Course</a>
        <div class="mt-5">
            <table id="example1" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Description</th>
                    <th>Course Start Date</th>
                    <th>Course End Date</th>
                    <th>Instructor Name</th>
                    <th>Courses Image</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>

                @foreach($courses as $course)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->description}}</td>
                        <td>{{$course->startAt}}</td>
                        <td>{{$course->endAt}}</td>
                        <td>{{$course->instructor->name}}</td>
                        <td><img src="{{asset('assets/images/'.$course->img)}}" style="width: 100px; height: 100px; border-radius: 50%"></td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="btn btn-primary w-100" href="{{url('admin/courses/edit/'.$course->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></li>
                                    <li><a type="button" class="btn btn-danger btn-sm w-100" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $course->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a></li>
                                </ul>
                            </div>



                        </td>
                    </tr>
                    @include('Pages.Admin.Courses.deleteModal')
                @endforeach
                </tbody>

            </table>
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
        </script>
    @endpush
@endsection
