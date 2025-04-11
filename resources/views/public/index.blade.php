@extends('layouts.public')

@section('public')
    <x-alert />
    {{-- carrocel auto --}}
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fixed-height" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/meka.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Construindo com sustentabilidade</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/sa.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Construindo com sustentabilidade</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/meka2.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Construindo com sustentabilidade</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- carrocel auto --}}
    {{-- card --}}
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Elaboração de Projetos</h5>
                        <p class="card-text">
                            A Meka Engenharia conta com uma equipe própria e parceiros qualificados que se
                            preocupam com a
                            individualidade, particularidades, integração e interface de cada projeto, propondo
                            as soluções
                            adequadas às
                            necessidades de cada Cliente, desde a coleta de dados básicos à conclusão da obra.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Elaboração de Projetos</h5>
                        <p class="card-text">
                            A Meka Engenharia conta com uma equipe própria e parceiros qualificados que se
                            preocupam com a
                            individualidade, particularidades, integração e interface de cada projeto, propondo
                            as soluções
                            adequadas às
                            necessidades de cada Cliente, desde a coleta de dados básicos à conclusão da obra.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Elaboração de Projetos</h5>
                        <p class="card-text">
                            A Meka Engenharia conta com uma equipe própria e parceiros qualificados que se
                            preocupam com a
                            individualidade, particularidades, integração e interface de cada projeto, propondo
                            as soluções
                            adequadas às
                            necessidades de cada Cliente, desde a coleta de dados básicos à conclusão da obra.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- card --}}
@endsection
