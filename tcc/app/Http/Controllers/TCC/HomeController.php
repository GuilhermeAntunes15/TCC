<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return view('pages.Home');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        try {
            return view('pages.Signup');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(UsuarioRequest $request)
    {
        $senha = $request->input('txtSenha');

        $api = env("API_URL") . '/api/usuarios';

        $resposta = Http::post($api, [
            'nome' => $request->input('txtNome'),
            'login' => $request->input('txtLogin'),
            'email' => $request->input('txtEmail'),
            'senha' => $senha,
            'dt_nasc' => $request->input('txtDataNasc'),
            'dsAuditoria' => " Usuario criado"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());;
        })->json();

        return redirect()->route('login');
    }

    public function show($id)
    {
    }


    public function edit($id)
    {
        try {
            $frete = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/v1/clientes/fretes/' . $id);
            $frete = json_decode($frete->body());
            $frete = $frete[0];


            return view('pages.Admin.Clientes.Cadastro.Frete', [
                'frete' => $frete,
                'operacao' => 'editar'
            ]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nomeFrete' => 'required']);

        $api = env("API_URL") . '/api/v1/clientes/fretes/' . $id;

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'nmFrete' => $request->input('nomeFrete'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_LOGIN . " - Frete atualizada"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('fretes.index');
    }

    public function destroy($id)
    {
    }
}
