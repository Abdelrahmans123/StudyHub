@extends('layouts.master')
@section('title','Course')
@section('css')
    @include('layouts.CSS')
    @push('stylesheet')
        <style>

            table {
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
                min-width: 0px;
                overflow: hidden;
                padding: 0px;
                padding-left: 20px;
                padding-right: 20px;
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

    @include('layouts.sidebar')


        <div class="mt-5">
            <table id="example" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Description</th>
                    <th>Course Start At</th>
                    <th>Course End At</th>
                    <th>Instructor Name</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->startAt}}</td>
                            <td>{{$item->endAt}}</td>
                            <td>{{$item->instructor->name}}</td>
                            <td>
                            @if(auth()->user()->courseId == $item->id)
                                <a href="{{route('student.content.index',['id' => $item->id])}}" class="btn btn-primary">Content</a>
                            @else
                                <a href="{{route('student.course.enroll', $item->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                @endif
                                </td>
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
