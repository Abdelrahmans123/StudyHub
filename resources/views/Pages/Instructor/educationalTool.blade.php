@extends('layouts.master')
@section('title','Educational Tool')
@section('css')
    @include('layouts.CSS')
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" rel="stylesheet" />
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>--}}

    <style>
        #canvas {
            display: block;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        form{
            position: relative;
            top: 90%;
            width: 100%;
            height: 300px;
            left: 20%;
        }
        form div{

            font-family: monospace;
            background-color: #2d2d2d;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            height: 300px;
            resize: none;
        }
        .containers{
            display: block;
        }
        .codeCompiler{
            position: absolute;
            top: 70%;
            width: 100%;
        }
        #code {
            font-family: "Courier New", Courier, monospace;
            height: 500px;
            width: 100%;
        }
        .ace_editor {
            font-size: 20px;
        }
    </style>
    <link href="{{asset('assets/css/prism.css')}} " rel="stylesheet">
@endsection
@section('content')
    <div class="containers">
        @include('layouts.Instructor.sidebar')
        <div class="a text-center" role="alert"></div>
        <div class="selection">

            <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off"  value="stack">
            <label class="btn btn-outline-success" for="success-outlined">Stack</label>

            <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" value="queue">
            <label class="btn btn-outline-danger" for="danger-outlined">Queue</label>

            <input type="radio" class="btn-check" name="options-outlined" id="primary-outlined" autocomplete="off" value="Linked_List">
            <label class="btn btn-outline-primary" for="primary-outlined">Linked List</label>
                <input type="radio" class="btn-check" name="options-outlined" id="warning-outlined" autocomplete="off" value="Binary_Search_Tree">
                <label class="btn btn-outline-warning" for="warning-outlined">Binary Search Tree</label>

        </div>
        <div id="canvas-container"></div>
        <div class="codeCompiler">
            <div id="code"></div>
{{--        <button id="run-button" onclick="runCode()">Run Code</button>--}}
            <button type="button" id="run-button" class="btn btn-success mt-2" onclick="runCode()">Run</button>
        </div>
@endsection
@section('js')
    @include('layouts.JS')
    @push('scripts')
                <script src="{{asset('assets/js/Libraries/matter.js')}}"></script>
                <script src="{{asset('assets/js/Libraries/p5.js')}}"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
                <script src="{{asset('assets/js/Wall.js')}}"></script>
                <script src="{{asset('assets/js/DynamicBox.js')}}"></script>
                <script src="{{asset('assets/js/Box.js')}}"></script>
                <script src="{{asset('assets/js/Push.js')}}"></script>
                <script src="{{asset('assets/js/Pop.js')}}"></script>
                <script src="{{asset('assets/js/Enqueue.js')}}"></script>
                <script src="{{asset('assets/js/Dequeue.js')}}"></script>
                <script src="{{asset('assets/js/linkedlist.js')}}"></script>
                <script src="{{asset('assets/js/wrongMove.js')}}"></script>
                <script  src="{{asset('assets/js/sketch.js')}}"></script>
    @endpush
@endsection
