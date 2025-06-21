<section class="right">
    <div class="top">
        <button id="menu-btn">
    <i class="fa-solid fa-bars menuIcon"></i>
        </button>
    <div class="theme-toggle">
        <i class="fa-solid fa-sun theme-toggle--icon active"></i>
        <i class="fa-solid fa-moon theme-toggle--icon"></i>
    </div>
    <div class="profile">
        <div class="info">
            <p>Hey,<b>{{auth()->user()->name}}</b></p>
            <small class="text-muted">Instructor</small>
        </div>
    </div>
    </div>
    <div class="recent-course">
        <h2>Recent Courses</h2>
        <div class="updates">
        <div class="update">
            <div class="profile-picture">
                <img src="{{asset('assets/images/student.png')}}">
            </div>
            <div class="message">
                <p><b>Course Name</b></p>
                <small class="text-muted">Programming</small>
            </div>
        </div>
            <div class="update">
                <div class="profile-picture">
                    <img src="{{asset('assets/images/student.png')}}" alt="">
                </div>
                <div class="message">
                    <p><b>Course Name</b></p>
                    <small class="text-muted">Data Structure</small>
                </div>
            </div>
            <div class="update">
                <div class="profile-picture">
                    <img src="{{asset('assets/images/student.png')}}" alt="">
                </div>
                <div class="message">
                    <p><b>Course Name</b></p>
                    <small class="text-muted">Algorithm</small>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.recentCourseCategory')
</section>
