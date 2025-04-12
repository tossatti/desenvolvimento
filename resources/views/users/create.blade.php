@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastrar colaborador</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="accordion mb-3 shadow border">
                    {{-- dados pessoais --}}
                    @include('layouts.dados_pessoais')
                    {{-- dados pessoais --}}
                    {{-- documentos pessoais --}}
                    @include('layouts.documentos_pessoais')
                    {{-- documentos pessoais --}}
                    {{-- dados bancários --}}
                    @include('layouts.dados_bancarios')
                    {{-- dados bancários --}}
                    {{-- contrato --}}
                    @include('layouts.contrato')
                    {{-- contrato --}}
                    {{-- informações adicionais --}}
                    @include('layouts.informacoes_adicionais')
                    {{-- informações adicionais --}}
                    {{-- dependentes --}}
                    {{-- @include('layouts.dependentes') --}}
                    {{-- dependentes --}}
                    {{-- e-social --}}
                    @include('layouts.esocial')
                    {{-- e-social --}}
                </div>
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button class="btn btn-success btn-sm">Cadastrar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
