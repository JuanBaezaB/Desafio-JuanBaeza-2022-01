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
                            EDITAR CANCIÓN
                        </span>
                    </div>
                </div>
                <form action="{{url('/cancion/'.$cancion->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="row">
                        
                        <div class="col-sm-12 mb-3  col-md-6">
                            <label class="form-label fw-bolder">Título:</label>
                            <input type="text" class="form-control shadow-sm" name="titulo" maxlength="100" value="{{$cancion->titulo}}" required>
                        </div>
                        <div class="col-sm-12 col-md-6">

                            <label class="form-label fw-bolder ">Álbum:</label>
                            <select  class="form-select form-control shadow-sm" name="album_id" required>
                                <option value="" disabled >Seleccione el álbum</option>
                                @foreach ($albumes as $album)
                                    @if ($album['id']==$cancion['album_id'])
                                        <option value="{{ $album['id'] }}" selected >{{ $album['titulo'] }}</option>
                                    @else
                                        <option value="{{ $album['id'] }}" required>{{ $album['titulo'] }}</option>
                                    @endif 
                                @endforeach
                            </select>

                        </div>
                        <div class=" col-sm-12 mb-3 ">
                            <label class="form-label fw-bolder">Letra:</label>
                            <textarea name="lyrics" class="form-control shadow-sm" cols="30" rows="10" maxlength="12000" required>{{$cancion->lyrics}}</textarea>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    
                                </div>
                                <div class=" col-sm-6">
                                    <label class="form-label fw-bolder">Audio:</label>
                                    <input type="file" class="form-control shadow-sm" name="audio" accept=".mp3,audio/*" >
                                </div>
                                <div class="col-6">
                                    <audio class="mt-4" controls src="data:audio/mp3;base64,{{ $cancion['audio'] }}"></audio>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="mt-3 col-sm-12  ">
                            <label class="form-label fw-bolder ">Géneros:</label>
                            <div class="button-group ">
                                <button type="button" class=" shadow-sm border btn btn-default dropdown-toggle" data-toggle="dropdown"><span class=""></span> Seleccione<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach ($generos as $genero)
                                        @if ( in_array($genero->id, $id_generos))
                                            <li><a href="#" class="text-dark" style="text-decoration:none" data-value="option1" tabIndex="-1"> <input type="checkbox" checked name="selectgenero[{{ $genero->nombre }}]" id="counter{{ $genero->nombre }}" value="{{ $genero['id'] }}" class="ms-2 form-check-input"/>&nbsp;{{ $genero['nombre'] }}</a></li>
                                        @else
                                            <li><a href="#" class="text-dark" style="text-decoration:none" data-value="option1" tabIndex="-1"> <input type="checkbox" name="selectgenero[{{ $genero->nombre }}]" id="counter{{ $genero->nombre }}" value="{{ $genero['id'] }}" class="ms-2 form-check-input"/>&nbsp;{{ $genero['nombre'] }}</a></li>
                                        @endif
                                        
                                    @endforeach
                                </ul>
                            </div>
                            
                        </div>
                        <div class="mt-3 col-sm-12 ">
                            <label class="form-label fw-bolder ">Colaboradores:</label>
                            <div class="button-group ">
                                <button type="button" class=" shadow-sm border btn btn-default dropdown-toggle" data-toggle="dropdown"><span class=""></span> Seleccione<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach ($artistas as $artista)
                                        @if ( in_array($artista->id, $id_artistas))
                                            <li><a href="#" class="text-dark" style="text-decoration:none" data-value="option1" tabIndex="-1"> <input type="checkbox" checked name="selectartista[{{ $artista->nombre }}]" id="counter{{ $artista->nombre }}" value="{{ $artista['id'] }}" class="ms-2 form-check-input"/>&nbsp;{{ $artista['nombre'] }}</a></li>
                                        @else
                                            <li><a href="#" class="text-dark" style="text-decoration:none" data-value="option1" tabIndex="-1"> <input type="checkbox" name="selectartista[{{ $artista->nombre }}]" id="counter{{ $artista->nombre }}" value="{{ $artista['id'] }}" class="ms-2 form-check-input"/>&nbsp;{{ $artista['nombre'] }}</a></li>
                                        @endif
                                        
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">

                            <input type="hidden" class="form-control shadow-sm"  maxlength="100" value="0" required>
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