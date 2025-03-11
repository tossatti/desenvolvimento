@extends('layouts.public')

@section('public')
    <x-alert />
    {{-- carrocel auto --}}
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 ">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/santo_antonio.png') }}" class="d-block w-100" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Construindo com sustentabilidade</h5>
                            </div> --}}
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/aterro.png') }}" class="d-block w-100" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Construindo com sustentabilidade</h5>
                            </div> --}}
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/caixa.png') }}" class="d-block w-100" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                                <h5 style="color: black;">Construindo com sustentabilidade</h5>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- carrocel auto --}}
    
@endsection
