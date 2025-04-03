@extends('layouts.admin')

@section('content')
    {{-- dados --}}
    <x-import-csv route="{{ route('hires.importhire') }}" inputId="hire" buttonId="hireBtn" />
    {{-- dados --}}
@endsection
