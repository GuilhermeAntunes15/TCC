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
                @foreach($usuarios as $usuario)
                <tr>
                    <th scope="row">{{ $usuario->CD_USUARIO }}</th>
                    <td>{{ $usuario->US_NOME }}</td>
                    <td>{{ $usuario->US_EMAIL }}</td>
                    <td>{{ $usuario->US_DT_NASCIMENTO }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop