<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LinguagemProgramacaoController extends Controller
{
    public function index()
    {
        try {
            return view('pages.Adm.LinguagemProgramacao');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        try {
            return view('pages.Adm.LinguagemProgramacaoCrud.LinguagemProgramacaoCadastrar');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $api = env("API_URL") . '/api/linguagens';

        $linguagem = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->post($api, [
            'LP_NOME' => $request->input('LP_NOME'),
            'LP_DS_AUDITORIA_LOGIN' => Auth::user()->NM_USUARIO . " - Linguagem criada"
        ])->throw(function ($linguagem, $e) {
            abort(500, $e->getMessage());
        })->json();
    }

    public function show($id)
    {
        try {
            return view('pages.Curso_aula');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
