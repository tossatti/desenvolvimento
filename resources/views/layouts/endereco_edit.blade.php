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
                        <input type="text" class="form-control" id="estado" name="estado"
                            placeholder="Estado"
                            value="{{ old('estado') ? old('estado') : $adress->estado }}">
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