@extends('layouts.app')

@section('title', "Editar Comentário do usuário {$user->name}")

@section('content')
    <div class="container">
        <h1>Editar Comentário</h1>
        
        @include('includes.validations-form')

        <form action="{{ route('comments.update', $comment->id) }}" method="post">
            @include('users.comments._partials.form')
        </form>
    </div>
@endsection
