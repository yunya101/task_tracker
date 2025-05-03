@extends('layouts.base')

@section('name', 'Регистрация')

@section('main')

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit">Зарегестрироватсья</button>
    </form>

@endsection