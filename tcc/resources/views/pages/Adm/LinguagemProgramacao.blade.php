@extends('layouts.layoutAdministrativo')
@section('content')
    <h4>Linguagens de Programacao</h4>
    <div class="container mt-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <button type="button" class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('linguagemProgramacao.create')}}'">Adicionar</button>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($linguagens as $data)
                    @if($data->LP_FL_LINGUAGEM_PROGRAMACAO_ATIVO_SN == "S")
                        <tr>
                            <th scope="row">{{ $data->CD_LINGUAGEM_PROGRAMACAO }}</th>
                            <td>{{ $data->LP_NOME }}</td>
                            <td scope="col">
                                <a href="{{route('linguagemProgramacao.edit', $data->CD_LINGUAGEM_PROGRAMACAO)}}" style="text-decoration: none">
                                    <button class="btn rounded-pill actionButton"><i class="fa fa-pen" aria-hidden="true"></i></button>
                                </a>
                                <a href="{{route('linguagemProgramacao.show', $data->CD_LINGUAGEM_PROGRAMACAO)}}" style="text-decoration: none">
                                    <button class="btn rounded-pill actionButton"><i class="fa fa-eye"></i></button>
                                </a>
                                <form style="display: inline;" action="{{route('linguagemProgramacao.destroy', $data->CD_LINGUAGEM_PROGRAMACAO)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="idrede" value="">
                                    <button class="btn rounded-pill actionButton" type="submit" onclick="return confirm('Deseja remover {{$data->LP_NOME}}?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@stop