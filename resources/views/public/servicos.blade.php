@extends('layouts.public')

@section('public')
    <x-alert />
    {{-- carrocel auto --}}
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8 ">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/elaboracao_projetos.png') }}" class="d-block w-50" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Elaboração de projetos</h5>
                            </div> --}}
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/fiscalizacao.png') }}" class="d-block w-50" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Fiscalizção e execução de obras</h5>
                            </div> --}}
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/licenciamento.png') }}" class="d-block w-50" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Licenciamento de obras</h5>
                            </div> --}}
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
                <div class="card sem-borda">
                    <div class="card-body">
                        <h5 class="card-title text-center">Elaboração de Projetos</h5>
                        <p class="card-text justificado">
                            A Meka Engenharia conta com uma equipe própria e parceiros qualificados que se
                            preocupam com a individualidade, particularidades, integração e interface de cada projeto, propondo as soluções adequadas às necessidades de cada Cliente, desde a coleta de dados básicos à conclusão da obra.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card sem-borda">
                    <div class="card-body ">
                        <h5 class="card-title text-center">Fiscalização e execução	de obras</h5>
                        <p class="card-text justificado">
                            A Meka Engenharia auxilia a executora no cumprimento fiel das normas e legislação pertinentes, exigidas pelo projeto e nas soluções dos problemas decorrentes durante a execução do mesmo, visando assim, a garantir a qualidade contratada e valorização do investimento do Cliente.
                            ​A Meka Engenharia através de uma equipe de colaboradores capacitados, executa o projeto, levando em conta suas particularidades e complexidade pautando sempre na economia, prazos contratuais, qualidade dos serviços e principalmente na prevenção de acidentes do trabalho.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card sem-borda">
                    <div class="card-body">
                        <h5 class="card-title text-center">Licenciamento de obras</h5>
                        <p class="card-text justificado">
                            A Meka Engenharia elabora e acompanha os processos de licenciamento das obras de diversas atividades (indústria, comércio e serviços) no âmbito Municipal: Ambiental, Trânsito e Vigilância Sanitária; Estadual: Ambiente (operação, outorga de água e lançamento de efluentes); CBM e AGEVISA; Federal: IBAMA, DNIT, ANVISA e CNO com monitoramento da obra até a emissão do HABITE-SE do empreendimento em buscando celeridade das vistorias e emissão de licenças.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- card --}}
@endsection
