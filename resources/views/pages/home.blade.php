@extends('layouts.front')
@section('title')
   ANA SAYFA
@endsection
@section('content')
    <main>
        <section class="intro-section">
            <h2 class="section-title">{{$personal_info->main_title}}</h2>
            {!! $personal_info->about_text !!}
            <br>
            <a href="{{ route('contact')}}" class="btn btn-primary btn-hire-me" >{{ $personal_info->btn_contact_text }}</a>
        </section>
        <section class="resume-section">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="section-subtitle">{{ $personal_info->small_title_left }}</h6>
                    <h2 class="section-title">{{ $personal_info->title_left }}</h2>
                    <ul class="time-line">
                        @foreach($educationList as $ed)
                        <li class="time-line-item">
                            <span class="badge badge-primary">{{$ed->ed_date}}</span>
                            <h6 class="time-line-item-title">{{$ed->department}}</h6>
                            <p class="time-line-item-subtitle">{{$ed->university}}</p>
                            <p class="time-line-item-content">{{$ed->description}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h6 class="section-subtitle">{{ $personal_info->small_title_right }}</h6>
                    <h2 class="section-title">{{ $personal_info->title_right }}</h2>
                    <ul class="time-line">
                        @foreach($experienceList as $ex)
                            <li class="time-line-item">
                                <span class="badge badge-primary">{{$ex->date}}</span>
                                <h6 class="time-line-item-title">{{$ex->task_name}}</h6>
                                <p class="time-line-item-subtitle">{{$ex->company_name}}</p>
                                <p class="time-line-item-content">{{$ex->description}}</p>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <section class="services-section">
            <h6 class="section-subtitle">WHAT I DO</h6>
            <h2 class="section-title">SERVICES</h2>
            <div class="row">
                <div class="media service-card col-lg-6">
                    <div class="service-icon">
                        <img src="assets/images/001-target.svg" alt="target">
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">web designing</h5>
                        <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                            interdum sed
                            tortor.</p>
                    </div>
                </div>
                <div class="media service-card col-lg-6">
                    <div class="service-icon">
                        <img src="assets/images/003-idea.svg" alt="bulb">
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">Graphic design</h5>
                        <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                            interdum sed
                            tortor.
                        </p>
                    </div>
                </div>
                <div class="media service-card col-lg-6">
                    <div class="service-icon">
                        <img src="assets/images/002-development.svg" alt="development">
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">Development</h5>
                        <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                            interdum sed
                            tortor.
                        </p>
                    </div>
                </div>
                <div class="media service-card col-lg-6">
                    <div class="service-icon">
                        <img src="assets/images/004-smartphone.svg" alt="smartphone">
                    </div>
                    <div class="media-body">
                        <h5 class="service-title">Mobile design</h5>
                        <p class="service-description">Mauris magna sapien, pharetra consectetur fringilla vitae,
                            interdum sed
                            tortor.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
