

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
                    <form action="/user/reservation/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                
                                
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
                                    <label for="jam_reservasi">Jam</label>
                                    <input type="time" id="jam_reservasi" name="jam_reservasi" class="form-control" autofocus value="{{ old('jam_reservasi') }}">
                                    @error('jam_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumPeserta_reservasi">Jumlah Peserta</label>
                                    <input type="number" id="jumPeserta_reservasi" name="jumPeserta_reservasi" class="form-control" autofocus value="{{ old('jumPeserta_reservasi') }}">
                                    @error('jumPeserta_reservasi') 
                                    <label class="text-danger ">
                                        {{$message}}
                                    </label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sOrder_reservasi">Specific Order</label>
                                    <textarea class="textarea_editor form-control" rows="15"  style="height:250px" id="sOrder_reservasi" name="sOrder_reservasi">{{ old('sOrder_reservasi') }}</textarea>
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
    <!-- /# column -->
    
    <!-- /# column -->
</div>
@endsection

