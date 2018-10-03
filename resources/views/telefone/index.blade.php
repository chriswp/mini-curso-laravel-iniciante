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
                    <div class="card-header">Novo Telefone</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('telefone.store') }}">
                            @csrf
                            <input type="hidden" name="contato_id" value="{{$contatoId}}">
                            <div class="form-group row">
                                <label for="numero" class="col-md-4 col-form-label text-md-right">Número</label>
                                <div class="col-md-6">
                                    <input id="numero" type="text"
                                           class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}"
                                           name="numero" value="{{ old('numero') }}" required autofocus>
                                    @if ($errors->has('numero'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Telefones</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Contato</th>
                                <th scope="col">Número</th>
                                <th scope="col">Data Cadastro</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($telefones as $telefone)
                                <tr>
                                    <td scope="row">{{$telefone->id}}</td>
                                    <td>{{$telefone->contato->nome}}</td>
                                    <td>{{$telefone->numero}}</td>
                                    <td>{{$telefone->created_at->format('d/m/Y H:i:s')}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-danger"
                                           href="{{route('telefone.destroy',$telefone->id)}}"
                                           onclick="event.preventDefault();document.getElementById('{{$telefone->id}}').submit();">
                                            Remover
                                        </a>
                                        <form id="{{$telefone->id}}" action="{{route('telefone.destroy',$telefone->id)}}"
                                              method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="contato_id" value="{{$contatoId}}">
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