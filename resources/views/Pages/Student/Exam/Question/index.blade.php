@extends('layouts.master')
@section('title','Question')
@section('css')
    @include('layouts.CSS')
    @push('stylesheet')
        @livewireStyles
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
    @endpush
@endsection
@section('content')
    @include('layouts.sidebar')
    <div class="containers">
    @livewire('show-question',['quizId'=>$id,'studentId'=>$studentId])

    </div>
@endsection
@section('js')
    @include('layouts.JS')
    @livewireScripts
    <script>
        window.onkeydown = function (event) {
    // Check if Ctrl+Shift+I or F12 key is pressed
    if (
        (event.ctrlKey && event.shiftKey && event.keyCode === 73) ||
        event.keyCode === 123
    ) {
        // Prevent default behavior (opening inspect tool)
        event.preventDefault();
        // Optionally, you can take further action such as showing a message
        console.log("Inspect tool is disabled.");
    }
};
window.addEventListener('contextmenu', function (event) {
    // Prevent default behavior (opening right-click menu)
    event.preventDefault();
    // Optionally, you can take further action such as showing a message
    console.log("Right-click is disabled.");
});

    </script>
@endsection

