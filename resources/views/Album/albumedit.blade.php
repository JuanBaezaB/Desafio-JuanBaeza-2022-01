@extends('app')
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand ps-2" href="{{ url('/artista') }}">
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
                    <div class="" >
                        <a class="btn btn-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><span class="material-icons align-middle">logout</span> SALIR
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
                            EDITAR ÁLBUM
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
                            <label class="form-label fw-bolder ">Artista:</label>
                            <select  class="form-select form-control shadow-sm" name="artista_id" required>
                                <option value="" disabled selected>Seleccione el artista</option>
                                @foreach ($artistas as $artista)
                                @if ($artista->id==$album->artista_id)
                                    <option value="{{ $artista['id'] }}" selected required>{{ $artista['nombre'] }}</option>
                                @else
                                    <option value="{{ $artista['id'] }}" required>{{ $artista['nombre'] }}</option>
                                @endif
                                    
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