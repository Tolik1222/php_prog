@extends('layout.main')
@section('title', 'Головна')
@section('content')
    <h1>Вітаємо на головній сторінці!</h1>
    <p>Ваш IP: {{ $client_ip }}</p>
    @if($first_in_15_minutes)
        <p style="color: green;">Ви завітали вперше за 15 хвилин!</p>
    @endif
@endsection