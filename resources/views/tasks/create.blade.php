@extends('layouts.base')

@section('name', 'Создать задачу')

@section('main')

    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-6 offset-3">
                <form action="{{ route('tasks.store', ['group' => $group->id]) }}" method="post">
                    @csrf
                    <label for="">Введите название задачи</label>
                    <input type="text" name="title" placeholder="Название">
                    <label for="">Введите описание задачи</label>
                    <input type="text" name="description" placeholder="Описание">
                    <label for="">Срок выполнения задачи</label>
                    <input type="datetime-local" name="deadline">
                    <button type="submit">Создать задачу</button>
                </form>
            </div>
        </div>

    </div>

@endsection
