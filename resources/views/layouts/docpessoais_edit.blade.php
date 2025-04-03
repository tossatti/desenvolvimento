<div class="accordion mb-3">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#docs" aria-expanded="false" aria-controls="collapseTwo">
                <strong>Documentos pessoais</strong>
            </button>
        </h2>
        <div id="docs" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="cpf" name="cpf"
                            placeholder="CPF" value="{{ old('cpf') ? old('cpf') : $docs->cpf }}">
                        <label for="cpf" class="form-label">CPF</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="pis" name="pis"
                            placeholder="PIS/PASEP" value="{{ old('pis') ? old('pis') : $docs->pis }}">
                        <label for="pis" class="form-label">PIS/PASEP</label>
                    </div>
                    <div class="col-md-4 form-floating">
                        <input type="text" class="form-control" id="titulo" name="titulo"
                            placeholder="Título de eleitor"
                            value="{{ old('titulo') ? old('titulo') : $docs->titulo }}">
                        <label for="titulo" class="form-label">Título de eleitor</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="text" class="form-control" id="zona" name="zona"
                            placeholder="Zona" value="{{ old('zona') ?? ($docs->zona ?? '') }}">
                        <label for="zona" class="form-label">Zona</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="text" class="form-control" id="secao" name="secao"
                            placeholder="Seção" value="{{ old('secao') ?? ($docs->secao ?? '') }}">
                        <label for="secao" class="form-label">Seção</label>
                    </div>
                    <div class="col-md-4 form-floating">
                        <input type="text" class="form-control" id="cnh" name="cnh"
                            placeholder="Título de eleitor"
                            value="{{ old('picnhs') ? old('cnh') : $docs->cnh }}">
                        <label for="cnh" class="form-label">CNH</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="ctps" name="ctps"
                            placeholder="Carteira de trabalho"
                            value="{{ old('ctps') ? old('ctps') : $docs->ctps }}">
                        <label for="ctps" class="form-label">Carteira de trabalho</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>