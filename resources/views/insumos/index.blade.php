@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Insumos</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('insumos.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Grupo</th>
                        <th scope="col">Subgrupo</th>
                        <th scope="col">Sinapi</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Referência</th>
                        <th scope="col">Unidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($insumos as $insumo)
                        <tr>
                            <td>{{ $insumo->grupo }}</td>
                            <td>{{ $insumo->subgrupo }}</td>
                            <td>{{ $insumo->sinapi }}</td>
                            <td>{{ $insumo->descricao }}</td>
                            <td>{{ $insumo->referencia }}</td>
                            <td>{{ $insumo->unidade }}</td>
                            <td>{{ $insumo->valor }}</td>
                            <td class="text-center">
                                <a href="{{ route('insumos.show', ['insumo' => $insumo->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="visualizar"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('insumos.edit', ['insumo' => $insumo->id]) }}" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top" title="editar"><i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('insumos.destroy', ['insumo' => $insumo->id]) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja apagar este registro?')"
                                        class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="apagar"><i class="bi bi-eraser"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
