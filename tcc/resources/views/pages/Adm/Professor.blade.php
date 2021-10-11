@extends('layouts.layoutAdministrativo')
@section('content')
    <h4>Professores</h4>
    <div class="container mt-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <button type="button" class="btn btn-dark rounded-pill" onclick="window.location.href = '{{route('professor.create')}}'">Adicionar</button>
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
                @forelse($professor as $data)
                    @if($data->PRO_FL_PROFESSOR_ATIVO_SN == "S")
                        <tr>
                            <th scope="row">{{ $data->CD_PROFESSOR }}</th>
                            <td>{{ $data->US_NOME }}</td>
                            <td scope="col">
                                <a href="{{route('professor.edit', $data->CD_PROFESSOR)}}" style="text-decoration: none">
                                    <button class="btn rounded-pill actionButton"><i class="fa fa-pen" aria-hidden="true"></i></button>
                                </a>
                                <a href="{{route('professor.show', $data->CD_PROFESSOR)}}" style="text-decoration: none">
                                    <button class="btn rounded-pill actionButton"><i class="fa fa-eye"></i></button>
                                </a>
                                <form style="display: inline;" action="{{route('professor.destroy', $data->CD_PROFESSOR)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="idrede" value="">
                                    <button class="btn rounded-pill actionButton" type="submit" onclick="return confirm('Deseja remover {{$data->US_NOME}}?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="3">Nenhum professor cadastrado</td>
                    </tr>   
                @endforelse
            </tbody>
        </table>
    </div>
@stop