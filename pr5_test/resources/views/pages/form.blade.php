@extends('layout.main')
@section('title', 'Реєстрація - Варіант 6')

@section('content')
    <h1>Форма реєстрації</h1>
    <form action="/form" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Логін" value="{{ old('login') }}"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <input type="password" name="password_confirmation" placeholder="Підтвердіть пароль"><br>
        <input type="text" name="homepage" placeholder="Домашня сторінка" value="{{ old('homepage') }}"><br>
        <textarea name="about" placeholder="Про себе (мін. 30 слів)">{{ old('about') }}</textarea><br>
        <button type="submit">Відправити</button>
    </form>

    @if ($errors->any())
        <div style="color: red;">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif
@endsection