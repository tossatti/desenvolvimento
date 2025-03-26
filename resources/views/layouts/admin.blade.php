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
    <style>
        .accordion {
            --bs-accordion-active-bg: rgb(173, 247, 173);
            --bs-accordion-active-color: black;
            --bs-accordion-border-color: rgb(173, 247, 173);
            --bs-accordion-btn-focus-box-shadow: rgb(173, 247, 173);
        }
    </style>
    <title>Meka Engenharia</title>
</head>
<body>
    {{-- menu superior --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href=" {{ route('meka.index') }} ">Meka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                {{-- administração --}}
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">Administração</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control-sm disabled" href="">Clientes</a></li>
                            <li><a class="dropdown-item form-control-sm"
                                    href="{{ route('users.index') }}">Colaboradores</a></li>
                            <li><a class="dropdown-item form-control-sm disabled" href="">Contratos</a></li>
                            <li><a class="dropdown-item form-control-sm disabled" href="">Fornecedores</a></li>
                        </ul>
                    </li>
                </ul>
                {{-- administração --}}
                {{-- Logística --}}
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">Logística</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control-sm"
                                    href="{{ route('almoxarifado.index') }}">Almoxarifado</a></li>
                            <li><a class="dropdown-item form-control-sm disabled" href="">Controle veicular</a>
                            </li>
                            <li><a class="dropdown-item form-control-sm disabled" href="">Frota</a></li>
                            <li><a class="dropdown-item form-control-sm" href="{{ route('insumos.index') }}">Insumos</a>
                            </li>
                            <li><a class="dropdown-item form-control-sm disabled" href="#">Manutenção</a></li>
                            <li><a class="dropdown-item form-control-sm disabled" href="#">Patrimônio</a></li>
                        </ul>
                    </li>
                </ul>
                {{-- Logística --}}
                {{-- Obras --}}
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm disabled" data-bs-toggle="dropdown"
                            aria-expanded="false">Obras</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control-sm" href="#">Planejamento mensal</a></li>
                            <li><a class="dropdown-item form-control-sm" href="#">Serviços</a></li>
                            <li><a class="dropdown-item form-control-sm" href="#">Solicitações</a></li>
                            {{-- <li><a class="dropdown-item form-control-sm" href="{{ route('insumos.index') }}">Insumos</a></li> --}}
                        </ul>
                    </li>
                </ul>
                {{-- Obras --}}
                {{-- tarefas --}}
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm disabled" data-bs-toggle="dropdown"
                            aria-expanded="false">Tarefas</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control-sm" href="#">Pendentes</a></li>
                            <li><a class="dropdown-item form-control-sm" href="#">Concluídas</a></li>
                        </ul>
                    </li>
                </ul>
                {{-- tarefas --}}
                {{-- ferramentas --}}
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">Ferramentas</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            {{-- <li><a class="dropdown-item form-control-sm" href="{{ route('users.import') }}">Importar dados de usuários</a></li> --}}
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item form-control-sm" href="{{ route('grupoInsumo.index') }}">Grupos de insumos</a></li>
                            <li><a class="dropdown-item form-control-sm" href="{{ route('subgrupoInsumo.index') }}">Subgrupos de insumos</a></li>
                            {{-- <li><a class="dropdown-item form-control-sm" href="{{ route('insumo.import') }}">Importar dados de insumos</a></li> --}}
                            <li><hr class="dropdown-divider"></li>  
                            <li><a class="dropdown-item form-control-sm" href="{{ route('roles.index') }}">Funções</a></li>  
                        </ul>
                    </li>
                </ul>
                {{-- ferramentas --}}
            </div>
            <div class="text-end">
                <a class="btn btn-outline-light me-2 btn-sm" href="{{ route('logout') }}" role="button">Logout</a>
                {{-- <button type="button" class="btn btn-outline-light me-2 btn-sm">Logout</button> --}}
            </div>
        </div>
    </nav>
    {{-- menu superior --}}
    {{-- conteúdo --}}
    <div class="container">
        @yield('content')
    </div>
    {{-- conteúdo --}}
</body>
</html>
