@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Contratos</strong></span>
            {{-- <span class="ms-auto d-sm-flex flex-row">
            <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                data-placement="top" title="Cancelar"><i class="bi bi-x-square"></i></a>
        </span> --}}
        </div>
        <div class="card-body">
            <x-alert />
            dados de contratos

        </div>

    </div>
@endsection