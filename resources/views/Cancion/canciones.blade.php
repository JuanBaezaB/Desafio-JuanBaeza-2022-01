@extends('app')

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
                            <input type="text" class="form-control shadow-sm" name="duracion" maxlength="100" placeholder="Rock" required>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Letra:</label>
                            <input type="text" class="form-control shadow-sm" name="lyrics" maxlength="100" placeholder="Rock" required>
                        </div>
                        <div class=" mt-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Audio:</label>
                            <input type="text" class="form-control shadow-sm" name="audio" maxlength="100" placeholder="Rock" required>
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
                            <select multiple   class="form-select form-control shadow-sm" name="genero_id" required>
                                <option value="" disabled selected>Seleccione el álbum</option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero['id'] }}" required>{{ $genero['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 col-sm-12 col-md-6">

                            <label class="form-label fw-bolder ">Colaboradores:</label>
                            <select multiple   class="form-select form-control shadow-sm" name="artista_id" required>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Duración</th>
                                <th scope="col">Letra</th>
                                <th scope="col">Audio</th>
                                <th scope="col">Album</th>
                                <th style="width: 80px;" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canciones as $cancion)
                                <tr>
                                    <th scope="col"> {{$cancion['titulo']}}</th>
                                    <th scope="col"> {{$cancion['duracion']}}</th>
                                    <th scope="col"> {{$cancion['lyrics']}}</th>
                                    <th scope="col"> {{$cancion['audio']}}</th>
                                    <th scope="col"> {{$cancion['album_id']}}</th>
                                    <th class="text-center">
                                        <form action="{{url('/cancion/'.$cancion->id)}}" method="POST">
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