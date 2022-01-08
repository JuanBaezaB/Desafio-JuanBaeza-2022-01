@extends('app')

@section('body')
    <div class="container">

        <div class="row">
            <div class="col-12  pb-5 pt-3 mb-4">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{url('/album')}}"><span class="material-icons  text-secondary align-middle">keyboard_arrow_left</span> </a>
                    </div>
                    <div class="mb-3 col-lg-4 text-center">
                        <span class="fs-2 fw-bolder">
                            EDITAR ALBUM
                        </span>
                    </div>
                </div>
                <form action="{{url('/album/'.$album->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Nombre:</label>
                            <input type="text" class="form-control shadow-sm" name="titulo" maxlength="100" value="{{$album['titulo']}}" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Fecha de lanzamiento:</label>
                            <input type="date" class="form-control shadow-sm" name="fecha_lanzamiento" value="{{$album['fecha_lanzamiento']}}" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Duración:</label>
                            <input type="text" class="form-control shadow-sm" name="duracion" maxlength="100" value="{{$album['duracion']}}" required>
                        </div>
                        
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder ">Artista:</label>
                            <select  class="form-select form-control shadow-sm" name="artista_id" required>
                                <option value="" disabled selected>Seleccione el artista</option>
                                @foreach ($artistas as $artista)
                                    <option value="{{ $artista['id'] }}" required>{{ $artista['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="col-12">
                            <div class="row">
                                <div class=" col-sm-12 col-md-6">
                                    <label class="form-label fw-bolder">Imágen:</label>
                                    <input type="file" accept="image/*" class="form-control shadow-sm" name="imagen">
                                </div>
                                <div class="col-6 mt-4">
                                    <img class="shadow" style="width:100px" src="data:image/jpeg;base64,{{$album['imagen']}}">
                                </div>
                            </div>
                        </div>


                        <div class="row w-25 mx-auto mt-3">
                            <button class="btn btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection