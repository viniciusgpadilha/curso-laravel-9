@extends('layouts.app')

@section('title', "Comentários do Usuário {$user->name}")

@section('content')
    <div class="container bootstrap snippets bootdey pt-2">
        <div class="d-inline-flex m-3">
            <h1>Comentários do Usuário {{ $user->name }}</h1>
            <a class="ms-3 btn btn-success" href="{{ route('comments.create', $user->id) }}">Adicionar comentário</a>
        </div>
        <form class="form-inline mb-2" action="{{ route('comments.index', $user->id)}}" method="get">
            <div class="row">
                <div class="col">
                    <input class="form-control" type="text" name="search" placeholder="Pesquisar">
                </div>
                <div class="col">
                    <button class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                        <div class="table-responsive">
                            <table class="table user-list">
                                <thead>
                                    <tr>
                                        <th><span>Conteúdo</span></th>
                                        <th><span>Visível</span></th>
                                        <th><span>Ações</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($comments as $comment)
                                        <td>{{ $comment->body }}</td>
                                        <td>{{ $user->visible ? 'NÃO' : 'SIM' }}</td>
                                        <td>
                                            <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }}" class="btn btn-primary btn-sm text-info">
                                                <i class="fa fa-pencil fa-inverse"></i>
                                            </a>
                                            <form style="display: inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-o fa-inverse"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection