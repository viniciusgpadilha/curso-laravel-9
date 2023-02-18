@extends('layouts.app')

@section('title', "Novo Comentário para o usuário {$user->name}")

@section('content')
    <div class="container">
        <h1>Novo Comentário</h1>
        
        @include('includes.validations-form')

        <form action="{{ route('comments.store', $user->id) }}" method="post">
            @include('users.comments._partials.form')
        </form>
    </div>
@endsection
