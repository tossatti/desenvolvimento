<div class="accordion mb-3">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapse show" type="button" data-bs-toggle="collapse"
                data-bs-target="#esocial" aria-expanded="false" aria-controls="collapseThree">
                <strong>E-Social</strong>
            </button>
        </h2>
        <div id="esocial" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula"
                            placeholder="Matrícula" value="{{ old('matricula') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="nocivos" class="form-label">Agentes Nocivos</label>
                        <input type="date" class="form-control" id="nocivos" name="nocivos"
                            placeholder="Agentes Nocivos" value="{{ old('nocivos') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="admissionais" class="form-label">Exames admissionais</label>
                        <input type="date" class="form-control" id="admissionais" name="admissionais"
                            placeholder="Admissionais" value="{{ old('admissionais') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="periodicos" class="form-label">Exames Periódicos</label>
                        <input type="date" class="form-control" id="periodicos" name="periodicos"
                            placeholder="Exames Periódicos" value="{{ old('periodicos') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="mudanca" class="form-label">Exames de mudança de função</label>
                        <input type="date" class="form-control" id="mudanca" name="mudanca"
                            placeholder="Exames de mudança de função" value="{{ old('mudanca') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="retorno" class="form-label">Exames de retorno ao trabalho</label>
                        <input type="date" class="form-control" id="retorno" name="retorno"
                            placeholder="Exames de retorno ao trabalho" value="{{ old('retorno') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="demissional" class="form-label">Exames demissionais</label>
                        <input type="date" class="form-control" id="demissional" name="demissional"
                            placeholder="demissionais" value="{{ old('demissional') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
