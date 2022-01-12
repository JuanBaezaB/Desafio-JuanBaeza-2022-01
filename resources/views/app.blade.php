<!DOCTYPE html>
<html lang="es">

<head>
    <!-- navbar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- /navbar -->

    @yield('css')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script>
        function eliminar(id) {
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            console.log(id);
            fetch(`http://127.0.0.1:8000/artista/${id}`, {
                    method: 'DELETE', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(res => {
                    document.location.reload(true);
                })
                .catch(error => console.error('Error:', error));
        }

    </script>
    
    <title>Music</title>
</head>

<body>
    <style>
        .div1{
            background-image: url("https://images3.alphacoders.com/264/264659.jpg");
            height: 500px;
            padding-top: ;
            background-position: center top;
        }
        a:hover {
        color:rgb(190, 194, 191) !important;
    }

    
    </style>
    @yield('nav')
    
    @yield('body')
    @yield('footer')
    @yield('js')
</body>

</html>
