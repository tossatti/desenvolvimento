@extends('layouts.admin')

@section('content')
    {{-- insumos --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados de remunerações</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('remuneration.importremuneration') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="remuneration" id="remuneration" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="remunerationBtn" id="remunerationBtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- insumos --}}
@endsection
