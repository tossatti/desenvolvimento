@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar Contrato</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('hires.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('hires.store') }}" method="POST">
                @csrf
                @method('POST')
                {{-- Dados do Contrato --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#contrato" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Dados do Contrato</strong>
                            </button>
                        </h2>
                        <div id="contrato" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-2">
                                        <label for="cbo" class="form-label">CBO</label>
                                        <input type="text" class="form-control" id="cbo" name="cbo"
                                            placeholder="CBO" value="{{ old('cbo') }}">
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label for="sigla" class="form-label">Sigla</label>
                                        <input type="text" class="form-control" id="sigla" name="sigla"
                                            placeholder="Sigla" value="{{ old('sigla') }}">
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label for="tipo" class="form-label">Tipo</label>
                                        <input type="text" class="form-control" id="tipo" name="tipo"
                                            placeholder="Tipo" value="{{ old('tipo') }}">
                                    </div>
                                    <div class="col-sm-12 mb-2">
                                        <label for="objeto" class="form-label">Objeto</label>
                                        <input type="text" class="form-control" id="objeto" name="objeto"
                                            placeholder="Objeto" value="{{ old('objeto') }}">
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <label for="contrato" class="form-label">Contrato</label>
                                        <input type="text" class="form-control" id="contrato" name="contrato"
                                            placeholder="Contrato" value="{{ old('contrato') }}">
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <label for="contratante" class="form-label">Contratante</label>
                                        <input type="text" class="form-control" id="contratante" name="contratante"
                                            placeholder="Contratante" value="{{ old('contratante') }}">
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                        <input type="text" class="form-control" id="cnpj" name="cnpj"
                                            placeholder="CNPJ" value="{{ old('cnpj') }}">
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="valor" class="form-label">Valor</label>
                                        <input type="text" class="form-control valor-input" id="valor" name="valor"
                                            placeholder="Valor" value="{{ old('valor') }}">
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="vigencia" class="form-label">Vigência</label>
                                        <input type="text" class="form-control" id="vigencia" name="vigencia"
                                            placeholder="Vigência" value="{{ old('vigencia') }}">
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="inicio" class="form-label">Início</label>
                                        <input type="date" class="form-control" id="inicio" name="inicio"
                                            value="{{ old('inicio') }}">
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="termino" class="form-label">Término</label>
                                        <input type="date" class="form-control" id="termino" name="termino"
                                            value="{{ old('termino') }}">
                                    </div>
                                    <div class="col-sm-4 mb-2"></div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="gestor" class="form-label">Gestor</label>
                                        <select class="form-select" name="gestor" id="gestor">
                                            <option value="">Selecione o Gestor</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('gestor') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="auxiliar" class="form-label">Auxiliar</label>
                                        <select class="form-select" name="auxiliar" id="auxiliar">
                                            <option value="">Selecione o Auxiliar</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('auxiliar') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="">Selecione o Status</option>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                Em andamento
                                            </option>
                                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>
                                                Finalizado
                                            </option>
                                            <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>
                                                Paralisado
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Dados do Contrato --}}
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
