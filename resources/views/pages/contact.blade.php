@extends('layouts.front')
@section('title')
    CONTACT
@endsection
@section('content')
    <main>
        <section class="contact-section">
            <h2 class="section-title">İletişimde Bulun</h2>
            <p class="mb-4"> Bir proje , iş veya herhangir bir şey hakkında konuşmak için benimle iletişime geç.</p>

            <div class="contact-cards-wrapper">
                <div class="contact-card">
                    <h6 class="contact-card-title">GSM</h6>
                    <p class="contact-card-content">{{$personal_info->phone}}</p>
                </div>
                <div class="contact-card">
                    <h6 class="contact-card-title">Email Adresim</h6>
                    <p class="contact-card-content">{{$personal_info->mail}}</p>
                </div>
            </div>

            <form action="{{route('send.email')}}" class="contact-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-group-name">
                    <label for="name" class="sr-only">İsim</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="İSİM">
                </div>
                <div class="form-group form-group-email">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="EMAIL">
                </div>
                <div class="form-group">
                    <label for="message" class="sr-only">Mesaj</label>
                    <textarea name="message" id="message" class="form-control" placeholder="MESAJ"
                              rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary form-submit-btn">Mesajı gönder</button>
            </form>
            <div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div>
                @if(session('error'))
                    <div class="invalid-feedback" role="alert>{{ session('error') }}</div>
                    @endif
                </div>

        </section>

    </main>
@endsection

