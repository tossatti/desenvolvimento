@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card border-light mt-4 mb-4 shadow">
            {{-- Cabeçalho --}}
            <div class="card-header hstack gap-2">
                <span><strong>Visualizar dados do currículo</strong></span>
                <span class="ms-auto d-sm-flex flex-row">
                    <a href="{{ route('curricula.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                        data-placement="top" title="voltar"><i class="bi bi-arrow-left-square"></i></a>
                    <a href="{{ route('curricula.edit', $curriculum->id) }}" class="btn btn-outline-warning btn-sm me-1"
                        data-toggle="tooltip" data-placement="top" title="editar"><i class="bi bi-pencil-square"></i></a>
                    <form method="POST" action="{{ route('curricula.destroy', $curriculum->id) }}" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este currículo?')"
                            class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                            title="apagar"><i class="bi bi-eraser"></i></button>
                    </form>
                </span>
            </div>
            {{-- /Cabeçalho --}}

            {{-- Dados do Currículo --}}
            <div class="card-body">
                <x-alert />
                <dl class="row">
                    <dt class="col-sm-3">Nome:</dt>
                    <dd class="col-sm-9">{{ $curriculum->name }}</dd>

                    <dt class="col-sm-3">Cargo Desejado:</dt>
                    <dd class="col-sm-9">{{ $curriculum->role->funcao ? $curriculum->role->funcao : 'Não Informado' }}</dd>

                    <dt class="col-sm-3">Endereço:</dt>
                    <dd class="col-sm-9">{{ $curriculum->endereco }}, {{ $curriculum->numero }}
                        {{ $curriculum->complemento }}</dd>

                    <dt class="col-sm-3">Bairro:</dt>
                    <dd class="col-sm-9">{{ $curriculum->bairro }}</dd>

                    <dt class="col-sm-3">Cidade/Estado:</dt>
                    <dd class="col-sm-9">{{ $curriculum->cidade }} - {{ $curriculum->estado }}</dd>

                    <dt class="col-sm-3">CEP:</dt>
                    <dd id="cep" class="col-sm-9">{{ $curriculum->cep }}</dd>

                    <dt class="col-sm-3">Telefone:</dt>
                    <dd id="telefone" class="col-sm-9">{{ $curriculum->telefone }}</dd>

                    <dt class="col-sm-3">E-mail:</dt>
                    <dd class="col-sm-9">{{ $curriculum->email }}</dd>

                    <dt class="col-sm-3">Data de Nascimento:</dt>
                    <dd class="col-sm-9">
                        {{ $curriculum->nascimento ? \Carbon\Carbon::parse($curriculum->nascimento)->format('d/m/Y') : '' }}
                    </dd>

                    <dt class="col-sm-3">Naturalidade:</dt>
                    <dd class="col-sm-9">{{ $curriculum->naturalidade }}</dd>

                    <dt class="col-sm-3">Nacionalidade:</dt>
                    <dd class="col-sm-9">{{ $curriculum->nacionalidade }}</dd>

                    <dt class="col-sm-3">Gênero:</dt>
                    <dd class="col-sm-9">
                        @if ($curriculum->genero == '1')
                            Masculino
                        @elseif ($curriculum->genero == '2')
                            Feminino
                        @elseif ($curriculum->genero == '3')
                            Outro
                        @elseif ($curriculum->genero == '4')
                            Prefiro não informar
                        @else
                            Não Informado
                        @endif
                    </dd>

                    <dt class="col-sm-3">Escolaridade:</dt>
                    <dd class="col-sm-9">
                        @if ($curriculum->escolaridade == '1')
                            Fundamental incompleto
                        @elseif ($curriculum->escolaridade == '2')
                            Fundamental completo
                        @elseif ($curriculum->escolaridade == '3')
                            Médio incompleto
                        @elseif ($curriculum->escolaridade == '4')
                            Médio completo
                        @elseif ($curriculum->escolaridade == '5')
                            Curso técnico incompleto
                        @elseif ($curriculum->escolaridade == '6')
                            Curso técnico completo
                        @elseif ($curriculum->escolaridade == '7')
                            Superior incompleto
                        @elseif ($curriculum->escolaridade == '8')
                            Superior completo
                        @elseif ($curriculum->escolaridade == '9')
                            Pós-graduação incompleto
                        @elseif ($curriculum->escolaridade == '10')
                            Pós-graduação completo
                        @else
                            Não Informado
                        @endif
                    </dd>

                    <dt class="col-sm-3">Raça:</dt>
                    <dd class="col-sm-9">
                        @if ($curriculum->raca == '1')
                            Branca
                        @elseif ($curriculum->raca == '2')
                            Negra
                        @elseif ($curriculum->raca == '3')
                            Parda
                        @elseif ($curriculum->raca == '4')
                            Amarela
                        @elseif ($curriculum->raca == '5')
                            Indígena
                        @else
                            Não Informado
                        @endif
                    </dd>

                    <dt class="col-sm-3">Estado Civil:</dt>
                    <dd class="col-sm-9">
                        @if ($curriculum->civil == '1')
                            Solteiro(a)
                        @elseif ($curriculum->civil == '2')
                            Casado(a)
                        @elseif ($curriculum->civil == '3')
                            Divorciado(a)
                        @elseif ($curriculum->civil == '4')
                            Viúvo(a)
                        @elseif ($curriculum->civil == '5')
                            Separado(a)
                        @elseif ($curriculum->civil == '6')
                            Desquitado(a)
                        @elseif ($curriculum->civil == '7')
                            União estável
                        @else
                            Não Informado
                        @endif
                    </dd>

                    <dt class="col-sm-3">CPF:</dt>
                    <dd id="cpf" class="col-sm-9">{{ $curriculum->cpf }}</dd>

                    <dt class="col-sm-3">PIS/PASEP:</dt>
                    <dd id="pis" class="col-sm-9">{{ $curriculum->pis_pasep }}</dd>

                    <dt class="col-sm-3">Título de Eleitor:</dt>
                    <dd id="titulo" class="col-sm-9">{{ $curriculum->titulo_eleitor }}</dd>

                    <dt class="col-sm-3">Zona Eleitoral:</dt>
                    <dd class="col-sm-9">{{ $curriculum->zona }}</dd>

                    <dt class="col-sm-3">Seção Eleitoral:</dt>
                    <dd class="col-sm-9">{{ $curriculum->secao }}</dd>

                    <dt class="col-sm-3">CTPS:</dt>
                    <dd id="ctps" class="col-sm-9">{{ $curriculum->ctps }}</dd>

                    <dt class="col-sm-3">CNH:</dt>
                    <dd id="cnh" class="col-sm-9">{{ $curriculum->cnh }}</dd>

                    <dt class="col-sm-3">Categoria CNH:</dt>
                    <dd class="col-sm-9">{{ $curriculum->catcnh }}</dd>

                    <dt class="col-sm-3">Tamanho Calça:</dt>
                    <dd class="col-sm-9">{{ $curriculum->calca }}</dd>

                    <dt class="col-sm-3">Tamanho Camisa:</dt>
                    <dd class="col-sm-9">{{ $curriculum->camisa }}</dd>

                    <dt class="col-sm-3">Tamanho Calçado:</dt>
                    <dd class="col-sm-9">{{ $curriculum->calcado }}</dd>

                    <dt class="col-sm-3">Curso NR 10:</dt>
                    <dd class="col-sm-9">
                        @if ($curriculum->nr10 == '1')
                            Sim
                        @elseif ($curriculum->nr10 == '2')
                            Não
                        @else
                            Não Informado
                        @endif
                    </dd>

                    <dt class="col-sm-3">Dependentes:</dt>
                    <dd class="col-sm-9">{{ $curriculum->dependentes }}</dd>

                    @if ($curriculum->dependentes == 'Sim')
                        <dt class="col-sm-3">Número de Dependentes:</dt>
                        <dd class="col-sm-9">{{ $curriculum->numeroDependentes }}</dd>
                    @endif

                    <dt class="col-sm-3">Cadastrado em:</dt>
                    <dd class="col-sm-9">
                        {{ $curriculum->created_at ? \Carbon\Carbon::parse($curriculum->created_at)->format('d/m/Y H:i') : '' }}
                    </dd>

                    <dt class="col-sm-3">Atualizado em:</dt>
                    <dd class="col-sm-9">
                        {{ $curriculum->updated_at ? \Carbon\Carbon::parse($curriculum->updated_at)->format('d/m/Y H:i') : '' }}
                    </dd>
                </dl>

                @if ($curriculum->dependentes == 'Sim' && $curriculum->dependentes()->count() > 0)
                    <h5 class="mt-4">Dependentes:</h5>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Data de Nascimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($curriculum->dependentes as $dependente)
                                <tr>
                                    <td>{{ $dependente->nome }}</td>
                                    <td><span data-inputmask="'mask': '999.999.999-99'">{{ $dependente->cpf }}</span></td>
                                    <td>{{ $dependente->data_nascimento ? \Carbon\Carbon::parse($dependente->data_nascimento)->format('d/m/Y') : '' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <dt class="col-sm-3">Status:</dt>
                <dd class="col-sm-9">
                    @if ($curriculum->status == '1')
                        Candidato
                    @elseif ($curriculum->status == '2')
                        Seleção
                    @elseif ($curriculum->status == '3')
                        Entrevista
                    @elseif ($curriculum->status == '4')
                        Exames
                    @elseif ($curriculum->status == '5')
                        Aprovado
                    @elseif ($curriculum->status == '6')
                        Reprovado
                    @else
                        Não processado
                    @endif
                </dd>

            </div>
            {{-- /Dados do Currículo --}}
        </div>
    </div>
@endsection
