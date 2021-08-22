@extends('template.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4>Tambah Menu</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/administrator/menu/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                
                                
                                <div class="form-group">
                                    <label for="nama_menu">Nama Menu</label>
                                    <input type="text" id="nama_menu" name="nama_menu" class="form-control" autofocus >
                                    @error('nama_menu') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                    
                                </div>
                                <div class="form-group">
                                    <label for="jenis_menu">Jenis Menu</label>
                                    <input type="text" id="jenis_menu" name="jenis_menu" class="form-control" autofocus >
                                    @error('jenis_menu') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                    
                                </div>
                                <div class="form-group">
                                    <label for="kategori_menu">Kategori Menu</label>
                                    <input type="text" id="kategori_menu" name="kategori_menu" class="form-control" autofocus >
                                    @error('kategori_menu') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="harga_menu">Harga Menu</label>
                                    <input type="number" id="harga_menu" name="harga_menu" class="form-control" autofocus >
                                    @error('harga_menu') 
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
                                    <label for="gambar_menu">Gambar</label>
                                    <input type="file" id="gambar_menu" name="gambar_menu" class="form-control">
                                    @error('harga_menu') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah</button>
                                    <a href="/administrator/menu" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
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