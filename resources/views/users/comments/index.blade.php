@extends('layouts.app')

@section('title', 'Comentários do Usuário {$user->name}')

@section('content')
    <h1>
        Comentários do Usuário {{ $user->name,}}
        <a href="{{ route('users.create') }}">+</a>
    </h1>

    <form action="{{ route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form> 
    <ul>
    @foreach($comments as $comment)
        <li>{{ $user->body }} - {{ $user->visible }}</li>

    @endforeach
    </ul>
@endsection