@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
    <div class="container bootstrap snippets bootdey pt-2">
        <div class="d-inline-flex m-3">
            <h1>Listagem dos Usuários</h1>
            <a class="ms-3 btn btn-success" href="{{ route('users.create') }}">Adicionar usuário</a>
        </div>
        <form class="form-inline mb-2" action="{{ route('users.index')}}" method="get">
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
                                        <th><span>Usuário</span></th>
                                        <th><span>Criado em</span></th>
                                        <th><span>Email</span></th>
                                        <th><span>Ações</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($users as $user)
                                        <td>
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="">
                                            <a href="#" class="user-link">{{ $user->name }}</a>
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="#">{{ $user->email }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-info btn-sm text-warning">
                                                <i class="fa fa-search-plus fa-inverse"></i>
                                            </a>
                                            <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm text-info">
                                                <i class="fa fa-pencil fa-inverse"></i>
                                            </a>
                                            <a href="{{ route('comments.index', ['id' => $user->id]) }}" class="btn btn-success btn-sm text-info">
                                                <i class="fa fa-comment fa-inverse"></i>
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