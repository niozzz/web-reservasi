@extends('template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h2>Detail Foto</h2>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    
                        <div class="row">
                            <div class="col-lg-6 text-center">
                                
                                    <img src="{{ url('template-homepage-cp/gambar/gallery/'. $dataKonten->gbr_gal ) }}" alt="" width="100%" class="img-thumbnail">
                                
                                
                            </div>
                            <div class="col-lg-6 text-dark" style="white-space: pre-line; font-size:26px"><label>Keterangan :</label>
                            <?= "<p>". $dataKonten->album_gal ."</p>"; ?></div>
                        </div>
                        
                    
                </div>
                
            </div>
            
        </div>
        <div class="form-group">
            <a href="/administrator/gallery" class="btn btn-danger btn-flat m-b-10 m-l-5">Kembali</a>
        </div>
    </div>
    <!-- /# column -->
    
    <!-- /# column -->
</div>
@endsection