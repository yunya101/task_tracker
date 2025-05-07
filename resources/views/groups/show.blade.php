@extends('layouts.base')

@section('name', $group->name)

@section('main')

    <a href="{{ route('tasks.index', ['group' => $group->id]) }}">{{ $group->name }}</a>
@endsection