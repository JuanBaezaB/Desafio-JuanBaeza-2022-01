@extends('app')


@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">

        <a class="navbar-brand ps-2" href="{{ url('/') }}">
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
                    <a class="nav-link fw-bolder  text-white" href="{{ url('/artistas_public') }}">ARTISTAS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white fw-bolder" href="{{ url('/albumes_public') }}">ÁLBUMES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  fw-bolder" style="color:rgb(0, 216, 86)"
                        href="{{ url('/canciones_public') }}">CANCIONES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  fw-bolder" href="{{ url('/generos_public') }}">GÉNEROS MUSICALES</a>
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
    <div class="container">
        <div class="row">
            <div class="card mt-4 mb-3" style="border: none;hover:none;">
                <div class="row g-0">
                    <div class="col-md-4">
                        @foreach ($albumes as $album)
                            @if ($album->id == $cancion->album_id)
                                <img class="card-img-top  shadow-lg" src="data:image/jpeg;base64,{{ $album['imagen'] }}">
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class=" fw-bolder ">Álbum</span>
                            <h1 class="card-title">{{ $cancion->titulo }}</h1>
                            <audio id="audio1" controls src="data:audio/mp3;base64,{{ $cancion['audio'] }}"></audio>
                            <p class="card-text">Duración: {{ gmdate('i', $cancion['duracion']) }} min y
                                {{ gmdate('s', $cancion['duracion']) }} s</p>
                            <p class="card-text"><small class="text-muted">Visitas: {{$cancion->visitas}}
                                </small></p>
                            <p class="card-text">{{ nl2br($cancion->lyrics)}}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('footer')
    <div class="container-fuid mt-4">

        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <div class="pb-3">
                    <span>Spotify es el primer servicio de streaming con sonido en Alta Fidelidad, playlists elaboradas por
                        expertos y contenido original convirtiéndose en la plataforma de referencia de música y
                        cultura.</span>
                </div>
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-dark m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3">
                © 2022s Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">Spotify.</a>
                All Rigth Reserved
            </div>
            <!-- Copyright -->
        </footer>
        <style>


        </style>
    </div>
@endsection
