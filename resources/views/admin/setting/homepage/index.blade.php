@extends('template.main')

@section('new-style')
    <style>
        .tab-content{
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengaturan Halaman Home</h4>
                <!-- Nav tabs -->
                <div class="vtabs">
                    <ul class="nav nav-tabs tabs-vertical" role="tablist">

                        @php
                            $count =1 ;
                        @endphp
                        @foreach ($allData as $data)
                        @if ($count > 0)
                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#{{ $data->id_setting }}" role="tab" aria-selected="true"><span class="hidden-xs-down">{{ $data->nama_setting }}</span> </a> </li>
                        @else
                            <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#{{ $data->id_setting }}" role="tab" aria-selected="true"><span class="hidden-xs-down">{{ $data->nama_setting }}</span> </a> </li>
                        @endif
                        
                        @php
                            $count -=1;
                        @endphp
                        @endforeach
                        
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @php
                            $count =1 ;
                        @endphp
                        @foreach ($allData as $data)
                            @if ($count > 0)
                            <div class="tab-pane active show" id="{{ $data->id_setting }}" role="tabpanel">
                            @else
                            <div class="tab-pane show" id="{{ $data->id_setting }}" role="tabpanel">
                            @endif
                            <div class="p-20">
                                <p id="text-{{ $data->id_setting }}">{{ $data->teks }}</p>
                            </div>
                            <a href="homepage/ubah/{{ $data->id_setting }}" class="btn btn-primary btn-outline m-b-10 m-l-5" id="tombol-ubah">Warning</a>
                        </div>
                            @php
                                $count -=1;
                            @endphp
                        @endforeach
                        {{-- @php
                            dd($count);
                        @endphp --}}
                        
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
// console.log(flashData);

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

$('#tombol-ubah').on('click',async function(){

    Swal.fire({
    html:
    '<form action="homepage/update-slogan1" method="POST" enctype="multipart/form-data"> <div class="col-lg-12"> <div class="form-group"> <label for="sOrder_reservasi">Specific Order</label> <textarea class="textarea_editor form-control" rows="15" style="height:250px" id="sOrder_reservasi" name="sOrder_reservasi"></textarea> </div> <div class="form-group"> <button type="submit" class="btn btn-primary btn-flat ">Tambah</button> <a href="/administrator/reservation" class="btn btn-danger btn-flat ">Batal</a> </div> </div>  </form>',
    
    
    
})
    
});

        
    </script>
@endsection