<!doctype html>
<html lang="en">
    <head>
        <link href="{{ asset('template-dashboard') }}/css/style.css" rel="stylesheet">
        @include('homepage-template.header')
        {{-- <link href="{{ asset('template-dashboard') }}/css/lib/amchart/export.css" rel="stylesheet">
        <link href="{{ asset('template-dashboard') }}/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="{{ asset('template-dashboard') }}/css/lib/owl.theme.default.min.css" rel="stylesheet" /> --}}
        {{-- @include('template.header') --}}
        <!-- Title -->
        <title>Fotokopi De Tjolomadoe-Home</title>
    </head>

    <!-- Body -->
    <body>
        <section class="parallax">

            <!-- Navbar -->
            @include('homepage-template.navbar');
            <!-- Akhir Navbar -->

            <!-- Jumbotron2 -->
            <div class="jumbotron2 jum jumbotron-fluid">
                <div class="container jum2">
                    <br>
                    <div class="about">About FotoKopi De Tjolomadoe
                    </div>
                    <div class="about2">Home
                        <span>> About Us</span>
                    </div>
                    <p class="lead about3">Mari
                        <span >duduk
                        </span>dan kita
                        <span class>bicarakan</span></p>
                </div>
            </div>
            <!-- Akhir Jumbotron2 -->
            <br>

            <!--Isi About Us-->

            <div class="container">
                

                
                
                    @foreach ($allData as $data)

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title text-center">
                                    <h3 style=" font-size:33px;" class="display-4 font-bold font-italic">{{ $data->judul_abt }}</h3>
                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-elements">
                                        
                                            <div class="row">
                                                
                                                    <?php
                                                    if (empty($data->gbr_abt)) {
                                                        # code...
                                                        ?>
                                                        
                                                <div class="col-lg-12" style="white-space: pre-line; text-align : justify; font-size:21px;"><?= "<p> &emsp;&emsp;". $data->isi_abt ."</p>"; ?></div>
                                                    <?php
                                                        }else{
                    
                                                            ?>
                                                            <div class="col-lg-6 text-center">
                                                        <img src="{{ url('template-homepage-cp/gambar/aboutus/'. $data->gbr_abt ) }}" alt="" width="100%" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-lg-6" style="white-space: pre-line; text-align : justify; font-size:21px;"><?= "<p> &emsp;&emsp;". $data->isi_abt ."</p>"; ?></div>
                                                    <?php
                                                        }
                                                    ?>
                                                    
                                                
                                                
                                            </div>
                                            
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <!-- /# column -->
                        
                        <!-- /# column -->
                    </div>


                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div style="text-align:center;">
                                <a href="">
                                    <img
                                        src="{{ asset('template-homepage-cp/gambar/aboutus/'. $data->gbr_abt) }}"
                                        width="70%"
                                        class="img-responsive">
                                </a>
                                <h3 style=" font-size:33px;" class="display-4 font-bold font-italic">{{ $data->judul_abt }}</h3>
                            </div >
                        </div>
                        
                        <div class="col-sm-12 col-md-6">
                            <div style="margin-left:6%; margin-right:6%;">
                                <p style="text-align : justify; font-size:21px; white-space: pre-line;"><?= $data->isi_abt ?></p>
                                <br>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
            </div>
        
        <!--/blog-post-area-->

    
    <!-- Akhir Isi About Us -->

    
    <!-- FOOTER -->
    <div class="footer-cp">
        <div class="container textb">
            <br>
            <div class="footertext text-white">
                <div class="follow ">
                    <a
                        href="https://www.instagram.com/fotokopi.detjolomadoe/"
                        class="fab fa-instagram text-white"></a>
                    <a
                        href="https://www.instagram.com/fotokopi.detjolomadoe/"
                        class="ig text-white">
                        ON INSTAGRAM</a>
                </div>
                <div class="garisfooter">
                    <hr class="my-4 fw">
                </div>
                <h1 class="f1">FOLLOW US</h1>
                <p class="f2">Like, share, or follow for more info!</p>

            </div>

            <p class="xxx">
                ©2021 Fotokopi De Tjolomadoe. All Right Reserved.
            </p>
        </div>

    </div>

    <!-- Akhir FOOTER -->

</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    {{-- @include('template.basic-script') --}}
</body>
</html>