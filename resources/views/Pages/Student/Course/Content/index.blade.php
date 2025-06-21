@extends('layouts.master')
@section('title','Course Content')
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach($courses as $course)
                    <div class="card">
                        <div class="card-header">{{ $course->course->name }}</div>

                        <div class="card-body">
                            @if($course->content_type === 'pdf')
                                <div class="d-flex justify-content-between">
                                <a href="{{ asset('storage/pdfs/'.$course->content_file) }}" target="_blank"><h2><i class="fa-solid fa-file-pdf"></i> {{$course->title}}</h2></a>
                                    <a href="{{ route('student.downloadFile', ['file' => $course->content_file]) }}"><i class="fa-solid fa-download"></i></a>
                                </div>
                            @elseif ($course->content_type === 'video')
                                <a href="" target="_blank"><h2><i class="fa-solid fa-file-video"></i> {{$course->title}}</h2></a>
                                @else
                                <p>{{ $course->content }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
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
