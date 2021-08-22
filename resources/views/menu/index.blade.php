@php
    $dataString = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, perferendis tenetur eaque amet neque vitae ratione qui quos a porro esse aspernatur, velit provident quis rem odit inventore dicta nam?";

    // dd($allData);
@endphp

@extends('template.main')

@section('new-style')
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
                <h4 class="card-title">Tabel Menu</h4>
                <div class="table-responsive ">
                    <div class="dt-buttons">
                        <a
                            class="dt-button buttons-copy buttons-html5"
                            tabindex="0"
                            href="menu/tambah">
                            <span>Tambah Data</span>
                        </a>
                        
                    </div>
                    <table id="myTable" class="table table-bordered  table-striped display responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama Menu</th>
                                <th>Jenis Menu</th>
                                <th>Kategori Menu</th>
                                <th>Harga Menu</th>
                                <th>Gambar Menu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $nomor = 1;
                            @endphp

                            @foreach ($allData as $data)
                                <tr>
                                    <td class="text-center">{{ $nomor++ }}</td>
                                    <td class="text-center">{{ $data->nama_menu }}</td>
                                    <td class="text-center">{{ $data->jenis_menu }}</td>
                                    <td class="text-center">{{ $data->kategori_menu }}</td>
                                    <td class="text-center">Rp{{ number_format($data->harga_menu) }},-</td>
                                    <td class="text-center" width="20%">
                                        <img src="{{ url('template-homepage-cp/gambar/menu/'. $data->gbr_menu ) }}" alt="" style="max-width: 150px">
                                    </td>
                                    <td class="text-center">
                                    <a href="menu/ubah/{{ $data->id_menu }}" class="btn btn-warning btn-sm m-b-10 m-l-5">Ubah</a>
                                    <a href="menu/hapus/{{ $data->id_menu }}" class="btn btn-danger btn-sm m-b-10 m-l-5 tombol-hapus">Hapus</a>
                                    
                                    </td>
                                </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
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
@endsection

{{-- {{ dd($allData) }} --}}