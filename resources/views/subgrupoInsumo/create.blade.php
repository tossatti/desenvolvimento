@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar subgrupo de insumos</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('subgrupoInsumo.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('subgrupoInsumo.store') }}" method="POST">
                @csrf
                @method('POST')
                {{-- Insumo --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#subgrupoinsumos" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Subgrupo de insumo</strong>
                            </button>
                        </h2>
                        <div id="subgrupoinsumos" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-2">
                                        <label class="form-label">Grupo</label>
                                        <input type="text" class="form-control" id="subgrupo" name="subgrupo" placeholder="Insira o subgrupo a ser criado" value="{{ old('subgrupo') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- insumo --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
