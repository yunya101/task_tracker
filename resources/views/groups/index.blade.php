@extends('layouts.base')

@section('name', 'Группы')

@section('main')

    <div class="container">

        <div class="row justify-content-center align-items-center g-2">
            @if (!empty($groups))
            
                @foreach ($groups as $group)
                    
                    <div class="col-3">
                        {{ $group->id }}
                        {{ $group->name }}
                    </div>

                @endforeach

            @endif
        </div>

    </div>


@endsection
