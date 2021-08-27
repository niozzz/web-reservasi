
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header')
 
<!-- My Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Brygada+1918&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1&display=swap" rel="stylesheet">


<!-- Title -->
<title>Fotokopi De Tjolomadoe-Home</title>
 </head>

<!-- Body -->
  <body>
<section class="parallax">

<!-- Navbar -->
    @include('homepage-template.navbar')
<!-- Akhir Navbar -->


<!-- Jumbotron2 -->
<div class="jumbotron2 jum jumbotron-fluid">
  <div class="container jum2">
    <br>
    <div class="about">Contact Us
    </div>
    <div class="about2">Home <span>> Contact Us</span>
    </div>
    <p class="lead about3">Mari <span >duduk </span>dan kita <span class=>bicarakan</span></p>
  </div>
</div>
<!-- Akhir Jumbotron2 -->

<br>
  <div class="container">
    <div class="contact_top">
    <p>Jika Anda memiliki pertanyaan, kritik, dan saran terkait dengan Fotokopi De Tjolomadoe, silahkan kirimkan pesan melalui form dibawah ini</p>

    <hr class="my-4">
  </div>
  </div>
<!--Isi Contact Us-->
<div class="container">
  <div class="row map">
    <div class="col-lg"> 
        <div class= address>
        <p>Location:</p>
         <a class="fas fa-map-marker-alt"></a>
         <a class="x"> Jl. Adi Sucipto No.1, Paulan Wetan, Malangjiwan, Kec.Colomadu, Kabupaten Karanganyar, Jawa Tengah 57177</a>
        </div>
        <div class="embed-responsive embed-responsive-4by3 map3"> 
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.3717997095023!2d110.74767671477652!3d-7.534365894565986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a148311aa70d1%3A0x41e53cdaf6c8320f!2sDe&#39;%20Tjolomadoe!5e0!3m2!1sid!2sid!4v1614031533200!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div><br>
    </div>
    

    
  
    <div class="col-lg contact2">
      <form action="contact/insert" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nama</label>
            <input type="text" name="nama_contact" class="form-control" id="nama_contact"  placeholder="Masukan Nama anda">
          </div>

          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" name="email_contact" class="form-control" id="email_contact"  data-rule="email" aria-describedby="emailHelp" placeholder="name@example.com">
            <!-- <small id="emailHelp" class="form-text text-muted">Kami tidak akan  membagikan email Anda kepada orang lain.</small> -->
          </div>
        </div>

        <div class="form-group">
          <label>Subject</label>
          <input type="text" name="subject_contact" class="form-control" id="subject_contact"  placeholder="Masukan judul pesan anda">
        </div>

        <div class="form-group">
          <label>Pesan</label>
          <textarea name="pesan_contact" class="form-control"  rows="11,5" data-rule="required" placeholder=""></textarea>
        </div>

        <input type="hidden" name="tanggal_contact" id="date" value="<?php echo date('Y-m-d h:i:s' ); ?>">

        <div class="text-center tomb2">
          <button type="submit" name="submitpesan" class="btn btn-secondary tombol" >Submit</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- Akhir Isi Contact Us -->

{{-- flash data --}}
<div class="flash-data" data-flashdata="{{ session('pesan') }}"></div>
<!-- FOOTER -->
@include('homepage-template.footer')

<!-- Akhir FOOTER -->







</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

{{-- sweet alert 2 --}}
<script src="{{ asset('template-dashboard') }}/js/sweetalert2/sweetalert2.all.min.js"></script>
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

    if (flashData == "berhasil ditambahkan")
    {
        Swal.fire({
        icon: 'success',
        title: 'Terima kasih!',
        text: 'Pesan berhasil dikirim'
        })
    }else
    {
        Swal.fire({
        icon: 'success',
        title: 'Terima kasih!',
        text: 'Data' + flashData
        })
    }

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

  </body>
</html>
