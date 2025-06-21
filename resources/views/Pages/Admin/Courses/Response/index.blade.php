@extends('layouts.master')
@section('title', 'Response')
@section('css')
    @include('layouts.CSS')
    @push('stylesheet')
        <style>
            .containers {
                display: block;
            }

            table {
                margin-top: 20px;
            }
        </style>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    @endpush
@endsection
@section('content')
    <div class="containers">
        @include('layouts.Admin.sidebar')
        <!-- HTML !-->
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
                        @isset($response)
                            @if ($response->isNotEmpty() && $response->first()->Accepted === 'Accepted')
                                <th>Approval</th>
                            @else
                                <th>Operation</th>
                            @endif
                        @endisset

                    </tr>
                </thead>
                <tbody>

                    @foreach ($response as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->courseName }}</td>
                            <td>{{ $item->courseDescription }}</td>
                            <td>{{ $item->courseStart }}</td>
                            <td>{{ $item->courseEnd }}</td>
                            <td>{{ $item->instructor->name }}</td>
                            <td>
                                @if ($item->Accepted === 'Accepted')
                                    <p> Approved</p>
                                @else
                                    <a href="{{ route('admin.acceptedResponse', $item->id) }}" class="btn btn-success"><i
                                            class="fa-solid fa-check"></i></a>
                                    <a href="{{ route('admin.notAcceptedResponse', $item->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-xmark"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

@include('layouts.JS')
@push('table')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
@endpush

