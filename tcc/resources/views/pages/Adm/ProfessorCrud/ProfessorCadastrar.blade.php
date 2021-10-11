@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastro Linguagem de Programacao</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('professor.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('professor.store')}}" method="post">
        @csrf
        <div class="row">  
            <div class="form-group">
                <h4>Dados do Professor</h4>
            </div>
            <div class="form-group col-4">
                <label for="">RG</label>
                <input type="text" class="form-control" name="rg">
            </div>
            <div class="form-group col-4">
                <label for="">cpf</label>
                <input type="text" class="form-control" name="cpf">
            </div>
            <div class="form-group col-4">
                <label for="">Usuario</label>
                <select class="form-control" name="cd_usuario">
                    @foreach($usuarios as $usuario)
                        <option value="{{$usuario->CD_USUARIO}}">{{$usuario->US_NOME}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>

        

        <button class="btn btn-dark my-4">Cadastrar</button>
    </form>
@stop