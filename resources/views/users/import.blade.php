@extends('layouts.admin')

@section('content')
    {{-- dados pessoais --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados de colaboradores</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.importdata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="file" id="file" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="fileBtn" id="fileBtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- dados pessoais --}}
    {{-- documentos --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados de documentos de colaboradores</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.importdocdata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="doc" id="doc" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="docBtn" id="docBtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- documentos --}}
    {{-- dados bancários --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados bancários de colaboradores</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.importbancdata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="banc" id="banc" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="bancbtn" id="bancbtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- dados bancários --}}
    {{-- endereço --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados de endereço de colaboradores</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.importadressdata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="adress" id="adress" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="adressbtn" id="adressbtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- endereço --}}
    {{-- contrato --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados de contratos de colaboradores</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.importcontratosdata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="contrato" id="contrato" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="contratobtn" id="contratobtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- contrato --}}
    {{-- e-social --}}
    <div class="card border-light mt-4 mb-4 shadow">
        <div class="card-header hstack gap-2">
            <span><strong>Importar dados E-social de colaboradores</strong></span>
        </div>
        <div class="card-body">
            <x-alert />
            <form action="{{ route('users.importesocialdata') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="esocial" id="esocial" accept=".csv">
                    <button type="submit" class="btn btn-outline-success" name="esocialbtn" id="esocialbtn">Importar</button>
                </div>
            </form>
        </div>
    </div>
    {{-- contrato --}}
@endsection
