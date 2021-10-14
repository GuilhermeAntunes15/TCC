@extends('layouts.layoutAdministrativo')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
        <h1 class="h2">Cadastro de Curso</h1>
        <button class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('curso.index')}}'">Voltar</button>
    </div>
    
    <form action="{{route('curso.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="container ">
            <div class="row">  
                <div class="form-group col-lg-12 mb-3">
                    <h4>Dados do Curso</h4>
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" name="CUR_TITULO">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" name="CUR_DESCRICAO">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Quantidade de Aulas</label>
                    <input type="number" class="form-control" name="CUR_QT_AULA">
                </div>

                <div class="form-group col-md-3">
                    <label for="">Imagem</label>
                    <input type="file" class="form-control" name="foto">
                </div>

                <div class="form-groupcol col-md-2">
                    <label for="">Linguagem</label>
                    <select name="CD_LINGUAGEM_PROGRAMACAO" class="form-control" id="">
                        @foreach($linguagens as $linguagem)
                            <option value="{{$linguagem->CD_LINGUAGEM_PROGRAMACAO}}">{{$linguagem->LP_NOME}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-groupcol col-md-2">
                    <label for="">Professor</label>
                    <select name="CD_PROFESSOR" class="form-control" id="">
                        @foreach($professores as $professor)
                            <option value="{{$professor->CD_PROFESSOR}}">{{$professor->US_NOME}}</option>
                        @endforeach
                    </select>
                </div>
                
                <!--- Pré-requisitos -->

                <hr class="my-4">

                <h4>Pré-requisitos</h4>

                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 1</label>
                    <input type="text" class="form-control" name="CUR_REQUERIMENTO_01">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 2</label>
                    <input type="text" class="form-control" name="CUR_REQUERIMENTO_02">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 3</label>
                    <input type="text" class="form-control" name="CUR_REQUERIMENTO_03">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 4</label>
                    <input type="text" class="form-control" name="CUR_REQUERIMENTO_04">
                </div>
                
                <div class="form-group col-md-2">
                    <label for="">Pré-requisito 5</label>
                    <input type="text" class="form-control" name="CUR_REQUERIMENTO_05">
                </div>
            </div>

            <button class="btn btn-dark my-4">Cadastrar</button>

        </div>
    </form>
@stop