@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Listar currículos</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
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
                            <td class="text-center">{{ $curriculum->status }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($curriculum->updated_at)->setTimezone('America/Manaus')->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('curricula.show', ['curriculum' => $curriculum->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="visualizar"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('curricula.edit', ['curriculum' => $curriculum->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="editar"><i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('curricula.destroy', ['curriculum' => $curriculum->id]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja apagar este registro?')"
                                        class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="apagar"><i class="bi bi-eraser"></i>
                                    </button>
                                </form>
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
