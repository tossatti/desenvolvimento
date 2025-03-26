@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Subgrupos de Insumos</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('subgrupoInsumo.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('subgrupoinsumos.search') }}" />
            {{-- pesquisa --}}
            <x-alert />
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="col-9">Subgrupo</th>
                        <th scope="col" class="col-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subgrupoInsumos as $subgrupoInsumo)
                        <tr>
                            <td>{{ $subgrupoInsumo->subgrupo }}</td>
                            <td class="text-center">
                                <a href="{{ route('subgrupoInsumo.edit', ['subgrupoInsumo' => $subgrupoInsumo->id]) }}" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top" title="editar"><i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('subgrupoInsumo.destroy', ['subgrupoInsumo' => $subgrupoInsumo->id]) }}" class="d-inline">
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
            <x-pagination-links :paginator="$subgrupoInsumos" />
        </div>
    </div>
@endsection
