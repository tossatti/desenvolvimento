@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Editar remuneração</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('remuneration.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('remuneration.update', ['remuneration' => $remuneration->id]) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- Remuneração --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#remuneration" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Remuneração da função: {{ $remuneration->role->funcao}} </strong>
                            </button>
                        </h2>
                        <div id="remuneration" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="salario_base" name="salario_base" value="{{ isset($remuneration->salario_base) ? 'R$ '.number_format($remuneration->salario_base, 2, ',', '.') : old('salario_base') }}">
                                        <label class="form-label">Salário Base</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="inss" name="inss" value="{{ isset($remuneration->inss) ? number_format($remuneration->inss, 2, ',', '.') : old('inss')  }}">
                                        <label class="form-label">Desconto do INSS (%)</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="periculosidade" name="periculosidade" value="{{ isset($remuneration->periculosidade) ? number_format($remuneration->periculosidade, 2, ',', '.') : old('periculosidade')  }}">
                                        <label class="form-label">Periculosidade (%)</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="alimentacao" name="alimentacao" value="{{ isset($remuneration->alimentacao) ? 'R$ '.number_format($remuneration->alimentacao, 2, ',', '.') : old('alimentacao') }}">
                                        <label class="form-label">Auxílio alimentacao</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="transporte" name="transporte" value="{{ isset($remuneration->transporte) ? 'R$ '.number_format($remuneration->transporte, 2, ',', '.') : old('transporte') }}">
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
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
