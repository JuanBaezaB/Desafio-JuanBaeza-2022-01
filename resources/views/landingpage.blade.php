@extends('app')

@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@endsection

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
                    <a class="btn btn-dark " href="{{ route('login') }}" role="button"><span
                            class="material-icons align-middle">login</span> INGRESAR</a>
                </li>
            </ul>
        </div>
    </nav>

@endsection
@section('body')
    <div class="container">
        <div id="slider" class="owl-carousel owl-theme">
            @foreach ($collection as $item)
                <div class="card item" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach

            <div class="item">
                <h4>1</h4>
            </div>


        </div>
    </div>




@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
        $('.sliderl').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

@endsection
