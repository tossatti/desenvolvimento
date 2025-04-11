@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span><strong>Visualizar insumo</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('insumos.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Voltar"><i class="bi bi-arrow-left-square"></i></i></i>
                </a>
                <a href="{{ route('insumos.edit', ['insumo' => $insumo->id]) }}" class="btn btn-outline-warning btn-sm me-1"
                    data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="bi bi-pencil-square"></i>
                </a>
                <button type="button" class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $insumo->id }}"
                    data-route="{{ route('insumos.destroy', ['insumo' => $insumo->id]) }}" data-toggle="tooltip" data-placement="top"
                    title="Excluir registro">
                    <i class="bi bi-eraser"></i>
                </button>
            </span>
        </div>
        {{-- cabeçalho --}}
        {{-- dados do banco de dados --}}
        <div class="card-body">
            <x-alert />
            <div class="accordion" id="accordionExample">
                {{-- dados pessoais do usuário --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dados"
                            aria-expanded="true" aria-controls="collapseOne">
                            {{ $insumo->descricao }}
                        </button>
                    </h2>
                    <div id="dados" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <dl class="row">

                                <dt class="col-sm-3">Grupo:</dt>
                                <dd class="col-sm-9">{{ $insumo->grupo->grupo }}</dd>

                                <dt class="col-sm-3">Subgrupo:</dt>
                                <dd class="col-sm-9">{{ $insumo->subgrupo->subgrupo }}</dd>

                                <dt class="col-sm-3">Código Meka:</dt>
                                <dd class="col-sm-9">{{ $insumo->codigo }}</dd>

                                <dt class="col-sm-3">Código Sinapi:</dt>
                                <dd class="col-sm-9">{{ $insumo->sinapi }}</dd>

                                <dt class="col-sm-3">Descrição:</dt>
                                <dd class="col-sm-9">{{ $insumo->descricao }}</dd>

                                <dt class="col-sm-3">Referência:</dt>
                                <dd class="col-sm-9">{{ $insumo->referencia }}</dd>

                                <dt class="col-sm-3">Unidade:</dt>
                                <dd class="col-sm-9">{{ $insumo->unidade }}</dd>

                                <dt class="col-sm-3">Valor:</dt>
                                <dd class="col-sm-9">{{ $insumo->valor }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3">{{ \Carbon\Carbon::parse($insumo->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">{{ \Carbon\Carbon::parse($insumo->updated_at)->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>{{-- dados pessoais do usuário --}}
            </div>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
