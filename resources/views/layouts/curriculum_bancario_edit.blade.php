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
                            placeholder="Banco" value="{{ old('banco') ? old('banco') : $curriculum->banco }}">
                        <label for="banco" class="form-label">Banco</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="agencia" name="agencia"
                            placeholder="Agência"
                            value="{{ old('agencia') ? old('agencia') : $curriculum->agencia }}">
                        <label for="agencia" class="form-label">Agência</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-select form-control" id="tipoconta" name="tipoconta">
                            <option>Selecione</option>
                            <option value="Conta Corrente"
                                {{ $curriculum->tipoconta == 'Conta Corrente' ? 'selected' : '', old('tipoconta') }}>
                                Conta Corrente</option>
                            <option value="Conta Poupança"
                                {{ $curriculum->tipoconta == 'Conta Poupança' ? 'selected' : '', old('tipoconta') }}>
                                Conta Poupança</option>
                            <option value="Conta Salário"
                                {{ $curriculum->tipoconta == 'Conta Salário' ? 'selected' : '', old('tipoconta') }}>
                                Conta Salário</option>
                        </select>
                        <label for="tipoconta" class="form-label">Tipo de conta</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="numeroConta" name="numeroConta"
                            placeholder="Nº da conta"
                            value="{{ old('numeroConta') ? old('numeroConta') : $curriculum->numeroConta }}">
                        <label for="numeroConta" class="form-label">Nº da conta</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <select class="form-select form-control" id="tipopix" name="tipopix">
                            <option>Selecione</option>
                            <option value="CPF"
                                {{ $curriculum->tipopix == 'CPF' ? 'selected' : '', old('tipopix') }}>CPF
                            </option>
                            <option value="E-mail"
                                {{ $curriculum->tipopix == 'E-mail' ? 'selected' : '', old('tipopix') }}>E-mail
                            </option>
                            <option value="Telefone"
                                {{ $curriculum->tipopix == 'Telefone' ? 'selected' : '', old('tipopix') }}>
                                Telefone</option>
                        </select>
                        <label for="tipopix" class="form-label">Tipo de chave pix</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="pix" name="pix"
                            placeholder="Chave pix" value="{{ old('pix') ? old('pix') : $curriculum->pix }}">
                        <label for="pix" class="form-label">Chave pix</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>