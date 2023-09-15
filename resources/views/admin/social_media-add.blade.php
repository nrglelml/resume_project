@extends('layouts.admin')

@php
    if ($socialmedia){
        $socialmediaText="Sosyal Medya Bilgilerini Düzenleme";
        }
        else{
            $socialmediaText="Yeni Sosyal Medya Bilgisi Ekle";
    }
@endphp

@section('title')
    {{$socialmediaText}}
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> {{$socialmediaText}} </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                    <li class="breadcrumb-item " aria-current="page" ><a href="{{route('admin.social_media-list')}}">Sosyal Medya Bilgileri Listesi</a></li>
                    <li class="breadcrumb-item active " aria-current="page" >Yeni Sosyal Medya Bilgisi Ekleme </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST" id="createSosyalMediaForm">
                            @csrf
                            @if($socialmedia)
                                <input type="hidden" name="educationID" value="{{$socialmedia->id}}">
                            @endif
                            <div class="form-group">
                                <label for="name">Sosyal Medya Platformu</label>
                                <input type="text" class="form-control"name="name" id="name"  placeholder="Sosyal Medya Platformu" value="{{ $socialmedia ? $socialmedia->name : '' }}">
                                <small>Örneğin Facebook</small>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" id="link" placeholder="Link " value="{{ $socialmedia ? $socialmedia->link : '' }}">
                                @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="icon">Sosyal Medya Iconu</label>
                                <input type="text" class="form-control" name="icon" id="icon"
                                       placeholder="Sosyal Medya Iconu"
                                       value="{{ $socialmedia ? $socialmedia->icon : '' }}">
                                <small>
                                    <a href="https://fontawesome.com/search" target="_blank">
                                        Kullanabileceğiniz Sosyal Medya Iconları İçin Tıklayın
                                    </a>
                                </small><br>
                                <small>Seçtiğiniz iconun kodunu yazınız. Örneğin: ">i class="fa-brands fa-facebook">/i<"</small>
                                @error('icon')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="order">Görüntülencek Sosyal Medya Hesap Sırası</label>
                                <input type="text" class="form-control" name="order" id="order"
                                       placeholder="Görüntülencek Sosyal Medya Hesap Sırası"
                                       value="{{ $socialmedia ? $socialmedia->order : '' }}">
                                @error('order')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="checkbox-button">
                                            <?php
                                            if ($socialmedia){
                                                $checkStatus=$socialmedia->status ? "checked" : '';
                                            }
                                            else{
                                                $checkStatus = 0;
                                            }

                                            ?>
                                        <input type="checkbox" id="status" name="status" value="{{ $checkStatus }}">
                                        <span class="checkmark"></span>
                                        Sosyal Medya Bilgileri Alanında Gösterilme Durumu
                                    </label>

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary me-2" id="createbutton">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
@endsection
