@php
    // dd($settingData);
@endphp
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
    <div class="about">Reservation
    </div>
    <div class="about2">Home <span>> Reservation</span>
    </div>
    <p class="lead about3">Mari <span >duduk </span>dan kita <span class=>bicarakan</span></p>
  </div>
</div>
<!-- Akhir Jumbotron2 -->
<link rel="stylesheet" href="{{ asset('template-homepage-cp') }}/js/fullcalendar.css">

<br><br>

    <div class="container" >
       <p class="bgmenu2" style="margin-left:25%; margin-right: 25%; text-align: center;">Berikut merupakan daftar tanggal yang sudah terisi penuh dan tidak bisa untuk melakukan reservasi</p>
        <br>
        <div id="calendar" style="margin-left:15%; margin-right:15%;"></div>
          

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{ asset('template-homepage-cp') }}/js/jquery.min.js"></>
    <script src="{{ asset('template-homepage-cp') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/js/moment.min.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/js/fullcalendar.min.js"></script>

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
                events : 'reservation/data-user',

                // izinkan tabel di klik
                // selectable : true,
                // selecthelper: true

                // tambah event
                
            });
            calendar.render();
        });
    </script>
</div>
<br>
<p class="bgmenu2" style="margin-left:25%; margin-right: 25%; text-align: center;">Untuk melakukan reservasi dapat menghubingi langsung kontak dibawah ini</p>

       
        <div class="tomb">
    
      <a class="btn btn-secondary tombol" target="_blank" href="{{ $settingData->reservasi_link }}" role="button">Reservasi sekarang</a>
    </div>
    <br><br><br>
  <!-- FOOTER -->
  @include('homepage-template.footer')

<!-- Akhir FOOTER -->

