@extends('layouts.admin')

@section('content')
    {{-- insumos --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados de insumos</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('insumo.importinsumo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="insumo" id="insumo" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="insumoBtn" id="insumoBtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- insumos --}}
@endsection
