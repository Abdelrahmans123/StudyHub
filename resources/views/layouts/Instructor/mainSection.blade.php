<main>
    <h1>Student Dashboard</h1>
    <div class="date">
        <input type="date" id="dateInput">
    </div>
    <div class="insight">
        <div class="attended">
            <i class="fa-solid fa-video mainIcon"></i>
            <div class="middle">
                <div class="left">
                    <h3>Session Attended</h3>
                    <h3>20</h3>
                </div>
                <div class="progresses">
                    <svg>
                        <circle r="36" cx="38" cy="38"></circle>
                    </svg>
                    <div class="number">
                        <p>81%</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
        <div class="notAttended">
            <i class="fa-solid fa-video-slash mainIcon"></i>
            <div class="middle">
                <div class="left">
                    <h3>Session Not Attended</h3>
                    <h3>20</h3>
                </div>
                <div class="progresses">
                    <svg>
                        <circle r="36" cx="38" cy="38"></circle>
                    </svg>
                    <div class="number">
                        <p>81%</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 Hours</small>
        </div>
    </div>
    @include('layouts.schedule')
</main>
