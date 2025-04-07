<div class="accordion mb-3">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contrato"
                aria-expanded="false" aria-controls="collapseThree">
                <strong>Contrato</strong>
            </button>
        </h2>
        <div id="contrato" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row g-3">
                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="tipoContrato" name="tipoContrato">
                            <option>Selecione</option>
                            <option value="Diarista" {{ $curriculum->tipoContrato == 'Diarista' ? 'selected' : '' }}>
                                Diarista
                            </option>
                            <option value=" Mensalista"
                                {{ $curriculum->tipoContrato == 'Mensalista' ? 'selected' : '', old('tipoContrato') }}>
                                Mensalista</option>
                            <option value="Prestador de serviço"
                                {{ $curriculum->tipoContrato == 'Prestador de serviço' ? 'selected' : '', old('tipoContrato') }}>
                                Prestador de serviço</option>
                            <option value="Proprietário"
                                {{ $curriculum->tipoContrato == 'Proprietário' ? 'selected' : '', old('tipoContrato') }}>
                                Proprietário</option>
                            <option value="Terceirizado"
                                {{ $curriculum->tipoContrato == 'Terceirizado' ? 'selected' : '', old('tipoContrato') }}>
                                Terceirizado</option>
                        </select>
                        <label for="tipoContrato" class="form-label">Tipo de contrato</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="lotacao" name="lotacao">
                            <option value="">Selecione a Lotação</option>
                            @foreach ($lotacao as $id => $sigla)
                                <option value="{{ $id }}"
                                    {{ old('lotacao', $user->lotacao_id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $sigla }}
                                </option>
                            @endforeach
                        </select>
                        <label for="lotacao" class="form-label">Lotação</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="equipe" name="equipe">
                            <option>Selecione</option>
                            <option value="Armação" {{ $curriculum->equipe == 'Armação' ? 'selected' : '' }}>Armação
                            </option>
                            <option value="Carpintaria" {{ $curriculum->equipe == 'Carpintaria' ? 'selected' : '' }}>
                                Carpintaria
                            </option>
                            <option value="Civil" {{ $curriculum->equipe == 'Civil' ? 'selected' : '' }}>
                                Civil</option>
                            <option value="Elétrica" {{ $curriculum->equipe == 'Elétrica' ? 'selected' : '' }}>Elétrica
                            </option>
                            <option value="Esquadria" {{ $curriculum->equipe == 'Esquadria' ? 'selected' : '' }}>
                                Esquadria</option>
                            <option value="Hidráulica" {{ $curriculum->equipe == 'Hidráulica' ? 'selected' : '' }}>
                                Hidráulica
                            </option>
                            <option value="Logística" {{ $curriculum->equipe == 'Logística' ? 'selected' : '' }}>
                                Logística</option>
                            <option value="Metálica" {{ $curriculum->equipe == 'Metálica' ? 'selected' : '' }}>Metálica
                            </option>
                            <option value="Pintura" {{ $curriculum->equipe == 'Pintura' ? 'selected' : '' }}>Pintura
                            </option>
                            <option value="Piso" {{ $curriculum->equipe == 'Piso' ? 'selected' : '' }}>
                                Piso</option>
                            <option value="Revestimento" {{ $curriculum->equipe == 'Revestimento' ? 'selected' : '' }}>
                                Revestimento
                            </option>
                            <option value="Técnica" {{ $curriculum->equipe == 'Técnica' ? 'selected' : '' }}>Técnica
                            </option>
                        </select>
                        <label for="equipe" class="form-label">Equipe</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="role_id" name="role_id"
                            aria-label="Default select example">
                            <option value="">Selecione</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ old('role_id', $curriculum->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->funcao }}
                                </option>
                            @endforeach
                        </select>
                        <label for="role_id " class="form-label">Função</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="text" class="form-control valor-input" id="remuneracao" name="remuneracao"
                            placeholder="R$ 0,00"
                            value="{{ old('remuneracao') ? old('remuneracao') : $curriculum->remuneracao }}">
                        <label for="remuneracao" class="form-label">Remuneração</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="text" class="form-control" id="cbo" name="cbo" placeholder="CBO"
                            value="{{ old('cbo') ? old('cbo') : $curriculum->cbo }}">
                        <label for="cbo" class="form-label">CBO</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="situacao" name="situacao">
                            <option>Selecione</option>
                            <option value="Afastado" {{ $curriculum->situacao == 'Afastado' ? 'selected' : '' }}>Afastado
                            </option>
                            <option value="Aviso" {{ $curriculum->situacao == 'Aviso' ? 'selected' : '' }}>
                                Aviso</option>
                            <option value="Contrato de experiência"
                                {{ $curriculum->situacao == 'Contrato de experiência' ? 'selected' : '' }}>
                                Contrato de experiência</option>
                            <option value="Desligado" {{ $curriculum->situacao == 'Desligado' ? 'selected' : '' }}>
                                Desligado
                            </option>
                            <option value="Efetivo" {{ $curriculum->situacao == 'Efetivo' ? 'selected' : '' }}>Efetivo
                            </option>
                            <option value="Em contratação"
                                {{ $curriculum->situacao == 'Em contratação' ? 'selected' : '' }}>Em
                                contratação</option>
                            <option value="Férias" {{ $curriculum->situacao == 'Férias' ? 'selected' : '' }}>Férias
                            </option>
                            <option value="Temporário" {{ $curriculum->situacao == 'Temporário' ? 'selected' : '' }}>
                                Temporário
                            </option>
                        </select>
                        <label for="situacao" class="form-label">Situação</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <select class="form-select form-control" id="disponibilidade" name="disponibilidade"
                            aria-label="Default select example">
                            <option>Selecione</option>
                            <option value="Disponível"
                                {{ $curriculum->disponibilidade == 'Disponível' ? 'selected' : '' }}>
                                Disponível</option>
                            <option value="Indisponível"
                                {{ $curriculum->disponibilidade == 'Indisponível' ? 'selected' : '' }}>
                                Indisponível</option>
                        </select>
                        <label for="disponibilidade" class="form-label">Disponibilidade</label>
                    </div>
                    <div class="form-floating col-md-4">
                        <input type="date" class="form-control" id="aso" name="aso" placeholder="ASO"
                            value="{{ old('aso') ? old('aso') : $curriculum->aso }}">
                        <label for="aso" class="form-label">ASO</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input type="date" class="form-control" id="admissao" name="admissao"
                            placeholder="Data de admissão"
                            value="{{ old('admissao') ? old('admissao') : $curriculum->admissao }}">
                        <label for="admissao" class="form-label">Admissão</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input type="date" class="form-control" id="termino" name="termino"
                            placeholder="Término do contrato"
                            value="{{ old('termino') ? old('termino') : $curriculum->termino }}">
                        <label for="termino" class="form-label">Término do contrato</label>
                    </div>
                    <div class="form-floating col-md-12">
                        <input type="text" class="form-control" id="observacao" name="observacao"
                            placeholder="Observação"
                            value="{{ old('observacao') ? old('observacao') : $curriculum->observacao }}">
                        <label for="observacao" class="form-label">Observação</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
