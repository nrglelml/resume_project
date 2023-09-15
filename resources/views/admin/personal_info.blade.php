@extends('layouts.admin')
@section('title')
    Kişisel Bilgiler
@endsection
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">   Kişisel Bilgileri Düzenleme </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                    <li class="breadcrumb-item active " aria-current="page" >  Kişisel Bilgileri Düzenleme </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST" id="createInfoForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="main_title">Anasayfa Başlık</label>
                                <input type="text" class="form-control"name="main_title" id="main_title"  placeholder="Anasayfa Başlık" value="{{ $info ? $info->main_title : '' }}" >
                                <small>Örneğin Merhaba</small>
                                @error('main_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="about_text">Hakkımda Yazısı</label>
                                <textarea type="text" class="form-control" name="about_text" id="about_text" placeholder="Hakkımda Yazısı" value="{{ $info ? $info->about_text : '' }}" ></textarea>
                                @error('about_text')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="btn_contact_text">Bana Ulaşın Butonu Link</label>
                                <input type="text" class="form-control" name="btn_contact_text" id="btn_contact_text"
                                       placeholder="Bana Ulaşın Butonu Link">
                            </div>

                            <div class="form-group">
                                <label for="title_left">Eğitim Başlığı</label>
                                <input type="text" class="form-control" name="title_left" id="title_left"
                                       placeholder="Eğitim Başlığı">

                            </div>
                            <div class="form-group">
                                <label for="small_title_left">Eğitim Başlığı Üzerindeki Ufak Başlık</label>
                                <input type="text" class="form-control" name="small_title_left" id="small_title_left"
                                       placeholder="Eğitim Başlığı Üzerindeki Ufak Başlık">
                            </div>
                            <div class="form-group">
                                <label for="title_right">Deneyim Başlığı</label>
                                <input type="text" class="form-control" name="title_right" id="title_right"
                                       placeholder="Deneyim Başlığı">
                            </div>
                            <div class="form-group">
                                <label for="small_title_right">Deneyim Başlığı Üzerindeki Ufak Başlık</label>
                                <input type="text" class="form-control" name="small_title_right" id="small_title_right"
                                       placeholder="Deneyim Başlığı Üzerindeki Ufak Başlık">
                            </div>

                            <div class="form-group">
                                <label for="full_name">Ad Soyad</label>
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                       placeholder="Ad Soyad" value="{{ $info ? $info->full_name : ''  }}">
                                @error('full_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="image">Resim</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="col-md-6">
                                        <img width="20%"
                                             src="{{ asset($info ? 'storage/'. $info->image : 'assets/images/faces/face15.jpg') }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="task_name">Pozisyon</label>
                                <input type="text" class="form-control" name="task_name" id="task_name"
                                       placeholder="Pozisyon"
                                       value="{{ $info ? $info->task_name : ''  }}">
                                @error('task_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birthday">Doğum Tarihi</label>
                                <input type="text" class="form-control" name="birthday" id="birthday"
                                       placeholder="Doğum Tarihi"
                                       value="{{ $info ? $info->birthday : ''  }}">
                                @error('birthday')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="website">Web Sitesi</label>
                                <input type="text" class="form-control" name="website" id="website"
                                       placeholder="Web Sitesi"
                                       value="{{ $info ? $info->website : ''  }}">
                                @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Telefon</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="Telefon"
                                       value="{{ $info ? $info->phone : ''  }}">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mail">E-posta</label>
                                <input type="text" class="form-control" name="mail" id="mail"
                                       placeholder="E-posta"
                                       value="{{ $info ? $info->mail : ''  }}">
                                @error('mail')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Adres</label>
                                <input type="text" class="form-control" name="address" id="address"
                                       placeholder="Adres"
                                       value="{{ $info ? $info->address : ''  }}">
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cv">Özgeçmiş</label>
                                <input type="file" class="form-control" name="cv" id="cv" value="{{ $info ? $info->cv : ''  }}">
                                @error('cv')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="editorLang">Diller</label>
                                <textarea cols="80" id="editorLang" name="lang" rows="10" data-sample="1"
                                          data-sample-short="">
                               {!! $info ? $info->languages : '' !!}
                            </textarea>
                            </div>

                            <div class="form-group">
                                <label for="editorInterests">Hobiler</label>
                                <textarea cols="80" id="editorInterests" name="interests" rows="10" data-sample="1"
                                          data-sample-short="">
                                {!! $info ? $info->interests : '' !!}

                            </textarea>
                            </div>


                            <button type="submit" class="btn btn-primary mr-2" id="createButton">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section('js')
            <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
            <script src=" {{ asset('assets/ckeditor/samples/js/sample.js') }}"></script>
            <script>
                var editor1 = CKEDITOR.replace('editor1', {
                    extraAllowedContent: 'div',
                    height: 150
                });

                var editorLang = CKEDITOR.replace('editorLang', {
                    extraAllowedContent: 'div',
                    height: 150
                });

                var editorInterests = CKEDITOR.replace('editorInterests', {
                    extraAllowedContent: 'div',
                    height: 150
                });

            </script>
@endsection
