<!doctype html>
<html lang="en">
    <head>
        <link href="{{ asset('template-dashboard') }}/css/style.css" rel="stylesheet">
        @include('homepage-template.header')
    
        {{-- gallery css --}}
        <link href="{{ asset('template-homepage-cp') }}/dist/css/lightgallery.css" rel="stylesheet">
        <link href="{{ asset('template-homepage-cp') }}/dist/css/mygallery.css" rel="stylesheet">
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
        <div class="about">About FotoKopi De Tjolomadoe
        </div>
        <div class="about2">Home <span>> About Us</span>
        </div>
        <p class="lead about3">Mari <span >duduk </span>dan kita <span class=>bicarakan</span></p>
      </div>
    </div>

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
    @include('homepage-template.footer')

    <!-- Akhir FOOTER -->

</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('homepage-template.basic-script')
</body>
</html>