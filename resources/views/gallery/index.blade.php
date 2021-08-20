

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
                <h4 class="card-title">Tabel Galeri</h4>
                <div class="table-responsive ">
                    <div class="dt-buttons">
                        <a
                            class="dt-button buttons-copy buttons-html5"
                            tabindex="0"
                            href="gallery/tambah">
                            <span>Tambah Data</span>
                        </a>
                        
                    </div>
                    <table id="myTable" class="table table-bordered  table-striped display responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Keterangan</th>
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
                                <td class="wordwrap">
                                @php

                                    $arrayString = explode(" ",$data->album_gal);

                                    if (count($arrayString) >= 8)
                                    {

                                        $temp = [];
                                        for ($i=0; $i < 8 ; $i++) { 
                                            $temp[] = $arrayString[$i];
                                        }
                                        $newString = implode(" ", $temp);
                                        $newString = $newString . "...";
                                    }else {
                                        $temp = [];
                                        for ($i=0; $i < count($arrayString) ; $i++) { 
                                            $temp[] = $arrayString[$i];
                                        }
                                        $newString = implode(" ", $temp);
                                        $newString = $newString . "...";
                                    }

                                @endphp
                                {{ $newString }}
                                </td>
                                <td class="text-center" width="40%">
                                    <?php
                                        if ((empty($data->gbr_gal) || ($data->gbr_gal == '')))
                                        {
                                    ?>
                                            Gambar tidak tersedia
                                    <?php
                                        }else
                                        {
                                    ?>
                                            <img src="{{ url('template-homepage-cp/gambar/gallery/'. $data->gbr_gal ) }}" alt="" style="max-width: 150px"></td>
                                    <?php
                                        }
                                    ?>
                                   
                                    
                                <td class="text-center">
                                    <a href="gallery/detail/{{ $data->id_gal }}" class="btn btn-primary btn-sm m-b-10 m-l-5 ">Detail</a>
                                    <a href="gallery/ubah/{{ $data->id_gal }}" class="btn btn-warning btn-sm m-b-10 m-l-5">Ubah</a>
                                    <a href="gallery/hapus/{{ $data->id_gal }}" class="btn btn-danger btn-sm m-b-10 m-l-5 tombol-hapus">Hapus</a>
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