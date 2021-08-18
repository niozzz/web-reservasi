@extends('template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Tambah Konten</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="judul_about">Judul</label>
                                    <input type="text" id="judul_about" name="judul_about" class="form-control" autofocus placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="isi_about">Isi</label>
                                    <textarea class="textarea_editor form-control" rows="15" placeholder="Isi konten" style="height:250px"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_about">Gambar</label>
                                    <input type="file" id="gambar_about" name="gambar_about" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah</button>
                                    <a href="/administrator/about" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
                                </div>
                                

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