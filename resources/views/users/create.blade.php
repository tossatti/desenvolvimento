@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar colaborador</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @method('POST')
                {{-- dados pessoais --}}
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
                                            placeholder="Nome completo" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-7">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Insira um e-mail válido" value="{{ old('email') }}">
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
                {{-- dados pessoais --}}
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
                                        <input type="text" class="form-control cpf" id="cpf" name="cpf"
                                            placeholder="CPF" value="{{ old('cpf') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pis" class="form-label">PIS/PASEP</label>
                                        <input type="text" class="form-control" id="pis" name="pis"
                                            placeholder="PIS/PASEP" value="{{ old('pis') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="titulo" class="form-label">Título de eleitor</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                            placeholder="Título de eleitor" value="{{ old('titulo') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cnh" class="form-label">CNH</label>
                                        <input type="text" class="form-control" id="cnh" name="cnh"
                                            placeholder="CNH" value="{{ old('cnh') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ctps" class="form-label">Carteira de trabalho antiga</label>
                                        <input type="text" class="form-control" id="ctps" name="ctps"
                                            placeholder="Carteira de trabalho" value="{{ old('ctps') }}">
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
                                            placeholder="Banco" value="{{ old('banco') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="agencia" class="form-label">Agência</label>
                                        <input type="text" class="form-control" id="agencia" name="agencia"
                                            placeholder="Agência" value="{{ old('agencia') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipoconta" class="form-label">Tipo de conta</label>
                                        <select class="form-select form-control" id="tipoconta" name="tipoconta"
                                            aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ old('tipoconta') == '1' ? 'selected' : '' }}>Conta
                                                Corrente</option>
                                            <option value="2" {{ old('tipoconta') == '2' ? 'selected' : '' }}>Conta
                                                Poupança</option>
                                            <option value="3" {{ old('tipoconta') == '3' ? 'selected' : '' }}>Conta
                                                Salário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numeroConta" class="form-label">Nº da conta</label>
                                        <input type="text" class="form-control" id="numeroConta" name="numeroConta"
                                            placeholder="Nº da conta" value="{{ old('numeroConta') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipopix" class="form-label">Tipo de chave pix</label>
                                        <select class="form-select form-control" id="tipopix" name="tipopix"
                                            aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="1" {{ old('tipopix') == '1' ? 'selected' : '' }}>CPF
                                            </option>
                                            <option value="2" {{ old('tipopix') == '2' ? 'selected' : '' }}>E-mail
                                            </option>
                                            <option value="3" {{ old('tipopix') == '3' ? 'selected' : '' }}>Telefone
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pix" class="form-label">Chave pix</label>
                                        <input type="text" class="form-control" id="pix" name="pix"
                                            placeholder="Chave pix" value="{{ old('pix') }}">
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
                                            placeholder="Nome da Rua/Avenida ..." value="{{ old('endereco') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="numeroEndereco" class="form-label">Nº</label>
                                        <input type="text" class="form-control" id="numeroEndereco"
                                            name="numeroEndereco" placeholder="Nº" value="{{ old('numeroEndereco') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="complemento" class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Complemento" value="{{ old('complemento') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bairro" class="form-label">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            placeholder="Bairro" value="{{ old('bairro') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"
                                            placeholder="Cidade" value="{{ old('cidade') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado"
                                            placeholder="Estado" value="{{ old('estado') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep"
                                            placeholder="CEP" value="{{ old('cep') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefone" class="form-label">Nº de telefone</label>
                                        <input type="text" class="form-control telefone" id="telefone"
                                            name="telefone" placeholder="Nº de telefone" value="{{ old('telefone') }}">
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
                                        <select class="form-select form-control" id="tipoContrato" name="tipoContrato"
                                            aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="1" {{ old('tipoContrato') == '1' ? 'selected' : '' }}>
                                                Diarista</option>
                                            <option value="2" {{ old('tipoContrato') == '2' ? 'selected' : '' }}>
                                                Mensalista</option>
                                            <option value="3" {{ old('tipoContrato') == '3' ? 'selected' : '' }}>
                                                Prestador de serviço</option>
                                            <option value="4" {{ old('tipoContrato') == '4' ? 'selected' : '' }}>
                                                Proprietário</option>
                                            <option value="5" {{ old('tipoContrato') == '5' ? 'selected' : '' }}>
                                                Terceirizado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="lotacao" class="form-label">Lotação</label>
                                        <input type="text" class="form-control" id="lotacao" name="lotacao"
                                            placeholder="Lotação" value="{{ old('lotacao') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="equipe" class="form-label">Equipe</label>
                                        <select class="form-select form-control" id="equipe" name="equipe"
                                            aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ old('equipe') == '1' ? 'selected' : '' }}>Armação
                                            </option>
                                            <option value="2" {{ old('equipe') == '2' ? 'selected' : '' }}>
                                                Carpintaria</option>
                                            <option value="3" {{ old('equipe') == '3' ? 'selected' : '' }}>Civil
                                            </option>
                                            <option value="4" {{ old('equipe') == '4' ? 'selected' : '' }}>Elétrica
                                            </option>
                                            <option value="5" {{ old('equipe') == '5' ? 'selected' : '' }}>Esquadria
                                            </option>
                                            <option value="6" {{ old('equipe') == '6' ? 'selected' : '' }}>Hidráulica
                                            </option>
                                            <option value="7" {{ old('equipe') == '7' ? 'selected' : '' }}>Logística
                                            </option>
                                            <option value="8" {{ old('equipe') == '8' ? 'selected' : '' }}>Metálica
                                            </option>
                                            <option value="9" {{ old('equipe') == '9' ? 'selected' : '' }}>Pintura
                                            </option>
                                            <option value="10" {{ old('equipe') == '10' ? 'selected' : '' }}>Piso
                                            </option>
                                            <option value="11" {{ old('equipe') == '11' ? 'selected' : '' }}>
                                                Revestimento</option>
                                            <option value="12" {{ old('equipe') == '12' ? 'selected' : '' }}>Técnica
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="role_id " class="form-label">Função</label>
                                        <select class="form-select form-control" id="role_id " name="role_id "
                                            aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ old('role_id ') == $role->id ? 'selected' : '' }}>
                                                    {{ $role->funcao }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="remuneracao" class="form-label">Remuneração</label>
                                        <input type="text" class="form-control valor-input" id="remuneracao"
                                            name="remuneracao" placeholder="R$ 0,00" value="{{ old('remuneracao') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cbo" class="form-label">CBO</label>
                                        <input type="text" class="form-control money" id="cbo" name="cbo"
                                            placeholder="CBO" value="{{ old('cbo') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="situacao" class="form-label">Situação</label>
                                        <select class="form-select form-control" id="situacao" name="situacao"
                                            aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ old('situacao') == '1' ? 'selected' : '' }}>Afastado
                                            </option>
                                            <option value="2" {{ old('situacao') == '2' ? 'selected' : '' }}>Aviso
                                            </option>
                                            <option value="3" {{ old('situacao') == '3' ? 'selected' : '' }}>Contrato
                                                de experiência</option>
                                            <option value="4" {{ old('situacao') == '4' ? 'selected' : '' }}>
                                                Desligado</option>
                                            <option value="5" {{ old('situacao') == '5' ? 'selected' : '' }}>Efetivo
                                            </option>
                                            <option value="6" {{ old('situacao') == '6' ? 'selected' : '' }}>Em
                                                contratação</option>
                                            <option value="7" {{ old('situacao') == '7' ? 'selected' : '' }}>Férias
                                            </option>
                                            <option value="8" {{ old('situacao') == '8' ? 'selected' : '' }}>
                                                Temporário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="disponibilidade" class="form-label">Disponibilidade</label>
                                        <select class="form-select form-control" id="disponibilidade"
                                            name="disponibilidade" aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ old('disponibilidade') == '1' ? 'selected' : '' }}>
                                                Disponível</option>
                                            <option value="2" {{ old('disponibilidade') == '2' ? 'selected' : '' }}>
                                                Indisponível</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="aso" class="form-label">ASO</label>
                                        <input type="date" class="form-control" id="aso" name="aso"
                                            placeholder="ASO" value="{{ old('aso') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="admissao" class="form-label">Admissão</label>
                                        <input type="date" class="form-control" id="admissao" name="admissao"
                                            placeholder="Data de admissão" value="{{ old('admissao') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="termino" class="form-label">Término do contrato</label>
                                        <input type="date" class="form-control" id="termino" name="termino"
                                            placeholder="Término do contrato" value="{{ old('termino') }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="observacao" class="form-label">Observação</label>
                                        <input type="text" class="form-control" id="observacao" name="observacao"
                                            placeholder="Observação" value="{{ old('observacao') }}">
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
                </div>
                {{-- e-social --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
