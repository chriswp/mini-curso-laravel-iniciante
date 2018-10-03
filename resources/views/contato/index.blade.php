@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('sucesso'))
                    <div class="alert alert-success">
                        {{ session()->get('sucesso') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Contatos</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Data de Cadastro</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contatos as $contato)
                                <tr>
                                    <td scope="row">{{$contato->id}}</td>
                                    <td>{{$contato->nome}}</td>
                                    <td>{{$contato->email}}</td>
                                    <td>{{$contato->created_at->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <a href="{{route('telefone.showByContato',$contato->id)}}" role="button"
                                           class="btn  btn-sm btn-outline-primary">Add Telefone</a>

                                        <a href="{{route('contato.edit',$contato->id)}}" role="button"
                                           class="btn  btn-sm btn-outline-warning">Editar</a>

                                        <a class="btn btn-sm btn-outline-danger"
                                           href="{{route('contato.destroy',$contato->id)}}"
                                           onclick="event.preventDefault();document.getElementById('{{$contato->id}}').submit();">
                                            Remover
                                        </a>
                                        <form id="{{$contato->id}}" action="{{route('contato.destroy',$contato->id)}}"
                                              method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"> Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop