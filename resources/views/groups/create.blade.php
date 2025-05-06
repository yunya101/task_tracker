@extends('layouts.base')

@section('name', 'Создать группy')

@section('main')

    <div class="container">

        <div class="row justify-content-center align-items-center g-2">
            <div class="col-6 offset-3">

                <form action="{{ route('groups.store') }}" method="post">
                    @csrf
                    <label>Введите название группы</label>
                    <input type="text" name="name" placeholder="Название">
                    <button type="submit">Создать группу</button>
                </form>

            </div>
        </div>

    </div>


@endsection