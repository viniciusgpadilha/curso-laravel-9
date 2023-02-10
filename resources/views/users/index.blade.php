@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
    <h1>
        Listagem dos Usuários
        <a href="{{ route('users.create') }}">+</a>
    </h1>

    <form action="{{ route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form> 
    <ul>
    @foreach($users as $user)
        <li>{{ $user->name }} - {{ $user->email }} 
            <a href="{{ route('users.show', ['id' => $user->id]) }}"> Detalhes |</a>
            <a href="{{ route('users.edit', ['id' => $user->id]) }}"> Editar |</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Deletar</button>
            </form>
            
        </li>
    @endforeach
    </ul>
@endsection