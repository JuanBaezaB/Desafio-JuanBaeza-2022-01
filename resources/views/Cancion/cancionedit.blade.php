@section('body')
    <div class="container">

        <div class="row">
            
            <div class="col-12  pb-5 pt-3 mb-4">
                <div class="row">
                    <div class="mb-3 col-lg-12 text-center">
                        <span class="fs-2 fw-bolder">
                            EDITAR CANCION
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
        </div>
    </div>

@endsection