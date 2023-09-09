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
                        <form class="forms-sample" action="" method="POST" id="createEducationForm">
                            @csrf
                            <div class="form-group">
                                <label for="ed_date">Eğitim Tarihi</label>
                                <input type="text" class="form-control"name="ed_date" id="ed_date"  placeholder="Eğitim Tarihi">
                                <small>Örneğin 2015 - 2020</small>
                                @error('ed_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="university">Üniversite</label>
                                <input type="text" class="form-control" name="university" id="university" placeholder="Üniversite">
                                @error('university')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="department">Bölüm</label>
                                <input type="text" class="form-control"  name="department" id="department" placeholder="Bölüm">
                                @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Açıklama</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Açıklama">
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="checkbox-button">
                                        <input type="checkbox" id="status" name="status">
                                        <span class="checkmark"></span>
                                        Eğitim Bilgileri Alanında Gösterilme Durumu
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

    <script>
        $('#createbutton').click(function (e)

       {
        /*   e.preventDefault();
          let education_date = document.querySelector('#education_date').value;
          let university = document.querySelector('#university').value;
          let department = document.querySelector('#department').value;
          if ( education_date.trim() == ''){

              Swal.fire({
                  icon: 'info',
                  title: 'Uyarı!',
                  text: 'Email alanı boş kalamaz!',
                  confirmButtonText: 'Tamam',

              })
          }
          else if(university.trim() == ''){

              Swal.fire({
                  icon: 'info',
                  title: 'Uyarı!',
                  text: 'Gecerli bir email adresi yazın!',
                  confirmButtonText: 'Tamam',

              })
          }
          else if (department.trim() == ''){
              Swal.fire({
                  icon: 'info',
                  title: 'Uyarı!',
                  text: 'Parola alanı boş kalamaz!',
                  confirmButtonText: 'Tamam',

              })
          }
          else {
              $('#createEducationForm').submit();
          }*/
      });
</script>
@endsection
