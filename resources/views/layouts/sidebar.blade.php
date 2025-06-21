
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
        <a href="{{route('dashboard')}}" class="{{ Request::path() == 'student/dashboard' ? 'active' : '' }}"><i class="fa-solid fa-house sidebarIcon"></i>
            <h3>Dashboard</h3>
        </a>
        <a href="{{route('student.onlineSession')}}" class="{{ Request::path() == 'student/onlineSession' ? 'active' : '' }}"><i class="fa-solid fa-video sidebarIcon"></i>
            <h3>Online Session</h3>
        </a>
        <a href="{{url('/student/educationalTool')}}" class="{{ Request::path() == 'student/educationalTool' ? 'active' : '' }}"><i class="fa-solid fa-screwdriver-wrench sidebarIcon"></i>
            <h3>Educational Tool</h3>
        </a>
        <a href="{{url('/student/course')}}" class="{{ Request::path() == 'student/course' ? 'active' : '' }}"><i class="fa-solid fa-laptop-code sidebarIcon"></i>
            <h3>Course</h3>
        </a>
        <a href="{{url('student/exam')}}" class="{{ Request::path() == 'student/exam' ? 'active' : '' }}">
            <i class="fa-solid fa-list sidebarIcon" ></i>
            <h3>Exam</h3>
        </a>
        <a href="{{route('student.review.index')}}" class="{{ Request::path() == 'student/review' ? 'active' : '' }}"> <i class="fa-solid fas fa-comment sidebarIcon" ></i>
            <h3>Review</h3>
        </a>
        <a href="{{route('student.profile.show')}}" class="{{ Request::path() == 'student/profile' ? 'active' : '' }}"><i class="fa-solid fa-gear sidebarIcon"></i>
            <h3>Setting</h3>

        </a>
{{--        <a href="#"><i class="fa-solid fa-arrow-right-from-bracket sidebarIcon"></i>--}}
{{--            <h3>Logout</h3>--}}
{{--        </a>--}}

        <a href="{{ route('logout') }}" style="width: 50%"
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


