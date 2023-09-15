@extends('layouts.admin')
@section('title')
   Portfolio Yönetimi
@endsection
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Portfolio Yönetimi </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                    <li class="breadcrumb-item active " aria-current="page" >  Portfolio Yönetimi </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="{{route('portfolio.store')}}" method="POST" id="portfolioForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Başlık</label>
                                <input type="text" class="form-control"name="title" id="title"  placeholder="Başlık">
                            </div>
                            <div class="form-group">
                                <label for="tags">Etiketler</label>
                                <input type="text" class="form-control"name="tags" id="tags"  placeholder="Etiketler">
                            </div>
                            <div class="form-group">
                                <label for="about">Portfolio Hakkında</label><br>
                                <textarea cols="80" id="about" name="about" rows="10"
                                          data-sample-short="" >
                            </textarea>
                            </div>
                            <div class="form-group">
                                <label for="website">Websitesi</label>
                                <input type="text" class="form-control"name="website" id="website"  placeholder="Websitesi">
                            </div>
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" class="form-control"name="keywords" id="keywords"  placeholder="Keywords">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                       placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="images">
                                    Portfolio Görselleri
                                </label><br>
                                <input type="file" multiple name="images" id="images">
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="checkbox-button">
                                        <input type="checkbox" id="status" name="status" >
                                        <span class="checkmark"></span>
                                        Portfolio Alanında Gösterilme Durumu
                                    </label>

                                </div>

                            <button type="submit" class="btn btn-primary mr-2" id="createButton">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @section('js')
            {{--    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>--}}
            {{--    <script src=" {{ asset('assets/ckeditor/samples/js/sample.js') }}"></script>--}}
            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

            <script>
                var options = {
                    filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token='
                };
                var about = CKEDITOR.replace('about', options
                    // {
                    // extraAllowedContent: 'div',
                    // height: 150,

                    // }
                );
                @isset($portfolio)
                $('#createButton').click(function ()
                {
                    if ($('#title').val().trim() == '')
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Uyarı !',
                            text: "Başlık alanı boş bırakılamaz.",
                            confirmButtonText: "Tamam"
                        });
                    }
                    else if ($('#tags').val().trim() == '')
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Uyarı !',
                            text: "Etiket alanı boş bırakılamaz.",
                            confirmButtonText: "Tamam"
                        });
                    }
                    else
                    {
                        $('#portfolioForm').submit();
                    }
                });
                @else
                $('#images').change(function ()
                {
                    let images = $(this);
                    let imageCheckStatus = imageCheck(images);
                });

                function imageCheck(images)
                {
                    console.log(images.val());

                    let length = images[0].files.length;
                    let files = images[0].files;
                    let checkImage = ['png', 'jpg', 'jpeg'];
                    for (let i = 0; i < length; i++)
                    {
                        let type = files[i].type.split('/').pop();
                        let size = files[i].size;
                        if ($.inArray(type, checkImage) == '-1')
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Uyarı !',
                                text: "Seçilen " + files[i].name + "'ine sahip resim belirlenen formatlarda değildir. .png, .jpg, .jpeg formatlarından birisi olmalıdır.",
                                confirmButtonText: "Tamam"
                            });
                            return false;
                        }
                        if (size > 2048000)
                        {
                            Swal.fire({
                                icon: 'error',
                                title: 'Uyarı !',
                                text: "Seçilen " + files[i].name + "'i resmi 2MB'tan fazla olamaz.",
                                confirmButtonText: "Tamam"
                            });
                            return false;
                        }
                    }

                    return true;
                }

                $('#createButton').click(function ()
                {
                    let imageCheckStatus = imageCheck($('#images'));

                    if (!imageCheckStatus)
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Uyarı !',
                            text: "Seçtiğiniz resimleri kontrol edin.",
                            confirmButtonText: "Tamam"
                        });
                    }
                    else if ($('#title').val().trim() == '')
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Uyarı !',
                            text: "Başlık alanı boş bırakılamaz.",
                            confirmButtonText: "Tamam"
                        });
                    }
                    else if ($('#tags').val().trim() == '')
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'Uyarı !',
                            text: "Etiket alanı boş bırakılamaz.",
                            confirmButtonText: "Tamam"
                        });
                    }
                    else
                    {
                        $('#portfolioForm').submit();
                    }
                });
                @endisset
            </script>
@endsection
