<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meka.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contrato.css') }}">
    <title>Contrato {{ $hire->codigo }} </title>
    <style>
        body {
            margin: 1cm;
        }

        @media print {
            body {
                margin: 1cm;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
</body>

</html>
