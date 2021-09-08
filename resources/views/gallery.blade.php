
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header')

    {{-- gallery css --}}
    {{-- <link href="{{ asset('template-homepage-cp') }}/dist/css/lightgallery.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('template-homepage-cp') }}/dist/css/mygallery.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('template-homepage-cp/hover-gallery') }}/style.css">
    <style>
      
    </style>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
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
<div class="container mb-4">
<div class="wrapper">
    <div class="row">
        @foreach ($allData as $data)
        <div class="col-md-4 text-center justify-content-center mx-auto mb-5">

        
            <div class="media ">
                <div class="layer">
                    <p>{{ $data->album_gal }}</p>
                </div>

                <img
                src="{{ asset('template-homepage-cp/gambar/gallery/'. $data->gbr_gal) }}"
                alt="" class=""/>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

            
            
        



<!-- FOOTER -->
@include('homepage-template.footer')

<!-- Akhir FOOTER -->



    {{-- @include('homepage-template.basic-script') --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        {{-- <script type="text/javascript">
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
    <script src="{{ asset('template-homepage-cp') }}/dist/js/lg-pager.js"></script> --}}
    
    @include('homepage-template.basic-script')
  </body>
</html>