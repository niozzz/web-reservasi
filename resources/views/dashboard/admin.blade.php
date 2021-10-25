<?php

$allKategori = [];
foreach ($allData as $data) {
    $allKategori[] = $data->kategori_menu;
}
$allKategori = array_unique($allKategori);
$allKategori = array_values($allKategori);

$allMenu = [];
foreach ($allData as $data) {
    $allMenu[] = $data->jenis_menu;
}
$allMenu = array_unique($allMenu);
$allMenu = array_values($allMenu);

// dd($allMenu);

?>

@extends('template.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="#" id="jumlahKategori">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-menu-alt f-s-40 color-primary"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>{{ count($allKategori) }}</h4>
                        <p class="m-b-0">Jumlah Kategori</p>
                    </div>
                </div>
            </div>
        </a>
        </div>
        <div class="col-md-3">
            <a href="#" id="jumlahMenu">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-menu-alt f-s-40 color-success"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>{{ count($allMenu) }}</h4>
                        <p class="m-b-0">Jumlah Menu</p>
                    </div>
                </div>
            </div>
        </a>
        </div>
        
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-comment-alt f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>{{ count($allContactData) }}</h4>
                        <p class="m-b-0">Pesan Masuk</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-location-pin f-s-40 color-danger"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>278</h4>
                        <p class="m-b-0">Total Visitor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-title">
                    <h4>Recent Orders </h4>
                    
  
  
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Asus-565</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


<div class="flash-data" data-flashdata="{{ session('pesan') }}"></div>
@endsection

@section('basic-script')
<script src="{{ asset('template-dashboard') }}/js/sweetalert2/sweetalert2.all.min.js"></script>
@endsection

@section('new-script')
    <script>
    const flashData = $('.flash-data').data('flashdata');


    // kategori
    const jumlahKategori = {{ count($allKategori) }};
    @php
        $arrayKategori = json_encode($allKategori);
        echo "var arrayKategori = " . $arrayKategori. "; ";
    @endphp
    
    let s1 = '<div class="col-lg-12" style="text-align:left;"> <div class="card" style="height:250px; overflow:scroll; overflow-x:hidden;"> <div class="card-body"> ';
    let s2 = '';
    for (i = 0 ; i < jumlahKategori; i++)
    {
        s2 += '<form method="POST" action="/administrator/ubah-kategori" class="form"> @csrf <div class="form-group"> <div class="input-group"> <div class="input-group-addon"></div> <input type="hidden" name="nama_kategori1" value="' + arrayKategori[i] +'" class="form-control"><input type="text" name="nama_kategori2" value="' + arrayKategori[i] +'" class="form-control"> <button type="submit" class="btn btn-warning pt-2">Ubah</button> </div> </div></form>';
    }

    // console.log(s2);

    
    let s3 = ' </div> </div></div>';
        $('#jumlahKategori').on('click', function(e){
            e.preventDefault();
    Swal.fire({
    title: '<strong>Daftar Kategori</strong>',
    html: s1.concat(s2,s3)
    ,
    focusConfirm: false,
    confirmButtonText:
        'Close',
    // confirmButtonColor: '#3085d6',
    
    
    })
    
});

    // Menu
    const jumlahMenu = {{ count($allMenu) }};
    @php
        $arrayMenu = json_encode($allMenu);
        echo "var arrayMenu = " . $arrayMenu. "; ";
    @endphp
    
    let sm1 = '<div class="col-lg-12" style="text-align:left;"> <div class="card" style="height:250px; overflow:scroll; overflow-x:hidden;"> <div class="card-body"> ';
    let sm2 = '';
    for (i = 0 ; i < jumlahMenu; i++)
    {
        sm2 += '<form method="POST" action="/administrator/ubah-menu" class="form"> @csrf <div class="form-group"> <div class="input-group"> <div class="input-group-addon"></div> <input type="hidden" name="nama_menu1" value="' + arrayMenu[i] +'" class="form-control"><input type="text" name="nama_menu2" value="' + arrayMenu[i] +'" class="form-control"> <button type="submit" class="btn btn-warning pt-2">Ubah</button> </div> </div></form>';
    }

    // console.log(s2);

    
    let sm3 = ' </div> </div></div>';
        $('#jumlahMenu').on('click', function(e){
            e.preventDefault();
    Swal.fire({
    title: '<strong>Daftar Menu</strong>',
    html: sm1.concat(sm2,sm3)
    ,
    focusConfirm: false,
    confirmButtonText:
        'Close',
    // confirmButtonColor: '#3085d6',
    
    
    })
    
});


if (flashData == "berhasil ditambahkan" || flashData == "berhasil dihapus" || flashData == "berhasil diubah")
{
    // Swal.fire({
    //     icon: 'success',
    //     title: 'Berhasil!',
    //     text: 'Data' . flashData
    // })

        Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data ' + flashData
        })

}

    </script>
@endsection