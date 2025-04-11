@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Funções</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('roles.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                    data-placement="top" title="Cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            {{-- pesquisa --}}
            <x-search-form action="{{ route('roles.search') }}" />
            {{-- pesquisa --}}
            <x-alert />
            <table class="table">
                <thead>
                    <tr>
                        <th class="d-inline" scope="col" class="col-9">
                            <span>Funções</span>
                        </th>
                        <th scope="col" class="col-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td class="col-9">{{ $role->funcao }}</td>
                            <td class="col-3 text-center">
                                <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                    title="Editar registro"><i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('roles.destroy', ['role' => $role->id]) }}"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja apagar este registro?')"
                                        class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Excluir registro"><i class="bi bi-eraser"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <x-pagination-links :paginator="$roles" />
        </div>
    </div>
@endsection
