
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
          <p class="lead text1">Singgahmu kan Berkesan di Penjuru Kami</p>
          <hr class="my-4">
          <p class="lead text2">Mau pagi siang sore atau malem, <span>Fotokopi De Tjolomadoe</span> bakalan ada di setiap pilihan kamu menghabiskan waktu dengan teman, keluarga atau orang spesialmu.</p>
          <div class="tomb">
            <a class="btn btn-secondary tombol2" href="aboutus.php" role="button">About Us</a>
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
      <a class="btn btn-secondary tombol" href="gallery.php" role="button">More in our gallery</a>
    </div>
  </div>

  <div class="col-lg">
    <br>
    <div class="opentext">
      <p> "Masih membekas wangi hadirmu, senyum manismu. Tertinggal sesaat dari waktu yang berjalan lambat setelah temu yang teramat singkat."</p>
      <a>Rayakan pertemuanmu di <span>Fotokopi De Tjolomadoe</span></a>
    </div>
    <hr class="my-4 garisdoang">
    <p class="display-4 open">OPEN HOURS</p>
    <hr class="my-4 gariscoklat">
    <p class="jambuka">
    <br>Monday - saturday
    <br>12 : 00 till 21 : 00
    <br>
    <br>Sunday
    <br>08 : 00 till 21 : 00
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
        <p class="bgmenu2">Dan kopi tak pernah memilih siapa yang layak menikmatinya karena dihadapan kopi, kita semua sama. Dalam mengolah sajian menu, tak ada keraguan bagi kami untuk membuat dengan sepenuh hati demi rekan yang telah datang ke dalam kedai</p>
        <br>
        <div class="tomb2">
          <a class="btn btn-secondary tombol" href="menu.php" role="button">Explore Our Menu</a>
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
            <a class="btn btn-secondary tombol" href="contactus.php" role="button">Contact Us</a>
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
          <p class="bgres2"> Berkumpul, berpikir, dan mengutarakan perasaan. Beberapa cara bisa dilakukan dalam berdiskusi, <br>salah satunya adalah dengan memilih tempat di Fotokopi De Tjolomadoe. <br>Tempat yang santai dengan vibes yang mendukung tentunya!</p>
        <br>
        <div class="tomb">
          <a class="btn btn-secondary tombol" href="reservation.php" role="button">Reserve Now</a>
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
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>   
  </body>
</html>