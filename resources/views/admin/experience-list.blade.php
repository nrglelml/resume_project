@extends('layouts.admin')
@section('title')
    Deneyim Bilgileri Listesi
@endsection
@section('content')
    <div class="page-header">
        <h3 class="page-title">  Deneyim Bilgileri Listesi </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Admin Paneli</a></li>
                <li class="breadcrumb-item active" aria-current="page">Deneyim Bilgileri Listesi</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{route('admin.experience-add')}}" class="btn btn-primary btn-block">Yeni Deneyim Bilgisi Ekle</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Deneyim Bilgileri Serisi</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                                <th>Gösterilme Sırası</th>
                                <th>Çalışma Tarihi</th>
                                <th>Şirket Adı</th>
                                <th>Çalıştığınız Pozisyon</th>
                                <th>Açıklama</th>
                                <th>Durum</th>
                                <th>Aktiflik</th>
                                <th>Eklenme Tarihi</th>
                                <th>Güncellenme Tarihi</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a data-id="{{$item->id}}" class="btn btn-warning edit" href="{{route('admin.experience-add' , ['experienceID'=>$item->id])}}" >Düzenle<i class="fa fa-edit"></i> </a>
                                    </td>
                                    <td>
                                        <a data-id="{{$item->id}}" href="{{route('admin.experience-delete' ,  ['id' => $item->id])}}"  class="btn btn-danger deleteRecord">Sil<i class="fa fa-trash" aria-hidden="true"></i> </a>
                                    </td>

                                    <td>{{$item->order}}</td>
                                    <td>{{$item->date}}</td>
                                    <td>{{$item->company_name}}</td>
                                    <td>{{$item->task_name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        @if($item->status)
                                            <a data-id="{{$item->id}}" href="{{route('admin.experience-changeStatus',  ['id' => $item->id])}}" class="btn btn-success changeStatus">Aktif </a>
                                        @else
                                            <a data-id="{{$item->id}}" href="{{route('admin.experience-changeStatus',  ['id' => $item->id])}}" class="btn btn-danger changeStatus">Pasif</a>
                                        @endif
                                    </td>
                                    <td>@if($item->active)
                                            <a data-id="{{$item->id}}" href="{{route('admin.experience-activeStatus',  ['id' => $item->id])}}" class="btn btn-success activeStatus">Aktif </a>
                                        @else
                                            <a data-id="{{$item->id}}" href="{{route('admin.experience-activeStatus',  ['id' => $item->id])}}" class="btn btn-danger activeStatus">Pasif</a>
                                        @endif</td>
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
    <!--<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }
        });

        $('.changeStatus').click(function ()
        {
            // let educationID = $(this).data('id');
            let experienceID = $(this).attr('data-id');
            let self = $(this);
            $.ajax({
                url: "{{ route('admin.experience-changeStatus', ":id") }}",
                // method: "POST"
                type: "POST",
                async: false,
                data: {
                    experienceID: experienceID
                },
                success: function (response)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı !',
                        text: response.experienceID + " ID'li kayıt durumu " + response.newStatus + " olarak güncellenmiştir.",
                        confirmButtonText: "Tamam"
                    });


                    if (response.status == 1)
                    {
                        self[0].innerHTML = "Aktif";
                        self.removeClass("btn-danger");
                        self.addClass("btn-success");
                    }
                    else if (response.status == 0)
                    {
                        self[0].innerHTML = "Pasif";
                        self.removeClass("btn-success");
                        self.addClass("btn-danger");
                    }

                },
                error: function ()
                {

                }
            });
            // }).done(function ()
            // {
            //
            // }).fail(function ()
            // {
            //
            // });

        });

        $('.activeStatus').click(function ()
        {
            // let educationID = $(this).data('id');
            let experienceID = $(this).attr('data-id');
            let self = $(this);
            $.ajax({
                url: "{{ route('admin.experience-activeStatus', ":id") }}",
                // method: "POST"
                type: "POST",
                async: false,
                data: {
                    experienceID: experienceID
                },
                success: function (response)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı !',
                        text: response.experienceID + " ID'li kayıt active durumu " + response.newActive + " olarak güncellenmiştir.",
                        confirmButtonText: "Tamam"
                    });


                    if (response.active == 1)
                    {
                        self[0].innerHTML = "Aktif";
                        self.removeClass("btn-danger");
                        self.addClass("btn-success");
                    }
                    else if (response.active == 0)
                    {
                        self[0].innerHTML = "Pasif";
                        self.removeClass("btn-success");
                        self.addClass("btn-danger");
                    }

                },
                error: function ()
                {

                }
            });
        });



        $('.deleteEducation').click(function ()
        {
            let educationID = $(this).attr('data-id');

            Swal.fire({
                title: "Emin misiniz?",
                text: educationID + " ID'li eğitim bilgisini silmek istediğinize emin misiniz? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet',
                cancelButtonText: 'Hayır'
            }).then((result) =>
            {
                if (result.isConfirmed)
                {
                    $.ajax({
                        url: "{{ route('admin.experience-delete', ":id") }}",
                        // method: "POST"
                        type: "POST",
                        async: false,
                        data: {
                            educationID: educationID
                        },
                        success: function (response)
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Başarılı !',
                                text: "Silme işlemi başarılı.",
                                confirmButtonText: "Tamam"
                            });
                            $("tr#" + educationID).remove();

                        },
                        error: function ()
                        {

                        }
                    });
                }
            })




        });

    </script>-->
@endsection
