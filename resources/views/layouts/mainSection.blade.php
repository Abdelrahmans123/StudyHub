<main>
    <div class="insight">
        <div class="attended">
            <i class="fa-solid fa-video mainIcon"></i>
            <div class="middle">
                <div class="left">
                    <h3>Session Attended</h3>
                    <h3>{{$attendancePercentage}}</h3>
                </div>

            </div>
            <small class="text-muted">Last 24 Hours</small>
        </div>

        <div class="notAttended">
            <i class="fa-solid fa-video-slash mainIcon"></i>
            <div class="middle">
                <div class="left">
                    <h3>Session Not Attended</h3>
                   <h3>{{$notattendancePercentage}}</h3>
                </div>

            </div>
            <small class="text-muted">Last 24 Hours</small>
        </div>

    </div>
</main>
