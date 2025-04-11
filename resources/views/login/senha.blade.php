@extends('layouts.auth')

@section('auth')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <div class="container mb-4">
            <a href="{{ route('public.index') }}">
                <img class="mb-4" src="{{ asset('images/meka.png') }}" alt="" width="200" height="100">
            </a>
            <h5 class="h5 mb-3 fw-normal">Definir Nova Senha</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('POST')

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="input-group mb-3 form-floating">
                    <input type="email" class="form-control" id="email" value="{{ $email }}" readonly>
                    <label for="email">E-mail</label>
                </div>

                <div class="input-group mb-3 form-floating">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nova Senha" required>
                    <label for="password">Nova Senha</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3 form-floating">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar Nova Senha" required>
                    <label for="password_confirmation">Confirmar Nova Senha</label>
                </div>

                <button class="btn btn-success btn-sm w-50 py-2" type="submit">Salvar Nova Senha</button>
            </form>
        </div>
    </main>
@endsection