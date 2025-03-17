@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span>
                <H5><strong>Editar dados do colaborador</strong></H5>
            </span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-info btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="listar"><i class="bi bi-card-list"></i>
                </a>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-outline-primary btn-sm"
                    data-toggle="tooltip" data-placement="top" title="visualizar"><i class="bi bi-eye"></i>
                </a>
            </span>
        </div>
        {{-- cabeçalho --}}
        {{-- dados do banco de dados --}}
        <div class="card-body">
            <x-alert />
            <form action=" {{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- dados pessoais do usuário --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#dados" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Dados pessoais</strong>
                            </button>
                        </h2>
                        <div id="dados" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nome completo" value="{{ old('name') ? old('name') : $user->name }}">
                                    </div>
                                    <div class="col-md-7">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Insira um e-mail válido" value="{{ old('email') ? old('email') : $user->email }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- dados pessoais do usuário --}}
                {{-- documentos pessoais --}}
                <div class="accordion mb-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#docs" aria-expanded="false" aria-controls="collapseTwo">
                                <strong>Documentos pessoais</strong>
                            </button>
                        </h2>
                        <div id="docs" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="cpf" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="CPF" value="{{ old('cpf') ? old('cpf') : $docs->cpf }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pis" class="form-label">PIS/PASEP</label>
                                        <input type="text" class="form-control" id="pis" name="pis"
                                            placeholder="PIS/PASEP" value="{{ old('pis') ? old('pis') : $docs->pis }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="titulo" class="form-label">Título de eleitor</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                            placeholder="Título de eleitor" value="{{ old('titulo') ? old('titulo') : $docs->titulo }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnh" class="form-label">CNH</label>
                                        <input type="text" class="form-control" id="cnh" name="cnh"
                                            placeholder="Título de eleitor" value="{{ old('picnhs') ? old('cnh') : $docs->cnh }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ctps" class="form-label">Carteira de trabalho</label>
                                        <input type="text" class="form-control" id="ctps" name="ctps"
                                            placeholder="Carteira de trabalho" value="{{ old('ctps') ? old('ctps') : $docs->ctps }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- documentos pessoais --}}
                {{-- dados bancários --}}
                <div class="accordion mb-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#bancario" aria-expanded="false" aria-controls="collapseTwo">
                                <strong>Dados bancários</strong>
                            </button>
                        </h2>
                        <div id="bancario" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="banco" class="form-label">Banco</label>
                                        <input type="text" class="form-control" id="banco" name="banco"
                                            placeholder="Banco" value="{{ old('banco') ? old('banco') : $banco->banco }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="agencia" class="form-label">Agência</label>
                                        <input type="text" class="form-control" id="agencia" name="agencia"
                                            placeholder="Agência" value="{{ old('agencia') ? old('agencia') : $banco->agencia }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipoconta" class="form-label">Tipo de conta</label>
                                        <select class="form-select form-control" id="tipoconta" name="tipoconta">
                                            <option>Selecione</option>
                                            <option value="Conta Corrente" {{ $banco->tipoconta == 'Conta Corrente' ? 'selected' : '', old('tipoconta') }}>Conta Corrente</option>
                                            <option value="Conta Poupança" {{ $banco->tipoconta == 'Conta Poupança' ? 'selected' : '', old('tipoconta') }}>Conta Poupança</option>
                                            <option value="Conta Salário" {{ $banco->tipoconta == 'Conta Salário' ? 'selected' : '', old('tipoconta') }}>Conta Salário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numeroConta" class="form-label">Nº da conta</label>
                                        <input type="text" class="form-control" id="numeroConta" name="numeroConta"
                                            placeholder="Nº da conta" value="{{ old('numeroConta') ? old('numeroConta') : $banco->numeroConta }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipopix" class="form-label">Tipo de chave pix</label>
                                        <select class="form-select form-control" id="tipopix" name="tipopix">
                                            <option>Selecione</option>
                                            <option value="CPF" {{ $banco->tipopix == 'CPF' ? 'selected' : '', old('tipopix') }}>CPF</option>
                                            <option value="E-mail" {{ $banco->tipopix == 'E-mail' ? 'selected' : '', old('tipopix') }}>E-mail</option>
                                            <option value="Telefone" {{ $banco->tipopix == 'Telefone' ? 'selected' : '', old('tipopix') }}>Telefone</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pix" class="form-label">Chave pix</label>
                                        <input type="text" class="form-control" id="pix" name="pix"
                                            placeholder="Chave pix" value="{{ old('pix') ? old('pix') : $banco->pix }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- dados bancários --}}
                {{-- endereço --}}
                <div class="accordion mb-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#endereco" aria-expanded="false" aria-controls="collapseTwo">
                                <strong>Endereço</strong>
                            </button>
                        </h2>
                        <div id="endereco" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-9">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco" name="endereco"
                                            placeholder="Nome da Rua/Avenida ..." value="{{ old('endereco') ? old('endereco') : $adress->endereco }} ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="numero" class="form-label">Nº</label>
                                        <input type="text" class="form-control" id="numero"
                                            name="numero" placeholder="Nº" value="{{ old('numero') ? old('numero') : $adress->numero }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="complemento" class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Complemento" value="{{ old('complemento') ? old('complemento') : $adress->complemento }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bairro" class="form-label">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            placeholder="Bairro" value="{{ old('bairro') ? old('bairro') : $adress->bairro }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                            placeholder="Cidade" value="{{ old('cidade') ? old('cidade') : $adress->cidade }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado"
                                            placeholder="Estado" value="{{ old('estado') ? old('estado') : $adress->estado }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep"
                                            placeholder="CEP" value="{{ old('cep') ? old('cep') : $adress->cep }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefone" class="form-label">Nº de telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                            placeholder="Nº de telefone" value="{{ old('telefone') ? old('telefone') : $adress->telefone }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- endereço --}}
                {{-- contrato --}}
                <div class="accordion mb-3">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#contrato" aria-expanded="false" aria-controls="collapseThree">
                                <strong>Contrato</strong>
                            </button>
                        </h2>
                        <div id="contrato" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="tipoContrato" class="form-label">Tipo de contrato</label>
                                        <select class="form-select form-control" id="tipoContrato" name="tipoContrato">
                                            <option>Selecione</option>
                                            <option value="Diarista" {{ $contrato->tipoContrato == 'Diarista' ? 'selected' : '' }}>Diarista</option>
                                            <option value=" Mensalista" {{ $contrato->tipoContrato == 'Mensalista' ? 'selected' : '', old('tipoContrato') }}>Mensalista</option>
                                            <option value="Prestador de serviço" {{ $contrato->tipoContrato == 'Prestador de serviço' ? 'selected' : '',old('tipoContrato') }}>Prestador de serviço</option>
                                            <option value="Proprietário" {{ $contrato->tipoContrato == 'Proprietário' ? 'selected' : '',old('tipoContrato') }}>Proprietário</option>
                                            <option value="Terceirizado" {{ $contrato->tipoContrato == 'Terceirizado' ? 'selected' : '', old('tipoContrato') }}>Terceirizado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lotacao" class="form-label">Lotação</label>
                                        <input type="text" class="form-control" id="lotacao" name="lotacao"
                                            placeholder="Lotação" value="{{ old('lotacao') ? old('lotacao') : $contrato->lotacao }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="equipe" class="form-label">Equipe</label>
                                        <select class="form-select form-control" id="equipe" name="equipe">
                                            <option>Selecione</option>
                                            <option value="Armação" {{ $contrato->equipe == 'Armação' ? 'selected' : '' }}>Armação</option>
                                            <option value="Carpintaria" {{ $contrato->equipe == 'Carpintaria' ? 'selected' : '' }}>Carpintaria</option>
                                            <option value="Civil" {{ $contrato->equipe == 'Civil' ? 'selected' : '' }}>Civil</option>
                                            <option value="Elétrica" {{ $contrato->equipe == 'Elétrica' ? 'selected' : '' }}>Elétrica</option>
                                            <option value="Esquadria" {{ $contrato->equipe == 'Esquadria' ? 'selected' : '' }}>Esquadria</option>
                                            <option value="Hidráulica" {{ $contrato->equipe == 'Hidráulica' ? 'selected' : '' }}>Hidráulica</option>
                                            <option value="Logística" {{ $contrato->equipe == 'Logística' ? 'selected' : '' }}>Logística</option>
                                            <option value="Metálica" {{ $contrato->equipe == 'Metálica' ? 'selected' : '' }}>Metálica</option>
                                            <option value="Pintura" {{ $contrato->equipe == 'Pintura' ? 'selected' : '' }}>Pintura</option>
                                            <option value="Piso" {{ $contrato->equipe == 'Piso' ? 'selected' : '' }}>Piso</option>
                                            <option value="Revestimento" {{ $contrato->equipe == 'Revestimento' ? 'selected' : '' }}>Revestimento</option>
                                            <option value="Técnica" {{ $contrato->equipe == 'Técnica' ? 'selected' : '' }}>Técnica</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="funcao" class="form-label">Função</label>
                                        <select class="form-select form-control" id="funcao" name="funcao">
                                            <option>Selecione</option>
                                            <option value="Administrador" {{ $contrato->funcao == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                                            <option value="Ajudante" {{ $contrato->funcao == '' ? 'selected' : '' }}>Ajudante</option>
                                            <option value="Ajudante de eletricista" {{ $contrato->funcao == 'Ajudante de eletricista' ? 'selected' : '' }}>Ajudante de eletricista</option>
                                            <option value="Armador" {{ $contrato->funcao == 'Armador' ? 'selected' : '' }}>Armador</option>
                                            <option value="Arquiteto" {{ $contrato->funcao == 'Arquiteto' ? 'selected' : '' }}>Arquiteto</option>
                                            <option value="Auxiliar de limpeza" {{ $contrato->funcao == 'Auxiliar de limpeza' ? 'selected' : '' }}>Auxiliar de limpeza</option>
                                            <option value="Azulejista" {{ $contrato->funcao == 'Azulejista' ? 'selected' : '' }}>Azulejista</option>
                                            <option value="Bombeiro hidráulico" {{ $contrato->funcao == 'Bombeiro hidráulico' ? 'selected' : '' }}>Bombeiro hidráulico</option>
                                            <option value="Carpinteiro" {{ $contrato->funcao == 'Carpinteiro' ? 'selected' : '' }}>Carpinteiro</option>
                                            <option value="Eletricista" {{ $contrato->funcao == 'Eletricista' ? 'selected' : '' }}>Eletricista</option>
                                            <option value="Encarregado de obras" {{ $contrato->funcao == 'Encarregado de obras' ? 'selected' : '' }}>Encarregado de obras</option>
                                            <option value="Engenheiro" {{ $contrato->funcao == 'Engenheiro' ? 'selected' : '' }}>Engenheiro</option>
                                            <option value="Estagiário" {{ $contrato->funcao == 'Estagiário' ? 'selected' : '' }}>Estagiário</option>
                                            <option value="Gerente de logística" {{ $contrato->funcao == 'Gerente de logística' ? 'selected' : '' }}>Gerente de logística</option>
                                            <option value="Jardineiro" {{ $contrato->funcao == 'Jardineiro' ? 'selected' : '' }}>Jardineiro</option>
                                            <option value="Líder bombeiro" {{ $contrato->funcao == 'Líder bombeiro' ? 'selected' : '' }}>Líder bombeiro</option>
                                            <option value="Líder operacional" {{ $contrato->funcao == 'Líder operacional' ? 'selected' : '' }}>Líder operacional</option>
                                            <option value="Montador de estruturas metálicas" {{ $contrato->funcao == 'Montador de estruturas metálicas' ? 'selected' : '' }}>Montador de estruturas metálicas
                                            </option>
                                            <option value="Operador de máquinas" {{ $contrato->funcao == 'Operador de máquinas' ? 'selected' : '' }}>Operador de máquinas</option>
                                            <option value="Pedreiro" {{ $contrato->funcao == 'Pedreiro' ? 'selected' : '' }}>Pedreiro</option>
                                            <option value="Pintor" {{ $contrato->funcao == 'Pintor' ? 'selected' : '' }}>Pintor</option>
                                            <option value="Técnico de Segurança do trabalho" {{ $contrato->funcao == 'Técnico de Segurança do trabalho' ? 'selected' : '' }}>Técnico de Segurança do trabalho
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="remuneracao" class="form-label">Remuneração</label>
                                        <input type="text" class="form-control valor-input" id="remuneracao" name="remuneracao"
                                            placeholder="R$ 0,00" value="{{ old('remuneracao') ? old('remuneracao') : $contrato->remuneracao }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cbo" class="form-label">CBO</label>
                                        <input type="text" class="form-control" id="cbo" name="cbo"
                                            placeholder="CBO" value="{{ old('cbo') ? old('cbo') : $contrato->cbo}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="situacao" class="form-label">Situação</label>
                                        <select class="form-select form-control" id="situacao" name="situacao">
                                            <option>Selecione</option>
                                            <option value="Afastado" {{ $contrato->situacao == 'Afastado' ? 'selected' : '' }}>Afastado</option>
                                            <option value="Aviso" {{ $contrato->situacao == 'Aviso' ? 'selected' : '' }}>Aviso</option>
                                            <option value="Contrato de experiência" {{ $contrato->situacao == 'Contrato de experiência' ? 'selected' : '' }}>Contrato de experiência</option>
                                            <option value="Desligado" {{ $contrato->situacao == 'Desligado' ? 'selected' : '' }}>Desligado</option>
                                            <option value="Efetivo" {{ $contrato->situacao == 'Efetivo' ? 'selected' : '' }}>Efetivo</option>
                                            <option value="Em contratação" {{ $contrato->situacao == 'Em contratação' ? 'selected' : '' }}>Em contratação</option>
                                            <option value="Férias" {{ $contrato->situacao == 'Férias' ? 'selected' : '' }}>Férias</option>
                                            <option value="Temporário" {{ $contrato->situacao == 'Temporário' ? 'selected' : '' }}>Temporário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="disponibilidade" class="form-label">Disponibilidade</label>
                                        <select class="form-select form-control" id="disponibilidade"
                                            name="disponibilidade" aria-label="Default select example">
                                            <option>Selecione</option>
                                            <option value="Disponível" {{ $contrato->disponibilidade == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                                            <option value="Indisponível" {{ $contrato->disponibilidade == 'Indisponível' ? 'selected' : '' }}>Indisponível</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="aso" class="form-label">ASO</label>
                                        <input type="date" class="form-control" id="aso" name="aso"
                                            placeholder="ASO" value="{{ old('aso') ? old('aso') : $contrato->aso }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="admissao" class="form-label">Admissão</label>
                                        <input type="date" class="form-control" id="admissao" name="admissao"
                                            placeholder="Data de admissão" value="{{ old('admissao') ? old('admissao') : $contrato->admissao }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="termino" class="form-label">Término do contrato</label>
                                        <input type="date" class="form-control" id="termino" name="termino"
                                            placeholder="Término do contrato" value="{{ old('termino') ? old('termino') : $contrato->termino }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="observacao" class="form-label">Observação</label>
                                        <input type="text" class="form-control" id="observacao" name="observacao"
                                            placeholder="Observação" value="{{ old('observacao') ? old('observacao') : $contrato->observacao }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- contrato --}}
                {{-- e-social --}}
                <div class="accordion mb-3" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#esocial" aria-expanded="false" aria-controls="collapseThree">
                                <strong>E-Social</strong>
                            </button>
                        </h2>
                        <div id="esocial" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
                </div>{{-- e-social --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
