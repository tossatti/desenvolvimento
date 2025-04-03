@extends('layouts.public')

@section('public')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastro de currículum vitae</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('public.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('public.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="accordion mb-3 shadow border">
                    {{-- vaga --}}
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button">
                                <strong>Vaga pretendida</strong>
                            </button>
                        </h2>
                        <div id="vaga" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="form-floating col-md-12">
                                    <select class="form-select form-control" id="vaga" name="vaga" required>
                                        <option value=""></option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                {{ $role->funcao }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label class="form-label">Para qual vaga você é candidato?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- vaga --}}
                    {{-- dados pessoais --}}
                    @include('layouts.dados_pessoais')
                    {{-- dados pessoais --}}
                    {{-- documentos pessoais --}}
                    @include('layouts.documentos_pessoais')
                    {{-- documentos pessoais --}}
                    {{-- dados bancários --}}
                    {{-- @include('layouts.dados_bancarios') --}}
                    {{-- dados bancários --}}
                    {{-- informações adicionais --}}
                    @include('layouts.informacoes_adicionais')
                    {{-- informações adicionais --}}
                    {{-- dependentes --}}
                    @include('layouts.dependentes')
                    {{-- dependentes --}}
                </div>
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button class="btn btn-success btn-sm">Enviar</button>
                        <a class="btn btn-danger btn-sm" href="{{ route('public.index') }}" role="button">Cancelar</a>
                    </div>
                    <div class= "col-md-4"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
