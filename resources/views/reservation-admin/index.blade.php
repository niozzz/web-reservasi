
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
            <div class="card-body">
                <h4 class="card-title">Tabel Reservasi</h4>
                <div class="table-responsive ">
                    <div class="dt-buttons">
                        <a
                            class="dt-button buttons-copy buttons-html5"
                            tabindex="0"
                            href="reservation/tambah">
                            <span>Tambah Data</span>
                        </a>
                        
                    </div>
                    <table id="myTable" class="table table-bordered  table-striped display responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Pemesan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Jumlah Peserta</th>
                                <th>Specific Order</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $nomor = 1;
                            @endphp

                            @foreach ($allData as $data)
                                @if ($data->title)
                                    @php
                                    $judul = '';
                                    
                                    // if ($data->title)
                                    // {

                                        $dataJudul = explode(' ', $data->title);
    
                                        // dd($dataJudul);
                                        $jam = str_replace(['[',']'],"", $dataJudul[0]);
                                        $judul = $dataJudul[1];
                                        $jumlahPeserta = str_replace(['(',')'],"", $dataJudul[2]);
    
                                        // balik tanggal
                                        $tanggalReservasi = explode("-", $data->start_event);
                                        $tanggalReservasi = [$tanggalReservasi[2],$tanggalReservasi[1],$tanggalReservasi[0]];
                                        $tanggalReservasi = implode("-", $tanggalReservasi);
                                    // }
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $nomor++ }}</td>
                                    <td>
                                    @if ($data->id_pemesan)
                                    
                                    <button type="button" class="btn btn-success btn-outline m-b-10 m-l-5 btn-block " id="profile{{ $judul .$tanggalReservasi  }}">{{ $judul }}</button>
                                        
                                    @else
                                        {{ $judul }}
                                    @endif
                                    
                                    
                                    </td>
                                    <td>{{ $tanggalReservasi }}</td>
                                    <td>{{ $jam }}</td>
                                    <td>{{ $jumlahPeserta }}</td>
                                    <td>{{ $data->specific_order }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td class="text-center">
                                        
                                        @if ($data->status == 'belum disetujui')
                                        <form action="reservation/confirm" method="POST" style="display:inline">
                                            @csrf
                                            <input type="hidden" name="id_event" value="{{ $data->id }}">
                                            <input type="hidden" name="jumlahPeserta" value="{{ $jumlahPeserta }}">
                                            <input type="hidden" name="max" value="{{ $data->max }}">
                                            <button type="submit" class="btn btn-primary btn-sm m-b-10 m-l-5">Setujui</button>
                                        </form>
                                        @endif
                                        <a href="reservation/hapus/{{ $data->id }}" class="btn btn-danger btn-sm m-b-10 m-l-5 tombol-hapus">Hapus</a>
                                    </td>
                                </tr>
                                @endif
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
            <div class="card-body">
                <div id="calendar" style="margin-left:20%; margin-right:20%;"></div>

            </div>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Pengaturan Link Reservasi</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/administrator/reservation/update-link" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                
                                
                                <div class="form-group">
                                    <label for="link_reservasi1">Link Reservasi Lama</label>
                                    <input type="text" id="link_reservasi1" readonly  class="form-control"  value="{{ $settingData->reservasi_link }}">
                                    
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="link_reservasi2">Link Reservasi Baru</label>
                                    <input type="text" id="link_reservasi2" name="link_reservasi2" class="form-control"  value="{{ old('link_reservasi2') }}">
                                    @error('link_reservasi2') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="" style="color: white">.</label>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Ubah</button>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Pengaturan Slot Maksimal Reservasi</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/administrator/reservation/update-slot" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                
                                
                                <div class="form-group">
                                    <label for="tanggal_reservasi">Tanggal</label>
                                    <input type="date" id="tanggal_reservasi" name="tanggal_reservasi"  class="form-control"  value="{{ old('tanggal_reservasi') }}">
                                    @error('tanggal_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="jumlah_maksimal">Jumlah Maksimal</label>
                                    <input type="number" id="jumlah_maksimal" name="jumlah_maksimal" class="form-control"  value="{{ old('jumlah_maksimal',40) }}">
                                    @error('jumlah_maksimal') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="" style="color: white">.</label>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Ubah</button>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
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

        Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data ' + flashData
        })

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
              events : '/reservation/data-admin',
              

              // izinkan tabel di klik
              // selectable : true,
              // selecthelper: true

              // tambah event
              
          });
      });

      
  </script>
  
<script>

    @foreach ($allData as $data)
    @if ($data->id_pemesan)
    @php
    $dataJudul = explode(' ', $data->title);
    
    // dd($dataJudul);
    $jam = str_replace(['[',']'],"", $dataJudul[0]);
    $judul = $dataJudul[1];

    // balik tanggal
    $tanggalReservasi = explode("-", $data->start_event);
    $tanggalReservasi = [$tanggalReservasi[2],$tanggalReservasi[1],$tanggalReservasi[0]];
    $tanggalReservasi = implode("-", $tanggalReservasi);

    $dataProfile = '';

    // mengambil data profil
    @endphp
    @foreach ($allProfile as $profile)
        @if ($data->id_pemesan == $profile->id)
            @php
            $dataProfile = $profile;
            @endphp
        @endif
    @endforeach
    $('#profile{{ $judul . $tanggalReservasi }}').on('click', function(){
    Swal.fire({
    title: '<strong>Profil Pemesan</strong>',
    icon: 'info',
    html:
       ' <div class="col-lg-12" style="text-align:left;"> <div class="card"> <div class="card-body"> <form class="form p-t-20"> <div class="form-group"> <label >Nama</label> <div class="input-group"> <div class="input-group-addon"><i class="ti-user"></i></div> <input type="text" readonly value="{{ $dataProfile->name }}" class="form-control form-type" id="exampleInputuname"> </div> </div> <div class="form-group"> <label for="exampleInputEmail1">Email</label> <div class="input-group"> <div class="input-group-addon"><i class="ti-email"></i></div> <input type="text" readonly value="{{ $dataProfile->email }}" class="form-control form-type" id="exampleInputEmail1"> </div> </div> <div class="form-group"> <label for="exampleInputEmail1">Alamat</label> <div class="input-group"> <div class="input-group-addon"><i class="ti-home"></i></div> <input type="text" readonly value="{{ $dataProfile->address }}" class="form-control form-type" id="exampleInputEmail1"> </div> </div><div class="form-group"> <label for="exampleInputEmail1">No. HP</label> <div class="input-group"> <div class="input-group-addon"><i class="ti-mobile"></i></div> <input type="text" readonly value="{{ $dataProfile->phone }}" class="form-control form-type" id="exampleInputEmail1"> </div> </div></form> </div> </div> </div> '

    ,
    focusConfirm: false,
    confirmButtonText:
        'Close',
    // confirmButtonColor: '#3085d6',
    
    
    })
    
});
    @endif
    @endforeach
</script>
@endsection

{{-- {{ dd($allData) }} --}}
{{-- <div class="row">
    <div class="col-6">
        nama
    </div>
</div> --}}