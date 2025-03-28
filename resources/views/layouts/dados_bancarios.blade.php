<h2 class="accordion-header">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bancários"
        aria-expanded="true" aria-controls="collapseOne">
        <strong>Dados bancários</strong>
    </button>
</h2>
<div id="bancários" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div class="row g-3">
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="banco" name="banco" placeholder="Banco"
                    value="{{ old('banco') }}" required>
                <label for="banco" class="form-label">Banco</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="agencia" name="agencia" placeholder="Agência"
                    value="{{ old('agencia') }}" required>
                <label for="agencia" class="form-label">Agência</label>
            </div>
            <div class="form-floating col-md-4">
                <select class="form-select form-control" id="tipoconta" name="tipoconta"
                    aria-label="Default select example" required>
                    <option value="">Selecione</option>
                    <option value="1" {{ old('tipoconta') == '1' ? 'selected' : '' }}>Conta
                        Corrente</option>
                    <option value="2" {{ old('tipoconta') == '2' ? 'selected' : '' }}>Conta
                        Poupança</option>
                    <option value="3" {{ old('tipoconta') == '3' ? 'selected' : '' }}>Conta
                        Salário</option>
                </select>
                <label for="tipoconta" class="form-label">Tipo de conta</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="numeroConta" name="numeroConta" placeholder="Nº da conta"
                    value="{{ old('numeroConta') }}" required>
                <label for="numeroConta" class="form-label">Nº da conta</label>
            </div>
            <div class="form-floating col-md-4">
                <select class="form-select form-control" id="tipopix" name="tipopix"
                    aria-label="Default select example" required>
                    <option value="">Selecione</option>
                    <option value="1" {{ old('tipopix') == '1' ? 'selected' : '' }}>CPF
                    </option>
                    <option value="2" {{ old('tipopix') == '2' ? 'selected' : '' }}>E-mail
                    </option>
                    <option value="3" {{ old('tipopix') == '3' ? 'selected' : '' }}>Telefone
                    </option>
                </select>
                <label for="tipopix" class="form-label">Tipo de chave pix</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="pix" name="pix" placeholder="Chave pix"
                    value="{{ old('pix') }}" required>
                <label for="pix" class="form-label">Chave pix</label>
            </div>
        </div>
    </div>
</div>
