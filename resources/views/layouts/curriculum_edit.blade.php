<div class="accordion mb-3">
    <div class="accordion-item ">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dados"
                aria-expanded="true" aria-controls="collapseOne">
                <strong>Dados pessoais</strong>
            </button>
        </h2>
        <div id="dados" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3 form-floating">
                    <div class="col-md-12 form-floating">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nome completo" value="{{ old('name') ? old('name') : $curriculum->name }}">
                        <label for="name" class="form-label">Nome</label>
                    </div>
                    <div class="col-md-7 form-floating">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Insira um e-mail válido"
                            value="{{ old('email') ? old('email') : $curriculum->email }}">
                        <label for="email" class="form-label">E-mail</label>
                    </div>
                    <div class="col-md-5 form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}">
                        <label for="password" class="form-label">Senha</label>
                    </div>
                    <div class="form-floating col-md-3 ">
                        <input type="date" class="form-control" id="nascimento" name="nascimento"
                            value="{{ old('nascimento') ? old('nascimento') : $curriculum->nascimento }}">
                        <label for="nascimento" class="form-label">Data de nascimento</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <input type="text" class="form-control" id="naturalidade" name="naturalidade"
                            placeholder="Cidade que nasceu"
                            value="{{ old('naturalidade') ? old('naturalidade') : $curriculum->naturalidade }}">
                        <label for="naturalidade" class="form-label">Naturalidade</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade"
                            placeholder="Escolha"
                            value="{{ old('nacionalidade') ? old('nacionalidade') : $curriculum->nacionalidade }}">
                        <label for="nacionalidade" class="form-label">Nacionalidade</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <select class="form-select" id="genero" name="genero">
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ (old('genero') ?? ($curriculum->genero ?? '')) == '1' ? 'selected' : '' }}>
                                Masculino</option>
                            <option value="2"
                                {{ (old('genero') ?? ($curriculum->genero ?? '')) == '2' ? 'selected' : '' }}>
                                Feminino</option>
                            <option value="3"
                                {{ (old('genero') ?? ($curriculum->genero ?? '')) == '3' ? 'selected' : '' }}>
                                Outro
                            </option>
                            <option value="4"
                                {{ (old('genero') ?? ($curriculum->genero ?? '')) == '4' ? 'selected' : '' }}>
                                Prefiro não informar</option>
                        </select>
                        <label for="genero" class="form-label">Gênero</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="escolaridade" name="escolaridade">
                            <option value="">Selecione</option>
                            <option value="1" {{ $curriculum->escolaridade == '1' ? 'selected' : '' }}>
                                Fundamental incompleto</option>
                            <option value="2" {{ $curriculum->escolaridade == '2' ? 'selected' : '' }}>
                                Fundamental completo</option>
                            <option value="3" {{ $curriculum->escolaridade == '3' ? 'selected' : '' }}>
                                Médio incompleto</option>
                            <option value="4" {{ $curriculum->escolaridade == '4' ? 'selected' : '' }}>
                                Médio completo</option>
                            <option value="5" {{ $curriculum->escolaridade == '5' ? 'selected' : '' }}>
                                Curso técnico incompleto</option>
                            <option value="6" {{ $curriculum->escolaridade == '6' ? 'selected' : '' }}>
                                Curso técnico completo</option>
                            <option value="7" {{ $curriculum->escolaridade == '7' ? 'selected' : '' }}>
                                Superior incompleto</option>
                            <option value="8" {{ $curriculum->escolaridade == '8' ? 'selected' : '' }}>
                                Superior completo</option>
                            <option value="9" {{ $curriculum->escolaridade == '9' ? 'selected' : '' }}>
                                Pós-graduação incompleto</option>
                            <option value="10" {{ $curriculum->escolaridade == '10' ? 'selected' : '' }}>
                                Pós-graduação completo</option>
                        </select>
                        <label for="escolaridade" class="form-label">Escolaridade</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="raca" name="raca">
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ (old('raca') ?? ($curriculum->raca ?? '')) == '1' ? 'selected' : '' }}>
                                Branca
                            </option>
                            <option value="2"
                                {{ (old('raca') ?? ($curriculum->raca ?? '')) == '2' ? 'selected' : '' }}>
                                Negra
                            </option>
                            <option value="3"
                                {{ (old('raca') ?? ($curriculum->raca ?? '')) == '3' ? 'selected' : '' }}>
                                Parda
                            </option>
                            <option value="4"
                                {{ (old('raca') ?? ($curriculum->raca ?? '')) == '4' ? 'selected' : '' }}>
                                Amarela
                            </option>
                            <option value="5"
                                {{ (old('raca') ?? ($curriculum->raca ?? '')) == '5' ? 'selected' : '' }}>
                                Indígena
                            </option>
                        </select>
                        <label for="raca" class="form-label">Raça</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="civil" name="civil">
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '1' ? 'selected' : '' }}>
                                Solteiro(a)</option>
                            <option value="2"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '2' ? 'selected' : '' }}>
                                Casado(a)</option>
                            <option value="3"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '3' ? 'selected' : '' }}>
                                Divorciado(a)</option>
                            <option value="4"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '4' ? 'selected' : '' }}>
                                Viúvo(a)</option>
                            <option value="5"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '5' ? 'selected' : '' }}>
                                Separado(a)</option>
                            <option value="6"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '6' ? 'selected' : '' }}>
                                Desquitado(a)</option>
                            <option value="7"
                                {{ (old('civil') ?? ($curriculum->civil ?? '')) == '7' ? 'selected' : '' }}>
                                União
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
