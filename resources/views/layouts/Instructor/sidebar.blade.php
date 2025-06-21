
@section('css')
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 48
        }
    </style>

@endsection

<aside>
    <div class="top">
        <div class="logo">
            <a href="{{url('/')}}" class="ic">
                <i class="fa fa-book me-3 ico"></i>
                <h2 class="m-0 text-primary">Study<span class="danger">Hub</span></h2>
            </a>
        </div>
        <div class="close" id="closeBtn">
            <i class=" fa-solid fa-xmark"></i>
        </div>
    </div>

    <div class="sidebar">
        <a href="{{route('dashboard')}}" class="{{ Request::path() == 'instructor/dashboard' ? 'active' : '' }}"><i class="fa-solid fa-house sidebarIcon"></i>
            <h3>Dashboard</h3>
        </a>
        <a href="{{url('instructor/onlineSession')}}" class="{{ Request::path() == 'instructor/onlineSession' ? 'active' : '' }}"><i class="fa-solid fa-video sidebarIcon"></i>
            <h3>Online Session</h3>
        </a>
        <a href="{{url('/instructor/educationalTool')}}" class="{{ Request::path() == 'instructor/educationalTool' ? 'active' : '' }}"><i class="fa-solid fa-screwdriver-wrench sidebarIcon"></i>
            <h3>Educational Tool</h3>
        </a>
        <a href="{{url('instructor/quiz')}}" class="{{ Request::path() == 'instructor/quiz' ? 'active' : '' }}">
            <i class="fa-solid fa-book-open-reader sidebarIcon"></i>
            <h3>Quiz</h3>
        </a>
        <a href="{{route('instructor.attendance.index')}}" class="{{ Request::path() == 'instructor/attendance' ? 'active' : '' }}"> <i class="fa-solid fa-laptop-code sidebarIcon"></i>
            <h3>Courses</h3>
        </a>

        <a href="{{url('instructor/response')}}" class="{{ Request::path() == 'instructor/response' ? 'active' : '' }}">
            <i class="fa-solid fa-reply sidebarIcon"></i>
            <h3>Response</h3>
        </a>

        <a href="{{route('instructor.profile.show')}}" class="{{ Request::path() == 'instructor/profile' ? 'active' : '' }}"><i class="fa-solid fa-gear sidebarIcon"></i>
            <h3>Setting</h3>

        </a>
{{--        <a href="#"><i class="fa-solid fa-arrow-right-from-bracket sidebarIcon"></i>--}}
{{--            <h3>Logout</h3>--}}
{{--        </a>--}}

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket sidebarIcon"></i>
            <h3>Logout</h3>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>


