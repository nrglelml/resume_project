@extends('layouts.admin')
@section('title')
    Sosyal Medya Hesaplarınız
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">   Sosyal Medya Hesaplarınız </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Sosyal Medya Hesaplarınız</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('admin.social_media-add')}}" class="btn btn-primary btn-block">Yeni  Sosyal Medya Hesabı Ekle</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Sosyal Medya Hesaplarınız</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <th>Gösterilme Sırası</th>
                                <th>Sosyal Medya Platformu</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>Durum</th>
                                <th>Eklenme Tarihi</th>
                                <th>Güncellenme Tarihi</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a data-id="{{$item->id}}" class="btn btn-warning edit" href="{{route('admin.social_media-add' , ['socialmediaID'=>$item->id])}}" >Düzenle<i class="fa fa-edit"></i> </a>
                                    </td>
                                    <td>
                                        <a data-id="{{$item->id}}" href="{{route('admin.social_media-delete',  ['id' => $item->id])}}"  class="btn btn-danger deleteRecord"><i class="fa fa-trash" aria-hidden="true"></i> Sil</a>
                                    </td>
                                    <td>{{ $item->order }}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->link}}</td>
                                    <td>{{$item->icon}}</td>
                                    <td>
                                        @if($item->status)
                                            <a data-id="{{$item->id}}" href="{{route('admin.social_media-changeStatus',  ['id' => $item->id])}}" class="btn btn-success changeStatus">Aktif </a>
                                        @else
                                            <a data-id="{{$item->id}}" href="{{route('admin.social_media-changeStatus',  ['id' => $item->id])}}" class="btn btn-danger changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format("d-m-Y H:i:s")}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->updated_at)->format("d-m-Y H:i:s")}}</td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.changeStatus').click(function (e) {
                e.preventDefault();

                var itemId = $(this).data('id');
                var url = '{{ route("admin.social_media-changeStatus", ":id") }}';
                url = url.replace(':id', itemId);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.success) {
                            var statusText = data.status ? 'Aktif' : 'Pasif';
                            var buttonColor = data.status ? 'success' : 'danger';

                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı!',
                                text: data.educationID + " ID'li kayıt durumu " + statusText + " olarak güncellenmiştir.",
                                confirmButtonText: "Tamam",
                                customClass: {
                                    confirmButton: 'btn btn-' + buttonColor
                                }
                            });

                            if (data.status) {
                                $('.changeStatus[data-id="' + itemId + '"]').text('Aktif').removeClass('btn-danger').addClass('btn-success');
                            } else {
                                $('.changeStatus[data-id="' + itemId + '"]').text('Pasif').removeClass('btn-success').addClass('btn-danger');
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hata!',
                                text: 'Bir hata oluştu.',
                                confirmButtonText: "Tamam",
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                }
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata!',
                            text: 'İstek gönderilirken bir hata oluştu.',
                            confirmButtonText: "Tamam",
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.deleteRecord').click(function (e) {
                e.preventDefault();

                var itemId = $(this).data('id');
                var url = '{{ route("admin.social_media-delete", ":id") }}';
                url = url.replace(':id', itemId);

                Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Bu kaydı silmek istediğinizden emin misiniz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Sil',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire(
                                        'Silindi!',
                                        'Kayıt başarıyla silindi.',
                                        'success'
                                    );
                                    $(e.target).closest('tr').remove();
                                } else {
                                    Swal.fire(
                                        'Hata!',
                                        'Kayıt silinirken bir hata oluştu.',
                                        'error'
                                    );
                                }
                            },
                            error: function () {
                                Swal.fire(
                                    'Hata!',
                                    'İstek gönderilirken bir hata oluştu.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>


@endsection
