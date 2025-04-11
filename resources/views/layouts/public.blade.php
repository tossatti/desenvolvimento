<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- estilo --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Contatos</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control" href="{{ route('public.contatos') }}">Contatos</a>
                            </li>
                            <li><a class="dropdown-item form-control" href="{{ route('curricula.create') }}">Mande seu currículo</a></li>
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/meka.js') }}"></script>
</body>

</html>
