<!DOCTYPE HTML>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/live-resume.css')}}">
    <style type="text/css" id="operaUserStyle"></style>
    @yield('css')
</head>
<body>
<header>
    <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto">
        <img src="{{asset('assets/images/share.svg')}}" alt="share" class="btn-img">
        SHARE</button>
    <nav class="collapsible-nav show" id="collapsible-nav">
        <a href="{{route('home')}}" class="nav-link {{Route::is('home') ?  "active" : ""}} ">HOME</a>
        <a href="{{route('resume')}}" class="nav-link {{Route::is('resume') ?  "active" : ""}}" >RESUME</a>
        <a href="{{route('portfoli')}}" class="nav-link {{Route::is('portfoli') ?  "active" : ""}}">PORTFOLIO</a>
        <a href="{{route('contact')}}" class="nav-link {{Route::is('contact') ?  "active" : ""}}">CONTACT</a>
        <a href="{{route('admin.index')}}" class="nav-link {{Route::is('admin.index') ?  "active" : ""}}">ADMİN PANELİ</a>
        <a href="{{route('blog')}}" class="nav-link {{Route::is('blog') ?  "active" : ""}}">BLOG</a>


    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav" data-target="collapsible-nav">
        <img src="{{asset('assets/images/hamburger.svg')}}" ></button>
</header>
<div class="content-wrapper">
    <aside>
        <div class="profile-img-wrapper padding-1-12">
            <img src="{{ asset('storage/'.$personal_info->image) }}" alt={{$personal_info->full_name}}>
        </div>
        <h1 class="profile-name">{{$personal_info->full_name}}</h1>
        <div class="text-center">
            <span class="badge badge-white badge-pill profile-designation">{!! $personal_info->task_name !!}</span>
        </div>
        <nav class="social-links">
            @foreach($socialmedia as $item)
                <a href="{{ $item->link ? $item->link : 'javascript:void(0)'}}" target="_blank" class="social-link"
                   title="{{ $item->name }}">
                    {!! $item->icon !!}
                </a>
            @endforeach
        </nav>
        <div class="widget">
            <h5 class="widget-title">Kişisel Bilgiler</h5>
            <div class="widget-content">
                <p>DOĞUM GÜNÜ : {{$personal_info->birthday}}</p>
                <p>WEBSITE : {{$personal_info->website}}</p>
                <p>TELEFON NUMARASI : {{$personal_info->phone}}</p>
                <p>MAIL : {{$personal_info->mail}}</p>
                <p>ADRES : {{$personal_info->address}}</p>
                <a href="{{ asset('storage/'. $personal_info->cv) }}" target="_blank" class="btn btn-download-cv btn-primary rounded-pill">
                    <img src="{{ asset('assets/images/download.svg') }}" alt="download" class="btn-img">ÖZGEÇMİŞİ İNDİR
                </a>
            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title">DİLLER</h5>
                    {!! $personal_info->languages !!}
                </div>
            </div>
        </div>
        <div class="widget card">
            <div class="card-body">
                <div class="widget-content">
                    <h5 class="widget-title card-title">HOBİLER</h5>
                    {!! $personal_info->interests !!}
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
@yield('js')

</body></html>
