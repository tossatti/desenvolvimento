@extends('layouts.auth')

@section('auth')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <div class="container mb-4">
            <a href="{{ route('public.index') }}">
                <img class="mb-4" src="{{ asset('images/meka.png') }}" alt="" width="200" height="100">
            </a>
            <h1 class="h3 mb-3 fw-normal">Área restrita</h1>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                @method('POST')

                <div class="input-group mb-4 form-floating">
                    <input type="email" name="email" id="email" class="form-control" placeholder="e-mail"
                        aria-label="email" aria-describedby="email" value="{{ old('email') }}">
                    <label for="email">Usuário</label>
                </div>

                <div class="input-group mb-4 form-floating">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha"
                        aria-label="password" aria-describedby="password">
                    <span class="input-group-text" role="button" onclick="togglePassword('password', this)"><i
                            class="bi bi-eye"></i></span>
                    <label for="password">Senha</label>
                </div>
                <button class="btn btn-outline-success btn-sm w-100 py-2" type="submit">Entrar</button>
            </form>
        </div>
        <div class="container">
            <div class="input-group form-floating text-center">
                <p><a href="{{ route('login.reset')}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Esqueceu
                        a senha?</a></p>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            const errorMessage = "{{ session('error') }}";
            console.log('Mensagem de erro da sessão:', errorMessage);
            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: errorMessage,
                });
            }
        });
    </script>
@endpush
