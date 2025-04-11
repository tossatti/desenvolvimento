{{-- @extends('layouts.auth')

@section('auth')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <div class="container mb-4">
            <a href="{{ route('public.index') }}">
                <img class="mb-4" src="{{ asset('images/meka.png') }}" alt="" width="200" height="100">
            </a>
            <h5 class="h5 mb-3 fw-normal">Criar ou mudar a senha</h5>

            <form action="#" method="POST">
                @csrf
                @method('POST')

                <div class="input-group mb-4 form-floating">
                    <input type="email" name="email" id="email" class="form-control" placeholder="e-mail"
                        aria-label="email" aria-describedby="email" value="{{ old('email') }}">
                    <label for="email">Informe seu e-mail</label>
                </div>

                <button class="btn btn-outline-success btn-sm w-50 py-2" type="submit">Solicitar</button>
            </form>
        </div>
    </main>
@endsection --}}

@extends('layouts.auth')

@section('auth')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <div class="container mb-4">
            <a href="{{ route('public.index') }}">
                <img class="mb-4" src="{{ asset('images/meka.png') }}" alt="" width="200" height="100">
            </a>
            <h5 class="h5 mb-3 fw-normal">Recuperar Senha</h5>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="input-group mb-4 form-floating">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="e-mail"
                           aria-label="email" aria-describedby="email" value="{{ old('email') }}" required>
                    <label for="email">Informe seu e-mail cadastrado</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-outline-success btn-sm w-100 py-2" type="submit">Enviar Link de Recuperação</button>
                <p class="mt-3 text-muted"><a href="{{ route('login') }}">Voltar para o Login</a></p>
            </form>
        </div>
    </main>
@endsection
