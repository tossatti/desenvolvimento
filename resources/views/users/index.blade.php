@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Listar usuários</strong></span>
            <span class="ms-auto">
                <a href="{{ route('users.create') }}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="bi bi-plus-square"></i>
                </a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                    class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="visualizar"><i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top" title="editar"><i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                    class="d-inline">
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
