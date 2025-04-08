<div class="accordion mb-3" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#experiencia"
                aria-expanded="true" aria-controls="collapseOne">
                <strong>Experiências anteriores</strong>
            </button>
        </h2>
        <div id="experiencia" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    {{-- experiencia --}}
                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="anterior" name="anterior" required>
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ old('anterior', $curriculum->anterior) == '1' ? 'selected' : '' }}>Sim
                            </option>
                            <option value="2"
                                {{ old('anterior', $curriculum->anterior) == '2' ? 'selected' : '' }}>Não
                            </option>
                        </select>
                        <label for="anterior" class="form-label">Possui experiência anterior</label>
                    </div>

                    <div class="form-floating col-md-3">
                        <input type="text" class="form-control" id="funcao_anterior" name="funcao_anterior"
                            placeholder="Função Anterior"
                            value="{{ old('funcao_anterior', $curriculum->funcao_anterior) }}" required>
                        <label for="funcao_anterior" class="form-label">Qual era a sua função anterior?</label>
                    </div>

                    <div class="form-floating col-md-6">
                        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa"
                            value="{{ old('empresa', $curriculum->empresa) }}" required>
                        <label for="empresa" class="form-label">Qual empresa?</label>
                    </div>

                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="periodo_inicio" name="periodo_inicio"
                            placeholder="periodo_inicio"
                            value="{{ old('periodo_inicio', $curriculum->periodo_inicio ? \Carbon\Carbon::parse($curriculum->periodo_inicio)->format('Y-m-d') : '') }}"
                            required>
                        <label for="periodo_inicio" class="form-label">Data de início?</label>
                    </div>

                    <div class="form-floating col-md-4 ">
                        <input type="date" class="form-control" id="periodo_termino" name="periodo_termino"
                            placeholder="periodo_termino"
                            value="{{ old('periodo_termino', $curriculum->periodo_termino ? \Carbon\Carbon::parse($curriculum->periodo_termino)->format('Y-m-d') : '') }}"
                            required>
                        <label for="periodo_termino" class="form-label">Data do término?</label>
                    </div>

                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="carteira" name="carteira" required>
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ old('carteira', $curriculum->carteira) == '1' ? 'selected' : '' }}>Sim
                            </option>
                            <option value="2"
                                {{ old('carteira', $curriculum->carteira) == '2' ? 'selected' : '' }}>Não
                            </option>
                        </select>
                        <label for="carteira" class="form-label">Tem registro na carteira de trabalho?</label>
                    </div>

                    <div class="form-floating col-md-3">
                        <select class="form-select form-control" id="indicacao" name="indicacao" required>
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ old('indicacao', $curriculum->indicacao) == '1' ? 'selected' : '' }}>
                                Sim</option>
                            <option value="2"
                                {{ old('indicacao', $curriculum->indicacao) == '2' ? 'selected' : '' }}>
                                Não</option>
                        </select>
                        <label for="indicacao" class="form-label">Foi indicado por alguém?</label>
                    </div>

                    <div class="form-floating col-md-9">
                        <input type="text" class="form-control" id="quem" name="quem"
                            placeholder="Quem indicou?" value="{{ old('quem', $curriculum->quem) }}" required>
                        <label for="quem" class="form-label">Quem indicou?</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
