<h2 class="accordion-header">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#documentos"
        aria-expanded="true" aria-controls="collapseOne">
        <strong>Documentos pessoais</strong>
    </button>
</h2>
<div id="documentos" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div class="row g-3">
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF (somente números)"
                    value="{{ old('cpf') }}" required>
                <label for="cpf" class="form-label">CPF</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="pis" name="pis" placeholder="PIS/PASEP"
                    value="{{ old('pis') }}">
                <label for="pis" class="form-label">PIS/PASEP</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de eleitor"
                    value="{{ old('titulo') }}">
                <label for="titulo" class="form-label">Título de eleitor</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="zona" name="zona" placeholder="Título de eleitor"
                    value="{{ old('zona') }}">
                <label for="zona" class="form-label">Zona</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="secao" name="secao" placeholder="Título de eleitor"
                    value="{{ old('secao') }}">
                <label for="secao" class="form-label">Seção</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="ctps" name="ctps" placeholder="Carteira de trabalho"
                    value="{{ old('ctps') }}">
                <label for="ctps" class="form-label">Carteira de trabalho antiga</label>
            </div>
            <div class="form-floating col-md-4">
                <input type="text" class="form-control" id="cnh" name="cnh" placeholder="CNH" value="{{ old('cnh') }}">
                <label for="cnh" class="form-label">CNH</label>
            </div>
            <div class="form-floating col-md-4">
                <select class="form-select form-control" id="catcnh" name="catcnh" aria-label="Default select example">
                    <option value="">Categoria</option>
                    <option value="1" {{ old('opcao')=='1' ? 'selected' : '' }}>A</option>
                    <option value="2" {{ old('opcao')=='2' ? 'selected' : '' }}>B</option>
                    <option value="3" {{ old('opcao')=='3' ? 'selected' : '' }}>C</option>
                    <option value="4" {{ old('opcao')=='4' ? 'selected' : '' }}>D</option>
                    <option value="5" {{ old('opcao')=='5' ? 'selected' : '' }}>E</option>
                    <option value="6" {{ old('opcao')=='6' ? 'selected' : '' }}>AB</option>
                    <option value="7" {{ old('opcao')=='7' ? 'selected' : '' }}>AC</option>
                    <option value="8" {{ old('opcao')=='8' ? 'selected' : '' }}>AD</option>
                    <option value="9" {{ old('opcao')=='9' ? 'selected' : '' }}>AE</option>
                </select>
                <label for="catcnh" class="form-label">CNH</label>
            </div>
        </div>
    </div>
</div>