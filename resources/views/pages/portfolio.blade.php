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


        </section>

    </main>
@endsection
