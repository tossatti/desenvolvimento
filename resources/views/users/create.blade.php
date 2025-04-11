@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar colaborador</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="accordion mb-3 shadow border">
                    {{-- dados pessoais --}}
                    @include('layouts.dados_pessoais')
                    {{-- dados pessoais --}}
                    {{-- documentos pessoais --}}
                    @include('layouts.documentos_pessoais')
                    {{-- documentos pessoais --}}
                    {{-- dados bancários --}}
                    @include('layouts.dados_bancarios')
                    {{-- dados bancários --}}
                    {{-- contrato --}}
                    @include('layouts.contrato')
                    {{-- contrato --}}
                    {{-- informações adicionais --}}
                    @include('layouts.informacoes_adicionais')
                    {{-- informações adicionais --}}
                    {{-- dependentes --}}
                    {{-- @include('layouts.dependentes') --}}
                    {{-- dependentes --}}
                    {{-- e-social --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapse show" type="button" data-bs-toggle="collapse"
                                data-bs-target="#esocial" aria-expanded="false" aria-controls="collapseThree">
                                <strong>E-Social</strong>
                            </button>
                        </h2>
                        <div id="esocial" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="matricula" class="form-label">Matrícula</label>
                                        <input type="text" class="form-control" id="matricula" name="matricula"
                                            placeholder="Matrícula" value="{{ old('matricula') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nocivos" class="form-label">Agentes Nocivos</label>
                                        <input type="date" class="form-control" id="nocivos" name="nocivos"
                                            placeholder="Agentes Nocivos" value="{{ old('nocivos') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="admissionais" class="form-label">Exames admissionais</label>
                                        <input type="date" class="form-control" id="admissionais" name="admissionais"
                                            placeholder="Admissionais" value="{{ old('admissionais') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="periodicos" class="form-label">Exames Periódicos</label>
                                        <input type="date" class="form-control" id="periodicos" name="periodicos"
                                            placeholder="Exames Periódicos" value="{{ old('periodicos') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="mudanca" class="form-label">Exames de mudança de função</label>
                                        <input type="date" class="form-control" id="mudanca" name="mudanca"
                                            placeholder="Exames de mudança de função" value="{{ old('mudanca') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="retorno" class="form-label">Exames de retorno ao trabalho</label>
                                        <input type="date" class="form-control" id="retorno" name="retorno"
                                            placeholder="Exames de retorno ao trabalho" value="{{ old('retorno') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="demissional" class="form-label">Exames demissionais</label>
                                        <input type="date" class="form-control" id="demissional" name="demissional"
                                            placeholder="demissionais" value="{{ old('demissional') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- e-social --}}
                </div>
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
