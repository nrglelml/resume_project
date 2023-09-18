@extends('layouts.front')
@section('title')
    PORTFOLIO
@endsection
@section('content')
    <main>
        <section class="portfolio-section">
            <h2 class="section-title">PORTFOLIO</h2>

            <div class="portfolio-wrapper">
                @foreach($portfolio as $item)
                <figure class="portfolio-item hover-box out-undefined out-up" style="perspective: 1017.6px;">
                    <a href="{{route('portfolio.detail',['id'=>$item->id])}}">
                    <img src="{{asset('storage/portfolio/'.$item->featuredImage->image)}}"
                         alt="{{$item->title}}"
                         class="portfolio-item-img">
                    </a>
                    <figcaption class="portfolio-item-details overlay">
                        <h3 class="portfolio-item-title">{{$item->title}}</h3>
                        <p class="portfolio-item-description">{{$item->description}}</p>
                        <h5 class="portfolio-item-website">{{$item->website}}</h5>
                    </figcaption>
                </figure>
                @endforeach
                <figure class="portfolio-item hover-box out-down" style="perspective: 1017.6px;">
                    <img src="assets/images/img_2.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 02</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
                <figure class="portfolio-item hover-box out-up" style="perspective: 1017.6px;">
                    <img src="assets/images/img_3.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 03</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
                <figure class="portfolio-item hover-box out-down" style="perspective: 1017.6px;">
                    <img src="assets/images/img_4.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 04</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
                <figure class="portfolio-item hover-box out-down" style="perspective: 1017.6px;">
                    <img src="assets/images/img_5.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 05</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
                <figure class="portfolio-item hover-box out-up" style="perspective: 1017.6px;">
                    <img src="assets/images/img_6.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 06</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
                <figure class="portfolio-item hover-box out-down" style="perspective: 1017.6px;">
                    <img src="assets/images/img_7.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 07</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
                <figure class="portfolio-item hover-box" style="perspective: 1017.6px;">
                    <img src="assets/images/img_8.png" alt="project" class="portfolio-item-img">
                    <figcaption class="portfolio-item-details overlay">
                        <h5 class="portfolio-item-title">PROJECT 08</h5>
                        <p class="portfolio-item-description">Branding, Photography</p>
                    </figcaption>
                </figure>
            </div>

        </section>

    </main>
@endsection
