@extends('app')
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand ps-2" href="index.php">
            <img src="https://cdn-icons-png.flaticon.com/512/174/174872.png" alt="" width="50" height="50" class="d-inline-block align-top" >
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
            <ul class="navbar-nav ">

            </ul>
            <ul class="navbar-nav gap-2 text-center mt-2 mb-2 me-3">
                <li class="nav-item">
                    <a class="nav-link fw-bolder" href="{{url('/artista')}}">ARTISTA</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link btn btn-primary text-white  fw-bolder" href="{{url('/album')}}">ÁLBUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder" href="{{url('/cancion')}}">CANCIÓN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder" href="{{url('/genero')}}">GÉNERO</a>
                </li>
            </ul> 
            <ul class="navbar-nav text-center mt-2 mb-2 me-3">
                <li class="nav-item">
                    
                    <a class="btn btn-dark " href="#" role="button"><span class="material-icons align-middle">logout</span> SALIR</a>
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

    @yield('navbar')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-3">
                <span class="fs-2 fw-bolder">
                    ÁLBUMES
                </span>
            </div>

            <div class="col-4 text-center mb-5">
                <a class="btn btn-primary nav-link text-white" style="width: 200px;" href="{{url('/album/create')}}">Ingresar álbum</a>
            </div>
            <div class="col-12 " >
                <div class="table-responsive mb-3">
                    <table  id="myTable" class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Fecha de lanzamiento</th>
                                <th scope="col">Duración</th>
                                <th scope="col" style="width: 150px;">Imágen</th>
                                <th scope="col">Artista</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albumes as $album)

                                <tr>
                                    <th scope="col"> {{ $album['titulo'] }}</th>
                                    <th scope="col"> {{ $album['fecha_lanzamiento'] }}</th>
                                    <th scope="col"> {{  gmdate("m", $album['duracion'])  }} min y {{gmdate("s", $album['duracion']) }} seg</th>
                                    <th scope="col"> <img class="shadow" style="width:100px"
                                            src="data:image/jpeg;base64,{{ $album['imagen'] }}"></th>
                                    <th scope="col"> 
                                        @foreach ($artistas as $artista)
                                            @if ($artista['id'] == $album['artista_id'])
                                                {{ $artista['nombre'] }}
                                            @endif
                                        @endforeach 
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-6 text-end">
                                                <form action="{{ url('/album/' . $album->id) }}" method="POST">
                                                    @csrf
                                                    {{ @method_field('DELETE') }}
                                                    <button type="submit" class="btn p-0"
                                                        onclick="return confirm('¿Desea borrarlo realmete?')"><span
                                                            class="material-icons" style="color: red;">delete</span></button>
                                                </form>
                                            </div>
                                            <div class="col-6 text-start">
                                                <a href="{{ url('/album/' . $album->id . '/edit') }}"><span
                                                        class="material-icons text-secondary">edit</span></a>
                                            </div>
                                        </div>
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

@endsection
