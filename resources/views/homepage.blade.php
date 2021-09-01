
<!doctype html>
<html lang="en">
  <head>
    @include('homepage-template.header');

<!-- Title -->
    <title>Fotokopi De Tjolomadoe</title>
  </head>

<!-- Body -->
  <body >
    <!-- Navbar -->
    @include('homepage-template.navbar');
    <!-- End of Navbar -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" id="home">
      <div class="container texta">
        <div class="logo">
          <img src="{{ asset('template-homepage-cp') }}/img/logo.png" class="img-fluid" style=" width: 150px; height: 72px;">
        </div>
      <br>
          <p class="lead text1">{{ $home_slogan1->teks }}</p>
          <hr class="my-4">
          <p class="lead text2">{{ $home_slogan2->teks }}</p>
          <div class="tomb">
            <a class="btn btn-secondary tombol2" href="/about" role="button">About Us</a>
          </div>

          <br><br><br><br><br><br>
          <p class="lead text3">Mari <span >duduk </span>dan kita <span class=>bicarakan</span></p>
          
      </div>     
    </div> 
    <!-- Akhir jumbotron -->

 
<!-- workingspace -->
<div class="container">

<div class="row workingspace">
  <div class="col-lg">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
 
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 gambar" src="{{ asset('template-homepage-cp') }}/img/workingspace.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 gambar" src="{{ asset('template-homepage-cp') }}/img/workingspace2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 gambar" src="{{ asset('template-homepage-cp') }}/img/workingspace3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>


    <div class="tomb">
      <br>
      <a class="btn btn-secondary tombol" href="/gallery" role="button">More in our gallery</a>
    </div>
  </div>

  <div class="col-lg">
    <br>
    <div class="opentext">
      <p>{{ $home_quote1->teks }}</p>
      <a>Rayakan pertemuanmu di <span>Fotokopi De Tjolomadoe</span></a>
    </div>
    <hr class="my-4 garisdoang">
    <p class="display-4 open">OPEN HOURS</p>
    <hr class="my-4 gariscoklat">
    <p class="jambuka">
    <br>Monday - saturday
    <br>{{ $home_hour1->teks }}
    <br>
    <br>Sunday
    <br>{{ $home_hour2->teks }}
    </p>
    
  </div>
</div>
<br> <br>
<!-- Akhir info panel -->
</div>
<!-- Akhir Container -->


<!-- BG MENU -->
<div class="jumbotronmenu">
  <div class="container">
    <br>
    <div class="bgmenufix">
        <h1 class="bgmenu">GREAT COFFEE</h1>
        <p class="bgmenu2">{{ $home_quote2->teks }}</p>
        <br>
        <div class="tomb2">
          <a class="btn btn-secondary tombol" href="/menu" role="button">Explore Our Menu</a>
        </div>
    </div>
  </div>
</div>
<br><br>
<!-- Akhir BG MENU -->

<!-- Map -->
  <div class="container"><br><br><br>
    <div class="row map">
      <div class="col-lg"> 
        <p class="display-4 map2">Menunggumu disini</p>
           <hr class="my-4">
          <p class= alamat>
           <a class="fas fa-map-marker-alt"></a>
           <a class="x"> Jl. Adi Sucipto No.1, Paulan Wetan, Malangjiwan, Kec.Colomadu, Kabupaten Karanganyar, Jawa Tengah 57177</a>
          </p>
          <div class="tomb2">
            <a class="btn btn-secondary tombol" href="/contact" role="button">Contact Us</a>
          </div>
      </div>
      <div class="col-lg">
        <div class="embed-responsive embed-responsive-4by3 map3"> 
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.3717997095023!2d110.74767671477652!3d-7.534365894565986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a148311aa70d1%3A0x41e53cdaf6c8320f!2sDe&#39;%20Tjolomadoe!5e0!3m2!1sid!2sid!4v1614031533200!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

      </div>
      </div>
    </div>
  </div>
<!-- Akhir Map -->

<!-- BG RESERVATION -->
<div class="jumbotronres">
  <div class="container">
    <br>
    <div class="bgresfix">
        <h1 class="bgres">RESERVATION</h1>
          <p class="bgres2">{{ $home_quote3->teks }}</p>
        <br>
        <div class="tomb">
          <a class="btn btn-secondary tombol" href="/reservation" role="button">Reserve Now</a>
        </div>
    </div>
  </div>
</div>
<!-- Akhir BG RESERVATION -->



<!-- FOOTER -->
<div class="footer-cp">
    <div class="container textb">
      <div class="tomb_up">
        <a class="btn btn-secondary tombol_up " href="#home" role="button">
          <i href="#home" class="fas fa-chevron-up page-scroll"></i>
        </a>
      </div>
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
    
    @include('homepage-template.basic-script')
    <script src="js/script.js"></script>   
  </body>
</html>