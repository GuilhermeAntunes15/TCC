@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
        <h1 class="h2">Editar de Curso</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('curso.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('curso.update', $curso->CD_CURSO)}}" enctype="multipart/form-data" method="post">
        @method('put')
        @csrf
        <div class="container ">
            <div class="row">  
                <div class="form-group col-lg-12 mb-3">
                    <h4>Dados do Curso</h4>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Titulo</label>
                    <input value="{{$curso->CUR_TITULO}}" type="text" class="form-control" name="CUR_TITULO">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Descrição</label>
                    <input value="{{$curso->CUR_DESCRICAO}}" type="text" class="form-control" name="CUR_DESCRICAO">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Quantidade de Aulas</label>
                    <input value="{{$curso->CUR_QT_AULA}}" type="number" class="form-control" name="CUR_QT_AULA">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Imagem</label>
                    <input type="file" value="{{$curso->CUR_BL_IMG}}" class="form-control" name="foto">

                    <input type="hidden" value="{{$curso->CUR_BL_IMG}}" name="foto">
                    <input type="hidden" value="{{$curso->CUR_NM_IMG}}" name="nomeImg">
                </div>

                <div class="form-groupcol col-md-2">
                    <label for="">Linguagem</label>
                    <select name="CD_LINGUAGEM_PROGRAMACAO" class="form-control" id="">
                        @foreach($linguagens as $linguagem)
                            @if($curso->CD_LINGUAGEM_PROGRAMACAO == $linguagem->CD_LINGUAGEM_PROGRAMACAO)
                                <option value="{{$linguagem->CD_LINGUAGEM_PROGRAMACAO}}" selected>{{$linguagem->LP_NOME}}</option>
                            @else
                                <option value="{{$linguagem->CD_LINGUAGEM_PROGRAMACAO}}">{{$linguagem->LP_NOME}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                
                <!--- Pré-requisitos -->

                <hr class="my-4">

                <h4>Pré-requisitos</h4>

                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 1</label>
                    <input value="{{$curso->CUR_REQUERIMENTO_01}}" type="text" class="form-control" name="CUR_REQUERIMENTO_01">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 2</label>
                    <input value="{{$curso->CUR_REQUERIMENTO_02}}" type="text" class="form-control" name="CUR_REQUERIMENTO_02">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 3</label>
                    <input value="{{$curso->CUR_REQUERIMENTO_03}}" type="text" class="form-control" name="CUR_REQUERIMENTO_03">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 4</label>
                    <input value="{{$curso->CUR_REQUERIMENTO_04}}" type="text" class="form-control" name="CUR_REQUERIMENTO_04">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 5</label>
                    <input value="{{$curso->CUR_REQUERIMENTO_01}}" type="text" class="form-control" name="CUR_REQUERIMENTO_05">
                </div>
            </div>

            <button class="btn btn-dark my-4">Editar</button>

        </div>
    </form>
@stop