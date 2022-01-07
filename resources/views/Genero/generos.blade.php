
@extends('app')

@section('body')
    <div class="container">

        <div class="row">
            
            <div class="col-12  pb-5 pt-3 mb-4">
                <div class="row">
                    <div class="mb-3 col-lg-12 text-center">
                        <span class="fs-2 fw-bolder">
                            INGRESAR GENERO
                        </span>
                    </div>
                </div>
                <form action="{{url('genero')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <label class="form-label fw-bolder">Nombre:</label>
                        <div class="col-sm-9 col-lg-6">
                            <input type="text" class="form-control shadow-sm" name="nombre" maxlength="100" placeholder="Rock" required>
                        </div>
                        <div class=" col-sm-3 col-lg-6 ">
                            <button class="btn me-4 btn-secondary shadow-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generos as $genero)
                                <tr>
                                    <th scope="col"> {{$genero['nombre']}}</th>
                                    <th>

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