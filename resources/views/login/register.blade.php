@extends('layouts.base')

@section('name', 'Регистрация')

@section('main')


    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 border p-3">

                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Имя пользователя</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="username">
                    </div>
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Регистрация</button>
                </form>

            </div>

        </div>

    </div>


@endsection
