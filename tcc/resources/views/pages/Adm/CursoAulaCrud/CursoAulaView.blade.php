@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Visualizar Aula</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('aulas.index')}}'">Voltar</button>
    </div>
    
    <form action="" method="post">
        @csrf
        <div class="row">  
            <div class="form-group">
                <h4>Dados da Aula</h4>
            </div>
            <div class="form-group col-6">
                <label for="">Titulo</label>
                <input readonly value="{{$curso->CURAU_TITULO}}" type="text" class="form-control" name="titulo">
            </div>
            <div class="form-group col-6">
                <label for="">Aula</label>
                <input  readonly value="{{$curso->CURAU_AULA}}" type="file" class="form-control" name="aula">
            </div>

            <div class="form-group col-6">
                <label for="">Tempo</label>
                <input readonly type="text" value="{{$curso->CURAU_TEMPO}}" class="form-control" name="tempo">
            </div>
            <div class="form-group col-6">
                <label for="">Descrição</label>
                <input readonly type="text" value="{{$curso->CURAU_DESCRICAO}}" class="form-control" name="descricao">
            </div>

            <div class="form-group col-md-2">
                <label for="">Video</label>
                <input type="file" value="{{$curso->CURAU_BL_VIDEO}}" class="form-control" name="video">
            </div>

            <div class="form-group col-6">
                <label for="">Curso</label>
                <input readonly type="text" value="{{$curso->CUR_TITULO}}" class="form-control" name="descricao">
            </div>
            
        </div>
    </form>
@stop