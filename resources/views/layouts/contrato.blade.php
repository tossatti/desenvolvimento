<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#contrato"
            aria-expanded="true" aria-controls="collapseThree">
            <strong>Contrato</strong>
        </button>
    </h2>
    <div id="contrato" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row g-3">
                <div class="form-floating col-md-4 ">
                    <select class="form-control" id="tipoContrato" name="tipoContrato">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('tipoContrato') == '1' ? 'selected' : '' }}>Diarista</option>
                        <option value="2" {{ old('tipoContrato') == '2' ? 'selected' : '' }}>Mensalista
                        </option>
                        <option value="3" {{ old('tipoContrato') == '3' ? 'selected' : '' }}>Prestador de
                            serviço</option>
                        <option value="4" {{ old('tipoContrato') == '4' ? 'selected' : '' }}>Proprietário
                        </option>
                        <option value="5" {{ old('tipoContrato') == '5' ? 'selected' : '' }}>Terceirizado
                        </option>
                    </select>
                    <label for="tipoContrato" class="form-label">Tipo de contrato</label>
                </div>
                <div class="form-floating  col-md-4">
                    <select class="form-select form-control" id="lotacao" name="lotacao">
                        <option value="">Selecione a Lotação</option>
                        @foreach ($lotacao as $id => $sigla)
                            <option value="{{ $id }}" {{ old('lotacao') == $id ? 'selected' : '' }}>
                                {{ $sigla }}
                            </option>
                        @endforeach
                    </select>
                    <label for="lotacao" class="form-label">Lotação</label>
                </div>
                <div class="form-floating  col-md-4">
                    <select class="form-select form-control" id="equipe" name="equipe">
                        <option value="">Selecione</option>
                        <option value="Armação" {{ old('equipe') == 'Armação' ? 'selected' : '' }}>Armação</option>
                        <option value="Carpintaria" {{ old('equipe') == 'Carpintaria' ? 'selected' : '' }}>
                            Carpintaria</option>
                        <option value="Civil" {{ old('equipe') == 'Civil' ? 'selected' : '' }}>Civil</option>
                        <option value="Elétrica" {{ old('equipe') == 'Elétrica' ? 'selected' : '' }}>Elétrica
                        </option>
                        <option value="Esquadria" {{ old('equipe') == 'Esquadria' ? 'selected' : '' }}>Esquadria
                        </option>
                        <option value="Hidráulica" {{ old('equipe') == 'Hidráulica' ? 'selected' : '' }}>Hidráulica
                        </option>
                        <option value="Logística" {{ old('equipe') == 'Logística' ? 'selected' : '' }}>Logística
                        </option>
                        <option value="Metálica" {{ old('equipe') == 'Metálica' ? 'selected' : '' }}>Metálica
                        </option>
                        <option value="Pintura" {{ old('equipe') == 'Pintura' ? 'selected' : '' }}>Pintura</option>
                        <option value="Piso" {{ old('equipe') == 'Piso' ? 'selected' : '' }}>Piso</option>
                        <option value="Revestimento" {{ old('equipe') == 'Revestimento' ? 'selected' : '' }}>
                            Revestimento</option>
                        <option value="Técnica" {{ old('equipe') == 'Técnica' ? 'selected' : '' }}>Técnica</option>
                    </select>
                    <label for="equipe" class="form-label">Equipe</label>
                </div>
                <div class="form-floating col-md-4">
                    <select class="form-select form-control" id="role_id" name="role_id"
                        aria-label="Default select example">
                        <option value="">Selecione</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->funcao }}
                            </option>
                        @endforeach
                    </select>
                    <label for="role_id " class="form-label">Função</label>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" class="form-control valor-input" id="remuneracao" name="remuneracao"
                        placeholder="R$ 0,00" value="{{ old('remuneracao') }}">
                    <label for="remuneracao" class="form-label">Remuneração</label>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" class="form-control" id="cbo" name="cbo" placeholder="CBO"
                        value="{{ old('cbo') }}">
                    <label for="cbo" class="form-label">CBO</label>
                </div>
                <div class="form-floating col-md-4">
                    <select class="form-select form-control" id="situacao" name="situacao">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('situacao') == '1' ? 'selected' : '' }}>Afastado</option>
                        <option value="2" {{ old('situacao') == '2' ? 'selected' : '' }}>Aviso</option>
                        <option value="3" {{ old('situacao') == '3' ? 'selected' : '' }}>Contrato de
                            experiência</option>
                        <option value="4" {{ old('situacao') == '4' ? 'selected' : '' }}>Desligado</option>
                        <option value="5" {{ old('situacao') == '5' ? 'selected' : '' }}>Efetivo</option>
                        <option value="6" {{ old('situacao') == '6' ? 'selected' : '' }}>Em contratação
                        </option>
                        <option value="7" {{ old('situacao') == '7' ? 'selected' : '' }}>Férias</option>
                        <option value="8" {{ old('situacao') == '8' ? 'selected' : '' }}>Temporário</option>
                    </select>
                    <label for="situacao" class="form-label">Situação</label>
                </div>
                <div class="form-floating col-md-4">
                    <select class="form-select form-control" id="disponibilidade" name="disponibilidade"
                        aria-label="Default select example">
                        <option value="">Selecione</option>
                        <option value="1" {{ old('disponibilidade') == '1' ? 'selected' : '' }}>Disponível
                        </option>
                        <option value="2" {{ old('disponibilidade') == '2' ? 'selected' : '' }}>Indisponível
                        </option>
                    </select>
                    <label for="disponibilidade" class="form-label">Disponibilidade</label>
                </div>
                <div class="form-floating col-md-4">
                    <input type="date" class="form-control" id="aso" name="aso" placeholder="ASO"
                        value="{{ old('aso') }}">
                    <label for="aso" class="form-label">ASO</label>
                </div>
                <div class="form-floating col-md-6">
                    <input type="date" class="form-control" id="admissao" name="admissao"
                        placeholder="Data de admissão" value="{{ old('admissao') }}">
                    <label for="admissao" class="form-label">Admissão</label>
                </div>

                <div class="form-floating col-md-6">
                    <input type="date" class="form-control" id="termino" name="termino"
                        placeholder="Término do contrato" value="{{ old('termino') }}">
                    <label for="termino" class="form-label">Término do contrato</label>
                </div>
                <div class="form-floating col-md-12">
                    <input type="text" class="form-control" id="observacao" name="observacao"
                    placeholder="Observação" value="{{ old('observacao') }}">
                    <label for="observacao" class="form-label">Observação</label>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- contrato --}}
