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

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    @endpush
@endsection
@section('content')
    <div class="containers">
        @include('layouts.Instructor.sidebar')
        <!-- HTML !-->
        <a href="{{url('instructor/response/create')}}" class="button-18" role="button">Add Response</a>
        <div class="mt-5">
            <table id="example1" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Description</th>
                    <th>Course Start Date</th>
                    <th>Course End Date</th>
                    <th>Accepted</th>
                </tr>
                </thead>
                <tbody>

                @foreach($response as $item)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->courseName}}</td>
                        <td>{{$item->courseDescription}}</td>
                        <td>{{$item->courseStart}}</td>
                        <td>{{$item->courseEnd}}</td>
                        @if($item->Accepted=="Not Accepted")
                        <td><p style="color:red ">{{$item->Accepted}}</p></td>
                        @elseif($item->Accepted==="Pending")
                            <td><p style="color:orange ">{{$item->Accepted}}</p></td>
                            @else
                            <td><p style="color:green ">{{$item->Accepted}}</p></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
@section('js')

    @include('layouts.JS')
    @push('table')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example1').DataTable();
            });
        </script>
    @endpush
@endsection
