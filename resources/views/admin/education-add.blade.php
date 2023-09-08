@extends('layouts.admin')
@section('title')
    Yeni Eğitim Bilgisi Ekle
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Yeni Eğitim Bilgisi Ekleme </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                    <li class="breadcrumb-item " aria-current="page" ><a href="{{route('admin.education-list')}}">Eğitim Bilgileri Listesi</a></li>
                    <li class="breadcrumb-item active " aria-current="page" >Yeni Eğitim Bilgisi Ekleme </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="education_date">Eğitim Tarihi</label>
                                <input type="text" class="form-control"name="education-date" id="education_date" placeholder="Eğitim Tarihi">
                            </div>
                            <div class="form-group">
                                <label for="university">Üniversite</label>
                                <input type="email" class="form-control" name="university" id="university" placeholder="Üniversite">
                            </div>
                            <div class="form-group">
                                <label for="department">Bölüm</label>
                                <input type="password" class="form-control"  name="department" id="department" placeholder="Bölüm">
                            </div>
                            <div class="form-group">
                                <label for="description">Açıklama</label>
                                <input type="password" class="form-control" name="description" id="description" placeholder="Açıklama">
                            </div>
                           <div class="form-group">
                               <div class="form-check form-check-success">
                                   <label class="form-check-label" for="status">
                                       <input type="checkbox"  name="status" id="status" class="form-check-input" > Eğitim Bilgileri Alanında Gösterilme Durumu </label>
                               </div>
                           </div>
                            <button type="button" class="btn btn-primary me-2">Ekle</button>
                            <button class="btn btn-dark">İptal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection
