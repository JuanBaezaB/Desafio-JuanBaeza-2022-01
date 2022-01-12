@extends('app')

@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@endsection

@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">

        <a class="navbar-brand ps-2" href="{{url('/')}}">
            <img src="https://logos-marcas.com/wp-content/uploads/2020/09/Spotify-Logo.png" alt="" width="100px" 
                class="d-inline-block align-top">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
            <ul class="navbar-nav ">

            </ul>
            <ul class="navbar-nav gap-2 text-center mt-2 mb-2 me-3">
                <li class="nav-item">
                    <a class="nav-link text-white fw-bolder"  href="{{url('/artistas_public')}}">ARTISTAS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white  fw-bolder" href="{{url('/albumes_public')}}">ÁLBUMES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bolder" href="{{url('/canciones_public')}}">CANCIONES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  fw-bolder" href="{{url('/generos_public')}}">GÉNEROS MUSICALES</a>
                </li>
            </ul>
            <ul class="navbar-nav text-center mt-2 mb-2 me-3">
                <li class="nav-item">
                    <a class="btn btn-dark " href="{{ route('login') }}" role="button"><span
                            class="material-icons align-middle">login</span> INGRESAR</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 div1">


            <div class="row">
                <div class="col-12 " style="padding-top: 300px">
                    <p class="ps-4">#MI2021ENSPOTIFY</p>
                    <h1 class="ps-4">Descubre musica nueva todos los días</h1>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
    <div class="container pt-4">
        <div class="mt-4 pb-3">
            <h4 class="fw-bolder">Agregadas recientemente</h4>
        </div>
        
        <div  class="owl-carousel  owl-theme">
            @foreach ($canciones as $cancion)
                <div class="card">
                    @foreach ($albumes as $album)
                        @if ($album->id == $cancion->album_id)
                            <img class="card-img-top shadow-lg" src="data:image/jpeg;base64,{{ $album['imagen'] }}">
                        @endif
                    @endforeach
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$cancion->titulo}}</h5>
                        <p class="card-text"></p>
                        <audio  controls src="data:audio/mp3;base64,{{ $cancion->audio }}"> </audio>
                        <a class="btn btn-primary" href="{{ url('/canciones_public/' . $cancion->id ) }}">Ver mas</a>
                    </div>
                </div>
                
            @endforeach



        </div>
    </div>

   <div class="container-fluid">
       
   </div>
   <style>
       .card:hover {
        box-shadow: 0 0 11px rgba(33, 33, 33, .2);
    }
   </style>

@endsection
@section('footer')
<div class="container-fuid pt-4">

    <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <div class="pb-3">
            <span>Spotify es el primer servicio de streaming con sonido en Alta Fidelidad, playlists elaboradas por expertos y contenido original convirtiéndose en la plataforma de referencia de música y cultura.</span>
        </div>
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a class="btn btn-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a class="btn btn-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-dark m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="btn btn-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
  
        <!-- Github -->
        <a class="btn btn-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" >
      © 2022s Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Spotify.</a>
      All Rigth Reserved
    </div>
    <!-- Copyright -->
  </footer>
    
  </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
               
                loop:true,
               
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:4,
                        nav:false,
                        loop:false
                    }
                }

            });
        });

        
    </script>
    

@endsection
