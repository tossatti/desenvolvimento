@extends('layouts.admin')

@section('content')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Bem vindo</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="alert alert-danger d-flex align-items-center mb-3" role="alert">
                            <i class="bi bi-exclamation-octagon-fill"></i>
                            <div>
                                Alerta 1
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-warning d-flex align-items-center mb-3" role="alert">
                            <i class="bi bi-exclamation-triangle"></i>
                            <div>
                                Alerta 2
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-success d-flex align-items-center mb-3" role="alert">
                            <i class="bi bi-check-circle"></i>
                            <div>
                                Alerta 3
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col ">dado</th>
                        <th scope="col">dado</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row g-3 align-items-center">
                        <tr>
                            <td>
                               tabela que pode mudar 
                            </td>
                            
                        </tr>
                    </div>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
