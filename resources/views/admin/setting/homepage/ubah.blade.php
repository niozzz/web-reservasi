@extends('template.main')

@section('content')


    <!-- Start Page Content -->
    <div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-title">
    <h4>Ubah {{  ucwords($settingData->nama_setting) }}</h4>

</div>
<div class="card-body">
    <div class="basic-elements">
        <form action="/administrator/setting/homepage/update/{{ $settingData->id_setting }}" method="POST" enctype="multipart/form-data">
            @csrf
                                    <div class="row">
                <div class="col-lg-12">
                    
                    
                   
                    <div class="form-group">
                        <textarea class="textarea_editor form-control" rows="15" style="height:250px" id="teks" name="teks">{{ $settingData->teks }}</textarea>
                                                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Ubah</button>
                        <a href="/administrator/setting/homepage" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
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
    <!-- End PAge Content -->
    <!-- End Container fluid  -->

@endsection