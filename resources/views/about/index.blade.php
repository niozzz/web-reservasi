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
                <h4 class="card-title">Tabel Konten Tentang Kami</h4>
                <div class="table-responsive ">
                    <div class="dt-buttons">
                        <a
                            class="dt-button buttons-copy buttons-html5"
                            tabindex="0"
                            href="about/tambah">
                            <span>Tambah Data</span>
                        </a>
                        
                    </div>
                    <table id="myTable" class="table table-bordered  table-striped display responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Judul</th>
                                <th>Isi Konten</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $nomor = 1;
                            @endphp

                            @foreach ($allData as $data)
                                
                            <tr>
                                <td class="wordwrap" width="5%">{{ $nomor++ }}</td>
                                <td class="wordwrap" width="20%">{{ $data->judul_abt }}</td>
                                <td class="wordwrap" width="30%">
                                @php

                                    // $arrayString = explode(" ",$data->isi_abt);

                                    // if (count($arrayString) >= 5)
                                    // {

                                    //     $temp = [];
                                    //     for ($i=0; $i < 5 ; $i++) { 
                                    //         $temp[] = $arrayString[$i];
                                    //     }
                                    //     $newString = implode(" ", $temp);
                                    //     $newString = $newString . "...";
                                    // }else {
                                    //     $temp = [];
                                    //     for ($i=0; $i < count($arrayString) ; $i++) { 
                                    //         $temp[] = $arrayString[$i];
                                    //     }
                                    //     $newString = implode(" ", $temp);
                                    //     $newString = $newString . "...";
                                    // }

                                @endphp
                                {!!  substr($data->isi_abt, 0, 25) . '...' !!}
                                {{-- {{ $newString }} --}}
                                </td>
                                <td class="text-center" width="20%">
                                    <?php
                                        if ((empty($data->gbr_abt) || ($data->gbr_abt == '')))
                                        {
                                    ?>
                                            Gambar tidak tersedia
                                    <?php
                                        }else
                                        {
                                    ?>
                                            <img src="{{ url('template-homepage-cp/gambar/aboutus/'. $data->gbr_abt ) }}" alt="" style="max-width: 150px"></td>
                                    <?php
                                        }
                                    ?>
                                   
                                    
                                <td class="text-center">
                                    <a href="about/detail/{{ $data->id_abt }}" class="btn btn-primary btn-sm m-b-10 m-l-5 ">Detail</a>
                                    <a href="about/ubah/{{ $data->id_abt }}" class="btn btn-warning btn-sm m-b-10 m-l-5">Ubah</a>
                                    <a href="about/hapus/{{ $data->id_abt }}" class="btn btn-danger btn-sm m-b-10 m-l-5 tombol-hapus">Hapus</a>
                                    {{-- <div class="sweetalert m-t-15">
                                        <button class="btn btn-warning btn sweet-confirm">Sweet Confirm</button>
                                    </div> --}}
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