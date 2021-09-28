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
            $linguagens = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/linguagens');
            $linguagens = json_decode($linguagens->body());

            return view('pages.Adm.LinguagemProgramacao', ["linguagens" => $linguagens]);
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
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Linguagem criada"
        ])->throw(function ($linguagem, $e) {
            dd($e->getMessage());
        })->json();

        return redirect()->route('linguagemProgramacao.index');

    }

    public function show($id)
    {
        try {
            $linguagem = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/linguagens/' . $id);
            $linguagem = json_decode($linguagem->body());
            $linguagem = $linguagem[0];
        
                return view('pages.Adm.LinguagemProgramacaoCrud.LinguagemProgramacaoVisualizar', [
                    'linguagem' => $linguagem
                ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {

            $linguagem = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/linguagens/' . $id);
            $linguagem = json_decode($linguagem->body());
            $linguagem = $linguagem[0];
        
            return view('pages.Adm.LinguagemProgramacaoCrud.LinguagemProgramacaoEditar', [
                'linguagem' => $linguagem
            ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/linguagens/' . $id;

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'LP_NOME' => $request->input('LP_NOME'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Linguagens atualizado"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('linguagemProgramacao.index');
    }

    public function destroy($id)
    {
        Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->delete(env("API_URL") . '/api/linguagens/' . $id);

        return redirect()->route('linguagemProgramacao.index');
    }

} 
