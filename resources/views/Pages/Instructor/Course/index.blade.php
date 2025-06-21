@extends('layouts.master')
@section('title','Course')
@section('css')
    @include('layouts.CSS')
    @push('stylesheet')
        <style>

            table {
                margin-top: 20px;
            }
            /* Attend radio button style */
            .attend:checked {
                background-color: green;
                border-color: green;
            }

            .attend:hover {
                background-color: green;
                border-color: green;
            }

            .attend:focus {
                outline: none;
                box-shadow: 0 0 0 0.25rem green;
            }

            /* Absent radio button style */
            .absent:checked {
                background-color: red;
                border-color: red;
            }

            .absent:hover {
                background-color: red;
                border-color: red;
            }

            .absent:focus {
                outline: none;
                box-shadow: 0 0 0 0.25rem red;
            }


        </style>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
    @endpush
@endsection
@section('content')

    @include('layouts.Instructor.sidebar')
    <div class="containers">

        <div class="mt-5">
            <h3>Date: {{date('Y/m/d')}}</h3>
            <form method="POST" action="{{route('instructor.attendance.store')}}">
                @csrf

            <table id="example" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Course Name</th>
                    <th>Course Content</th>
                    <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->course->name}}</td>
                        <td class="text-center"><a class="btn btn-success " href="{{route('instructor.content.index',['id' => $item->course->id])}}"><i class="fa-solid fa-paperclip"></i></a></td>
                        <td>
                            @if(isset($item->attendance()->where('attendanceDate',date('Y-m-d'))->first()->studentId))
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input attend" type="radio" name="attendance[{{$item->id}}]" id="inlineRadio1" value="attend" {{$item->attendance()->first()->status==1 ?'checked':''}} disabled>
                                    <label class="form-check-label" for="inlineRadio1">attend</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input absent" type="radio" name="attendance[{{$item->id}}]" id="inlineRadio2" value="absent" {{$item->attendance()->first()->status==0 ?'checked':''}} disabled>
                                    <label class="form-check-label" for="inlineRadio2">absent</label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input attend" type="radio" name="attendance[{{$item->id}}]" id="inlineRadio1" value="attend">
                                    <label class="form-check-label" for="inlineRadio1">attend</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input absent" type="radio" name="attendance[{{$item->id}}]" id="inlineRadio2" value="absent">
                                    <label class="form-check-label" for="inlineRadio2">absent</label>
                                </div>
                            @endif
                            <input type="hidden" name="studentId[]" value="{{$item->id}}">
                            <input type="hidden" name="courseId" value="{{$item->course->id}}">

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
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
