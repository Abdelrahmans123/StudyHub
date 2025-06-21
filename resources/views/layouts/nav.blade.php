
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">

    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto p-4 p-lg-0">
            <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Study<span class="danger">Hub</span</h2>
            </a>
        </div>
        @auth
            <!-- User is logged in -->
            <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{auth()->user()->name}}
                </button>
                <ul class="dropdown-menu">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100">Logout</button>
                    </form>
                </ul>
            </div>
            </div>
        @else
            <!-- User is not logged in -->
            <a href="{{url('/selection/login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login</a>
            <a href="{{url('/selection/register')}}" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">Register</a>
        @endauth

</nav>

<!-- Navbar End -->


