@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastro de Aula</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('aulas.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('aulas.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">  
            <div class="form-group">
                <h4>Dados da Aula</h4>
            </div>
            <div class="form-group col-6">
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="form-group col-6">
                <label for="">Aula</label>
                <input type="text" class="form-control" name="aula">
            </div>
            <div class="form-group col-6">
                <label for="">Tempo</label>
                <input type="text" class="form-control" name="tempo">
            </div>
            <div class="form-group col-6">
                <label for="">Descrição</label>
                <input type="text" class="form-control" name="descricao">
            </div>

            <div class="form-group col-6">
                <label for="">Video</label>
                <input type="text" class="form-control" name="video">
            </div>

            <div class="form-groupcol col-md-2">
                <label for="">Curso</label>
                <select name="CD_CURSO" class="form-control" id="">
                    @foreach($cursos as $curso)
                        <option value="{{$curso->CD_CURSO}}">{{$curso->CUR_TITULO}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>

        <button class="btn btn-dark my-4">Cadastrar</button>
    </form>
@stop