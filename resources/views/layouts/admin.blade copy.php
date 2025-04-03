<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meka.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}"> --}}
    <title>Meka Engenharia</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('meka.index') }}">Meka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">Administração</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control-sm disabled" href="">Clientes</a></li>
                            <li><a class="dropdown-item form-control-sm"
                                    href="{{ route('users.index') }}">Colaboradores</a></li>
                            <li><a class="dropdown-item form-control-sm" href="{{ route('hires.index') }}">Contratos</a>
                            </li>
                            <li><a class="dropdown-item form-control-sm disabled" href="">Fornecedores</a></li>
                        </ul>
                    </li>
                </ul>
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
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm disabled" data-bs-toggle="dropdown"
                            aria-expanded="false">Obras</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item form-control-sm" href="#">Planejamento mensal</a></li>
                            <li><a class="dropdown-item form-control-sm" href="#">Serviços</a></li>
                            <li><a class="dropdown-item form-control-sm" href="#">Solicitações</a></li>
                        </ul>
                    </li>
                </ul>
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
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">Ferramentas</button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item form-control-sm" href="{{ route('grupoInsumo.index') }}">Grupos
                                    de insumos</a></li>
                            <li><a class="dropdown-item form-control-sm"
                                    href="{{ route('subgrupoInsumo.index') }}">Subgrupos de insumos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item form-control-sm" href="{{ route('roles.index') }}">Funções</a>
                            </li>
                            <li><a class="dropdown-item form-control-sm"
                                    href="{{ route('remuneration.index') }}">Remunerações</a>
                            </li>
                            {{-- <li><a class="dropdown-item form-control-sm" href="{{ route('remuneration.import') }}">Importar Remunerações</a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="text-end">
                <a class="btn btn-outline-light me-2 btn-sm" href="{{ route('logout') }}" role="button">Logout</a>
            </div>
        </div>
    </nav>

    {{-- Botão Hamburguer --}}
    <button class="btn btn-primary hamburger-btn" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas" aria-label="Abrir Menu">
        <div class="hamburger-inner">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </button>

    {{-- Sidebar --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas"
        aria-labelledby="sidebarOffcanvasLabel" style="width: 200px">
        <div class="offcanvas-header">
            <a class="navbar-brand" href="{{ route('meka.index') }}">Meka</a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis" href="#">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Link
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis dropdown-toggle" href="#" role="button"
                        data-bs-toggle="collapse" data-bs-target="#dropdownSidebar" aria-expanded="false">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Dropdown
                    </a>
                    <div class="collapse" id="dropdownSidebar">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Action</a>
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Another
                                    action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="#"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Something
                                    else here</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis disabled" aria-disabled="true">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#person-circle" />
                        </svg>
                        Disabled
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#"
                    class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>User</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>



    <main class="container">
        <div class="container">
            @yield('content')
        </div>
    </main>
    {{-- sidebar --}}



    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/meka.js') }}" defer></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

</body>

</html>
