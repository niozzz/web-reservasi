
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header')
    <link rel="stylesheet" href="{{ asset('template-homepage-cp/template-tab') }}/style.css">
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
    <h4 style="padding-top:2px; padding-bottom:2px;">Our Best Seller : &nbsp;</h4>

    {{-- looping 1 --}}
    <input type="radio" name="tabs" id="tabone" checked="checked">
    <label for="tabone">Tab One</label>
    <div class="tab">
      <div class="row">
        {{-- Looping 2 --}}
        <div class="col-md-4 text-center">
          <img src="{{ asset('template-homepage-cp/gambar/aboutus/gambar-kosong.png') }}" alt="" class="img-thumbnail mb-2">
          <p class="style-tabs1" style=" margin-bottom:0px;">Red Velvet</p>
          <p class="style-tabs2" style=" margin-bottom:0px;">Favorite Flavour</p>
          <h4 class="style-tabs3" style=" margin-bottom:0px;">Rp9000,-</h4>
        </div>
        {{-- End Looping 2 --}}
        
      </div>
    </div>
    {{-- end looping 1 --}}
  </div>
</div>



<!-- FOOTER -->
<div class="footer-cp">
  <div class="container textb">
    
    <div class="footertext text-white">
      <div class="follow ">
        <a href="https://www.instagram.com/fotokopi.detjolomadoe/" class="fab fa-instagram text-white" ></a>
        <a href="https://www.instagram.com/fotokopi.detjolomadoe/" class="ig text-white"> ON INSTAGRAM</a>
      </div>
      <div class="garisfooter">
        <hr class="my-4 fw">
      </div>
        <h1 class="f1">FOLLOW US</h1>
        <p class="f2">Like, share, or follow for more info!</p>
        
    </div>
    
    <p class="xxx"> ©2021 Fotokopi De Tjolomadoe. All Right Reserved. </p>
  </div>

</div>


</section>
<!-- Menu -->

<!-- Akhir menu -->
