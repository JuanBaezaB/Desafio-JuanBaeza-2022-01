@extends('app')

@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand ps-2" href="{{ url('/artista') }}" >
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
                    <div class="">
                        <a class="btn btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><span
                                class="material-icons align-middle">logout</span> SALIR
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
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
                        <a href="{{ url('/cancion') }}"><span
                                class="material-icons  text-secondary align-middle">keyboard_arrow_left</span> </a>
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
                                placeholder="Dimelo Ma" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Álbum:</label>
                            <select class="form-select form-control shadow-sm" name="album_id" required>
                                <option value="" disabled selected>Seleccione el álbum</option>
                                @foreach ($albumes as $album)
                                    <option value="{{ $album['id'] }}" required>{{ $album['titulo'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3 col-sm-12 ">
                            <label class="form-label fw-bolder">Letra:</label>

                            <textarea name="lyrics" class="form-control shadow-sm" cols="30" rows="10" maxlength="12000"
                                placeholder="Brr
    Marcianeke
    Vamo' a estar con Pailita
    Dimelo má
    Ando en busca de una criminal (Ah, ah)
    Esa que el gatillo le gusta jalar (Rata-ta)
    Que le guste flotar y fumar (brr)
    Tussi, keta quiere' mezclar
    Dimelo má
    Ando en busca de una criminal (Ah, ah)
    Esa que el gatillo le gusta jalar (Rata-ta)
    Que le guste flotar y fumar
    Tussi, keta pura quiere' mezclar
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Esperame que ahora entro yo
    Y lo que pide yo lo traje
    No visto de traje
    Puro corte calle, no de maquillaje
    Pronto coronamos y nos vamo' de viaje
    Tanto hit que hago que lo' culo bajen
    Ella se va de shopping
    Sale positivo si se hace el doping
    Baila twerk con un poco de popping
    Los fardos en el botín
    Si quieren letra llamen pa' mi booking
    Generando, sigo en la mía lowkey
    Cooking en el estudio con tu woman
    Tanto whisky, pisco que hasta lo' vecinos toman
    Si se tiran pa' aca puede que la arena coman
    Ja, en el chanteo titulado sin diploma
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Di-dimelo má
    Ah, pe-peligrosa
    Quiero ver como perreando me acosa
    Eso de atra' con el Gucci me lo roza
    Tengo tussi del naranjo me aburrio el rosa
    Capaz que tosa con el blunt
    Sprite con Flemibron
    Louis Vuitton, le quito la polera Champion
    A tu pretendiente con la fory lo espanto
    Puro perro, le doy de comer Champion Dog
    Ese toto lo corono yo
    La movie en play no hay stop
    Flow de sobra no hay stock
    Me la topo en la disco queda en shock
    My love, rica en las redes y en persona
    No usa Photoshop
    La llevo a comprar blone' al growshop
    En ropa interior los do'
    Me roza su vicky con mi boxer Top
    Dimelo má
    Ando en busca de una criminal (Ah, ah)
    Esa que el gatillo le gusta jalar (Rata-ta)
    Que le guste flotar y fumar
    Tussi, keta quiere' mezclar
    Dimelo má
    Ando en busca de una criminal (Ah, ah)
    Esa que el gatillo le gusta jalar (Rata-ta)
    Que le guste flotar y fumar
    Tussi, keta pura quiere' mezclar
    Marcianeke, Pailita
    Young Varas" required></textarea>
                        </div>
                        <div class=" mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Audio:</label>
                            <input type="file" class="form-control shadow-sm" name="audio" accept=".mp3,audio/*" required>
                        </div>

                        <div class="mt-3 col-sm-12 col-md-12">

                            <label class="form-label fw-bolder ">Géneros:</label>
                            <div class="button-group ">
                                <button type="button" class=" shadow-sm border btn btn-default dropdown-toggle"
                                    data-toggle="dropdown"><span class=""></span> Seleccione<span
                                        class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach ($generos as $genero)
                                        <li><a href="#" class="text-dark" style="text-decoration:none"
                                                data-value="option1" tabIndex="-1"> <input type="checkbox"
                                                    name="selectgenero[{{ $genero->nombre }}]"
                                                    id="counter{{ $genero->nombre }}" value="{{ $genero['id'] }}"
                                                    class="ms-2 form-check-input" />&nbsp;{{ $genero['nombre'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if ($errors->any())
                                <h3 style="color: red">¡¡{{ $errors->first() }}!!</h3>
                            @endif
                        </div>

                        <div class="mt-3 col-sm-12 col-md-12">
                            <label class="form-label fw-bolder ">Colaboradores:</label>
                            <div class="button-group ">
                                <button type="button" class=" shadow-sm border btn btn-default dropdown-toggle"
                                    data-toggle="dropdown"><span class=""></span> Seleccione <span
                                        class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach ($artistas as $artista)
                                        <li><a href="#" class="text-dark " style="text-decoration:none"
                                                data-value="option1" tabIndex="-1"> <input type="checkbox"
                                                    name="selectartista[{{ $artista->nombre }}]"
                                                    id="counter{{ $artista->nombre }}" value="{{ $artista['id'] }}"
                                                    class="ms-2  form-check-input" />&nbsp;{{ $artista['nombre'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" value="0" name="like">
                        <input type="hidden" value="0" name="visitas">
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
        document.getElementById("settime").value = "00:00:00";
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
