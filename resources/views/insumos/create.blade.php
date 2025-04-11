@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar insumo</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('insumos.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('insumos.store') }}" method="POST">
                @csrf
                @method('POST')
                {{-- Insumo --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#insumos" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Insumo</strong>
                            </button>
                        </h2>
                        <div id="insumos" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <label class="form-label">Grupo</label>
                                        <select class="form-select" name="grupo_id" id="grupo_id">
                                            <option value="">Selecione</option>
                                            @foreach ($grupos as $grupo)
                                                <option value="{{ $grupo->id }}" {{ old('grupo_id') == $grupo->id ? 'selected' : '' }}>
                                                    {{ $grupo->grupo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label class="form-label">Subgrupo</label>
                                        <select class="form-select" name="subgrupo_id" id="subgrupo_id">
                                            <option value="">Selecione</option>
                                            @foreach ($subgrupos as $subgrupo)
                                                <option value="{{ $subgrupo->id }}"
                                                    {{ old('subgrupo') == $subgrupo->id ? 'selected' : '' }}>
                                                    {{ $subgrupo->subgrupo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <label class="form-label">Código Sinapi</label>
                                        <input type="text" class="form-control" id="sinapi" name="sinapi"
                                            placeholder="Código Sinapi" value="{{ old('sinapi') }}">
                                    </div>
                                    <div class="col-sm-12 mb-2">
                                        <label for="descricao" class="form-label">Descrição do insumo</label>
                                        <input type="text" class="form-control" id="descricao" name="descricao"
                                            placeholder="Descrição do insumo" value="{{ old('descricao') }}">
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <label class="form-label">Referência</label>
                                        <input type="text" class="form-control" id="referencia" name="referencia"
                                            placeholder="Referência" value="{{ old('referencia') }}">
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label class="form-label">Unidade</label>
                                        <select class="form-select" name="unidade" id="unidade">
                                            <option>Selecione</option>
                                            <option value="Caixa" {{ old('unidade') == 'Caixa' ? 'selected' : '' }}>Caixa
                                            </option>
                                            <option value="Cento" {{ old('unidade') == 'Cento' ? 'selected' : '' }}>Cento
                                            </option>
                                            <option value="Conjunto" {{ old('unidade') == 'Conjunto' ? 'selected' : '' }}>
                                                Conjunto</option>
                                            <option value="Dia" {{ old('unidade') == 'Dia' ? 'selected' : '' }}>Dia
                                            </option>
                                            <option value="Hora" {{ old('unidade') == 'Hora' ? 'selected' : '' }}>Hora
                                            </option>
                                            <option value="Jogo" {{ old('unidade') == 'Jogo' ? 'selected' : '' }}>Jogo
                                            </option>
                                            <option value="Kg" {{ old('unidade') == 'Kg' ? 'selected' : '' }}>Kg
                                            </option>
                                            <option value="KW/h" {{ old('unidade') == 'KW/h' ? 'selected' : '' }}>KW/h
                                            </option>
                                            <option value="Litro(s)" {{ old('unidade') == 'Litro(s)' ? 'selected' : '' }}>
                                                Litro(s)</option>
                                            <option value="Metro(s)" {{ old('unidade') == 'Metro(s)' ? 'selected' : '' }}>
                                                Metro(s)</option>
                                            <option value="m²" {{ old('unidade') == 'm²' ? 'selected' : '' }}>m²
                                            </option>
                                            <option value="m³" {{ old('unidade') == 'm³' ? 'selected' : '' }}>m³
                                            </option>
                                            <option value="Mês" {{ old('unidade') == 'Mês' ? 'selected' : '' }}>Mês
                                            </option>
                                            <option value="Par" {{ old('unidade') == 'Par' ? 'selected' : '' }}>Par
                                            </option>
                                            <option value="Saco" {{ old('unidade') == 'Saco' ? 'selected' : '' }}>Saco
                                            </option>
                                            <option value="Tonelada" {{ old('unidade') == 'Tonelada' ? 'selected' : '' }}>
                                                Tonelada</option>
                                            <option value="Unidade" {{ old('unidade') == 'Unidade' ? 'selected' : '' }}>
                                                Unidade</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-2">
                                        <label class="form-label">Valor</label>
                                        <input type="text" class="form-control valor-input" id="valor" name="valor"
                                            placeholder="Valor" value="{{ old('valor') }}">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="imagem" class="form-label">Imagem do insumo</label>
                                        <input class="form-control form-control" id="imagem" name="imagem"
                                            type="file">
                                    </div> --}}
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
                        <button class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
