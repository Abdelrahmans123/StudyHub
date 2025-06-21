@extends('layouts.master')
@section('title','Dashboard')
@section('css')
    @include('layouts.CSS')
@endsection
@include('layouts.nav')
@section('content')
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('assets/dashboard/img/carousel-1.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                                <p class="fs-5 text-white mb-4 pb-2">The best online platform for website creation offers an all-in-one solution for individuals and businesses looking to establish a powerful online presence..</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="{{url('/selection/login')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('assets/dashboard/img/carousel-2.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Our website provides an exceptional online learning experience, allowing you to expand your knowledge and skills without leaving the comfort of your home. With a wide range of courses and educational resources available, you can embark on a journey of self-improvement at your own pace. Whether you're looking to enhance your professional skills, pursue a new hobby, or delve into academic subjects, our platform offers a convenient and accessible way to gain valuable knowledge. Embrace the flexibility of online education and unlock your full potential from the comfort of your own home.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="{{url('/selection/login')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="card h-100">
                        <div class="service-item text-center pt-3 d-flex flex-column h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                <h5 class="card-title">Expert Instructors</h5>
                                <p class="card-text">Highly skilled instructors offering guidance in various domains. Learn new skills, deepen knowledge, and pursue hobbies with our experienced team.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="card h-100">
                        <div class="service-item text-center pt-3 d-flex flex-column h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                                <h5 class="mb-3">Online Classes</h5>
                                <p>Enhance learning with our flexible online classes. Accessible anytime, anywhere, our diverse courses offer expert instruction and interactive content.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="card h-100">
                        <div class="service-item text-center pt-3 d-flex flex-column h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-home text-primary mb-4"></i>
                                <h5 class="mb-3">Home Projects</h5>
                                <p>Explore stunning home projects. Our expert team creates spaces that reflect your style and exceed expectations.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp">
                    <div class="card h-100">
                        <div class="service-item text-center pt-3 d-flex flex-column h-100">
                            <div class="p-4">
                                <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                                <h5 class="mb-3">Book Library</h5>
                                <p>Discover captivating stories in our online Book Library. Immerse yourself in literary treasures across various genres.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('assets/dashboard/img/about.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to eLEARNING</h1>
                    <p class="mb-4"> your premier destination for online education. Our platform is dedicated to providing high-quality courses and resources for learners of all ages and backgrounds. With a diverse range of subjects and experienced instructors, we strive to make learning accessible, engaging, and effective. Whether you're looking to enhance your skills, pursue a new career, or simply explore new topics, eLEARNING is here to empower you on your educational journey. Join our vibrant community of learners today and unlock your full potential.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Response Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            @foreach($courses as $course)
                                <div class="row g-4 justify-content-center">
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{0.1+$loop->iteration}}s">
                                        <div class="course-item bg-light">
                                            <div class="position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="{{asset('assets/images/'.$course->img)}}" alt="">
                                                <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                                    <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                                                </div>
                                            </div>
                                            <div class="text-center p-4 pb-0">
                                                <div class="mb-3">
                                                    <small class="fa fa-star text-primary"></small>
                                                    <small class="fa fa-star text-primary"></small>
                                                    <small class="fa fa-star text-primary"></small>
                                                    <small class="fa fa-star text-primary"></small>
                                                    <small class="fa fa-star text-primary"></small>
                                                    <small>(123)</small>
                                                </div>
                                                <h5 class="mb-4">{{$course->name}}</h5>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->instructor->name}}</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{ \App\Models\Student::where('courseId',$course->id)->count() }} Students</small>
                                            </div>
                                        </div>
                                    </div>
            @endforeach


    </div>
        </div>
    </div>
    <!-- Response End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
    @foreach($instructors as $instructor)
        @php
            $courses = \App\Models\Course::where('instructor_id', $instructor->id)->pluck('name');
 @endphp
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="team-item bg-light">
                                            <div class="overflow-hidden">
                                                <img class="img-fluid" src="{{asset('assets/images/'.$instructor->img)}}" alt="">
                                            </div>
                                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                                    <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center p-4">
                                                <h5 class="mb-0">{{$instructor->name}}</h5>
                                                @if($courses->isEmpty())
                                                    <small>No Course</small>
                                                @else
                                                    <small>{{$courses[$loop->iteration-1]}}</small>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach($review as $item)
                <div class="testimonial-item text-center">
                                        <img class="border rounded-circle p-2 mx-auto mb-3" src="{{asset('assets/images/'.$item->student->img)}}" style="width: 80px; height: 80px;">
                                        <h5 class="mb-0">{{$item->student->name}}</h5>
                                        <p>{{$item->course->name}}</p>
                                        <div class="testimonial-text bg-light text-center p-4">
                                            <p class="mb-0">{{$item->review}}</p>
                                        </div>
                                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('assets/dashboard/img/carousel-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('assets/dashboard/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('assets/dashboard/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('assets/dashboard/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('assets/dashboard/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('assets/dashboard/img/course-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('layouts.JS')
@endsection
