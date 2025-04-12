<div class="accordion mb-3">
    <div class="accordion-item ">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dadosDependentes"
                aria-expanded="true" aria-controls="collapseOne">
                <strong>Dependentes</strong>
            </button>
        </h2>
        <div id="dadosDependentes" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="form-floating col-md-3">
                        <select class="form-select" id="tem_dependentes" name="tem_dependentes" required>
                            <option value="">Selecione</option>
                            <option value="1" {{ old('tem_dependentes') == 1 ? 'selected' : '' }}>Sim</option>
                            <option value="0" {{ old('tem_dependentes') == 0 ? 'selected' : '' }}>Não</option>
                        </select>
                        <label for="tem_dependentes" class="form-label">Tem dependente(s)</label>
                    </div>
                    <div class="form-floating col-md-2" id="numeroDependentesDiv" style="display: none;">
                        <input type="number" class="form-control" id="numeroDependentes" name="numeroDependentes"
                            value="{{ old('numeroDependentes') }}">
                        <label for="numeroDependentes" class="form-label">Quantos?</label>
                    </div>
                </div>
                <div id="novosDependentesContainer" class="mt-3">
                    </div>
            </div>
        </div>
    </div>
</div>

