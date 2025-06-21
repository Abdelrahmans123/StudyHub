@extends('layouts.master')
@section('title','Online Session')
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
    @include('layouts.Instructor.sidebar')
    <div class="containers">

        <!-- HTML !-->
        <a href="{{url('instructor/onlineSession/create')}}" class="button-18" role="button">Add Session</a>
        <div class="mt-5">
            <table id="example" class="display" style="width:100%; margin-top: 20px">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Session Id</th>
                    <th>Session Topic</th>
                    <th>Start At</th>
                    <th>Session Duration</th>
                    <th>Start Session</th>
                    <th>Course Name</th>
                    <th>Remove Meeting</th>
                </tr>
                </thead>
                <tbody>
                @foreach($onlineSession as $session)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$session->meetingId}}</td>
                        <td>{{$session->topic}}</td>
                        <td>{{$session->startAt}}</td>
                        <td>{{$session->duration}}</td>
                        <td><a href="{{$session->startURL}}" target="_blank">Start Meeting</a></td>
                        <td>{{$session->course->name}}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @include('Pages.Instructor.OnlineSession.deleteModal')
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
                $('#example').DataTable();
            });
        </script>

    @endpush
@endsection

