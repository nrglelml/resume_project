@extends('layouts.front')
@section('title')
    RESUME
@endsection
@section('content')
    <main>
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



    </main>
@endsection
