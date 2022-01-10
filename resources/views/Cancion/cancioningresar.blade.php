@extends('app')

@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand ps-2" href="index.php">
            <img src="https://cdn-icons-png.flaticon.com/512/174/174872.png" alt="" width="50" height="50"
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
                    <a class="nav-link fw-bolder" href="{{ url('/artista') }}">ARTISTA</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link  fw-bolder" href="{{ url('/album') }}">ÁLBUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white  fw-bolder" href="{{ url('/cancion') }}">CANCIÓN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  fw-bolder" href="{{ url('/genero') }}">GÉNERO</a>
                </li>
            </ul>
            <ul class="navbar-nav text-center mt-2 mb-2 me-3">
                <li class="nav-item">

                    <a class="btn btn-dark " href="#" role="button"><span class="material-icons align-middle">logout</span>
                        SALIR</a>
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

            <div class="col-12  pb-5 pt-3 mb-4">
                
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{url('/cancion')}}"><span class="material-icons  text-secondary align-middle">keyboard_arrow_left</span> </a>
                    </div>
                    <div class="mb-3 col-lg-4 text-center">
                        <span class="fs-2 fw-bolder">
                            FORMULARIO PARA INGRESAR UNA CANCIÓN
                        </span>
                    </div>
                </div>
                <form action="{{ url('cancion') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Título:</label>
                            <input type="text" class="form-control shadow-sm" name="titulo" maxlength="100"
                                placeholder="Rock" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Duración:</label>
                            <input type="text" class="form-control shadow-sm" name="duracion" maxlength="100"
                                placeholder="hh:mm:ss" required>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Letra:</label>
                            <input type="text" class="form-control shadow-sm" name="lyrics" maxlength="100"
                                placeholder="Rock" required>
                        </div>
                        <div class=" mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Audio:</label>
                            <input type="file" class="form-control shadow-sm" name="audio" accept=".mp3,audio/*" required>
                            
                            <button id="audio"> </button>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Álbum:</label>
                            <select class="form-select form-control shadow-sm" name="album_id" required>
                                <option value="" disabled selected>Seleccione el álbum</option>
                                @foreach ($albumes as $album)
                                    <option value="{{ $album['id'] }}" required>{{ $album['titulo'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Géneros:</label>
                            <div class="button-group ">
                                <button type="button" class=" shadow-sm border btn btn-default dropdown-toggle" data-toggle="dropdown"><span class=""></span> Seleccione<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach ($generos as $genero)
                                        <li><a href="#" class="text-dark" style="text-decoration:none" data-value="option1" tabIndex="-1"> <input type="checkbox" name="selectgenero[{{ $genero->nombre }}]" id="counter{{ $genero->nombre }}" value="{{ $genero['id'] }}" class="ms-2 form-check-input"/>&nbsp;{{ $genero['nombre'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Colaboradores:</label>
                            <div class="button-group ">
                                <button type="button" class=" shadow-sm border btn btn-default dropdown-toggle" data-toggle="dropdown"><span class=""></span> Seleccione <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach ($artistas as $artista)
                                        <li><a href="#" class="text-dark " style="text-decoration:none" data-value="option1" tabIndex="-1"> <input type="checkbox" name="selectartista[{{ $artista->nombre }}]" id="counter{{ $artista->nombre }}" value="{{ $artista['id'] }}" class="ms-2  form-check-input"/>&nbsp;{{ $artista['nombre'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class=" col-12 text-center mt-4">
                            <button class="btn btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

@endsection


@section('js')
<script>
    var audio1 = document.getElementById("audio1");
    var variableAudio = document.querySelector('#audio')
    audio1.onloadeddata = function() {
        alert(audio1.duration);
        var duracion = audio1.duration;
    };
    const presionado = function(){

    }
    variableAudio.addEventListener('click', presionado);
</script>
<script>
    

    
</script>
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
