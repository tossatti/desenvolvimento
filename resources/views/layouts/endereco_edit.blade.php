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
                            value="{{ old('endereco') ? old('endereco') : $adress->endereco }} ">
                        <label for="endereco" class="form-label">Endereço</label>
                    </div>
                    <div class="col-md-3 form-floating">
                        <input type="text" class="form-control" id="numero" name="numero"
                            placeholder="Nº"
                            value="{{ old('numero') ? old('numero') : $adress->numero }}">
                        <label for="numero" class="form-label">Nº</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="complemento" name="complemento"
                            placeholder="Complemento"
                            value="{{ old('complemento') ? old('complemento') : $adress->complemento }}">
                        <label for="complemento" class="form-label">Complemento</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="bairro" name="bairro"
                            placeholder="Bairro"
                            value="{{ old('bairro') ? old('bairro') : $adress->bairro }}">
                        <label for="bairro" class="form-label">Bairro</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="cidade" name="cidade"
                            placeholder="Cidade"
                            value="{{ old('cidade') ? old('cidade') : $adress->cidade }}">
                        <label for="cidade" class="form-label">Cidade</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="estado" name="estado" required>
                            <option value="">Selecione</option>
                            <option value="22" {{ old('estado', $adress->estado) == '22' ? 'selected' : '' }}>RO</option>
                            <option value="1" {{ old('estado', $adress->estado) == '1' ? 'selected' : '' }}>AC</option>
                            <option value="2" {{ old('estado', $adress->estado) == '2' ? 'selected' : '' }}>AL</option>
                            <option value="3" {{ old('estado', $adress->estado) == '3' ? 'selected' : '' }}>AP</option>
                            <option value="4" {{ old('estado', $adress->estado) == '4' ? 'selected' : '' }}>AM</option>
                            <option value="5" {{ old('estado', $adress->estado) == '5' ? 'selected' : '' }}>BA</option>
                            <option value="6" {{ old('estado', $adress->estado) == '6' ? 'selected' : '' }}>CE</option>
                            <option value="7" {{ old('estado', $adress->estado) == '7' ? 'selected' : '' }}>DF</option>
                            <option value="8" {{ old('estado', $adress->estado) == '8' ? 'selected' : '' }}>ES</option>
                            <option value="9" {{ old('estado', $adress->estado) == '9' ? 'selected' : '' }}>GO</option>
                            <option value="10" {{ old('estado', $adress->estado) == '10' ? 'selected' : '' }}>MA</option>
                            <option value="11" {{ old('estado', $adress->estado) == '11' ? 'selected' : '' }}>MT</option>
                            <option value="12" {{ old('estado', $adress->estado) == '12' ? 'selected' : '' }}>MS</option>
                            <option value="13" {{ old('estado', $adress->estado) == '13' ? 'selected' : '' }}>MG</option>
                            <option value="14" {{ old('estado', $adress->estado) == '14' ? 'selected' : '' }}>PA</option>
                            <option value="15" {{ old('estado', $adress->estado) == '15' ? 'selected' : '' }}>PB</option>
                            <option value="16" {{ old('estado', $adress->estado) == '16' ? 'selected' : '' }}>PR</option>
                            <option value="17" {{ old('estado', $adress->estado) == '17' ? 'selected' : '' }}>PE</option>
                            <option value="18" {{ old('estado', $adress->estado) == '18' ? 'selected' : '' }}>PI</option>
                            <option value="19" {{ old('estado', $adress->estado) == '19' ? 'selected' : '' }}>RJ</option>
                            <option value="20" {{ old('estado', $adress->estado) == '20' ? 'selected' : '' }}>RN</option>
                            <option value="21" {{ old('estado', $adress->estado) == '21' ? 'selected' : '' }}>RS</option>
                            <option value="23" {{ old('estado', $adress->estado) == '23' ? 'selected' : '' }}>RR</option>
                            <option value="24" {{ old('estado', $adress->estado) == '24' ? 'selected' : '' }}>SC</option>
                            <option value="25" {{ old('estado', $adress->estado) == '25' ? 'selected' : '' }}>SP</option>
                            <option value="26" {{ old('estado', $adress->estado) == '26' ? 'selected' : '' }}>SE</option>
                            <option value="27" {{ old('estado', $adress->estado) == '27' ? 'selected' : '' }}>TO</option>
                        </select>
                        <label for="estado" class="form-label">Estado</label>
                    </div>
                    <div class="form-floating col-md-3">
                        <input type="text" class="form-control" id="cep" name="cep"
                            placeholder="CEP" value="{{ old('cep') ? old('cep') : $adress->cep }}">
                        <label for="cep" class="form-label">CEP</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="telefone" name="telefone"
                            placeholder="Nº de telefone"
                            value="{{ old('telefone') ? old('telefone') : $adress->telefone }}">
                        <label for="telefone" class="form-label">Nº de telefone</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>