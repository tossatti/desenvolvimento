<div class="accordion-item ">
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dadosPessoais"
            aria-expanded="true" aria-controls="collapseOne">
            <strong>Dados pessoais</strong>
        </button>
    </h2>
    <div id="dadosPessoais" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row g-3">
                {{-- dados pessoais --}} 
                <div class="form-floating col-md-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo"
                        value="{{ old('name') }}" required>
                    <label for="name" class="form-label">Nome</label>
                </div>
                @if (! request()->routeIs('curricula.create'))
                <div class="form-floating col-md-2">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha"
                        value="{{ old('password') }}" required>
                    <label for="password" class="form-label">Senha</label>
                </div>
                @endif
                <div class="form-floating col-md-9">
                    <input type="text" class="form-control" id="endereco" name="endereco"
                        placeholder="Nome da Rua/Avenida ..." value="{{ old('endereco') }}" required>
                    <label for="endereco" class="form-label">Endereço</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="numero" name="numero"
                        placeholder="Nº" value="{{ old('numero') }}" required>
                    <label for="numero" class="form-label">Nº</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        placeholder="Complemento" value="{{ old('complemento') }}">
                    <label for="complemento" class="form-label">Complemento</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"
                        value="{{ old('bairro') }}" required>
                    <label for="bairro" class="form-label">Bairro</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"
                        value="{{ old('cidade') }}" required>
                    <label for="cidade" class="form-label">Cidade</label>
                </div>
                <div class="form-floating col-md-3">
                    <select class="form-select form-control" id="estado" name="estado" required>
                        <option value="">Selecione</option>
                        <option value="22" {{ old('estado') == '22' ? 'selected' : '' }}>RO</option>
                        <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>AC</option>
                        <option value="2" {{ old('estado') == '2' ? 'selected' : '' }}>AL</option>
                        <option value="3" {{ old('estado') == '3' ? 'selected' : '' }}>AP</option>
                        <option value="4" {{ old('estado') == '4' ? 'selected' : '' }}>AM</option>
                        <option value="5" {{ old('estado') == '5' ? 'selected' : '' }}>BA</option>
                        <option value="6" {{ old('estado') == '6' ? 'selected' : '' }}>CE</option>
                        <option value="7" {{ old('estado') == '7' ? 'selected' : '' }}>DF</option>
                        <option value="8" {{ old('estado') == '8' ? 'selected' : '' }}>ES</option>
                        <option value="9" {{ old('estado') == '9' ? 'selected' : '' }}>GO</option>
                        <option value="10" {{ old('estado') == '10' ? 'selected' : '' }}>MA</option>
                        <option value="11" {{ old('estado') == '11' ? 'selected' : '' }}>MT</option>
                        <option value="12" {{ old('estado') == '12' ? 'selected' : '' }}>MS</option>
                        <option value="13" {{ old('estado') == '13' ? 'selected' : '' }}>MG</option>
                        <option value="14" {{ old('estado') == '14' ? 'selected' : '' }}>PA</option>
                        <option value="15" {{ old('estado') == '15' ? 'selected' : '' }}>PB</option>
                        <option value="16" {{ old('estado') == '16' ? 'selected' : '' }}>PR</option>
                        <option value="17" {{ old('estado') == '17' ? 'selected' : '' }}>PE</option>
                        <option value="18" {{ old('estado') == '18' ? 'selected' : '' }}>PI</option>
                        <option value="19" {{ old('estado') == '19' ? 'selected' : '' }}>RJ</option>
                        <option value="20" {{ old('estado') == '20' ? 'selected' : '' }}>RN</option>
                        <option value="21" {{ old('estado') == '21' ? 'selected' : '' }}>RS</option>
                        <option value="23" {{ old('estado') == '23' ? 'selected' : '' }}>RR</option>
                        <option value="24" {{ old('estado') == '24' ? 'selected' : '' }}>SC</option>
                        <option value="25" {{ old('estado') == '25' ? 'selected' : '' }}>SP</option>
                        <option value="26" {{ old('estado') == '26' ? 'selected' : '' }}>SE</option>
                        <option value="27" {{ old('estado') == '27' ? 'selected' : '' }}>TO</option>
                    </select>
                    <label for="estado" class="form-label">Estado</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"
                        value="{{ old('cep') }}">
                    <label for="cep" class="form-label">CEP</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control telefone" id="telefone" name="telefone"
                        placeholder="Nº de telefone" value="{{ old('telefone') }}" required>
                    <label for="telefone" class="form-label">Nº de telefone</label>
                </div>
                <div class="form-floating col-md-6">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Insira um e-mail válido" value="{{ old('email') }}" required>
                    <label for="email" class="form-label">E-mail</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="date" class="form-control" id="nascimento" name="nascimento"
                        value="{{ old('nascimento') }}" required>
                    <label for="nascimento" class="form-label">Data de nascimento</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="naturalidade" name="naturalidade"
                        placeholder="Cidade que nasceu" value="{{ old('naturalidade') }}" required>
                    <label for="naturalidade" class="form-label">Naturalidade</label>
                </div>
                <div class="form-floating col-md-3">
                    <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                        placeholder="Escolha" value="{{ old('nacionalidade') }}" required>
                    <label for="nacionalidade" class="form-label">Nacionalidade</label>
                </div>
                <div class="form-floating col-md-3">
                    <select class="form-select" id="genero" name="genero" required>
                        <option value="">Selecione</option>
                        <option value="1" {{ old('genero') == '1' ? 'selected' : '' }}>Masculino
                        </option>
                        <option value="2" {{ old('genero') == '2' ? 'selected' : '' }}>Feminino
                        </option>
                        <option value="3" {{ old('genero') == '3' ? 'selected' : '' }}>Outro
                        </option>
                        <option value="4" {{ old('genero') == '4' ? 'selected' : '' }}>Prefiro
                            não informar</option>
                    </select> 
                    <label for="genero" class="form-label">Gênero</label>
                </div>
                <div class="form-floating col-md-3">
                    <select class="form-select form-control" id="escolaridade" name="escolaridade" required>
                        <option value="">Selecione</option>
                        <option value="1" {{ old('escolaridade') == '1' ? 'selected' : '' }}>
                            Fundamental incompleto</option>
                        <option value="2" {{ old('escolaridade') == '2' ? 'selected' : '' }}>
                            Fundamental completo</option>
                        <option value="3" {{ old('escolaridade') == '3' ? 'selected' : '' }}>
                            Médio incompleto</option>
                        <option value="4" {{ old('escolaridade') == '4' ? 'selected' : '' }}>
                            Médio completo</option>
                        <option value="5" {{ old('escolaridade') == '5' ? 'selected' : '' }}>
                            Curso técnico incompleto</option>
                        <option value="6" {{ old('escolaridade') == '6' ? 'selected' : '' }}>
                            Curso técnico completo</option>
                        <option value="7" {{ old('escolaridade') == '7' ? 'selected' : '' }}>
                            Superior incompleto</option>
                        <option value="8" {{ old('escolaridade') == '8' ? 'selected' : '' }}>
                            Superior completo</option>
                        <option value="9" {{ old('escolaridade') == '9' ? 'selected' : '' }}>
                            Pós-graduação incompleto</option>
                        <option value="10" {{ old('escolaridade') == '10' ? 'selected' : '' }}>
                            Pós-graduação completo</option>
                    </select>
                    <label for="escolaridade" class="form-label">Escolaridade</label>
                </div>
                <div class="form-floating col-md-3">
                    <select class="form-select form-control" id="raca" name="raca" required>
                        <option value="">Selecione</option>
                        <option value="1" {{ old('raca') == '1' ? 'selected' : '' }}>Branca
                        </option>
                        <option value="2" {{ old('raca') == '2' ? 'selected' : '' }}>Negra
                        </option>
                        <option value="3" {{ old('raca') == '3' ? 'selected' : '' }}>Parda
                        </option>
                        <option value="4" {{ old('raca') == '4' ? 'selected' : '' }}>Amarela
                        </option>
                        <option value="5" {{ old('raca') == '5' ? 'selected' : '' }}>Indígena
                        </option>
                    </select>
                    <label for="raca" class="form-label">Raça</label>
                </div>
                <div class="form-floating col-md-3">
                    <select class="form-select form-control" id="civil" name="civil" required>
                        <option value="">Selecione</option>
                        <option value="1" {{ old('civil') == '1' ? 'selected' : '' }}>Solteiro(a)</option>
                        <option value="2" {{ old('civil') == '2' ? 'selected' : '' }}>Casado(a)</option>
                        <option value="3" {{ old('civil') == '3' ? 'selected' : '' }}>Divorciado(a)</option>
                        <option value="4" {{ old('civil') == '4' ? 'selected' : '' }}>Viúvo(a)</option>
                        <option value="5" {{ old('civil') == '5' ? 'selected' : '' }}>Separado(a)</option>
                        <option value="6" {{ old('civil') == '6' ? 'selected' : '' }}>Desquitado(a)</option>
                        <option value="7" {{ old('civil') == '7' ? 'selected' : '' }}>União estável</option>
                    </select>
                    <label for="civil" class="form-label">Estado Civil</label>
                </div>
                {{-- dados pessoais --}}
            </div>
        </div>
    </div>
</div>
