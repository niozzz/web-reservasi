@extends('template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Tambah Foto Galeri</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/administrator/gallery/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="album_gallery">Keterangan</label>
                                    <textarea class="textarea_editor form-control" rows="15" placeholder="Keterangan foto.." style="height:250px" id="album_gallery" name="album_gallery"></textarea>
                                    @error('album_gallery') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                
                                
                                

                            {{-- </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    
                                    <img src="{{ url('template-homepage-cp/img/6-2-coffee-png-hd.png' ) }}" alt="" width="50%">
                                </div> --}}

                                <div class="form-group">
                                    <label for="gambar_gallery">Gambar</label>
                                    <input type="file" id="gambar_gallery" name="gambar_gallery" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah</button>
                                    <a href="/administrator/gallery" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
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