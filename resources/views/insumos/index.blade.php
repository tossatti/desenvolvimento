@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Insumos</strong>
            </span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('insumos.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="Cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('insumos.search') }}" />
            {{-- pesquisa --}}
            <x-alert />
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Grupo</th>
                        <th scope="col" class="text-center">Subgrupo</th>
                        <th scope="col" class="text-center">Sinapi</th>
                        <th scope="col" class="text-center">Descrição</th>
                        {{-- <th scope="col">Referência</th> --}}
                        <th scope="col" class="text-center">Unidade</th>
                        <th scope="col" class="text-center" style="width: 100px;">Valor</th>
                        <th scope="col" class="text-center" style="width: 125px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($insumos as $insumo)
                        <tr>
                            <td>{{ $insumo->grupo->grupo }}</td>
                            <td>{{ $insumo->subgrupo->subgrupo }}</td>
                            <td>{{ $insumo->sinapi }}</td>
                            <td>{{ $insumo->descricao }}</td>
                            {{-- <td>{{ $insumo->referencia }}</td> --}}
                            <td>{{ $insumo->unidade }}</td>
                            <td>{{ 'R$ ' . number_format($insumo->valor, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('insumos.show', ['insumo' => $insumo->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Visualizar registro"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('insumos.edit', ['insumo' => $insumo->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Editar registro"><i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                    data-id="{{ $insumo->id }}"
                                    data-route="{{ route('insumos.destroy', ['insumo' => $insumo->id]) }}" data-toggle="tooltip" data-placement="top"
                                    title="Excluir registro">
                                    <i class="bi bi-eraser"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$insumos" />
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
