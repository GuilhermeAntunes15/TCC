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
                    <th scope="col">Ativo?</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($curva as $data)
                <tr>
                    <th scope="row">{{ $data->ID_CURVA }}</th>
                    <td>{{ $data->PRODUTO_CURVA }}</td>
                    <td>{{ $data->CLIENTE_CURVA }}</td>
                    <td>{{ $data->ESTADO_CURVA }}</td>
                    <td>{{ $data->VENDEDOR_CURVA }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
@stop