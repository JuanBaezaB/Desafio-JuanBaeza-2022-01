@extends('app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 pb-5 pt-3 mb-4">
                <div class="mb-3 text-center">
                    <span class="fs-2 fw-bolder">
                        INGRESAR ALBUM
                    </span>
                </div>
                <form action="{{ url('album') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Nombre:</label>
                            <input type="text" class="form-control shadow-sm" name="titulo" maxlength="100"
                                placeholder="Marcianeke" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Fecha de lanzamiento:</label>
                            <input type="date" class="form-control shadow-sm" name="fecha_lanzamiento" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Duración:</label>
                            <input type="text" class="form-control shadow-sm" name="duracion" maxlength="100"
                                placeholder="Marcianeke" required>
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Artista:</label>
                            <select class="form-select form-control shadow-sm" name="artista_id" required>
                                <option value="" disabled selected>Seleccione el artista</option>
                                @foreach ($artistas as $artista)
                                    <option value="{{ $artista['id'] }}" required>{{ $artista['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Imágen:</label>
                            <input type="file" accept="image/*" class="form-control shadow-sm" name="imagen" required>
                        </div>
                        <div class="col-lg-12 text-center mt-4">
                            <button class="btn btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>

                    </div>
                </form>

            </div>

            <div class="col-12 text-center">
                <span class="fs-2 fw-bolder">
                    ALBUMES
                </span>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table  id="myTable" class="table table-bordered table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Fecha de lanzamiento</th>
                                <th scope="col">Duración</th>
                                <th scope="col" style="width: 150px;">Imagen</th>
                                <th scope="col">Artista</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albumes as $album)

                                <tr>
                                    <th scope="col"> {{ $album['titulo'] }}</th>
                                    <th scope="col"> {{ $album['fecha_lanzamiento'] }}</th>
                                    <th scope="col"> {{ $album['duracion'] }}</th>
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
                                        <form action="{{ url('/album/' . $album->id) }}" method="POST">
                                            @csrf
                                            {{ @method_field('DELETE') }}
                                            <button type="submit" class="btn p-0"
                                                onclick="return confirm('¿Desea borrarlo realmete?')"><span
                                                    class="material-icons" style="color: red;">delete</span></button>
                                        </form>

                                        <a href="{{ url('/album/' . $album->id . '/edit') }}"><span
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
