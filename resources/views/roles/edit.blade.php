@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Editar função</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('grupoInsumo.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('roles.update', ['role' => $role->id]) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- Insumo --}}
                <div class="accordion mb-3">
                    <div class="accordion-item ">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#funcao" aria-expanded="true" aria-controls="collapseOne">
                                <strong>Função</strong>
                            </button>
                        </h2>
                        <div id="funcao" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-2">
                                        <label class="form-label">Função</label>
                                        <input type="text" class="form-control" id="funcao" name="funcao" value="{{ $role->funcao, old('funcao') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- insumo --}}
                {{-- botão --}}
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
                {{-- botão --}}
            </form>
        </div>
    </div>
@endsection
