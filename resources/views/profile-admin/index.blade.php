

@extends('template.main')

@section('new-style')
<link rel="stylesheet" href="{{ asset('template-homepage-cp') }}/js/fullcalendar.css">
{{-- <link href="{{ asset('template-dashboard') }}/css/lib/sweetalert/sweetalert.css" rel="stylesheet"/> --}}
    <style>
        .wordwrap { 
   /* white-space: pre-line;      CSS3    */
   
}
    </style>
@endsection

@section('content')

<div class="row">
                    
                    
    <div class="col-lg-6 responsive-md-100">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">User Profile</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal p-t-20" action="profile/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name_profile" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="text" class="form-control form-type" id="name_profile" name="name_profile" value="{{ old('name_profile', $dataProfile->name) }}">
                            </div>
                            @error('name_profile') 
                            <label class="text-danger ">
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email_profile" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-email"></i></div>
                                <input type="email" class="form-control form-type" id="email_profile" name="email_profile" value="{{ old('email_profile', $dataProfile->email) }}">
                            </div>
                            @error('email_profile') 
                            <label class="text-danger ">
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address_profile" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-home"></i></div>
                                <input type="text" class="form-control form-type" id="address_profile" name="address_profile" value="{{ old('address_profile', $dataProfile->address) }}">
                            </div>
                            @error('address_profile') 
                            <label class="text-danger ">
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_profile" class="col-sm-3 control-label">No. HP</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-mobile"></i></div>
                                <input type="number" class="form-control form-type" id="phone_profile"  name="phone_profile" value="{{ old('phone_profile', $dataProfile->phone) }}">
                            </div>
                            @error('phone_profile') 
                            <label class="text-danger ">
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_profile" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="password" class="form-control form-type" id="password_profile" name="password_profile" value="{{ old('password_profile') }}">
                            </div>
                            @error('password_profile') 
                            <label class="text-danger ">
                                {{$message}}
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirm" class="col-sm-3 control-label">Re Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="password" class="form-control form-type" id="password_confirm" name="password_confirm">
                            </div>
                            @error('password_confirm') 
                            <p class="text-danger ">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new_password" class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="password" class="form-control form-type" id="new_password" name="new_password">
                            </div>
                            @error('new_password') 
                            <p class="text-danger ">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Ubah</button>
                            <a href="/user/reservation" class="btn btn-danger waves-effect waves-light">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>




{{-- flash data --}}
<div class="flash-data" data-flashdata="{{ session('pesan') }}"></div>
<!-- End PAge Content -->


@endsection

@section('basic-script')
{{-- sweet alert 2 --}}
<script src="{{ asset('template-dashboard') }}/js/sweetalert2/sweetalert2.all.min.js"></script>
<script src="{{ asset('template-homepage-cp') }}/js/moment.min.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/js/fullcalendar.min.js"></script>
<script>

const flashData = $('.flash-data').data('flashdata');
console.log(flashData);

if (flashData == "berhasil ditambahkan" || flashData == "berhasil dihapus" || flashData == "berhasil diubah")
{
    // Swal.fire({
    //     icon: 'success',
    //     title: 'Berhasil!',
    //     text: 'Data' . flashData
    // })

        Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data ' + flashData
        })

}else if (flashData == "password konfirmasi tidak cocok")
{
    Swal.fire({
        icon: 'warning',
        title: 'Gagal',
        text: 'Password konfirmasi tidak cocok'
        })
}else if (flashData == "password tidak dikenali")
{
    Swal.fire({
        icon: 'warning',
        title: 'Gagal',
        text: 'Password tidak dikenali'
        })
}




$('.tombol-hapus').on('click', function(e){

    e.preventDefault();
    const simpanLink = $(this).attr('href');
    // const hapusLink = $(this).removeAttr('href');

    Swal.fire({
    title: 'Apakah Anda yakin?',
    text: "Data yang dihapus akan hilang permanen",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus!',
    cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {

            document.location.href = simpanLink;

            
        }
    });
});



</script>

<script>
    //jquery
    $(document).ready(function(){
          var calendar = $('#calendar').fullCalendar({
              //bisa diedit
              // editable : false,

              // mengatur header kalender
              header: {
                  left : 'prev, next today',
                  center : 'title',
                  right : ''
              },

              // menampilkan data dari database
              events : '/reservation/data-admin',

              // izinkan tabel di klik
              // selectable : true,
              // selecthelper: true

              // tambah event
              
          });
      });
  </script>
@endsection

{{-- {{ dd($allData) }} --}}