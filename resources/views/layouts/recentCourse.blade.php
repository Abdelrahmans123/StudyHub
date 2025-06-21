<section class="right">
    <div class="menuBar">
        <button id="menu-btn">
    <i class="fa-solid fa-bars menuIcon"></i>
        </button>


    </div>
    <div class="recent-course">
        <h2>Recent Courses</h2>
            @foreach($course as $item)
                <div class="card">
                    <div class="card-header">
                        {{$item->name}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$item->description}}</p>
                        <a href="{{route('student.recentCourse',$item->id)}}" class="btn btn-primary">Go To Course</a>
                    </div>
                </div>
            @endforeach
        </div>
</section>
