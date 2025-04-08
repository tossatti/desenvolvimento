@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Listar contratos e obras</strong></span>
            <span class="ms-auto">
                <a href="{{ route('hires.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- <x-alert /> --}}
            {{-- pesquisa --}}
            <x-search-form action="{{ route('hires.search') }}" />
            {{-- pesquisa --}}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Obra</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hires as $hire)
                        <tr>
                            <td>{{ $hire->sigla }}</td>
                            <td>
                                @if ($hire->status == 1)
                                    Em andamento
                                @elseif ($hire->status == 2)
                                    Finalizado
                                @elseif ($hire->status == 3)
                                    Paralisado
                                @else
                                    Status desconhecido
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('hires.show', ['hire' => $hire->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="visualizar"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('hires.edit', ['hire' => $hire->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="editar"><i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                    data-id="{{ $hire->id }}"
                                    data-route="{{ route('hires.destroy', ['hire' => $hire->id]) }}">
                                    <i class="bi bi-eraser"></i>
                                </button>
                                <a href="{{ route('hires.document', ['hire' => $hire->id]) }}"
                                    class="btn btn-outline-dark btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Contrato" target="_blank"><i class="bi bi-file-earmark-pdf"></i></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$hires" />
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
