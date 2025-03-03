@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Visualizar usuário</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-info btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="listar"><i class="bi bi-card-list"></i>
                </a>
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-outline-warning btn-sm me-1"
                    data-toggle="tooltip" data-placement="top" title="editar"><i class="bi bi-pencil-square"></i>
                </a>
                <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')"
                        class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="apagar"><i
                            class="bi bi-eraser"></i>
                    </button>
                </form>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <div class="accordion" id="accordionExample">
                {{-- dados pessoais do usuário --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dados"
                            aria-expanded="true" aria-controls="collapseOne">
                            Dados pessoais
                        </button>
                    </h2>
                    <div id="dados" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <dl class="row">

                                <dt class="col-sm-3">Nome:</dt>
                                <dd class="col-sm-9">{{ $user->name }}</dd>

                                <dt class="col-sm-3">E-mail:</dt>
                                <dd class="col-sm-9">{{ $user->email }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>{{-- dados pessoais do usuário --}}
                {{-- documentos pessoais --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#docs" aria-expanded="false" aria-controls="collapseTwo">
                            Documentos pessoais
                        </button>
                    </h2>
                    <div id="docs" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($docs)
                                <dt class="col-sm-3">CPF:</dt>
                                <dd class="col-sm-9">{{ $docs->cpf }}</dd>

                                <dt class="col-sm-3">PIS / PASEP:</dt>
                                <dd class="col-sm-9">{{ $docs->pis_pasep }}</dd>

                                <dt class="col-sm-3">Título de eleitor:</dt>
                                <dd class="col-sm-9">{{ $docs->titulo_eleitor }}</dd>

                                <dt class="col-sm-3">CNH:</dt>
                                <dd class="col-sm-9">{{ $docs->cnh }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($docs->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($docs->updated_at)->format('d/m/Y H:i') }}</dd>
                        </div>
                    </div>
                </div>{{-- documentos pessoais --}}
                {{-- endereço --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#endereco" aria-expanded="false" aria-controls="collapseTwo">
                            Endereço
                        </button>
                    </h2>
                    <div id="endereco" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            endereço nº
                            complemento
                            bairro
                            cidade
                            estado
                            cep
                            telefone
                        </div>
                    </div>
                </div>{{-- endereço --}}
                {{-- contrato --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#contrato" aria-expanded="false" aria-controls="collapseThree">
                            Contrato
                        </button>
                    </h2>
                    <div id="contrato" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            tipo de contrato,
                            lotação,
                            equipe,
                            função,
                            remuneração,
                            CBO,
                            SITUAÇÃO,
                            DISPONIBILIDADE,
                            ADMISSÃO,
                            ASO
                            TÉRMINO DO CONTRATO,
                            observação,
                        </div>
                    </div>
                </div>{{-- contrato --}}
                {{-- e-social --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#esocial" aria-expanded="false" aria-controls="collapseThree">
                            E-Social
                        </button>
                    </h2>
                    <div id="esocial" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            matrícula,
                            agentes nocivos,
                            recibos de exames admissionais,
                            recibos de exames perioódicos,
                            recibos de exames mudança de função,
                            retorno ao trabalho,
                            demissional
                        </div>
                    </div>
                </div>{{-- e-social --}}
            </div>
        </div>
    </div>
@endsection
