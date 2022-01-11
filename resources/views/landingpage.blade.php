@extends('app')
@section('nav')
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
                <a class="nav-link fw-bolder" href="">ARTISTA</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  fw-bolder" href="">ÁLBUM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bolder" href="">CANCIÓN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-primary text-white  fw-bolder" href="">GÉNERO</a>
            </li>
        </ul> 
        <ul class="navbar-nav text-center mt-2 mb-2 me-3">
            <li class="nav-item">
                <a class="btn btn-dark " href="{{ route('login') }}" role="button"><span class="material-icons align-middle">login</span> INGRESAR</a>
            </li>
        </ul>
    </div>
</nav>
@endsection
@endsection
@section('body')
    
@endsection