@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Listar colaboradores</strong></span>
            <span class="ms-auto">
                <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="Cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('users.search') }}" />
            {{-- pesquisa --}}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Lotação</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->contrato->hire->sigla ?? 'Não Informado' }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Visualizar registro"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Editar registro"><i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                    data-id="{{ $user->id }}"
                                    data-route="{{ route('users.destroy', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top"
                                    title="Excluir registro">
                                    <i class="bi bi-eraser"></i>
                                </button>
                                <a href="{{ route('users.document', ['user' => $user->id]) }}"
                                    class="btn btn-outline-dark btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Ficha individual" target="_blank"><i class="bi bi-file-earmark-pdf"></i></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$users" />
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/alertas.js') }}"></script>
@endpush
