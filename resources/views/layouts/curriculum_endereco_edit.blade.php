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
                    <div class="col-md-9 form-floating">
                        <input type="text" class="form-control" id="endereco" name="endereco"
                            placeholder="Nome da Rua/Avenida ..."
                            value="{{ old('endereco') ? old('endereco') : $curriculum->endereco }} ">
                        <label for="endereco" class="form-label">Endereço</label>
                    </div>
                    <div class="col-md-3 form-floating">
                        <input type="text" class="form-control" id="numero" name="numero"
                            placeholder="Nº"
                            value="{{ old('numero') ? old('numero') : $curriculum->numero }}">
                        <label for="numero" class="form-label">Nº</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="complemento" name="complemento"
                            placeholder="Complemento"
                            value="{{ old('complemento') ? old('complemento') : $curriculum->complemento }}">
                        <label for="complemento" class="form-label">Complemento</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="bairro" name="bairro"
                            placeholder="Bairro"
                            value="{{ old('bairro') ? old('bairro') : $curriculum->bairro }}">
                        <label for="bairro" class="form-label">Bairro</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="cidade" name="cidade"
                            placeholder="Cidade"
                            value="{{ old('cidade') ? old('cidade') : $curriculum->cidade }}">
                        <label for="cidade" class="form-label">Cidade</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="estado" name="estado">
                            <option value="">Selecione</option>
                            <option value="22" {{ old('estado', $curriculum->estado) == '22' ? 'selected' : '' }}>RO</option>
                            <option value="1" {{ old('estado', $curriculum->estado) == '1' ? 'selected' : '' }}>AC</option>
                            <option value="2" {{ old('estado', $curriculum->estado) == '2' ? 'selected' : '' }}>AL</option>
                            <option value="3" {{ old('estado', $curriculum->estado) == '3' ? 'selected' : '' }}>AP</option>
                            <option value="4" {{ old('estado', $curriculum->estado) == '4' ? 'selected' : '' }}>AM</option>
                            <option value="5" {{ old('estado', $curriculum->estado) == '5' ? 'selected' : '' }}>BA</option>
                            <option value="6" {{ old('estado', $curriculum->estado) == '6' ? 'selected' : '' }}>CE</option>
                            <option value="7" {{ old('estado', $curriculum->estado) == '7' ? 'selected' : '' }}>DF</option>
                            <option value="8" {{ old('estado', $curriculum->estado) == '8' ? 'selected' : '' }}>ES</option>
                            <option value="9" {{ old('estado', $curriculum->estado) == '9' ? 'selected' : '' }}>GO</option>
                            <option value="10" {{ old('estado', $curriculum->estado) == '10' ? 'selected' : '' }}>MA</option>
                            <option value="11" {{ old('estado', $curriculum->estado) == '11' ? 'selected' : '' }}>MT</option>
                            <option value="12" {{ old('estado', $curriculum->estado) == '12' ? 'selected' : '' }}>MS</option>
                            <option value="13" {{ old('estado', $curriculum->estado) == '13' ? 'selected' : '' }}>MG</option>
                            <option value="14" {{ old('estado', $curriculum->estado) == '14' ? 'selected' : '' }}>PA</option>
                            <option value="15" {{ old('estado', $curriculum->estado) == '15' ? 'selected' : '' }}>PB</option>
                            <option value="16" {{ old('estado', $curriculum->estado) == '16' ? 'selected' : '' }}>PR</option>
                            <option value="17" {{ old('estado', $curriculum->estado) == '17' ? 'selected' : '' }}>PE</option>
                            <option value="18" {{ old('estado', $curriculum->estado) == '18' ? 'selected' : '' }}>PI</option>
                            <option value="19" {{ old('estado', $curriculum->estado) == '19' ? 'selected' : '' }}>RJ</option>
                            <option value="20" {{ old('estado', $curriculum->estado) == '20' ? 'selected' : '' }}>RN</option>
                            <option value="21" {{ old('estado', $curriculum->estado) == '21' ? 'selected' : '' }}>RS</option>
                            <option value="23" {{ old('estado', $curriculum->estado) == '23' ? 'selected' : '' }}>RR</option>
                            <option value="24" {{ old('estado', $curriculum->estado) == '24' ? 'selected' : '' }}>SC</option>
                            <option value="25" {{ old('estado', $curriculum->estado) == '25' ? 'selected' : '' }}>SP</option>
                            <option value="26" {{ old('estado', $curriculum->estado) == '26' ? 'selected' : '' }}>SE</option>
                            <option value="27" {{ old('estado', $curriculum->estado) == '27' ? 'selected' : '' }}>TO</option>
                        </select>
                        <label for="estado" class="form-label">Estado</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <input type="text" class="form-control" id="cep" name="cep"
                            placeholder="CEP" value="{{ old('cep') ? old('cep') : $curriculum->cep }}">
                        <label for="cep" class="form-label">CEP</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="telefone" name="telefone"
                            placeholder="Nº de telefone"
                            value="{{ old('telefone') ? old('telefone') : $curriculum->telefone }}">
                        <label for="telefone" class="form-label">Nº de telefone</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>