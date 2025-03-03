<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- estilo --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Meka Engenharia</title>
</head>

<body>
    {{-- menu superior --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Meka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="text-end">
                <a class="btn btn-outline-light me-2 btn-sm" href="{{ route('login') }}" role="button">Login</a>
                {{-- <button type="button" class="btn btn-outline-light me-2 btn-sm">Login</button> --}}
            </div>
        </div>
    </nav>
    {{-- menu superior --}}
    
    {{-- conteúdo --}}
    <div class="container">
        @yield('public')
    </div>
    {{-- conteúdo --}}
    
</body>

</html>
