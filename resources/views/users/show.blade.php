@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
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
                                <dd class="col-sm-3">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }}
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
                            <dl class="row">

                                <dt class="col-sm-1">CPF:</dt>
                                <dd class="col-sm-2">{{ $docs->cpf }}</dd>

                                <dt class="col-sm-2">PIS / PASEP:</dt>
                                <dd class="col-sm-2">{{ $docs->pis_pasep }}</dd>

                                <dt class="col-sm-2">Título de eleitor:</dt>
                                <dd class="col-sm-3">{{ $docs->titulo_eleitor }}</dd>

                                <dt class="col-sm-1">CNH:</dt>
                                <dd class="col-sm-2">{{ $docs->cnh }}</dd>

                                <dt class="col-sm-3">CTPS:</dt>
                                <dd class="col-sm-6">{{ $docs->ctps }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3"> {{ \Carbon\Carbon::parse($docs->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3"> {{ \Carbon\Carbon::parse($docs->updated_at)->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>{{-- documentos pessoais --}}
                {{-- dados bancários --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#bancario" aria-expanded="false" aria-controls="collapseTwo">
                            Dados bancários
                        </button>
                    </h2>
                    <div id="bancario" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <dl class="row">
                                <dt class="col-sm-2">Banco:</dt>
                                <dd class="col-sm-2">{{ $banco->banco }}</dd>

                                <dt class="col-sm-2">Agência:</dt>
                                <dd class="col-sm-2">{{ $banco->agencia }}</dd>

                                <dt class="col-sm-2">Tipo de conta:</dt>
                                <dd class="col-sm-2">{{ $banco->tipoconta }}</dd>

                                <dt class="col-sm-2">Nº da conta:</dt>
                                <dd class="col-sm-2">{{ $banco->numeroConta }}</dd>

                                <dt class="col-sm-2">Tipo de chave pix:</dt>
                                <dd class="col-sm-2">{{ $banco->tipopix }}</dd>

                                <dt class="col-sm-2">Chave pix:</dt>
                                <dd class="col-sm-2">{{ $banco->pix }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3"> {{ \Carbon\Carbon::parse($banco->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3"> {{ \Carbon\Carbon::parse($banco->updated_at)->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                {{-- dados bancários --}}
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
                            <dl class="row">
                                <dt class="col-sm-2">Endereço:</dt>
                                <dd class="col-sm-7">{{ $adress->endereco }}</dd>

                                <dt class="col-sm-1">Nº:</dt>
                                <dd class="col-sm-2">{{ $adress->numero }}</dd>

                                <dt class="col-sm-2">Complemento:</dt>
                                <dd class="col-sm-1">{{ $adress->complemento }}</dd>

                                <dt class="col-sm-1">Bairro:</dt>
                                <dd class="col-sm-2">{{ $adress->bairro }}</dd>

                                <dt class="col-sm-1">Cidade:</dt>
                                <dd class="col-sm-2">{{ $adress->cidade }}</dd>

                                <dt class="col-sm-1">Estado:</dt>
                                <dd class="col-sm-1">{{ $adress->estado }}</dd>

                                <dt class="col-sm-3">CEP:</dt>
                                <dd class="col-sm-3">{{ $adress->cep }}</dd>

                                <dt class="col-sm-3">Telefone:</dt>
                                <dd class="col-sm-3">{{ $adress->telefone }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($adress->created_at)->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($adress->updated_at)->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
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
                            <dl class="row">
                                <dt class="col-sm-2">Tipo:</dt>
                                <dd class="col-sm-2">{{ $contrato->tipoContrato }}</dd>

                                <dt class="col-sm-2">Lotação:</dt>
                                <dd class="col-sm-2">{{ $contrato->lotacao }}</dd>

                                <dt class="col-sm-2">Equipe:</dt>
                                <dd class="col-sm-2">{{ $contrato->equipe }}</dd>

                                <dt class="col-sm-2">Função:</dt>
                                <dd class="col-sm-2">{{ $contrato->funcao }}</dd>

                                <dt class="col-sm-2">Remuneração:</dt>
                                <dd class="col-sm-2">{{ $contrato->remuneracao }}</dd>

                                <dt class="col-sm-2">CBO:</dt>
                                <dd class="col-sm-2">{{ $contrato->cbo }}</dd>

                                <dt class="col-sm-2">Situação:</dt>
                                <dd class="col-sm-2">{{ $contrato->situacao }}</dd>

                                <dt class="col-sm-2">Disponibilidade:</dt>
                                <dd class="col-sm-2">{{ $contrato->disponibilidade }}</dd>

                                <dt class="col-sm-2">Admissão:</dt>
                                <dd class="col-sm-2">{{ \Carbon\Carbon::parse($contrato->admissao)->format('d/m/Y') }}</dd>

                                <dt class="col-sm-2">ASO:</dt>
                                <dd class="col-sm-2">{{ \Carbon\Carbon::parse($contrato->aso)->format('d/m/Y') }}</dd>

                                <dt class="col-sm-2">Término:</dt>
                                <dd class="col-sm-6">{{ \Carbon\Carbon::parse($contrato->termino)->format('d/m/Y') }}</dd>

                                <dt class="col-sm-2">Observação:</dt>
                                <dd class="col-sm-10">{{ $contrato->observacao }}</dd>

                                <dt class="col-sm-2">Cadastrado em:</dt>
                                <dd class="col-sm-2">{{ \Carbon\Carbon::parse($contrato->created_at)->format('d/m/Y H:i') }}</dd>

                                <dt class="col-sm-2">Atualizado em:</dt>
                                <dd class="col-sm-2">{{ \Carbon\Carbon::parse($contrato->updated_at)->format('d/m/Y H:i') }}</dd>
                            </dl>
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
                            <dl class="row">

                            </dl>
                            matrícula,
                            agentes nocivos,
                            recibos de exames admissionais,
                            recibos de exames perioódicos,
                            recibos de exames mudança de função,
                            retorno ao trabalho,
                            demissional
                        </div>
                    </div>
                </div>
                {{-- e-social --}}
            </div>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
