@extends('layouts.master')
@section('title','Content List')
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
        @include('layouts.Instructor.sidebar')
        <!-- HTML !-->
        <a href="{{route('instructor.content.create',['id' => $id])}}" class="button-18" role="button">Add Content</a>
        <div class="mt-5">
            <table id="example1" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Content</th>
                    <th>File</th>
                    <th>Course Name</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>

                @foreach($content as $item)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content_type}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->content_file}}</td>
                        <td>{{$item->course->name}}</td>
{{--                        <td><img src="{{asset('assets/images/'.$course->img)}}" style="width: 100px; height: 100px; border-radius: 50%"></td>--}}
                        <td>
                            <a class="btn btn-primary" href="{{url('admin/courses/edit/'.$item->id)}}">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
{{--                    @include('Pages.Admin.Courses.deleteModal')--}}
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
