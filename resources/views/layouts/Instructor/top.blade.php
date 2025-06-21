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
</section>
