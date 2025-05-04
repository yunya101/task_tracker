@extends('layouts.base')

@section('name', 'Регистрация')

@section('main')

    <div class="container">
        <div class="row">

            <div class="col-6 offset-3">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <label>Введите имя пользователя</label>
                    <input class="form-input" type="text" name="name" placeholder="Имя пользователя" required>
                    <label>Введите вашу почту</label>
                    <input type="email" name="email" placeholder="Почта" required>
                    <label>Введите пароль</label>
                    <input type="password" name="password" placeholder="Пароль" required>
                    <button class="btn">Регистрация</button>
                </form>
            </div>

        </div>
    </div>
    
    

@endsection