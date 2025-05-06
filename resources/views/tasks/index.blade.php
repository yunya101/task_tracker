@extends('layouts.base')

@section('name', 'Задачи')

@section('main')

    @if (!empty($tasks))
        <div class="container">
            <div class="row justify-content-center align-items-center g-2">

                @foreach ($tasks as $task)
                    <div class="col">
                        {{ $task->name }}
                        {{ $task->description }}
                        {{ $task->deadline }}
                    </div>
                @endforeach
            </div>

        </div>
    @endif

@endsection
