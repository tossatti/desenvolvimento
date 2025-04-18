@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span><strong>Visualizar dados do colaborador</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Voltar"><i class="bi bi-arrow-left-square"></i></i></i>
                </a>
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-outline-warning btn-sm me-1"
                    data-toggle="tooltip" data-placement="top" title="Editar registro"><i class="bi bi-pencil-square"></i>
                </a>
                <button type="button" class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $user->id }}"
                    data-route="{{ route('users.destroy', ['user' => $user->id]) }}" data-toggle="tooltip"
                    data-placement="top" title="Excluir registro">
                    <i class="bi bi-eraser"></i>
                </button>
            </span>
        </div>
        {{-- cabeçalho --}}
        {{-- dados do banco de dados --}}
        <div class="card-body">
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

                                <dt class="col-sm-3">Data de nascimento:</dt>
                                <dd class="col-sm-9">
                                    {{ \Carbon\Carbon::parse($user->nascimento)->setTimezone('America/Manaus')->format('d/m/Y') }}
                                </dd>

                                <dt class="col-sm-3">Naturalidade:</dt>
                                <dd class="col-sm-9">{{ $user->naturalidade }}</dd>

                                <dt class="col-sm-3">Nacionalidade:</dt>
                                <dd class="col-sm-9">{{ $user->nacionalidade }}</dd>

                                <dt class="col-sm-3">Gênero:</dt>
                                <dd class="col-sm-9">
                                    @if ($user->genero == '1')
                                        Masculino
                                    @elseif ($user->genero == '2')
                                        Feminino
                                    @elseif ($user->genero == '3')
                                        Outro
                                    @elseif ($user->genero == '4')
                                        Prefiro não informar
                                    @else
                                        Não especificado
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Escolaridade:</dt>
                                <dd class="col-sm-9">
                                    @php
                                        $escolaridades = [
                                            '1' => 'Fundamental incompleto',
                                            '2' => 'Fundamental completo',
                                            '3' => 'Médio incompleto',
                                            '4' => 'Médio completo',
                                            '5' => 'Curso técnico incompleto',
                                            '6' => 'Curso técnico completo',
                                            '7' => 'Superior incompleto',
                                            '8' => 'Superior completo',
                                            '9' => 'Pós-graduação incompleto',
                                            '10' => 'Pós-graduação completo',
                                        ];
                                    @endphp
                                    {{ $escolaridades[$user->escolaridade] ?? 'Não Informado' }}
                                </dd>

                                <dt class="col-sm-3">Raça:</dt>
                                <dd class="col-sm-9">
                                    @if ($user->raca == '1')
                                        Branca
                                    @elseif ($user->raca == '2')
                                        Negra
                                    @elseif ($user->raca == '3')
                                        Parda
                                    @elseif ($user->raca == '4')
                                        Amarela
                                    @elseif ($user->raca == '5')
                                        Indígena
                                    @else
                                        Não especificado
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Estado civil:</dt>
                                <dd class="col-sm-9">
                                    @if ($user->civil == '1')
                                        Solteiro(a)
                                    @elseif ($user->civil == '2')
                                        Casado(a)
                                    @elseif ($user->civil == '3')
                                        Divorciado(a)
                                    @elseif ($user->civil == '4')
                                        Viúvo(a)
                                    @elseif ($user->civil == '5')
                                        Separado(a)
                                    @elseif ($user->civil == '6')
                                        Desquitado(a)
                                    @elseif ($user->civil == '7')
                                        União estável
                                    @else
                                        Não informado
                                    @endif
                                </dd>

                                <dt class="col-sm-3">Tamanho da calça:</dt>
                                <dd class="col-sm-9">{{ $user->calca }}</dd>

                                <dt class="col-sm-3">Tamanho da Camisa:</dt>
                                <dd class="col-sm-9">{{ $user->camisa }}</dd>

                                <dt class="col-sm-3">Tamanho do calçado:</dt>
                                <dd class="col-sm-9">{{ $user->calcado }}</dd>

                                <dt class="col-sm-3">Curso de NR 10:</dt>
                                <dd class="col-sm-9">{{ $user->nr10 }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($user->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($user->updated_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
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
                                <dd id="cpf" class="col-sm-2">{{ $docs->cpf }}</dd>

                                <dt class="col-sm-2">PIS / PASEP:</dt>
                                <dd id="pis" class="col-sm-1">{{ $docs->pis_pasep }}</dd>

                                <dt class="col-sm-1">CNH:</dt>
                                <dd id="cnh" class="col-sm-1">{{ $docs->cnh }}</dd>

                                <dt class="col-sm-2">Categoria:</dt>
                                <dd id="catcnh" class="col-sm-2">{{ $docs->cnh }}</dd>

                                <dt class="col-sm-2">Título de eleitor:</dt>
                                <dd id="titulo" class="col-sm-2">{{ $docs->titulo_eleitor }}</dd>

                                <dt class="col-sm-2">Zona:</dt>
                                <dd id="zona" class="col-sm-2">{{ $docs->zona }}</dd>

                                <dt class="col-sm-2">Seção:</dt>
                                <dd id="secao" class="col-sm-2">{{ $docs->secao }}</dd>

                                <dt class="col-sm-2">CTPS:</dt>
                                <dd id="ctps" class="col-sm-10">{{ $docs->ctps }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($docs->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($docs->updated_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
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
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($banco->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($banco->updated_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
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
                                <dd class="col-sm-1">
                                    @php
                                        $estados = [
                                            '1' => 'AC',
                                            '2' => 'AL',
                                            '3' => 'AP',
                                            '4' => 'AM',
                                            '5' => 'BA',
                                            '6' => 'CE',
                                            '7' => 'DF',
                                            '8' => 'ES',
                                            '9' => 'GO',
                                            '10' => 'MA',
                                            '11' => 'MT',
                                            '12' => 'MS',
                                            '13' => 'MG',
                                            '14' => 'PA',
                                            '15' => 'PB',
                                            '16' => 'PR',
                                            '17' => 'PE',
                                            '18' => 'PI',
                                            '19' => 'RJ',
                                            '20' => 'RN',
                                            '21' => 'RS',
                                            '22' => 'RO',
                                            '23' => 'RR',
                                            '24' => 'SC',
                                            '25' => 'SP',
                                            '26' => 'SE',
                                            '27' => 'TO',
                                        ];
                                    @endphp
                                    {{ $estados[$adress->estado] ?? 'Não Informado' }}
                                </dd>

                                <dt class="col-sm-3">CEP:</dt>
                                <dd id="cep" class="col-sm-3">{{ $adress->cep }}</dd>

                                <dt class="col-sm-3">Telefone:</dt>
                                <dd id="telefone" class="col-sm-3">{{ $adress->telefone }}</dd>

                                <dt class="col-sm-3">Data de cadastro:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($adress->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Data de atualização:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($adress->updated_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
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
                                <dd class="col-sm-2">{{ $user->contrato->hire->sigla ?? 'Não Informado' }}</dd>

                                <dt class="col-sm-2">Equipe:</dt>
                                <dd class="col-sm-2">{{ $contrato->equipe }}</dd>

                                <dt class="col-sm-2">Função:</dt>
                                <dd class="col-sm-2">{{ $contrato->role->funcao }}</dd>

                                <dt class="col-sm-2">Remuneração:</dt>
                                <dd class="col-sm-2">{{ 'R$ ' . number_format($contrato->remuneracao, 2, ',', '.') }}</dd>

                                <dt class="col-sm-2">CBO:</dt>
                                <dd class="col-sm-2">{{ $contrato->cbo }}</dd>

                                <dt class="col-sm-2">Situação:</dt>
                                <dd class="col-sm-2">{{ $contrato->situacao }}</dd>

                                <dt class="col-sm-2">Disponibilidade:</dt>
                                <dd class="col-sm-2">{{ $contrato->disponibilidade }}</dd>

                                <dt class="col-sm-2">Admissão:</dt>
                                <dd class="col-sm-2">
                                    {{ \Carbon\Carbon::parse($contrato->admissao)->setTimezone('America/Manaus')->format('d/m/Y') }}
                                </dd>

                                <dt class="col-sm-2">ASO:</dt>
                                <dd class="col-sm-2">
                                    {{ \Carbon\Carbon::parse($contrato->aso)->setTimezone('America/Manaus')->format('d/m/Y') }}
                                </dd>

                                <dt class="col-sm-2">Término:</dt>
                                <dd class="col-sm-6">
                                    {{ \Carbon\Carbon::parse($contrato->termino)->setTimezone('America/Manaus')->format('d/m/Y') }}
                                </dd>

                                <dt class="col-sm-2">Observação:</dt>
                                <dd class="col-sm-10">{{ $contrato->observacao }}</dd>

                                <dt class="col-sm-2">Cadastrado em:</dt>
                                <dd class="col-sm-2">
                                    {{ \Carbon\Carbon::parse($contrato->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-2">Atualizado em:</dt>
                                <dd class="col-sm-2">
                                    {{ \Carbon\Carbon::parse($contrato->updated_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>
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
                                <dt class="col-sm-2">Matrícula:</dt>
                                <dd class="col-sm-4">{{ $esocial->matricula }}</dd>

                                <dt class="col-sm-2">Agentes nocivos:</dt>
                                <dd class="col-sm-4">{{ $esocial->nocivos }}</dd>

                                <dt class="col-sm-3">Exames admissionais:</dt>
                                <dd class="col-sm-3">{{ $esocial->admissional }}</dd>

                                <dt class="col-sm-3">Exames periódicos:</dt>
                                <dd class="col-sm-3">{{ $esocial->periodicos }}</dd>

                                <dt class="col-sm-3">Mudança de função:</dt>
                                <dd class="col-sm-3">{{ $esocial->mudanca }}</dd>

                                <dt class="col-sm-3">Retorno ao trabalho:</dt>
                                <dd class="col-sm-3">{{ $esocial->retorno }}</dd>

                                <dt class="col-sm-3">Exames demissionais:</dt>
                                <dd class="col-sm-9">{{ $esocial->demissional }}</dd>

                                <dt class="col-sm-3">Cadastrado em:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($esocial->created_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>

                                <dt class="col-sm-3">Atualizado em:</dt>
                                <dd class="col-sm-3">
                                    {{ \Carbon\Carbon::parse($esocial->updated_at)->setTimezone('America/Manaus')->format('d/m/Y H:i') }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                {{-- e-social --}}
                {{-- Dependentes --}}
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#dependentes" aria-expanded="false" aria-controls="collapseThree">
                            Dependentes
                        </button>
                    </h2>
                    <div id="dependentes" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <dl class="row">

                                @if ($user->dependentes->isNotEmpty())
                                    <dl class="row">
                                        @foreach ($user->dependentes as $dependente)
                                            <dt class="col-sm-3">Nome:</dt>
                                            <dd class="col-sm-9">{{ $dependente->name }}</dd>

                                            <dt class="col-sm-3">CPF:</dt>
                                            <dd class="col-sm-9 cpf">{{ $dependente->cpf }}</dd>

                                            <dt class="col-sm-3">Nascimento:</dt>
                                            <dd class="col-sm-9">
                                                {{ \Carbon\Carbon::parse($dependente->nascimento)->setTimezone('America/Manaus')->format('d/m/Y') }}
                                            </dd>
                                            <hr>
                                        @endforeach
                                    </dl>
                                @else
                                    Nenhum dependente cadastrado.
                                @endif


                            </dl>
                        </div>
                    </div>
                </div>
                {{-- Dependentes --}}
            </div>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
