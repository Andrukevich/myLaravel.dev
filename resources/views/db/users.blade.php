@extends('layouts.app')


@section('content')
    <h1>Всего пользователей {{ $allUser }}</h1>
    <hr>
    @forelse($users as $user)
        <h4>{{ $user->id }} -> {{ $user->email }}</h4>
    @empty
        <h1>Opss user not found</h1>
    @endforelse

    @if($users->count())
        {{ $users->render() }}
    @endif
@endsection