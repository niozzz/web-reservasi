

@extends('template.main')

@section('new-style')
<link rel="stylesheet" href="{{ asset('template-homepage-cp') }}/js/fullcalendar.css">
{{-- <link href="{{ asset('template-dashboard') }}/css/lib/sweetalert/sweetalert.css" rel="stylesheet"/> --}}
    <style>
        .wordwrap { 
   /* white-space: pre-line;      CSS3    */
   
}
    
    </style>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body text-center">
                <h3>Selamat datang, silahkan klik tombol dibawah ini untuk melakukan reservasi</h3>
                <div class="dt-buttons">
                    <a
                        class="btn btn-primary"
                        tabindex="0"
                        href="reservation/tambah">
                        <span>Tambah Data Reservasi</span>
                    </a>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Reservasi</h4>
                <div class="table-responsive ">
                    {{-- <div class="dt-buttons">
                        <a
                            class="dt-button buttons-copy buttons-html5"
                            tabindex="0"
                            href="reservation/tambah">
                            <span>Tambah Data Reservasi</span>
                        </a>
                        
                    </div> --}}
                    <table id="myTable" class="table table-bordered  table-striped display responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Jumlah Peserta</th>
                                <th>Menu</th>
                                <th>Specific Order</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $nomor = 1;
                                $nmodal = 0;
                            @endphp

                            @foreach ($allData as $data)
                                @if ($data->id_pemesan == Auth::user()->id)
                                    
                                
                                <tr>
                                    @php
                                    $dataJudul = explode(' ', $data->title);

                                    // dd($dataJudul);
                                    $jam = str_replace(['[',']'],"", $dataJudul[0]);
                                    $judul = $dataJudul[1];
                                    $jumlahPeserta = str_replace(['(',')'],"", $dataJudul[2]);

                                    // balik tanggal
                                    $tanggalReservasi = explode("-", $data->start_event);
                                    $tanggalReservasi = [$tanggalReservasi[2],$tanggalReservasi[1],$tanggalReservasi[0]];
                                    $tanggalReservasi = implode("-", $tanggalReservasi);
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $judul }}</td>
                                    <td>{{ $tanggalReservasi }}</td>
                                    <td>{{ $jam }}</td>
                                    <td>{{ $data->jam_selesai }}</td>
                                    <td>{{ $jumlahPeserta }}</td>
                                    <td><button type="button" class="btn btn-warning btn-sm  btn-block " id="menu{{ $nmodal  }}">Detail</button>
                                    
                                    </td>
                                    <td>{{ $data->specific_order }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td class="text-center">
                                        <a href="reservation/hapus/{{ $data->id }}" class="btn btn-danger btn-sm m-b-10 m-l-5 tombol-hapus">Hapus</a>
                                    </td>
                                </tr>
                                @endif
                                @php
                                    $nmodal +=1;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body text-center">
                <h5>Setelah mengajukan reservasi, silahkan melakukan pembayaran melalui link dibawah ini. <br> Setelah berhasil melakukan pembayaran status reservasi akan 'disetujui' yang artinya anda telah berhasil melakukan reservasi</h5>
                <div class="dt-buttons">
                    <a
                        class="btn btn-success buttons-copy buttons-html5"
                        tabindex="0"
                        href="https://api.whatsapp.com/send/?phone=62895359786283&text&app_absent=0"
                        target="_blank"
                        >
                        <span>Pembayaran</span>
                    </a>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-12">
        
        <div class="card">
            <div class="card-body">
                <h5>
                    Berikut merupakan data sisa slot tanggal berapa saja yang sudah direservasi :
                </h5>
                <div id="calendar" style="margin-left:20%; margin-right:20%;"></div>

            </div>
        </div>
        
    </div>
</div>


{{-- flash data --}}
<div class="flash-data" data-flashdata="{{ session('pesan') }}"></div>
<!-- End PAge Content -->


@endsection

@section('basic-script')
{{-- sweet alert 2 --}}
<script src="{{ asset('template-dashboard') }}/js/sweetalert2/sweetalert2.all.min.js"></script>
<script src="{{ asset('template-homepage-cp') }}/js/moment.min.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/js/fullcalendar.min.js"></script>
<script>

const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData == "berhasil ditambahkan" || flashData == "berhasil dihapus" || flashData == "berhasil diubah")
{
    // Swal.fire({
    //     icon: 'success',
    //     title: 'Berhasil!',
    //     text: 'Data' . flashData
    // })
        
        if (flashData == "berhasil ditambahkan")
        {

            Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Pengajuan reservasi telah berhasil dibuat, silahkan melakukan pembayaran'
            })
        }else
        {

            Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data ' + flashData
            })
        }




}else if (flashData == "tanggal gagal ditambahkan")
{
    Swal.fire({
        icon: 'warning',
        title: 'Gagal',
        text: 'Tanggal sudah penuh!'
        })
}
else if (flashData == "jumlah tidak valid")
{
    Swal.fire({
        icon: 'warning',
        title: 'Gagal',
        text: 'Jumlah peserta melebihi kapasitas!'
        })
}
else if (flashData == "jam tidak valid")
{
    Swal.fire({
        icon: 'warning',
        title: 'Gagal',
        text: 'Jam mulai dan jam selesai tidak valid!'
        })
}



$('.tombol-hapus').on('click', function(e){

    e.preventDefault();
    const simpanLink = $(this).attr('href');
    // const hapusLink = $(this).removeAttr('href');

    Swal.fire({
    title: 'Apakah Anda yakin?',
    text: "Data yang dihapus akan hilang permanen",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus!',
    cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {

            document.location.href = simpanLink;

            
        }
    });
});

    @php
        $nmodal = 0;
    @endphp
    @foreach ($allData as $data)
    
    
    
    $('#menu{{  $nmodal}}').on('click', function(){
    Swal.fire({
    title: '<strong>Menu yang dipesan</strong>',
    icon: 'info',
    html:
       ' <div class="col-lg-12" style="text-align:left;"> <div class="card"> <div class="card-body"> <form class="form"> <div class="form-group mb-0"> <label>{!! $data->menu !!}</label> </div> </form> </div> </div></div>'

    ,
    focusConfirm: false,
    confirmButtonText:
        'Close',
    // confirmButtonColor: '#3085d6',
    
    
    })
    
});
    
    @php
        $nmodal +=1;
    @endphp
    @endforeach


</script>

<script>
    //jquery
    $(document).ready(function(){
          var calendar = $('#calendar').fullCalendar({
              //bisa diedit
              // editable : false,

              // mengatur header kalender
              header: {
                  left : 'prev, next today',
                  center : 'title',
                  right : ''
              },

              // menampilkan data dari database
              events : '/reservation/data-user',

              // izinkan tabel di klik
              // selectable : true,
              // selecthelper: true

              // tambah event
              
          });
      });
  </script>
@endsection

{{-- {{ dd($allData) }} --}}