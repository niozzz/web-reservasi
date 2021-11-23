@php
    $allKategori = [];
    foreach ($allData as $data) {
      $allKategori[] = $data->kategori_menu;
    }
    $allKategori = array_unique($allKategori);
    $allKategori = array_values($allKategori);
    
    // dd($allKategori);
@endphp
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header')
    <link rel="stylesheet" href="{{ asset('template-homepage-cp/template-tab') }}/style.css">
    <style>
      .thumbnail-menu img {
        
        max-width: 70%;
        max-height: 200px;
        min-height: 200px;
        object-fit: cover;
      }
    </style>
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
    <div class="about">Our Menu
    </div>
    <div class="about2">Home <span>> Menu</span>
    </div>
    <p class="lead about3">Mari <span >duduk </span>dan kita <span class=>bicarakan</span></p>
  </div>
</div>
<!-- Akhir Jumbotron2 -->


<div class="container" style="margin-top: 60px; margin-bottom:60px;">
  <div class="tabs">
    <h4 style="padding-top:2px; padding-bottom:2px;">Menu Category  : &nbsp;</h4>

    {{-- looping 1 --}}
    
    @for ($i = 0; $i < count($allKategori); $i++)
    @if ($i == 0)
        
    <input type="radio" name="tabs" id="tab{{ $i }}" checked="checked">
    @else
    <input type="radio" name="tabs" id="tab{{ $i }}">

    @endif
    <label for="tab{{ $i }}">{{ $allKategori[$i] }}</label>
    <div class="tab">
      <div class="row mt-2">
        {{-- Looping 2 --}}
        @foreach ($allData as $data)
          @if ($data->kategori_menu == $allKategori[$i])
              
          <div class="col-md-4 text-center thumbnail-menu">
            <img src="{{ asset('template-homepage-cp/gambar/menu/'. $data->gbr_menu) }}" alt="" width="70%" class="img-thumbnail mb-2">
            <p class="style-tabs1" style=" margin-bottom:0px;">{{ ucwords($data->nama_menu) }}</p>
            {{-- @if ($allKategori[$i] == 'coffee') --}}
                
            <p class="style-tabs2" style=" margin-bottom:0px;">{{ $data->jenis_menu }}</p>
            {{-- @endif --}}
            <h4 class="style-tabs3 mb-2" style=" margin-bottom:0px;">Rp{{ number_format($data->harga_menu) }},-</h4>
          </div>
          @endif
        @endforeach

        {{-- End Looping 2 --}}
        
      </div>
    </div>
    @endfor

    {{-- end looping 1 --}}
  </div>
</div>



<!-- FOOTER -->
@include('homepage-template.footer')


</section>
<!-- Menu -->

<!-- Akhir menu -->
