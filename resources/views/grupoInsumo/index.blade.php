@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Grupos de Insumos</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('grupoInsumo.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="Cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('grupoinsumo.search') }}" />
            {{-- pesquisa --}}
            <x-alert />
            <table class="table">
                <thead>
                    <tr>
                        <th class="d-inline" scope="col" class="col-9">
                            <span>Grupo</span>
                        </th>
                        <th scope="col" class="col-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($grupoInsumos as $grupoInsumo)
                        <tr>
                            <td>{{ $grupoInsumo->grupo }}</td>
                            <td class="text-center">
                                <a href="{{ route('grupoInsumo.edit', ['grupoInsumo' => $grupoInsumo->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Editar registro"><i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST"
                                    action="{{ route('grupoInsumo.destroy', ['grupoInsumo' => $grupoInsumo->id]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja apagar este registro?')"
                                        class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Apagar registro"><i class="bi bi-eraser"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$grupoInsumos" />
        </div>
    </div>
@endsection
