<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="success-message" content="{{ session('success') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meka.css') }}">
    <title>Meka Engenharia</title>
</head>

<body>
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
        aria-labelledby="sidebarOffcanvasLabel" style="width: 300px">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                style="background-image: none !important; font-size: 1.5rem; color: #070707; opacity: 1;">
                <i class="bi bi-arrow-left-circle" style="font-size: 1.5rem; color: #070707;"></i> </button>
            <a class="navbar-brand text-center" href="{{ route('meka.index') }}" style="width: 100%;">
                <img src="{{ asset('images/mekaiso.png') }}" alt="Início" style="height: 30px;">
            </a>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column mb-auto">
                {{-- administração --}}
                <li class="nav-item" style="text-align: left;">
                    <a class="nav-link active" aria-current="page" href="#" role="button"
                        data-bs-toggle="collapse" data-bs-target="#administração" aria-expanded="false"
                        style="display: block;">
                        <i class="bi bi-ui-checks-grid"
                            style="margin-left: 0; margin-right: 0.5em; font-size: 1.2em;"></i>
                        <span>Administração</span>
                    </a>
                    <div class="collapse" id="administração">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" style="margin-left: 1em;">
                            <li>
                                <i class="bi bi-person-fill"></i>
                                <a href="{{ route('users.index') }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Colaborador</a>
                            </li>
                            <li>
                                <i class="bi bi-card-checklist"></i>
                                <a href="{{ route('hires.index') }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Contratos</a>
                            </li>
                            <li>
                                <i class="bi bi-file-text"></i>
                                <a href="{{ route('curricula.index') }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Currículos</a>
                            </li>
                            {{-- <li>
                                <a href="#"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Fornecedores</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                {{-- administração --}}
                {{-- logística --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" role="button"
                        data-bs-toggle="collapse" data-bs-target="#logistica" aria-expanded="false">
                        <i class="bi bi-house-gear" style="margin-right: 1em; font-size: 1.2em; margin-left: 0"></i>
                        <span>Logística</span>
                    </a>
                    <div class="collapse" id="logistica">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" style="margin-left: 1em;">
                            <li>
                                <i class="bi bi-building"></i>
                                <a href="{{ route('almoxarifado.index') }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Almoxarifado</a>
                            </li>
                            <li>
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                    href="{{ route('insumos.index') }}">Insumos</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- logística --}}
                {{-- Exames --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" role="button"
                        data-bs-toggle="collapse" data-bs-target="#exames" aria-expanded="false">
                        <i class="bi bi-hospital" style="margin-right: 1em; font-size: 1.2em; margin-left: 0"></i>
                        <span>Inspeções médicas</span>
                    </a>
                    <div class="collapse" id="exames">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" style="margin-left: 1em;">
                            <li>
                                <i class="bi bi-building"></i>
                                <a href="#"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Exames Admissionais</a>
                            </li>
                            <li>
                                <i class="bi bi-building"></i>
                                <a href="#"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Exames periódicos</a>
                            </li>
                            <li>
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                    href="#">Exames Demissionais</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Exames --}}
                {{-- Configurações --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" role="button"
                        data-bs-toggle="collapse" data-bs-target="#configuracoes" aria-expanded="false">
                        <i class="bi bi-gear" style="margin-right: 1em; font-size: 1.2em; margin-left: 0"></i>
                        <span>Configurações</span>
                    </a>
                    <div class="collapse" id="configuracoes">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small" style="margin-left: 1em;">
                            <li>
                                <i class="bi bi-journal-bookmark"></i>
                                <a href={{ route('grupoInsumo.index') }}
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Grupos de insumos</a>
                            </li>
                            <li>
                                <i class="bi bi-journal-bookmark-fill"></i>
                                <a href="{{ route('subgrupoInsumo.index') }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Subgrupos de insumos</a>
                            </li>
                            <li>
                                <i class="bi bi-diagram-3"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                    href="{{ route('roles.index') }}">Funções</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Configurações --}}
            </ul>
        </div>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                {{-- <li><a class="dropdown-item" href="#">New project...</a></li> --}}
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>

            </ul>
        </div>
    </div>

    <main class="container">
        <div class="container">
            @yield('content')
        </div>
    </main>
    @stack('scripts')
    {{-- sidebar --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
    <script src="{{ asset('js/meka.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
</body>

</html>
