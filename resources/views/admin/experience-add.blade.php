@extends('layouts.admin')

@php
    if ($experience){
        $experienceText="Deneyim Bilgilerini Düzenleme";
        }
        else{
            $experienceText="Yeni Deneyim Bilgisi Ekle";
    }
@endphp

@section('title')
    {{$experienceText}}
@endsection
@section('content')


        <div class="page-header">
            <h3 class="page-title"> {{$experienceText}} </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                    <li class="breadcrumb-item " aria-current="page" ><a href="{{route('admin.experience-list')}}">Deneyim Bilgileri Listesi</a></li>
                    <li class="breadcrumb-item active " aria-current="page" >Yeni Deneyim Bilgisi Ekleme </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="" method="POST" id="createExperienceForm">
                            @csrf
                            @if($experience)
                                <input type="hidden" name="experienceID" value="{{$experience->id}}">
                            @endif
                            <div class="form-group">
                                <label for="date">Çalışma Tarihi</label>
                                <input type="text" class="form-control"name="date" id="date"  placeholder="Çalışma Tarihi" value="{{ $experience ? $experience->date : '' }}">
                                <small>Örneğin 2015 - 2020</small>
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="company_name">Şirket Adı</label>
                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Şirket Adı" value="{{ $experience ? $experience->company_name : '' }}">
                                @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="task_name">Çalıştığınız Pozisyon</label>
                                <input type="text" class="form-control"  name="task_name" id="task_name" placeholder="Çalıştığınız Pozisyon" value="{{ $experience? $experience->task_name : '' }}">
                                @error('task_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Açıklama</label>
                                <textarea type="text" class="form-control" name="description" id="description" placeholder="Açıklama" value="{{ $experience ? $experience->description : '' }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="order">Görüntülencek Deneyim Sırası</label>
                                <input type="text" class="form-control" name="order" id="order"
                                       placeholder="Görüntülencek Deneyim Sırası"
                                       value="{{ $experience ? $experience->order : '' }}">
                                @error('order')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="checkbox-button">
                                            <?php
                                            if ($experience){
                                                $checkStatus=$experience->status ? "checked" : '';
                                            }
                                            else{
                                                $checkStatus = 0;
                                            }

                                            ?>
                                        <input type="checkbox" id="status" name="status" value="{{ $checkStatus }}">
                                        <span class="checkmark"></span>
                                        Deneyim Bilgileri Alanında Gösterilme Durumu
                                    </label>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="checkbox-button" for="active">
                                            <?php
                                            if ($experience){
                                                $checkActive=$experience->active ? "checked" : '';
                                            }
                                            else{
                                                $checkActive = 0;
                                            }

                                            ?>
                                        <input type="checkbox" id="active" name="active" value="{{ $checkActive }}">
                                        <span class="checkmark"></span>
                                       İlgili İş Alanında Çalışma Durumu
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


@endsection

@section('js')
    <script>
        let createButton = $("#createButton");
        createButton.click(function ()
        {
            if ($('#date').val().trim() == '')
            {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Çalışma Tarihini kontrol edin.',
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#task_name').val().trim() == '')
            {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Çalıştığınız Pozisyon bilgisini kontrol edin.',
                    confirmButtonText: "Tamam"
                });
            }
            else if ($('#company_name').val().trim() == '')
            {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı !',
                    text: 'Lütfen Çalıştığınız Firma bilgisini kontrol edin.',
                    confirmButtonText: "Tamam"
                });
            }
            else
            {
                $('#createExperienceForm').submit();
            }


        });
    </script>
@endsection
