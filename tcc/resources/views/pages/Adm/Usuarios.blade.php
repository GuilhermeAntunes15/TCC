@extends('layouts.layoutAdministrativo')
@section('content')
<h4>Usuarios</h4>
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Num Tel</th>
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