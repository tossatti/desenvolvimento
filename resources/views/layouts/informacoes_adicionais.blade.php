<h2 class="accordion-header">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#epi" aria-expanded="true"
        aria-controls="collapseOne">
        <strong>Informações adicionais</strong>
    </button>
</h2>
<div id="epi" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div class="row g-3">
            {{-- EPI --}}
            <div class="form-floating col-md-3">
                <input type="number" class="form-control" id="calca" name="calca" placeholder="nº"
                    value="{{ old('calca') }}" required>
                <label for="calca" class="form-label">Calça (nº)</label>
            </div>
            <div class="form-floating col-md-3">
                <select class="form-select" id="camisa" name="camisa" required>
                    <option value="">Selecione</option>
                    <option value="1" {{ old('camisa') == 'PP' ? 'selected' : '' }}>PP
                    </option>
                    <option value="2" {{ old('camisa') == 'P' ? 'selected' : '' }}>P</option>
                    <option value="3" {{ old('camisa') == 'M' ? 'selected' : '' }}>M</option>
                    <option value="4" {{ old('camisa') == 'G' ? 'selected' : '' }}>G</option>
                    <option value="5" {{ old('camisa') == 'GG' ? 'selected' : '' }}>GG
                    </option>
                    <option value="6" {{ old('camisa') == 'XGG' ? 'selected' : '' }}>XGG
                    </option>
                </select>
                <label for="camisa" class="form-label">Camisa</label>
            </div>
            <div class="form-floating col-md-3">
                <input type="number" class="form-control" id="calcado" name="calcado" placeholder="nº"
                    value="{{ old('calcado') }}" required>
                <label for="calcado" class="form-label">Calçado (nº)</label>
            </div>
            <div class="form-floating col-md-3">
                <select class="form-select" id="nr10" name="nr10" required>
                    <option value="">Selecione</option>
                    <option value="1" {{ old('nr10') == 1 ? 'selected' : '' }}>Sim</option>
                    <option value="2" {{ old('nr10') == 2 ? 'selected' : '' }}>Não</option>
                </select>
                <label for="nr10" class="form-label">Possui curso de NR10?</label>
            </div>
        </div>
    </div>
</div>
