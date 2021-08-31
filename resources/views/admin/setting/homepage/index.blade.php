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
                        <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#slogan1" role="tab" aria-selected="true"><span class="hidden-xs-down">Slogan 1</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#slogan2" role="tab" aria-selected="true"><span class="hidden-xs-down">Slogan 2</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#quote1" role="tab" aria-selected="true"><span class="hidden-xs-down">Quote 1</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#quote2" role="tab" aria-selected="true"><span class="hidden-xs-down">Quote 2</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#quote3" role="tab" aria-selected="true"><span class="hidden-xs-down">Quote 3</span> </a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#hour" role="tab" aria-selected="true"><span class="hidden-xs-down">Opening Closed Hour</span> </a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active show" id="slogan1" role="tabpanel">
                            <div class="p-20">
                                <p id="text-slogan1">{{ $settingData->home_slogan1 }}</p>
                            </div>
                            <button type="button" class="btn btn-primary btn-outline m-b-10 m-l-5" id="tombol-ubah">Warning</button>
                        </div>
                        <div class="tab-pane" id="slogan2" role="tabpanel">
                            <div class="p-20">
                                <p id="text-slogan2">{{ $settingData->home_slogan2 }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="quote1" role="tabpanel">
                            <div class="p-20">
                                <p id="text-quote1">{{ $settingData->home_quote1 }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="quote2" role="tabpanel">
                            <div class="p-20">
                                <p id="text-quote2">{{ $settingData->home_quote2 }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="quote3" role="tabpanel">
                            <div class="p-20">
                                <p id="text-quote3">{{ $settingData->home_quote3 }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="hour" role="tabpanel">
                            <div class="p-20">
                                <p id="text-hour">{{ $settingData->home_hour }}</p>
                            </div>
                        </div>
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