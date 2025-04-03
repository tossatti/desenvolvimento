<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel"
        style="width: 200px">
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
                        data-bs-toggle="collapse" data-bs-target="#administração" aria-expanded="false" style="display: block;">
                        <i class="bi bi-ui-checks-grid"
                            style="margin-left: 0; margin-right: 0.5em; font-size: 1.2em;"></i>
                        Administração
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
                        <i class="bi bi-rulers"
                            style="margin-right: 1em; font-size: 1.2em; margin-left: 0"></i>
                        Logística
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
                                <a href="{{ route('hires.index') }}"
                                    class="link-body-emphasis d-inline-flex text-decoration-none rounded">Contratos</a>
                            </li>
                            {{-- <li>
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="">Controle veicular</a>
                            </li>
                            <li>
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="">Frota</a></li>
                            <li> --}}
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="{{ route('insumos.index') }}">Insumos</a>
                            </li>
                            {{-- <li>
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="#">Manutenção</a>
                            </li>
                            <li>
                                <i class="bi bi-card-checklist"></i>
                                <a class="link-body-emphasis d-inline-flex text-decoration-none rounded" href="#">Patrimônio</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                {{-- logística --}}





                
            </ul>
            
        
        </div>
    </div>



    <main class="container">
        <div class="container">
            @yield('content')
        </div>
    </main>
    {{-- sidebar --}}

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('js/meka.js') }}" ></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

</body>

</html>
