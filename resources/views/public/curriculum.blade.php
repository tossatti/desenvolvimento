@extends('layouts.public')

@section('public')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar colaborador</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('public.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('public.store') }}" method="POST">
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
                        <div id="dados" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Para qual vaga você é candidato?</label>
                                        <input type="text" class="form-control" id="vaga" vaga="vaga"
                                            placeholder="Selecione" value="{{ old('vaga') }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nome completo" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md-9">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco" name="endereco"
                                            placeholder="Nome da Rua/Avenida ..." value="{{ old('endereco') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="numeroEndereco" class="form-label">Nº</label>
                                        <input type="text" class="form-control" id="numeroEndereco" name="numeroEndereco"
                                            placeholder="Nº" value="{{ old('numeroEndereco') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="complemento" class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento"
                                            placeholder="Complemento" value="{{ old('complemento') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bairro" class="form-label">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro"
                                            placeholder="Bairro" value="{{ old('bairro') }}">
                                    </div>
                                    <div class="col-md-3">
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
                                    <div class="col-md-3">
                                        <label for="telefone" class="form-label">Nº de telefone</label>
                                        <input type="text" class="form-control telefone" id="telefone"
                                            name="telefone" placeholder="Nº de telefone" value="{{ old('telefone') }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Insira um e-mail válido" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nascimento" class="form-label">Data de nascimento</label>
                                        <input type="date" class="form-control" id="nascimento" name="nascimento"
                                            value="{{ old('nascimento') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="naturalidade" class="form-label">Naturalidade</label>
                                        <input type="text" class="form-control" id="naturalidade" name="naturalidade"
                                            placeholder="Cidade que nasceu" value="{{ old('naturalidade') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nacionalidade" class="form-label">Nacionalidade</label>
                                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                                            placeholder="Escolha" value="{{ old('nacionalidade') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="genero" class="form-label">Gênero</label>
                                        <select class="form-select" id="genero" name="genero">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ old('genero') == '1' ? 'selected' : '' }}>Masculino</option>
                                            <option value="2" {{ old('genero') == '2' ? 'selected' : '' }}>Feminino</option>
                                            <option value="3" {{ old('genero') == '3' ? 'selected' : '' }}>Outro</option>
                                            <option value="4" {{ old('genero') == '4' ? 'selected' : '' }}>Prefiro não informar</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="escolaridade" class="form-label">Escolaridade</label>
                                        <input type="text" class="form-control" id="escolaridade" name="escolaridade"
                                            placeholder="Escolha" value="{{ old('escolaridade') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="raca" class="form-label">Raça</label>
                                        <input type="text" class="form-control" id="raca" name="raca"
                                            placeholder="Escolha" value="{{ old('raca') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="civil" class="form-label">Estado Civil</label>
                                        <input type="text" class="form-control" id="civil" name="civil"
                                            placeholder="Escolha" value="{{ old('civil') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cpf" class="form-label">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"
                                            placeholder="Insira o CPF (somente números)" value="{{ old('cpf') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pis" class="form-label">PIS/PASEP</label>
                                        <input type="text" class="form-control" id="pis" name="pis"
                                            placeholder="PIS/PASEP" value="{{ old('pis') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="titulo" class="form-label">Título de eleitor</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo"
                                            placeholder="Título de eleitor" value="{{ old('titulo') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cnh" class="form-label">CNH</label>
                                        <input type="text" class="form-control" id="cnh" name="cnh"
                                            placeholder="CNH" value="{{ old('cnh') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ctps" class="form-label">Carteira de trabalho antiga</label>
                                        <input type="text" class="form-control" id="ctps" name="ctps"
                                            placeholder="Carteira de trabalho" value="{{ old('ctps') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="banco" class="form-label">Banco</label>
                                        <input type="text" class="form-control" id="banco" name="banco"
                                            placeholder="Banco" value="{{ old('banco') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="agencia" class="form-label">Agência</label>
                                        <input type="text" class="form-control" id="agencia" name="agencia"
                                            placeholder="Agência" value="{{ old('agencia') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tipoconta" class="form-label">Tipo de conta</label>
                                        <select class="form-select form-control" id="tipoconta" name="tipoconta" aria-label="Default select example">
                                            <option value="">Selecione</option>
                                            <option value="1" {{ old('tipoconta') == '1' ? 'selected' : '' }}>Conta Corrente</option>
                                            <option value="2" {{ old('tipoconta') == '2' ? 'selected' : '' }}>Conta Poupança</option>
                                            <option value="3" {{ old('tipoconta') == '3' ? 'selected' : '' }}>Conta Salário</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="numeroConta" class="form-label">Nº da conta</label>
                                        <input type="text" class="form-control" id="numeroConta" name="numeroConta"
                                            placeholder="Nº da conta" value="{{ old('numeroConta') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tipopix" class="form-label">Tipo de chave pix</label>
                                        <select class="form-select form-control" id="tipopix" name="tipopix"
                                            aria-label="Default select example">
                                            <option selected>Selecione</option>
                                            <option value="1" {{ old('tipopix') == '1' ? 'selected' : ''}} >CPF</option>
                                            <option value="2" {{ old('tipopix') == '2' ? 'selected' : '' }} >E-mail</option>
                                            <option value="3" {{ old('tipopix') == '3' ? 'selected' : ''}} >Telefone</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pix" class="form-label">Chave pix</label>
                                        <input type="text" class="form-control" id="pix" name="pix"
                                            placeholder="Chave pix" value="{{ old('pix') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="calca" class="form-label">Calça (nº)</label>
                                        <input type="number" class="form-control" id="calca" name="calca"
                                            placeholder="nº" value="{{ old('calca') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="camisa" class="form-label">Camisa</label>
                                        <select class="form-select" id="camisa" name="camisa">
                                            <option value="">Selecione</option>
                                            <option value="PP" {{ old('camisa') == 'PP' ? 'selected' : '' }}>PP</option>
                                            <option value="P" {{ old('camisa') == 'P' ? 'selected' : '' }}>P</option>
                                            <option value="M" {{ old('camisa') == 'M' ? 'selected' : '' }}>M</option>
                                            <option value="G" {{ old('camisa') == 'G' ? 'selected' : '' }}>G</option>
                                            <option value="GG" {{ old('camisa') == 'GG' ? 'selected' : '' }}>GG</option>
                                            <option value="XGG" {{ old('camisa') == 'XGG' ? 'selected' : '' }}>XGG</option>
                                        </select>
                                    </div>







                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- dados pessoais --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-success btn-sm">Enviar</button>
                        <a class="btn btn-danger btn-sm" href="{{ route('public.index') }}" role="button">Cancelar</a>
                    </div>
                    <div class= "col-md-4"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
