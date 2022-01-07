@extends('app')

@section('body')
    <div class="container">

        <div class="row">
            <div class="col-12 pb-5 pt-3 mb-3">
                <div class="mb-3 text-center">
                    <span class="fs-2 fw-bolder">
                        INGRESAR ARTISTA
                    </span>
                </div>
                <form action="{{url('artista')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Nombre:</label>
                            <input type="text" class="form-control shadow-sm" name="nombre" maxlength="100" placeholder="Marcianeke" required>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            <label class="form-label fw-bolder">Imágen:</label>
                            <input type="file" accept="image/png, .jpeg, .jpg .svg .jpg" class="form-control shadow-sm" name="imagen" required>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label fw-bolder">Biografía:</label>
                            <textarea name="descripcion" class="form-control shadow-sm" cols="30" rows="2" maxlength="200" placeholder="" required></textarea>
                        </div>
                        <div class="row w-25 mx-auto mt-4">
                            <button class="btn btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-12 text-center">
                <span class="fs-2 fw-bolder">
                    ARTISTAS
                </span>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Biografia</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artistas as $artista)
                                <tr>
                                    <th scope="col"> {{ $artista['nombre'] }}</th>
                                    <th scope="col"> {{ $artista['descripcion'] }}</th>
                                    <th>
                                        <a onclick="eliminar({{ $artista['id'] }})" href=""> <span class="material-icons" style="color: red;">delete</span></a>
                                        
                                        <a href="{{ url('/artista/'.$artista->id.'/edit')}}" ><span  class="material-icons text-secondary">edit</span></a>
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
        td {
            max-width: 240px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            }
    </style>

@endsection