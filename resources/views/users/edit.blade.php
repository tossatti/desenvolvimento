@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        {{-- cabeçalho --}}
        <div class="card-header hstack gap-2">
            <span>
                <strong>Editar dados do colaborador</strong>
            </span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Voltar"><i class="bi bi-arrow-left-square"></i></i></i>
                </a>
            </span>
        </div>
        {{-- cabeçalho --}}
        {{-- dados do banco de dados --}}
        <div class="card-body">
            <x-alert />
            <form action=" {{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- dados pessoais do usuário --}}
                @include('layouts.pessoais_edit')
                {{-- dados pessoais do usuário --}}
                {{-- documentos pessoais --}}
                @include('layouts.docpessoais_edit')
                {{-- documentos pessoais --}}
                {{-- dados bancários --}}
                @include('layouts.bancario_edit')
                {{-- dados bancários --}}
                {{-- endereço --}}
                @include('layouts.endereco_edit')
                {{-- endereço --}}
                {{-- contrato --}}
                @include('layouts.contrato_edit')
                {{-- contrato --}}
                {{-- e-social --}}
                @include('layouts.esocial_edit')
                {{-- e-social --}}
                {{-- dependentes --}}
                @include('layouts.dependentes')
                {{-- dependentes --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md content-center">
                        <button class="btn btn-outline-warning btn-sm">Editar</button>
                        <button type="button" class="btn btn-outline-danger btn-sm"
                            onclick="window.location.href='{{ route('users.show', $user->id) }}'">Cancelar</button>
                    </div>
                    <div class= "col-md-4"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
        {{-- dados do banco de dados --}}
    </div>
@endsection
