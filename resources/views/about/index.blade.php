@php
    $dataString = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, perferendis tenetur eaque amet neque vitae ratione qui quos a porro esse aspernatur, velit provident quis rem odit inventore dicta nam?";

    // dd($allData);
@endphp

@extends('template.main')

@section('new-style')
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
                <h4 class="card-title">About Us Data Table</h4>
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

                                    $arrayString = explode(" ",$data->isi_abt);

                                    if (count($arrayString) >= 5)
                                    {

                                        $temp = [];
                                        for ($i=0; $i < 5 ; $i++) { 
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
                                <td class="text-center" width="20%"><img src="{{ url('template-homepage-cp/gambar/aboutus/'. $data->gbr_abt ) }}" alt="" style="max-width: 150px"></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm m-b-10 m-l-5">Detail</button>
                                    <button type="button" class="btn btn-warning btn-sm m-b-10 m-l-5">Ubah</button>
                                    <button type="button" class="btn btn-danger btn-sm m-b-10 m-l-5">Hapus</button>
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
<!-- End PAge Content -->
@endsection

@section('basic-script')
<script>
// $('#myTable').DataTable( {
//     responsive: true
// } );
</script>
@endsection

{{-- {{ dd($allData) }} --}}