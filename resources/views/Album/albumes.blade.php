
@extends('app')

@section('body')
    <div class="container">

        <div class="row">
            <div class="col-12 pb-5 pt-3 mb-4">
                <div class="mb-3 text-center">
                    <span class="fs-2 fw-bolder">
                        INGRESAR ALBUM
                    </span>
                </div>
                <form action="{{url('album')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Nombre:</label>
                            <input type="text" class="form-control shadow-sm" name="nombre" maxlength="100" placeholder="Marcianeke" required>
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Fecha de lanzamiento:</label>
                            <input type="date" class="form-control shadow-sm" name="insert_fecha_noticia" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Duración:</label>
                            <input type="text" class="form-control shadow-sm" name="nombre" maxlength="100" placeholder="Marcianeke" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Imágen:</label>
                            <input type="file" accept="image/png, .jpeg, .jpg .svg .jpg" class="form-control shadow-sm" name="imagen" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Artista:</label>
                            <select  class="form-select shadow-sm" name="artista" id="">
                                <option hidden selected value="" required>Seleccione el artista</option>
                            </select>
                        </div>
                        <div class="row w-25 mx-auto mt-4">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Fecha de lanzamiento</th>
                                <th scope="col">Duración</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Artista id</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albumes as $album)
                                <tr>
                                    <th scope="col"> {{ $album['titulo'] }}</th>
                                    <th scope="col"> {{ $album['fecha_lanzamiento'] }}</th>
                                    <th scope="col"> {{ $album['duracion'] }}</th>
                                    <th scope="col"> {{ $album['imagen'] }}</th>
                                    <th scope="col"> {{ $album['artista_id'] }}</th>
                                    <th>
                                        <form action="{{url('/album/'.$album->id)}}" method="POST">
                                            @csrf
                                            {{@method_field('DELETE')}}
                                            <button type="submit" class="btn p-0" onclick="return confirm('¿Desea borrarlo realmete?')"><span class="material-icons" style="color: red;">delete</span></button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>

            </div>
        </div>
    </div>

@endsection

