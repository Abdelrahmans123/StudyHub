
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
        <a href="{{route('dashboard')}}" class="{{ Request::path() == 'admin/dashboard' ? 'active' : '' }}"><i class="fa-solid fa-house sidebarIcon"></i>
            <h3>Dashboard</h3>
        </a>
        <a href="{{ url('admin/instructors') }}" class="{{ Request::path() == 'admin/instructors' ? 'active' : '' }}">
            <i class="fa-solid fa-person-chalkboard sidebarIcon"></i>
            <h3>Instructors</h3>
        </a>
        <a href="{{url('admin/courses')}}" class="{{ Request::path() == 'admin/courses' ? 'active' : '' }}"><i class="fa-solid fa-book-open-reader sidebarIcon"></i>
            <h3>Courses</h3>
        </a>
        <a href="{{url('admin/response')}}" class="{{ Request::path() == 'admin/response' ? 'active' : '' }}">
            <i class="fa-solid fa-reply sidebarIcon"></i>
            <h3>Response</h3>
            <span class="messageCount">0</span>
        </a>
        <a href="{{route('admin.review.index')}}" class="{{ Request::path() == 'admin/review' ? 'active' : '' }}"> <i class="fa-solid fas fa-comment sidebarIcon" ></i>
            <h3>Review</h3>
        </a>
        <a href="#"> <span class="material-symbols-outlined sidebarIcon">mail</span>
            <h3>Message</h3>

        </a>
        <a href="#" class="{{ Request::path() == 'student/setting' ? 'active' : '' }}"><i class="fa-solid fa-gear sidebarIcon"></i>
            <h3>Setting</h3>

        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket sidebarIcon"></i>
            <h3>Logout</h3>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>
@push('message')
    <script>
        // Fetch the data from the server and update the message count
        function updateMessageCount() {
            $.ajax({
                url: "{{ route('admin.fee.index') }}",
                method: "GET",
                success: function (response) {

                    $('.messageCount').text(response.count);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Call the updateMessageCount function initially to display the initial count
        updateMessageCount();

        // Set an interval to call the updateMessageCount function periodically
        setInterval(updateMessageCount, 5000); // Update every 5 seconds (adjust as needed)
    </script>
@endpush

