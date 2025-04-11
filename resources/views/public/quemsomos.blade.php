@extends('layouts.public')

@section('public')
    <x-alert />
    {{-- carrocel auto --}}
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
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
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quem somos</h5>
                        <p class="card-text">
                            A Meka Engenharia é uma empresa genuinamente Rondoniense atuando no mercado de construção civil
                            há 10 anos. Hoje estabelecida em Porto Velho, nossa empresa prima pela formação de parcerias e
                            na elaboração e execução de projetos de engenharia. Visamos utilizar as melhores técnicas,
                            aliadas a planejamento e gestão para trabalhar com o melhor custo benefício, qualidade e
                            produtividade.
                            Visamos atender à versatilidade da nossa clientela, bem como às diversidades de exigências do
                            mercado altamente competitivo, desenvolvendo e/ou aprimorando técnicas procedimentais para
                            realização das atividades que conduzam à satisfação de seus Clientes.
                            Nosso compromisso é desenvolver cada projeto correspondendo às necessidades peculiares de cada
                            Cliente, desenvolvendo técnicas e métodos aliados à nossa experiência e buscar a um menor custo
                            benefício a solução para o seu empreendimento.
                            A Meka Engenharia, no ano que completa 16 anos de fundação, se consolida como uma empresa de
                            ponta no mercado.
                            Buscando sempre a melhoria contínua no atendimento aos parceiros comerciais, buscamos e fomos
                            contemplados com a certificação da ABNT NBR ISO 9001:2015 em 10/02/2023, esta conquista impacta
                            diretamente na obrigatoriedade de padronização nos serviços ofertados, qualidade e cumprimento
                            de prazos pactuados.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Como trabalhamos</h5>
                        <p class="card-text">
                            A Meka Engenharia, embasada na pesquisa mercadológica, visa atender à versatilidade de sua
                            clientela, bem como às diversidades de exigências do mercado altamente competitivo, buscando
                            desenvolver e/ou aprimorar técnicas procedimentais hábeis à realização das atividades que
                            conduzam à imprescindível satisfação de seus Clientes.
                            Desta maneira, o desenvolvimento de cada projeto sempre corresponderá às necessidades peculiares
                            de cada Cliente, haja vista a existência métodos e técnicas especialmente desenvolvidas para
                            identificar e, posteriormente, solucionar as deficiências porventura detectadas a um menor custo
                            para o cliente pautando-se, outrossim, na presteza, objetividade e regularidade dos serviços
                            prestados, sempre em sintonia com os interesses do cliente.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quadro técnico</h5>
                        <p class="card-text">
                            A Meka Engenharia conta em seu quadro técnico, profissionais graduados e pós-graduados, atuantes
                            na engenharia civil, mecânica, química, elétrica, licenciamento de obras, engenharia segurança
                            do trabalho, meio ambiente e arquitetura. Conta também com parceiros atuantes na engenharia
                            sanitarista e geologia, além de topógrafos, laboratoristas e afins.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- card --}}
    <div class="container text-center" style="background-color: lightgreen">
        <div class="row row-cols-3 ">
            <div class="col-md-4 mt-4">
                <div class="alert alert-success" role="alert">
                    <strong><h4>2007</h4></strong>
                    <p>Ano de fundação</p>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="alert alert-warning" role="alert">
                    <strong><h4>100</h4></strong>
                    <p>Mais de 100 obras concluídas</p>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="alert alert-success" role="alert">
                    <strong><h4>2 dias</h4></strong>
                    <p>Para mobilização de canteiro</p>
                </div>
            </div>
        </div>
    </div>
@endsection
