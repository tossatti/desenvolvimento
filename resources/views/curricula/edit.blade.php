@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span>
                <strong>Avaliar e revisar Currículo</strong>
            </span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('curricula.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="voltar"><i class="bi bi-arrow-left-square"></i></i></i>
                </a>
            </span>
        </div>
        {{-- cabeçalho --}}
        {{-- dados do banco de dados --}}
        <div class="card-body">
            <x-alert />
            <form action=" {{ route('curricula.update', ['curriculum' => $curriculum->id]) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- dados pessoais do usuário --}}
                @include('layouts.curriculum_edit')
                {{-- dados pessoais do usuário --}}
                {{-- documentos pessoais --}}
                @include('layouts.curriculum_docpessoais_edit')
                {{-- documentos pessoais --}}
                {{-- dados bancários --}}
                @include('layouts.curriculum_bancario_edit')
                {{-- dados bancários --}}
                {{-- endereço --}}
                @include('layouts.curriculum_endereco_edit')
                {{-- endereço --}}
                {{-- contrato --}}
                @include('layouts.curriculum_contrato_edit')
                {{-- contrato --}}
                {{-- e-social --}}
                @include('layouts.esocial_edit')
                {{-- e-social --}}
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row rg-3">
                            <div class="col-md-3 form-floating"></div>
                            <div class="col-md-6 form-floating">
                                <select class="form-select form-control" id="status" name="status">
                                    <option value="">Selecione o Status</option>
                                    <option value="1" {{ old('status', $curriculum->status) == '1' ? 'selected' : '' }}>Candidato</option>
                                    <option value="2" {{ old('status', $curriculum->status) == '2' ? 'selected' : '' }}>Seleção</option>
                                    <option value="3" {{ old('status', $curriculum->status) == '3' ? 'selected' : '' }}>Entrevista</option>
                                    <option value="4" {{ old('status', $curriculum->status) == '4' ? 'selected' : '' }}>Exames</option>
                                    <option value="5" {{ old('status', $curriculum->status) == '5' ? 'selected' : '' }}>Aprovado</option>
                                    <option value="6" {{ old('status', $curriculum->status) == '6' ? 'selected' : '' }}>Reprovado</option>
                                </select>
                                <label for="status" class="form-label">Status</label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- botão --}}
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class= "col-md-5"></div>
                            <div class="col-md content-center">
                                <button class="btn btn-outline-warning btn-sm">Editar</button>
                                <button type="button" class="btn btn-outline-danger btn-sm"
                                    onclick="window.location.href='{{ route('curricula.show', $curriculum->id) }}'">Cancelar</button>
                            </div>
                            <div class= "col-md-4"></div>
                        </div>
                    </div>
                </div>
                {{-- botão --}}
            </form>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
