
@php
    $allKategori = [];
    foreach ($allData as $data) {
      $allKategori[] = $data->kategori_menu;
    }
    $allKategori = array_unique($allKategori);
    $allKategori = array_values($allKategori);
@endphp
@extends('template.main')

@section('new-style')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Tambah Menu</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/user/reservation/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                
                                
                                <div class="form-group">
                                    <label for="nama_pemesan">Nama Pemesan</label>
                                    <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control" autofocus value="{{ auth()->user()->name }}" readonly>
                                    @error('nama_pemesan') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_reservasi">Tanggal</label>
                                    <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" class="form-control" autofocus value="{{ old('tanggal_reservasi') }}">
                                    @error('tanggal_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jam_reservasi">Jam Mulai</label>
                                    <input type="time" id="jam_reservasi" name="jam_reservasi" class="form-control" autofocus value="{{ old('jam_reservasi') }}">
                                    @error('jam_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jamSelesai_reservasi">Jam Selesai</label>
                                    <input type="time" id="jamSelesai_reservasi" name="jamSelesai_reservasi" class="form-control" autofocus value="{{ old('jamSelesai_reservasi') }}">
                                    @error('jamSelesai_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumPeserta_reservasi" style="margin-bottom: 0px;">Jumlah Peserta</label>
                                    <h6 class="card-subtitle mt-0">Jika peserta lebih dari 40, isikan jumlah peserta dengan 40 dan tambahkan keterangan mengenai jumlah peserta pada kolom <a href="#sOrder_reservasi"> <span class="text-danger"><b>keterangan tambahan</b></span></a>  di bawah.</h6>
                                    <input type="number" id="jumPeserta_reservasi" name="jumPeserta_reservasi" class="form-control" autofocus value="{{ old('jumPeserta_reservasi') }}">
                                    @error('jumPeserta_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="menu_reservasi " >Menu</label>
                                    
                                    <textarea class="textarea_editor form-control" rows="15"  style="height:250px" id="menu_reservasi" name="menu_reservasi" placeholder="Contoh : 
Latte 1
Ayam mentega 2
French Fries 1">{{ old('menu_reservasi') }}</textarea>
                                    @error('menu_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sOrder_reservasi">Keterangan tambahan/bisa tidak diisi</label>
                                    <textarea class="textarea_editor form-control" rows="15"  style="height:250px" id="sOrder_reservasi" name="sOrder_reservasi" placeholder="Contoh : ingin di smoking room">{{ old('sOrder_reservasi') }}</textarea>
                                    @error('sOrder_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah</button>
                                    <a href="/user/reservation" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
                                </div>
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>Daftar Menu</h4>

            </div>
            <div class="card-body">
                <div class="basic-elements">
                    <form action="/user/reservation/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                
                                
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    @for ($i = 0; $i < count($allData); $i++)
                                        @if ($i == 0)
                                            
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active"></li>
                                        @else

                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                                        @endif
                                    @endfor
                                    </ol>
                                    <div class="carousel-inner">
                                        @php
                                            $count = 1;
                                        @endphp
                                        @for ($i = 0; $i < count($allKategori); $i++)
                                            
                                            
                                            @foreach ($allData as $data)
                                            @if ($allKategori[$i] == $data->kategori_menu)
                                                @if ($count == 1)
                                                    <div class="carousel-item active">
                                                    @php
                                                        $count =0;
                                                    @endphp
                                                @else
                                                    <div class="carousel-item">
                                                @endif
                                               
                                                    
                                                
                                                        <img src="{{ asset('template-homepage-cp/gambar/menu/'. $data->gbr_menu) }}" alt="{{ $data->nama_menu }}" width="100%" height="20%">
                                                        <div class="carousel-caption d-block d-md-block">
                                                        <h2 class="style-tabs1">{{ ucwords($data->nama_menu) }}</h2>
                                                        <h3 class="style-tabs3">Rp{{ number_format($data->harga_menu) }},-</h3>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            
                                        @endfor
                                        
                                        
                                       
                                        
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>
                            </div>
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="/menu" target="_blank" class="btn btn-warning btn-block m-b-10">Lihat Menu Lengkap</a>
        </div>
    </div>
    
    
    <!-- /# column -->
    
    <!-- /# column -->
</div>
@endsection

