@extends('layouts.layoutAdministrativo')
@section('content')
    <h4>Curso</h4>
    <div class="container mt-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <button type="button" class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('curso.create')}}'">Adicionar</button>
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Qt de aula</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $data)
                    @if($data->CUR_FL_CURSO_ATIVO_SN == 'S')
                        <tr>
                            <th scope="row">{{ $data->CD_CURSO }}</th>
                            <td>{{ $data->CUR_TITULO }}</td>
                            <td>{{ $data->CUR_QT_AULA }}</td>
                            <td scope="col">
                                <a href="{{route('curso.edit', $data->CD_CURSO)}}" style="text-decoration: none">
                                    <button class="btn rounded-pill actionButton"><i class="fa fa-pen" aria-hidden="true"></i></button>
                                </a>
                                <a href="{{route('curso.show', $data->CD_CURSO)}}" style="text-decoration: none">
                                    <button class="btn rounded-pill actionButton"><i class="fa fa-eye"></i></button>
                                </a>
                                <form style="display: inline;" action="{{route('curso.destroy', $data->CD_CURSO)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="idrede" value="">
                                    <button class="btn rounded-pill actionButton" type="submit" onclick="return confirm('Deseja remover {{$data->CUR_TITULO}}?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@stop