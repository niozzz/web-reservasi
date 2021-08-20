
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header')

    {{-- gallery css --}}
    <link href="{{ asset('template-homepage-cp') }}/dist/css/lightgallery.css" rel="stylesheet">
    <link href="{{ asset('template-homepage-cp') }}/dist/css/mygallery.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Title -->
<title>Fotokopi De Tjolomadoe-Home</title>
 </head>

<!-- Body -->

<section class="parallax">
<body class="home">
    
<!-- Navbar -->
 @include('homepage-template.navbar')
<!-- Akhir Navbar -->


<!-- Jumbotron2 -->
<div class="jumbotron2 jum jumbotron-fluid">
  <div class="container jum2">
    <br>
    <div class="about">Welcome to our gallery
    </div>
    <div class="about2">Home <span>> Gallery</span>
    </div>
    <p class="lead about3">Mari <span >duduk </span>dan kita <span class=>bicarakan</span></p>
  </div>
</div>
<!-- Akhir Jumbotron2 -->
<br>
<!-- Galeri -->
<br><br>

    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row">

            <!-- mulai looping -->
            @foreach ($allData as $data)
                
            <li
            class="col-md-3"
            data-src="{{ asset('template-homepage-cp/gambar/gallery/'. $data->gbr_gal) }}"
            data-sub-html="<h4>{{ $data->album_gal }}</h4>">
            <a href="">
                <img
                    src="{{ asset('template-homepage-cp/gambar/gallery/'. $data->gbr_gal) }}"
                    class="img-responsive"></a>
            </li>
                            
            @endforeach
            
        </ul>
    </div>

<!-- Akhir Galeri -->

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

<!-- Akhir FOOTER -->



    {{-- @include('homepage-template.basic-script') --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript">
        $(document).ready(function() {
            $('#lightgallery').lightGallery();
        });
    </script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lightgallery.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-fullscreen.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-thumbnail.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-video.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-autoplay.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-zoom.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-hash.js"></script>
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-pager.js"></script>
    
     
  </body>
</html>