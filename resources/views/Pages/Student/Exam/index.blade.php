@extends('layouts.master')
@section('title','Exam')
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
                    <th>Quiz Name</th>
                    <th>Course Name</th>
                    <th>Operation</th>
                    @if ($exam->count() > 0 && $exam[0]->degree->count() > 0 && $exam[0]->degree[0]->quizId == $exam[0]->id)
                    <th>Score</th>
                @endif

                </tr>
                </thead>
                <tbody>
                @foreach($exam as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->courses->name}}</td>
                            <td>
                                @if ($item->degree->count()>0 && $item->id==$item->degree[0]->quizId)
                                <button type="button" class="btn btn-primary disabled" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-person-booth"></i>
                                    </button>
                                @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-person-booth"></i></a>
                                    </button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Please do not reload the page after entering the test - if this is done, the test will be canceled automatically
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <a href="{{ route('student.exam.show',$item->id) }}" type="button" class="btn btn-primary">Understood</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                @endif
                            </td>
                            @if ($item->degree->count()>0 && $item->id==$item->degree[0]->quizId)
                            <td>
                                {{ $item->degree[0]->score }}
                            </td>
                            @endif
                        </tr>
                    @include('Pages.Instructor.Quiz.deleteModal')
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
    @endpush
@endsection
