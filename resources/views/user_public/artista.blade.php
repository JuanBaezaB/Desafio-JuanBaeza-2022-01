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
                    <a class="nav-link fw-bolder" style="color:rgb(0, 216, 86)"
                        href="{{ url('/artistas_public') }}">ARTISTAS</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white  fw-bolder" href="{{ url('/albumes_public') }}">ÁLBUMES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-bolder" href="{{ url('/canciones_public') }}">CANCIÓN</a>
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
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 ">
                <h1 class="ps-4 mt-4 text-center"></h1>
            </div>
            <div class="card mb-3" style="border: none;hover:none;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img-top shadow-lg" src="data:image/jpeg;base64,{{ $artista['imagen'] }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class=" fw-bolder ">Artista</span>
                            <h1 class="card-title">{{ $artista->nombre }}</h1>
                            <p class="card-text text-justify">{{ $artista->descripcion }}</p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-3">
                <span class="fs-2 fw-bolder">
                    CANCIONES
                </span>
            </div>

            <div class="col-sm-12 mt-3 mb-3">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th style="width: 100px;" scope="col">Duración</th>
                                <th scope="col">Letra</th>
                                <th scope="col">Audio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canciones as $cancion)
                                @if (in_array($cancion->id, $array))
                                    <tr>
                                        <th scope="col"> {{ $cancion['titulo'] }}</th>
                                        <th scope="col"> {{ gmdate('i', $cancion['duracion']) }} min y
                                            {{ gmdate('s', $cancion['duracion']) }} s</th>
                                        <th scope="col"> {{ $cancion['lyrics'] }}</th>
                                        <th scope="col"> <audio id="audio1" controls src="data:audio/mp3;base64,{{ $cancion['audio'] }}"></audio></th>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <style>
            th {
                max-width: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
    
        </style>
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
@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
                }
            });
        });
    </script>
    <script>
        var options = [];
        $('.dropdown-menu a').on('click', function(event) {

            var $target = $(event.currentTarget),
                val = $target.attr('data-value'),
                $inp = $target.find('input'),
                idx;

            if ((idx = options.indexOf(val)) > -1) {
                options.splice(idx, 1);
                setTimeout(function() {
                    $inp.prop('checked', false)
                }, 0);
            } else {
                options.push(val);
                setTimeout(function() {
                    $inp.prop('checked', true)
                }, 0);
            }

            $(event.target).blur();

            console.log(options);
            return false;
        });
    </script>


@endsection
