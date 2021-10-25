@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Aula</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('aulas.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('aulas.update', $curso->CD_CURSO_AULA)}}" enctype="multipart/form-data" method="post">
        @method('put')
        @csrf
        <div class="row">  
            <div class="form-group">
                <h4>Dados da Aula</h4>
            </div>
            <div class="form-group col-6">
                <label for="">Titulo</label>
                <input value="{{$curso->CURAU_TITULO}}" type="text" class="form-control" name="titulo">
            </div>
            <div class="form-group col-6">
                <label for="">Aula</label>
                <input value="{{$curso->CURAU_AULA}}" type="file" class="form-control" name="aula">
            </div>

            <div class="form-group col-6">
                <label for="">Tempo</label>
                <input type="text" value="{{$curso->CURAU_TEMPO}}" class="form-control" name="tempo">
            </div>
            <div class="form-group col-6">
                <label for="">Descrição</label>
                <input type="text" value="{{$curso->CURAU_DESCRICAO}}" class="form-control" name="descricao">
            </div>

            <div class="form-group col-6">
                <label for="">Video</label>
                <input type="text" value="{{$curso->CURAU_VIDEO}}" class="form-control" name="video">
            </div>

            <div class="form-groupcol col-md-2">
                <label for="">Linguagem</label>
                <select name="CD_CURSO" class="form-control" id="">
                    @foreach($cursos as $curso)
                        @if($curso->CD_USUARIO == $professor->CD_USUARIO)
                            <option value="{{$curso->CD_CURSO}}" selected>{{$curso->CUR_TITULO}}</option>
                        @else
                            <option value="{{$curso->CD_CURSO}}">{{$curso->CUR_TITULO}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            
        </div>

        <button class="btn btn-dark my-4">Editar</button>
    </form>
@stop