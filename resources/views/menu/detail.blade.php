@extends('template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title text-center">
                <h4>{{ $dataKonten->judul_menu }}</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                <?php
                                if (empty($dataKonten->gbr_menu)) {
                                    # code...
                                    ?>
                                <img src="{{ url('template-homepage-cp/gambar/aboutus/gambar-kosong.png' ) }}" alt="" width="50%">
                                <?php
                                    }else{

                                        ?>
                                    <img src="{{ url('template-homepage-cp/gambar/aboutus/'. $dataKonten->gbr_menu ) }}" alt="" width="100%">
                                <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="col-lg-6" style="white-space: pre-line"><?= "<p>". $dataKonten->isi_menu ."</p>"; ?></div>
                        </div>
                        
                    
                </div>
                
            </div>
            
        </div>
        <div class="form-group">
            <a href="/administrator/about" class="btn btn-danger btn-flat m-b-10 m-l-5">Kembali</a>
        </div>
    </div>
    <!-- /# column -->
    
    <!-- /# column -->
</div>
@endsection