@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastro Linguagem de Programacao</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('linguagemProgramacao.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('linguagemProgramacao.store')}}" method="post">
        @csrf
        <div class="row">  
            <div class="form-group">
                <h4>Dados da Linguagem</h4>
            </div>
            <div class="form-group col-6">
                <label for="">Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
            
        </div>

        <button class="btn btn-dark my-4">Cadastrar</button>
    </form>
@stop