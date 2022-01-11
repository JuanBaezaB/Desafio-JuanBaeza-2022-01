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
                    <a class="nav-link btn btn-primary text-white fw-bolder" href="{{url('/artista')}}">ARTISTA</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link fw-bolder" href="{{url('/album')}}">ÁLBUM</a>
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

@section('body')


    <div class="container">

        <div class="row">
            
            <div class="col-12 pb-5 pt-3 mb-3">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{url('/artista')}}"><span class="material-icons  text-secondary align-middle">keyboard_arrow_left</span> </a>
                    </div>
                    <div class="mb-3 col-lg-4 text-center">
                        <span class="fs-2 fw-bolder">
                            FORMULARIO PARA INGRESAR UN ARTISTA
                        </span>
                    </div>
                </div>
                <form action="{{ url('artista') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Nombre:</label>
                            <input type="text" class="form-control shadow-sm" name="nombre" maxlength="100"
                                placeholder="Marcianeke" required>
                        </div>
                        <div class=" col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Imágen:</label>
                            <input type="file" accept="image/*" class="form-control shadow-sm" name="imagen" required>
                        </div>
                        <div class="mt-3 col-lg-12">
                            <label class="form-label fw-bolder">Biografía:</label>
                            <textarea name="descripcion" class="form-control shadow-sm" cols="30" rows="2" maxlength="200"
                                placeholder="Matías Muñoz (Talca, 11 de enero de 2002), más conocido como Marcianeke, es un cantante chileno. Tuvo reconocimiento en Spotify por la popularidad de su sencillo «Dímelo má» en colaboración con Pailita" required></textarea>
                        </div>
                        <div class="row w-25 mx-auto mt-4">
                            <button class="btn btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
