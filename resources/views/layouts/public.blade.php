<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- estilo --}}
    <link rel="stylesheet" href="css/edit.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('css/app.css') }}"></script>
    <title>Meka Engenharia</title>
</head>
<body>
    {{-- menu superior --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('public.index') }}">Meka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.quemsomos') }}">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.servicos') }}">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.projetos') }}">Projetos</a>
                    </li>
                    {{-- contatos --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contatos</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control" href="{{ route('public.contatos') }}">Contatos</a></li>
                            <li><a class="dropdown-item form-control" href="{{ route('public.curriculum') }}">Mande seu currículo</a></li>
                        </ul>
                    </li>
                    {{-- contatos --}}
                </ul>
            </div>
            <div class="text-end">
                <a class="btn btn-outline-light me-2 btn-sm" href="{{ route('login') }}" role="button">Login</a>
            </div>
        </div>
    </nav>
    {{-- menu superior --}}

    {{-- conteúdo --}}
    <div class="container">
        @yield('public')
    </div>
    {{-- conteúdo --}}
    <script>
        const currentPage = new URL(window.location.href).pathname;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            const href = new URL(link.href, window.location.origin)
                .pathname; // Usa window.location.origin para URLs relativas
            if (href === currentPage) {
                link.classList.add('active');
            }
        });
    </script>
</body>

</html>
