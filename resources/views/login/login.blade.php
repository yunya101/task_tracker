@extends('layouts.base')

@section('name', 'Авторизация')

@section('main')

    <div class="container">
        <div class="row">

            <div class="col-6 offset-3">
                <form action="{{ route('login.auth') }}" method="post">
                    @csrf
                    <label>Введите вашу почту</label>
                    <input type="email" name="email" placeholder="Почта" required>
                    <label>Введите пароль</label>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <input type="checkbox", name="remember"> - Запомнить меня 
                    <button class="btn btn-primary">Авторизация</button>
                </form>
            </div>

        </div>
    </div>


@endsection