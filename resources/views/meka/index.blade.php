@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Bem vindo</strong></span>
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
                    <tr>
                        <td>
                            tabela que pode mudar
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
