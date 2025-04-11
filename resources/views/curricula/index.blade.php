@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Listar currículos</strong></span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('curricula.search') }}" />
            {{-- pesquisa --}}
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Nome</th>
                        <th scope="col">Vaga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($curricula as $curriculum)
                        <tr>
                            <td>{{ $curriculum->name }}</td>
                            <td class="text-center">{{ $curriculum->role->funcao }}</td>
                            <td class="text-center">
                                @if ($curriculum->status == '1')
                                    Candidato
                                @elseif ($curriculum->status == '2')
                                    Seleção
                                @elseif ($curriculum->status == '3')
                                    Entrevista
                                @elseif ($curriculum->status == '4')
                                    Exames
                                @elseif ($curriculum->status == '5')
                                    Aprovado
                                @elseif ($curriculum->status == '6')
                                    Reprovado
                                @else
                                    Não Informado
                                @endif
                            </td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($curriculum->updated_at)->setTimezone('America/Manaus')->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('curricula.show', ['curriculum' => $curriculum->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Visualizar registro"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('curricula.edit', ['curriculum' => $curriculum->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Editar registro"><i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                    data-id="{{ $curriculum->id }}"
                                    data-route="{{ route('curricula.destroy', ['curriculum' => $curriculum->id])}}" data-toggle="tooltip" data-placement="top"
                                    title="Excluir registro">
                                    <i class="bi bi-eraser"></i>
                                </button>
                                {{-- <a href="{{ route('curricula.document', ['curriculum' => $curriculum->id]) }}"
                                    class="btn btn-outline-dark btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Ficha individual" target="_blank"><i class="bi bi-file-earmark-pdf"></i></i>
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$curricula" />
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
