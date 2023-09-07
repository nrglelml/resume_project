<!DOCTYPE HTML>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/live-resume.css')}}">
    <style type="text/css" id="operaUserStyle"></style></head>

<body>
<header>
    <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto"><img src="assets/images/share.svg" alt="share" class="btn-img">
        SHARE</button>
    <nav class="collapsible-nav show" id="collapsible-nav">
        <a href="{{route('home')}}" class="nav-link {{Route::is('home') ?  "active" : ""}} ">HOME</a>
        <a href="{{route('resume')}}" class="nav-link {{Route::is('resume') ?  "active" : ""}}" >RESUME</a>
        <a href="{{route('portfolio')}}" class="nav-link {{Route::is('portfolio') ?  "active" : ""}}">PORTFOLIO</a>
        <a href="{{route('blog')}}" class="nav-link {{Route::is('blog') ?  "active" : ""}}">BLOG</a>
        <a href="{{route('contact')}}" class="nav-link {{Route::is('contact') ?  "active" : ""}}">CONTACT</a>
    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav" data-target="collapsible-nav"><img src="assets/images/hamburger.svg" alt="hamburger"></button>
</header>
<div class="content-wrapper">
    <aside>
        <div class="profile-img-wrapper">
            <img src="assets/images/Profile.png" alt="profile">
        </div>
        <h1 class="profile-name">Daisy Murphy</h1>
        <div class="text-center">
            <span class="badge badge-white badge-pill profile-designation">UI / UX Designer</span>
        </div>
        <nav class="social-links">
            <a href="#!" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#!" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#!" class="social-link"><i class="fab fa-behance"></i></a>
            <a href="#!" class="social-link"><i class="fab fa-dribbble"></i></a>
            <a href="#!" class="social-link"><i class="fab fa-github"></i></a>
        </nav>
        <div class="widget">
            <h5 class="widget-title">personal information</h5>
            <div class="widget-content">
                <p>BIRTHDAY : 15 April 1990</p>
                <p>WEBSITE : www.example.com</p>
                <p>PHONE : +1 123 000 4444</p>
                <p>MAIL : your@example.com</p>
                <p>Location : California, USA</p>
                <button class="btn btn-download-cv btn-primary rounded-pill"> <img src="assets/images/download.svg" alt="download" class="btn-img">DOWNLOAD CV </button>
            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title">LANGUAGES</h5>
                    <p>English : native</p>
                    <p>Spanish : fluent</p>
                    <p>Italian : fluent</p>
                </div>
            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title">INTERESTS</h5>
                    <p>Video games</p>
                    <p>Finance</p>
                    <p>Basketball</p>
                    <p>Theatre</p>
                </div>
            </div>
        </div>
    </aside>

    @yield('content')
</div>
<script src="{{asset('assets/vendors/jquery/sweet-alert/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/@popperjs/core/sweet-alert/umd/popper-base.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/sweet-alert/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/live-resume.js')}}"></script>


</body></html>
