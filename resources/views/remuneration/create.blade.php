@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar remuneração</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('remuneration.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('remuneration.store') }}" method="POST">
                @method('POST')
                @csrf
                {{-- Remuneração --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#remuneration" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Remuneração</strong>
                            </button>
                        </h2>
                        <div id="remuneration" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <select class="form-select" id="role_id" name="role_id">
                                            <option selected>Selecione a função</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->funcao }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Função</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control valor-input" id="salario_base" name="salario_base"
                                            value="{{ old('salario_base') }}">
                                        <label class="form-label">Salário Base</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="inss" name="inss"
                                            value="{{ old('inss') }}">
                                        <label class="form-label">Desconto do INSS (%)</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="periculosidade" name="periculosidade"
                                            value="{{ old('periculosidade') }}">
                                        <label class="form-label">Periculosidade (%)</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control valor-input" id="alimentacao" name="alimentacao"
                                            value="{{ old('alimentacao') }}">
                                        <label class="form-label">Auxílio alimentacao</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control valor-input" id="transporte" name="transporte"
                                            value="{{ old('transporte') }}">
                                        <label class="form-label">Vale transporte</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Remuneração --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class="col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                    <div class="col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
