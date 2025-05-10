@extends('layouts.base')

@section('name', 'Авторизация')

@section('main')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 border p-3">

                <form method="post" action="{{ route('login.auth') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                      </div>
                    <button type="submit" class="btn btn-primary">Авторизация</button>
                </form>

            </div>

        </div>

    </div>
@endsection
