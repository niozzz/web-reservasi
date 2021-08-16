
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header')
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
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158456.jpg" data-sub-html="<h4>Ada sudut ruang kami yang jadi andalan ketika datang beramai ramai. </h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158456.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158443.jpg" data-sub-html="<h4>Jangan lupa untuk rindu pada kopi seduhan kami, ya! Karena kenangan di penjuru kami sangatlah membekas</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158443.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158436.jpg" data-sub-html="<h4>Hari dan kemarin masih sama; hujan yang datang tak kian pergi di kala sore saat kita semua bertemu</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158436.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158339.jpg" data-sub-html="<h4>Ambience</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624158339.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624157340.jpg" data-sub-html="<h4>Our Coffee</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624157340.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624157291.jpg" data-sub-html="<h4>Our Coffee</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624157291.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624126050.jpg" data-sub-html="<h4>Our place</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624126050.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624126035.jpg" data-sub-html="<h4>Ambience</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624126035.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624126022.jpg" data-sub-html="<h4>Ambience</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624126022.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624125975.jpg" data-sub-html="<h4>Duduk bersama berbincang dan berdiskusi tentang rasa dan pikiran di depan kedai @fotokopi.detjolomadoe</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624125975.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624125953.jpg" data-sub-html="<h4>Our Coffee</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624125953.jpg" class="img-responsive">
                    </a>
                </li>
                            <li class="col-md-3" data-src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624125844.jpg" data-sub-html="<h4>Duduk bersama berbincang dan berdiskusi tentang rasa dan pikiran di depan kedai @fotokopi.detjolomadoe</h4>">
                    <a href="">
                        <img src="{{ asset('template-homepage-cp/gambar') }}/gallery/gal-1624125844.jpg" class="img-responsive">
                    </a>
                </li>
            
        </ul>
    </div>

<!-- Akhir Galeri -->

<!-- FOOTER -->
<br><br>
<div class="footer">
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