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
            <div class="col-12 text-center mt-3">
                <span class="fs-2 fw-bolder">
                    CANCIONES
                </span>
            </div>

            <div class="col-4 text-center mb-5">
                <a class="btn btn-primary nav-link text-white" style="width: 200px;"
                    href="{{ url('/cancion/create') }}">Ingresar canción</a>
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
                                <th style="width: 80px;" scope="col">Álbum</th>
                                <th style="width: 80px;" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canciones as $cancion)
                                <tr>
                                    <th scope="col"> {{ $cancion['titulo'] }}</th>
                                    <th scope="col"> {{ $cancion['duracion'] }}</th>
                                    <th scope="col"> {{ $cancion['lyrics'] }}</th>
                                    <th scope="col"> <audio id="audio1" controls
                                            src="data:audio/mp3;base64,{{ $cancion['audio'] }}"></audio></th>
                                    <th scope="col">
                                        @foreach ($albumes as $album)
                                            @if ($album['id'] == $cancion['album_id'])
                                                {{ $album['titulo'] }}
                                            @endif
                                        @endforeach
                                    </th>
                                    <th class="text-center">
                                        <form action="{{ url('/cancion/' . $cancion->id) }}" method="POST">
                                            @csrf
                                            {{ @method_field('DELETE') }}
                                            <button type="submit" class="btn p-0"
                                                onclick="return confirm('¿Desea borrarlo realmete?')">
                                                <span class="material-icons" style="color: red;">delete</span></button>
                                        </form>


                                        <br>
                                        <a href="{{ url('/cancion/' . $cancion->id . '/edit') }}"><span
                                                class="material-icons text-secondary">edit</span></a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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

@endsection


@section('js')
    <script>
        var audio1 = document.getElementById("audio1");

        audio1.onloadeddata = function() {
            alert(audio1.duration);
            var duracion = audio1.duration;
        };
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
