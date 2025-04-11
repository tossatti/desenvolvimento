@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span><strong>Visualizar Contrato</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('hires.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Voltar"><i class="bi bi-arrow-left-square"></i></i></i>
                </a>
                <a href="{{ route('hires.edit', ['hire' => $hire->id]) }}" class="btn btn-outline-warning btn-sm me-1"
                    data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="bi bi-pencil-square"></i>
                </a>
                <button type="button" class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $hire->id }}"
                    data-route="{{ route('hires.destroy', ['hire' => $hire->id]) }}" data-toggle="tooltip" data-placement="top"
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
                {{-- dados do contrato --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dados"
                            aria-expanded="true" aria-controls="collapseOne">
                            {{ $hire->contrato }} - {{ $hire->objeto }}
                        </button>
                    </h2>
                    <div id="dados" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <dl class="row">

                                <dt class="col-sm-3">CBO:</dt>
                                <dd class="col-sm-9">{{ $hire->cbo }}</dd>

                                <dt class="col-sm-3">Código:</dt>
                                <dd class="col-sm-9">{{ $hire->codigo }}</dd>

                                <dt class="col-sm-3">Sigla:</dt>
                                <dd class="col-sm-9">{{ $hire->sigla }}</dd>

                                <dt class="col-sm-3">Objeto:</dt>
                                <dd class="col-sm-9">{{ $hire->objeto }}</dd>

                                <dt class="col-sm-3">Tipo:</dt>
                                <dd class="col-sm-9">{{ $hire->tipo }}</dd>

                                <dt class="col-sm-3">Contrato:</dt>
                                <dd class="col-sm-9">{{ $hire->contrato }}</dd>

                                <dt class="col-sm-3">Contratante:</dt>
                                <dd class="col-sm-9">{{ $hire->contratante }}</dd>

                                <dt class="col-sm-3">CNPJ:</dt>
                                <dd class="col-sm-9">{{ $hire->cnpj }}</dd>

                                <dt class="col-sm-3">Valor:</dt>
                                <dd class="col-sm-9">{{ $hire->valor }}</dd>

                                <dt class="col-sm-3">Vigência:</dt>
                                <dd class="col-sm-9">{{ $hire->vigencia }}</dd>

                                <dt class="col-sm-3">Início:</dt>
                                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($hire->inicio)->format('d/m/Y') }}</dd>

                                <dt class="col-sm-3">Término:</dt>
                                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($hire->termino)->format('d/m/Y') }}</dd>

                                <dt class="col-sm-3">Gestor:</dt>
                                <dd class="col-sm-9">
                                    @if (is_object($hire->auxiliar) && $hire->auxiliar->name)
                                        {{ $hire->auxiliar->name }}
                                    @else
                                        Não consta
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Auxiliar:</dt>
                                <dd class="col-sm-9">
                                    @if (is_object($hire->auxiliar) && $hire->auxiliar->name)
                                        {{ $hire->auxiliar->name }}
                                    @else
                                        Não consta
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3">{{ \Carbon\Carbon::parse($hire->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">{{ \Carbon\Carbon::parse($hire->updated_at)->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>{{-- dados do contrato --}}
            </div>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
