@extends('app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('body')
    <div class="container">

        <div class="row">
            
            <div class="col-12  pb-5 pt-3 mb-4">
                <div class="row">
                    <div class="mb-3 col-lg-12 text-center">
                        <span class="fs-2 fw-bolder">
                            INGRESAR CANCION
                        </span>
                    </div>
                </div>
                <form action="{{url('cancion')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Título:</label>
                            <input type="text" class="form-control shadow-sm" name="titulo" maxlength="100" placeholder="Rock" required>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Duración:</label>
                            <input type="text" class="form-control shadow-sm" name="duracion" maxlength="100" placeholder="hh:mm:ss" required>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Letra:</label>
                            <input type="text" class="form-control shadow-sm" name="lyrics" maxlength="100" placeholder="Rock" required>
                        </div>
                        <div class=" mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Audio:</label>
                            <input type="file" class="form-control shadow-sm" name="audio" accept=".mp3,audio/*"  required>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">

                            <label class="form-label fw-bolder ">Álbum:</label>
                            <select  class="form-select form-control shadow-sm" name="album_id" required>
                                <option value="" disabled selected>Seleccione el álbum</option>
                                @foreach ($albumes as $album)
                                    <option value="{{ $album['id'] }}" required>{{ $album['titulo'] }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mt-3 col-sm-12 col-md-6"></div>
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Género:</label>
                            <select multiple class="form-select form-control shadow-sm" name="genero_id[]" required>
                                <option value="" disabled selected>Seleccione el álbum</option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero['id'] }}" required>{{ $genero['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">

                            <label class="form-label fw-bolder ">Colaboradores:</label>
                            <select multiple   class="form-select form-control shadow-sm" name="artista_id[]" required>
                                <option value="" disabled selected>Seleccione el álbum</option>
                                @foreach ($artistas as $artista)
                                    <option value="{{ $artista['id'] }}" required>{{ $artista['nombre'] }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class=" col-12 text-center mt-4">
                            <button class="btn btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th style="width: 100px;" scope="col">Duración</th>
                                <th scope="col">Letra</th>
                                <th scope="col">Audio</th>
                                <th style="width: 80px;" scope="col">Album</th>
                                <th style="width: 80px;" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canciones as $cancion)
                                <tr>
                                    <th scope="col"> {{$cancion['titulo']}}</th>
                                    <th scope="col"> {{$cancion['duracion']}}</th>
                                    <th scope="col"> {{$cancion['lyrics']}}</th>
                                    <th scope="col"> <audio controls src="data:audio/mp3;base64,{{$cancion['audio']}}"></audio></th>
                                    <th scope="col"> {{$cancion['album_id']}}</th>
                                    <th class="text-center">
                                        <form action="{{url('/cancion/'.$cancion->id)}}" method="POST">
                                            @csrf
                                            {{@method_field('DELETE')}}
                                            <button type="submit" class="btn p-0" onclick="return confirm('¿Desea borrarlo realmete?')"><span class="material-icons" style="color: red;">delete</span></button>
                                        </form>
                                        <a href="{{ url('/cancion/' . $cancion->id . '/edit') }}"><span class="material-icons text-secondary">edit</span></a>
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