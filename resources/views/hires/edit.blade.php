@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Editar Contrato</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('hires.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('hires.update', $hire->id) }}" method="POST">
                @csrf
                @method('PUT')
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
                                    <div class="col-sm-3 mb-2 form-floating">
                                        <input type="text" class="form-control" id="cno" name="cno"
                                            placeholder="cno" value="{{ old('cno', $hire->cno) }}">
                                        <label for="cno" class="form-label">CBO</label>
                                    </div>
                                    <div class="col-sm-3 mb-2 form-floating">
                                        <input type="text" class="form-control" id="sigla" name="sigla"
                                            placeholder="Sigla" value="{{ old('sigla', $hire->sigla) }}">
                                        <label for="sigla" class="form-label">Sigla</label>
                                    </div>
                                    <div class="form-floating col-sm-3 mb-2">
                                        <select class="form-select form-control" id="tipo" name="tipo">
                                            <option value="">Selecione o tipo</option>
                                            <option value="1" {{ old('tipo', $hire->tipo) == '1' ? 'selected' : '' }}>
                                                Administração</option>
                                            <option value="2" {{ old('tipo', $hire->tipo) == '2' ? 'selected' : '' }}>
                                                Manutenção</option>
                                            <option value="3" {{ old('tipo', $hire->tipo) == '3' ? 'selected' : '' }}>
                                                Obra</option>
                                        </select>
                                        <label for="tipo" class="form-label">Setor</label>
                                    </div>
                                    <div class="col-sm-12 mb-2 form-floating">
                                        <input type="text" class="form-control" id="objeto" name="objeto"
                                            placeholder="Objeto" value="{{ old('objeto', $hire->objeto) }}">
                                        <label for="objeto" class="form-label">Objeto</label>
                                    </div>
                                    <div class="col-sm-6 mb-2 form-floating">
                                        <input type="text" class="form-control" id="contrato" name="contrato"
                                            placeholder="Contrato" value="{{ old('contrato', $hire->contrato) }}">
                                        <label for="contrato" class="form-label">Contrato</label>
                                    </div>
                                    <div class="col-sm-6 mb-2 form-floating">
                                        <input type="text" class="form-control" id="contratante" name="contratante"
                                            placeholder="Contratante" value="{{ old('contratante', $hire->contratante) }}">
                                        <label for="contratante" class="form-label">Contratante</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="cnpj" name="cnpj"
                                            placeholder="CNPJ" value="{{ old('cnpj', $hire->cnpj) }}">
                                        <label for="cnpj" class="form-label">CNPJ</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control valor-input" id="valor" name="valor"
                                            placeholder="Valor" value="{{ old('valor', $hire->valor) }}">
                                        <label for="valor" class="form-label">Valor</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="text" class="form-control" id="vigencia" name="vigencia"
                                            placeholder="Vigência" value="{{ old('vigencia', $hire->vigencia) }}">
                                        <label for="vigencia" class="form-label">Vigência</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="date" class="form-control" id="inicio" name="inicio"
                                            value="{{ old('inicio', \Carbon\Carbon::parse($hire->inicio)->setTimezone('America/Manaus')->format('d/m/Y') ? \Carbon\Carbon::parse($hire->inicio)->setTimezone('America/Manaus')->format('Y-m-d') : '') }}">
                                        <label for="inicio" class="form-label">Início</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <input type="date" class="form-control" id="termino" name="termino"
                                            value="{{ old('termino', \Carbon\Carbon::parse($hire->termino)->setTimezone('America/Manaus')->format('d/m/Y') ? \Carbon\Carbon::parse($hire->termino)->setTimezone('America/Manaus')->format('Y-m-d') : '') }}">
                                        <label for="termino" class="form-label">Término</label>
                                    </div>
                                    <div class="col-sm-4 mb-2"></div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <select class="form-select" name="gestor" id="gestor">
                                            <option value="">Selecione o Gestor</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('gestor', $hire->gestor_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="gestor" class="form-label">Gestor</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <select class="form-select" name="auxiliar" id="auxiliar">
                                            <option value="">Selecione o Auxiliar</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('auxiliar', $hire->auxiliar_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="auxiliar" class="form-label">Auxiliar</label>
                                    </div>
                                    <div class="col-sm-4 mb-2 form-floating">
                                        <select class="form-select" name="status" id="status">
                                            <option value="">Selecione o Status</option>
                                            <option value="1"
                                                {{ old('status', $hire->status) == '1' ? 'selected' : '' }}>
                                                Em andamento
                                            </option>
                                            <option value="2"
                                                {{ old('status', $hire->status) == '2' ? 'selected' : '' }}>
                                                Finalizado
                                            </option>
                                            <option value="3"
                                                {{ old('status', $hire->status) == '3' ? 'selected' : '' }}>
                                                Paralisado
                                            </option>
                                        </select>
                                        <label for="status" class="form-label">Status</label>
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
                        <button class="btn btn-success btn-sm">Atualizar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
