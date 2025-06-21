
    <!-- Favicon -->
    {{--    <link href="img/favicon.ico" rel="icon">--}}

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/dashboard/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dashboard/lib/owlcarousel/assets/owl.carousel.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Template Stylesheet -->

{{--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"--}}
{{--          rel="stylesheet">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @php
        $currenturl = url()->full();
    @endphp
    @if($currenturl==='http://127.0.0.1:8000')
        <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">
@endif
    @if($currenturl==='http://127.0.0.1:8000/selection/login')
{{--        <link href="{{asset('assets/css/rtl.css')}}" rel="stylesheet">--}}
<link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">

    @endif
    @if($currenturl==='http://127.0.0.1:8000/selection/register')
        {{--        <link href="{{asset('assets/css/rtl.css')}}" rel="stylesheet">--}}
        <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">


    @endif
    @if($currenturl!=='http://127.0.0.1:8000/selection/login' && $currenturl!=='http://127.0.0.1:8000/selection/register' && $currenturl!=='http://127.0.0.1:8000')
     <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">
     <link href="{{asset('assets/dashboard/css/sidebar.css')}}" rel="stylesheet">
     <link href="{{asset('assets/dashboard/css/mainSection.css')}}" rel="stylesheet">
     <link href="{{asset('assets/dashboard/css/schedule.css')}}" rel="stylesheet">
     <link href="{{asset('assets/dashboard/css/recentCourse.css')}}" rel="stylesheet">
     <link href="{{asset('assets/dashboard/css/recentCourseCategory.css')}}" rel="stylesheet">
     <link href="{{asset('assets/dashboard/css/mediaQuery.css')}}" rel="stylesheet">
        @endif

@if($currenturl==='http://127.0.0.1:8000/register/instructor')
    <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
@endif
    @if($currenturl==='http://127.0.0.1:8000/register/student')
        <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    @endif
    @if($currenturl==='http://127.0.0.1:8000/register/admin')
        <link href="{{asset('assets/dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    @endif

