@extends('layouts.public')

@section('public')
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Cadastro de currículum vitae</strong></span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('public.index') }}" class="btn btn-outline-danger btn-sm me-1" data-toggle="tooltip"
                    data-placement="top" title="cancelar"><i class="bi bi-x-square"></i></a>
            </span>
        </div>
        <div class="card-body">
            <x-alert />
            @if (session('success'))
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <a class="btn btn-info btn-sm" href="{{ route('public.index') }}" role="button">Voltar</a>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
            @elseif (session('error'))
                <div class="row g-3">
                    <div class= "col-md-5"></div>
                    <div class="col-md-2 content-center">
                        <button type="button" class="btn btn-warning btn-sm" onclick="window.history.back();">Voltar para
                            Edição</button>
                    </div>
                    <div class= "col-md-5"></div>
                </div>
            @endif
        </div>
    </div>
@endsection
