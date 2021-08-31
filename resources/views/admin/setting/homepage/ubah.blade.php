@extends('template.main')

@section('content')
<div class="container-fluid">

    <!-- Start Page Content -->
    <div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-title">
    <h4>Ubah Teks</h4>

</div>
<div class="card-body">
    <div class="basic-elements">
        <form action="/administrator/reservation/insert" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="jf1ziHLbnaFWNrNLSC7jyBvW8GhB6p1e1lV7SctQ">                        <div class="row">
                <div class="col-lg-6">
                    
                    
                    
                    
                    
                    
                    <div class="form-group">
                        <label for="sOrder_reservasi">Specific Order</label>
                        <textarea class="textarea_editor form-control" rows="15" style="height:250px" id="sOrder_reservasi" name="sOrder_reservasi"></textarea>
                                                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5">Tambah</button>
                        <a href="/administrator/reservation" class="btn btn-danger btn-flat m-b-10 m-l-5">Batal</a>
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
</div>
    
@endsection