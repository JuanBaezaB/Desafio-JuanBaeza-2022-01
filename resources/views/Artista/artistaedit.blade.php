@extends('app')

@section('body')
    <div class="container">

        <div class="row">
            <div class="col-12  pb-5 pt-3 mb-4">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{url('/artista')}}"><span class="material-icons  text-secondary align-middle">keyboard_arrow_left</span> </a>
                    </div>
                    <div class="mb-3 col-lg-4 text-center">
                        <span class="fs-2 fw-bolder">
                            INGRESAR ARTISTA
                        </span>
                    </div>
                </div>
                <form action="{{url('/artista/'.$artista->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Nombre:</label>
                            <input type="text" class="form-control shadow-sm" name="nombre" maxlength="100" value="{{$artista->nombre}}" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Imágen:</label>
                            <input type="file" accept="image/png, .jpeg, .jpg .svg .jpg" class="form-control shadow-sm" value="{{$artista->imagen}}" name="imagen" required>
                        </div> 
                        <div class="col-lg-12">
                            <label class="form-label fw-bolder">Biografía:</label>
                            <textarea name="descripcion" class="form-control shadow-sm" cols="30" rows="2" maxlength="200" required>{{$artista->descripcion}}</textarea>
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