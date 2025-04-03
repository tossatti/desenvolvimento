<div class="accordion mb-3" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#esocial" aria-expanded="false" aria-controls="collapseThree">
                <strong>E-Social</strong>
            </button>
        </h2>
        <div id="esocial" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="form-floating col-md-4">
                        <input type="text" class="form-control" id="matricula" name="matricula"
                            placeholder="Matrícula" value="{{ old('matricula') }}">
                        <label for="matricula" class="form-label">Matrícula</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="nocivos" name="nocivos"
                            placeholder="Agentes Nocivos" value="{{ old('nocivos') }}">
                        <label for="nocivos" class="form-label">Agentes Nocivos</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="admissionais" name="admissionais"
                            placeholder="Admissionais" value="{{ old('admissionais') }}">
                        <label for="admissionais" class="form-label">Exames admissionais</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="periodicos" name="periodicos"
                            placeholder="Exames Periódicos" value="{{ old('periodicos') }}">
                        <label for="periodicos" class="form-label">Exames Periódicos</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="mudanca" name="mudanca"
                            placeholder="Exames de mudança de função" value="{{ old('mudanca') }}">
                        <label for="mudanca" class="form-label">Exames de mudança de função</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="retorno" name="retorno"
                            placeholder="Exames de retorno ao trabalho" value="{{ old('retorno') }}">
                        <label for="retorno" class="form-label">Exames de retorno ao trabalho</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="demissional" name="demissional"
                            placeholder="demissionais" value="{{ old('demissional') }}">
                        <label for="demissional" class="form-label">Exames demissionais</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>