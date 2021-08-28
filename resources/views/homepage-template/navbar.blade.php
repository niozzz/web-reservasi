<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" >
    <div class="container">
      <a class="navbar-brand " href="#">FOTOKOPI DE TJOLOMADOE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link {{ request()-> is('/') ? 'active' : '' }}" href="/">Home</a>
          <a class="nav-item nav-link {{ request()-> is('about') ? 'active' : '' }}" href="/about">About Us</a>
          <a class="nav-item nav-link {{ request()-> is('menu') ? 'active' : '' }}" href="/menu">Menu</a>
          <a class="nav-item nav-link {{ request()-> is('gallery') ? 'active' : '' }}" href="/gallery">Gallery</a>
          <a class="nav-item nav-link {{ request()-> is('reservation') ? 'active' : '' }}" href="/reservation">Reservation</a>
          <a class="nav-item nav-link {{ request()-> is('contact') ? 'active' : '' }}" href="/contact">Contact Us</a>
          @if (Auth::check())
          <a class="btn btn-secondary tombol2 mt-0" href="/home" role="button">Login</a>
          @else
          <a class="btn btn-secondary tombol2 mt-0" href="/login" role="button">Login</a>
          @endif
          {{-- <a class="nav-item nav-link {{ request()-> is('contact') ? 'active' : '' }}" href="/login">Login</a> --}}
        </div>
      </div>  
    </div>
  </nav>