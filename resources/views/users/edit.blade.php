@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span>
                <H5><strong>Editar dados do colaborador</strong></H5>
            </span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="voltar"><i class="bi bi-arrow-left-square"></i></i></i>
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
                                <div class="row g-3 form-floating">
                                    <div class="col-md-12 form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nome completo"
                                            value="{{ old('name') ? old('name') : $user->name }}">
                                        <label for="name" class="form-label">Nome</label>
                                    </div>
                                    <div class="col-md-7 form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Insira um e-mail válido"
                                            value="{{ old('email') ? old('email') : $user->email }}">
                                        <label for="email" class="form-label">E-mail</label>
                                    </div>
                                    <div class="col-md-5 form-floating">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}">
                                        <label for="password" class="form-label">Senha</label>
                                    </div>
                                    <div class="form-floating col-md-3 ">
                                        <input type="date" class="form-control" id="nascimento" name="nascimento"
                                            value="{{ old('nascimento') ? old('nascimento') : $user->nascimento }}"
                                            required>
                                        <label for="nascimento" class="form-label">Data de nascimento</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="text" class="form-control" id="naturalidade" name="naturalidade"
                                            placeholder="Cidade que nasceu"
                                            value="{{ old('naturalidade') ? old('naturalidade') : $user->naturalidade }}"
                                            required>
                                        <label for="naturalidade" class="form-label">Naturalidade</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                                            placeholder="Escolha"
                                            value="{{ old('nacionalidade') ? old('nacionalidade') : $user->nacionalidade }}"
                                            required>
                                        <label for="nacionalidade" class="form-label">Nacionalidade</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <select class="form-select" id="genero" name="genero" required>
                                            <option value="">Selecione</option>
                                            <option value="1"
                                                {{ (old('genero') ?? ($user->genero ?? '')) == '1' ? 'selected' : '' }}>
                                                Masculino</option>
                                            <option value="2"
                                                {{ (old('genero') ?? ($user->genero ?? '')) == '2' ? 'selected' : '' }}>
                                                Feminino</option>
                                            <option value="3"
                                                {{ (old('genero') ?? ($user->genero ?? '')) == '3' ? 'selected' : '' }}>
                                                Outro
                                            </option>
                                            <option value="4"
                                                {{ (old('genero') ?? ($user->genero ?? '')) == '4' ? 'selected' : '' }}>
                                                Prefiro não informar</option>
                                        </select>
                                        <label for="genero" class="form-label">Gênero</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <select class="form-select form-control" id="escolaridade" name="escolaridade"
                                            required>
                                            <option value="">Selecione</option>
                                            <option value="1" {{ $user->escolaridade == '1' ? 'selected' : '' }}>
                                                Fundamental incompleto</option>
                                            <option value="2" {{ $user->escolaridade == '2' ? 'selected' : '' }}>
                                                Fundamental completo</option>
                                            <option value="3" {{ $user->escolaridade == '3' ? 'selected' : '' }}>
                                                Médio incompleto</option>
                                            <option value="4" {{ $user->escolaridade == '4' ? 'selected' : '' }}>
                                                Médio completo</option>
                                            <option value="5" {{ $user->escolaridade == '5' ? 'selected' : '' }}>
                                                Curso técnico incompleto</option>
                                            <option value="6" {{ $user->escolaridade == '6' ? 'selected' : '' }}>
                                                Curso técnico completo</option>
                                            <option value="7" {{ $user->escolaridade == '7' ? 'selected' : '' }}>
                                                Superior incompleto</option>
                                            <option value="8" {{ $user->escolaridade == '8' ? 'selected' : '' }}>
                                                Superior completo</option>
                                            <option value="9" {{ $user->escolaridade == '9' ? 'selected' : '' }}>
                                                Pós-graduação incompleto</option>
                                            <option value="10" {{ $user->escolaridade == '10' ? 'selected' : '' }}>
                                                Pós-graduação completo</option>
                                        </select>
                                        <label for="escolaridade" class="form-label">Escolaridade</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <select class="form-select form-control" id="raca" name="raca" required>
                                            <option value="">Selecione</option>
                                            <option value="1"
                                                {{ (old('raca') ?? ($user->raca ?? '')) == '1' ? 'selected' : '' }}>Branca
                                            </option>
                                            <option value="2"
                                                {{ (old('raca') ?? ($user->raca ?? '')) == '2' ? 'selected' : '' }}>Negra
                                            </option>
                                            <option value="3"
                                                {{ (old('raca') ?? ($user->raca ?? '')) == '3' ? 'selected' : '' }}>Parda
                                            </option>
                                            <option value="4"
                                                {{ (old('raca') ?? ($user->raca ?? '')) == '4' ? 'selected' : '' }}>Amarela
                                            </option>
                                            <option value="5"
                                                {{ (old('raca') ?? ($user->raca ?? '')) == '5' ? 'selected' : '' }}>
                                                Indígena
                                            </option>
                                        </select>
                                        <label for="raca" class="form-label">Raça</label>
                                    </div>
                                    <div class="form-floating col-md-3">
                                        <select class="form-select form-control" id="civil" name="civil" required>
                                            <option value="">Selecione</option>
                                            <option value="1"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '1' ? 'selected' : '' }}>
                                                Solteiro(a)</option>
                                            <option value="2"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '2' ? 'selected' : '' }}>
                                                Casado(a)</option>
                                            <option value="3"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '3' ? 'selected' : '' }}>
                                                Divorciado(a)</option>
                                            <option value="4"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '4' ? 'selected' : '' }}>
                                                Viúvo(a)</option>
                                            <option value="5"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '5' ? 'selected' : '' }}>
                                                Separado(a)</option>
                                            <option value="6"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '6' ? 'selected' : '' }}>
                                                Desquitado(a)</option>
                                            <option value="7"
                                                {{ (old('civil') ?? ($user->civil ?? '')) == '7' ? 'selected' : '' }}>União
                                                estável</option>
                                        </select>
                                        <label for="civil" class="form-label">Estado Civil</label>
                                    </div>
                                    {{-- <div class="form-floating col-md-3">
                                        <select class="form-select" id="dependentes" name="dependentes">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ (old('dependentes') ?? $dependentes->dependentes ?? '') == 1 ? 'selected' : '' }}>Sim</option>
                                            <option value="2" {{ (old('dependentes') ?? $dependentes->dependentes ?? '') == 2 ? 'selected' : '' }}>Não</option>
                                        </select>
                                        <label for="dependentes" class="form-label">Tem dependente(s)</label>
                                    </div>
                                    <div class="form-floating col-md-2" id="numeroDependentesDiv" style="display: {{ (old('dependentes') ?? $dependentes->dependentes ?? '') == 1 ? 'block' : 'none' }};">
                                        <input type="number" class="form-control" id="numeroDependentes" name="numeroDependentes"
                                            value="{{ old('numeroDependentes') ?? $dependentes->numeroDependentes ?? '' }}">
                                        <label for="numeroDependentes" class="form-label">Quantos?</label>
                                    </div>
                                    
                                    <div class="form-floating" id="dependentesContainer">
                                    </div>
                                    
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const dependentesSelect = document.getElementById('dependentes');
                                            const numeroDependentesDiv = document.getElementById('numeroDependentesDiv');
                                    
                                            dependentesSelect.addEventListener('change', function() {
                                                if (this.value == 1) {
                                                    numeroDependentesDiv.style.display = 'block';
                                                } else {
                                                    numeroDependentesDiv.style.display = 'none';
                                                }
                                            });
                                        });
                                    </script> --}}
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
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="CPF" value="{{ old('cpf') ? old('cpf') : $docs->cpf }}">
                                        <label for="cpf" class="form-label">CPF</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="pis" name="pis"
                                            placeholder="PIS/PASEP" value="{{ old('pis') ? old('pis') : $docs->pis }}">
                                        <label for="pis" class="form-label">PIS/PASEP</label>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                            placeholder="Título de eleitor"
                                            value="{{ old('titulo') ? old('titulo') : $docs->titulo }}">
                                        <label for="titulo" class="form-label">Título de eleitor</label>
                                    </div>
                                    <div class="form-floating col-md-4">
                                        <input type="text" class="form-control" id="zona" name="zona"
                                            placeholder="Zona" value="{{ old('zona') ?? ($docs->zona ?? '') }}">
                                        <label for="zona" class="form-label">Zona</label>
                                    </div>
                                    <div class="form-floating col-md-4">
                                        <input type="text" class="form-control" id="secao" name="secao"
                                            placeholder="Seção" value="{{ old('secao') ?? ($docs->secao ?? '') }}">
                                        <label for="secao" class="form-label">Seção</label>
                                    </div>
                                    <div class="col-md-4 form-floating">
                                        <input type="text" class="form-control" id="cnh" name="cnh"
                                            placeholder="Título de eleitor"
                                            value="{{ old('picnhs') ? old('cnh') : $docs->cnh }}">
                                        <label for="cnh" class="form-label">CNH</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="ctps" name="ctps"
                                            placeholder="Carteira de trabalho"
                                            value="{{ old('ctps') ? old('ctps') : $docs->ctps }}">
                                        <label for="ctps" class="form-label">Carteira de trabalho</label>
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
                        <div id="bancario" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="banco" name="banco"
                                            placeholder="Banco"
                                            value="{{ old('banco') ? old('banco') : $banco->banco }}">
                                        <label for="banco" class="form-label">Banco</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="agencia" name="agencia"
                                            placeholder="Agência"
                                            value="{{ old('agencia') ? old('agencia') : $banco->agencia }}">
                                        <label for="agencia" class="form-label">Agência</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <select class="form-select form-control" id="tipoconta" name="tipoconta">
                                            <option>Selecione</option>
                                            <option value="Conta Corrente"
                                                {{ $banco->tipoconta == 'Conta Corrente' ? 'selected' : '', old('tipoconta') }}>
                                                Conta Corrente</option>
                                            <option value="Conta Poupança"
                                                {{ $banco->tipoconta == 'Conta Poupança' ? 'selected' : '', old('tipoconta') }}>
                                                Conta Poupança</option>
                                            <option value="Conta Salário"
                                                {{ $banco->tipoconta == 'Conta Salário' ? 'selected' : '', old('tipoconta') }}>
                                                Conta Salário</option>
                                        </select>
                                        <label for="tipoconta" class="form-label">Tipo de conta</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="numeroConta" name="numeroConta"
                                            placeholder="Nº da conta"
                                            value="{{ old('numeroConta') ? old('numeroConta') : $banco->numeroConta }}">
                                        <label for="numeroConta" class="form-label">Nº da conta</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <select class="form-select form-control" id="tipopix" name="tipopix">
                                            <option>Selecione</option>
                                            <option value="CPF"
                                                {{ $banco->tipopix == 'CPF' ? 'selected' : '', old('tipopix') }}>CPF
                                            </option>
                                            <option value="E-mail"
                                                {{ $banco->tipopix == 'E-mail' ? 'selected' : '', old('tipopix') }}>E-mail
                                            </option>
                                            <option value="Telefone"
                                                {{ $banco->tipopix == 'Telefone' ? 'selected' : '', old('tipopix') }}>
                                                Telefone</option>
                                        </select>
                                        <label for="tipopix" class="form-label">Tipo de chave pix</label>
                                    </div>
                                    <div class="col-md-6 form-floating">
                                        <input type="text" class="form-control" id="pix" name="pix"
                                        placeholder="Chave pix" value="{{ old('pix') ? old('pix') : $banco->pix }}">
                                        <label for="pix" class="form-label">Chave pix</label>
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
                                            placeholder="Nome da Rua/Avenida ..."
                                            value="{{ old('endereco') ? old('endereco') : $adress->endereco }} ">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="numero" class="form-label">Nº</label>
                                        <input type="text" class="form-control" id="numero" name="numero"
                                            placeholder="Nº"
                                            value="{{ old('numero') ? old('numero') : $adress->numero }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="complemento" class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Complemento"
                                            value="{{ old('complemento') ? old('complemento') : $adress->complemento }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bairro" class="form-label">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            placeholder="Bairro"
                                            value="{{ old('bairro') ? old('bairro') : $adress->bairro }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                            placeholder="Cidade"
                                            value="{{ old('cidade') ? old('cidade') : $adress->cidade }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado"
                                            placeholder="Estado"
                                            value="{{ old('estado') ? old('estado') : $adress->estado }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep"
                                            placeholder="CEP" value="{{ old('cep') ? old('cep') : $adress->cep }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefone" class="form-label">Nº de telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone"
                                            placeholder="Nº de telefone"
                                            value="{{ old('telefone') ? old('telefone') : $adress->telefone }}">
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
                                            <option value="Diarista"
                                                {{ $contrato->tipoContrato == 'Diarista' ? 'selected' : '' }}>Diarista
                                            </option>
                                            <option value=" Mensalista"
                                                {{ $contrato->tipoContrato == 'Mensalista' ? 'selected' : '', old('tipoContrato') }}>
                                                Mensalista</option>
                                            <option value="Prestador de serviço"
                                                {{ $contrato->tipoContrato == 'Prestador de serviço' ? 'selected' : '', old('tipoContrato') }}>
                                                Prestador de serviço</option>
                                            <option value="Proprietário"
                                                {{ $contrato->tipoContrato == 'Proprietário' ? 'selected' : '', old('tipoContrato') }}>
                                                Proprietário</option>
                                            <option value="Terceirizado"
                                                {{ $contrato->tipoContrato == 'Terceirizado' ? 'selected' : '', old('tipoContrato') }}>
                                                Terceirizado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lotacao" class="form-label">Lotação</label>
                                        <input type="text" class="form-control" id="lotacao" name="lotacao"
                                            placeholder="Lotação"
                                            value="{{ old('lotacao') ? old('lotacao') : $contrato->lotacao }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="equipe" class="form-label">Equipe</label>
                                        <select class="form-select form-control" id="equipe" name="equipe">
                                            <option>Selecione</option>
                                            <option value="Armação"
                                                {{ $contrato->equipe == 'Armação' ? 'selected' : '' }}>Armação</option>
                                            <option value="Carpintaria"
                                                {{ $contrato->equipe == 'Carpintaria' ? 'selected' : '' }}>Carpintaria
                                            </option>
                                            <option value="Civil" {{ $contrato->equipe == 'Civil' ? 'selected' : '' }}>
                                                Civil</option>
                                            <option value="Elétrica"
                                                {{ $contrato->equipe == 'Elétrica' ? 'selected' : '' }}>Elétrica</option>
                                            <option value="Esquadria"
                                                {{ $contrato->equipe == 'Esquadria' ? 'selected' : '' }}>Esquadria</option>
                                            <option value="Hidráulica"
                                                {{ $contrato->equipe == 'Hidráulica' ? 'selected' : '' }}>Hidráulica
                                            </option>
                                            <option value="Logística"
                                                {{ $contrato->equipe == 'Logística' ? 'selected' : '' }}>Logística</option>
                                            <option value="Metálica"
                                                {{ $contrato->equipe == 'Metálica' ? 'selected' : '' }}>Metálica</option>
                                            <option value="Pintura"
                                                {{ $contrato->equipe == 'Pintura' ? 'selected' : '' }}>Pintura</option>
                                            <option value="Piso" {{ $contrato->equipe == 'Piso' ? 'selected' : '' }}>
                                                Piso</option>
                                            <option value="Revestimento"
                                                {{ $contrato->equipe == 'Revestimento' ? 'selected' : '' }}>Revestimento
                                            </option>
                                            <option value="Técnica"
                                                {{ $contrato->equipe == 'Técnica' ? 'selected' : '' }}>Técnica</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="role_id " class="form-label">Função</label>
                                        <select class="form-select form-control" id="role_id" name="role_id"
                                            aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ old('role_id', $contrato->role_id) == $role->id ? 'selected' : '' }}>
                                                    {{ $role->funcao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="remuneracao" class="form-label">Remuneração</label>
                                        <input type="text" class="form-control valor-input" id="remuneracao"
                                            name="remuneracao" placeholder="R$ 0,00"
                                            value="{{ old('remuneracao') ? old('remuneracao') : $contrato->remuneracao }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cbo" class="form-label">CBO</label>
                                        <input type="text" class="form-control" id="cbo" name="cbo"
                                            placeholder="CBO" value="{{ old('cbo') ? old('cbo') : $contrato->cbo }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="situacao" class="form-label">Situação</label>
                                        <select class="form-select form-control" id="situacao" name="situacao">
                                            <option>Selecione</option>
                                            <option value="Afastado"
                                                {{ $contrato->situacao == 'Afastado' ? 'selected' : '' }}>Afastado</option>
                                            <option value="Aviso" {{ $contrato->situacao == 'Aviso' ? 'selected' : '' }}>
                                                Aviso</option>
                                            <option value="Contrato de experiência"
                                                {{ $contrato->situacao == 'Contrato de experiência' ? 'selected' : '' }}>
                                                Contrato de experiência</option>
                                            <option value="Desligado"
                                                {{ $contrato->situacao == 'Desligado' ? 'selected' : '' }}>Desligado
                                            </option>
                                            <option value="Efetivo"
                                                {{ $contrato->situacao == 'Efetivo' ? 'selected' : '' }}>Efetivo</option>
                                            <option value="Em contratação"
                                                {{ $contrato->situacao == 'Em contratação' ? 'selected' : '' }}>Em
                                                contratação</option>
                                            <option value="Férias"
                                                {{ $contrato->situacao == 'Férias' ? 'selected' : '' }}>Férias</option>
                                            <option value="Temporário"
                                                {{ $contrato->situacao == 'Temporário' ? 'selected' : '' }}>Temporário
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="disponibilidade" class="form-label">Disponibilidade</label>
                                        <select class="form-select form-control" id="disponibilidade"
                                            name="disponibilidade" aria-label="Default select example">
                                            <option>Selecione</option>
                                            <option value="Disponível"
                                                {{ $contrato->disponibilidade == 'Disponível' ? 'selected' : '' }}>
                                                Disponível</option>
                                            <option value="Indisponível"
                                                {{ $contrato->disponibilidade == 'Indisponível' ? 'selected' : '' }}>
                                                Indisponível</option>
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
                                            placeholder="Data de admissão"
                                            value="{{ old('admissao') ? old('admissao') : $contrato->admissao }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="termino" class="form-label">Término do contrato</label>
                                        <input type="date" class="form-control" id="termino" name="termino"
                                            placeholder="Término do contrato"
                                            value="{{ old('termino') ? old('termino') : $contrato->termino }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="observacao" class="form-label">Observação</label>
                                        <input type="text" class="form-control" id="observacao" name="observacao"
                                            placeholder="Observação"
                                            value="{{ old('observacao') ? old('observacao') : $contrato->observacao }}">
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
                    <div class="col-md content-center">
                        <button class="btn btn-outline-warning btn-sm">Editar</button>
                        <button type="button" class="btn btn-outline-danger btn-sm"
                            onclick="window.location.href='{{ route('users.show', $user->id) }}'">Cancelar</button>
                    </div>
                    <div class= "col-md-4"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
