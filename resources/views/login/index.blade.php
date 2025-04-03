@extends('layouts.auth')

@section('auth')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <a href="{{ route('public.index') }}">
            <img class="mb-4" src="{{ asset('images/meka.png') }}" alt="" width="200" height="100">
        </a>
        <h1 class="h3 mb-3 fw-normal">Área restrita</h1>
        <x-alert />

        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            @method('POST')

            <div class="input-group mb-4 form-floating">
                <input type="email" name="email" id="email" class="form-control" placeholder="e-mail"
                    aria-label="email" aria-describedby="email" value="{{ old('email') }}">
                <label for="email">Usuário</label>
            </div>

            <div class="input-group mb-4 form-floating">
                <input type="password" name="password" id="password"  class="form-control" placeholder="Senha" aria-label="password"
                    aria-describedby="password">
                <span class="input-group-text" role="button" onclick="togglePassword('password', this)"><i class="bi bi-eye"></i></span>
                <label for="password">Senha</label>
            </div>
            <button class="btn btn-outline-success btn-sm w-100 py-2" type="submit">Entrar</button>
        </form>
    </main>
@endsection
