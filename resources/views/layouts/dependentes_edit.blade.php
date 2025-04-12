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
                            <option value="">Selecione</option>
                            <option value="1"
                                {{ old('tem_dependentes', $user->temdependentes) == 1 ? 'selected' : '' }}>
                                Sim
                            </option>
                            <option value="0"
                                {{ old('tem_dependentes', $user->temdependentes) == 0 ? 'selected' : '' }}>
                                Não
                            </option>
                        </select>
                        <label for="tem_dependentes" class="form-label">Tem dependente(s)</label>
                    </div>
                    <div class="form-floating col-md-2" id="numeroDependentesDiv" style="display: none;">
                        <input type="number" class="form-control" id="numeroDependentes" name="numeroDependentes"
                            value="{{ old('numeroDependentes', $user->numeroDependentes) }}">
                        <label for="numeroDependentes" class="form-label">Quantos?</label>
                    </div>
                </div>

                <div id="dependentesExistenteContainer" class="mt-3">
                    @if ($user->dependentes)
                        @foreach ($user->dependentes as $dependente)
                            <div class="card m-2 dependentes-group">
                                <h5 class="card-subtitle mt-2 mb-2 ms-4 text-body-secondary">Dependente
                                    {{ $loop->iteration }}</h5>
                                <div class="row row-g3 m-2">
                                    <div class="form-floating mb-2 col-md-12">
                                        <input type="text" class="form-control"
                                            name="dependentes[{{ $dependente->id }}][name]"
                                            value="{{ $dependente->name }}">
                                        <label for="dependentes[{{ $dependente->id }}][name]"
                                            class="form-label">Nome</label>
                                    </div>
                                    <div class="form-floating mb-3 col-md-6">
                                        <input type="date" class="form-control"
                                            name="dependentes[{{ $dependente->id }}][nascimento]"
                                            value="{{ $dependente->nascimento }}">
                                        <label for="dependentes[{{ $dependente->id }}][nascimento]"
                                            class="form-label">Data de Nascimento</label>
                                    </div>
                                    <div class="form-floating mb-3 col-md-6">
                                        <input type="text" class="form-control dependentes-cpf"
                                            name="dependentes[{{ $dependente->id }}][cpf]"
                                            value="{{ $dependente->cpf }}">
                                        <label for="dependentes[{{ $dependente->id }}][cpf]"
                                            class="form-label">CPF</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div id="novosDependentesContainer" class="mt-3">
                </div>
            </div>
        </div>
    </div>
</div>
