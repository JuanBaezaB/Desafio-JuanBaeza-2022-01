@extends('app')

@section('body')
    @foreach ($artistas as $artista)
        <h1>{{ $artista['nombre'] }}</h1>
        <button onclick="eliminar({{ $artista['id'] }})">eliminar</button>
    @endforeach
    <script>
        function eliminar(id) {
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            console.log(id);
            fetch(`http://127.0.0.1:8000/artista/${id}`,{
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

@endsection
