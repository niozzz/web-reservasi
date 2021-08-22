@extends('template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Ubah Konten</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/administrator/about/update/{{ $dataKonten->id_abt }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                
                                
                                <div class="form-group">
                                    <label for="judul_about">Judul</label>
                                    <input type="text" id="judul_about" name="judul_about" class="form-control" autofocus placeholder="Judul" value="{{ $dataKonten->judul_abt }}">
                                    @error('judul_about') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="isi_about">Isi</label>
                                    <textarea class="textarea_editor form-control" rows="15" placeholder="Isi konten" style="height:250px" id="isi_about" name="isi_about"><?= $dataKonten->isi_abt ?></textarea>
                                    @error('isi_about') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                
                                
                                

                            

                                <div class="form-group">
                                    <label for="gambar_about">Gambar</label>
                                    <input type="file" id="gambar_about" name="gambar_about" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Ubah</button>
                                    <a href="/administrator/about" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
                                </div>
                            
                            </div>
                            <div class="col-lg-6 text-center">
                                <?php
                                if (empty($dataKonten->gbr_abt)) {
                                    # code...
                                    ?>
                                <img src="{{ url('template-homepage-cp/gambar/aboutus/gambar-kosong.png' ) }}" alt="" width="50%">
                                <?php
                                    }else{

                                        ?>
                                    <img src="{{ url('template-homepage-cp/gambar/aboutus/'. $dataKonten->gbr_abt ) }}" alt="" width="100%">
                                <?php
                                    }
                                ?>
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    
    <!-- /# column -->
</div>
@endsection