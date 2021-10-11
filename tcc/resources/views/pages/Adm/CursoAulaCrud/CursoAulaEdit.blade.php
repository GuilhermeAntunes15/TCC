@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar de Curso</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('curso.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('curso.update', $curso->CD_CURSO_AULA)}}" method="post">
        @method('put')
        @csrf
        <div class="row">  
            <div class="form-group">
                <h4>Dados do Curso</h4>
            </div>
            <div class="form-group col-6">
                <label for="">Titulo</label>
                <input value="{{$curso->CURAU_TITULO}}" type="text" class="form-control" name="titulo">
            </div>
            <div class="form-group col-6">
                <label for="">Aula</label>
                <input value="{{$curso->CURAU_AULA}}" type="file" class="form-control" name="aula">
            </div>
            
        </div>

        <button class="btn btn-dark my-4">Editar</button>
    </form>
@stop