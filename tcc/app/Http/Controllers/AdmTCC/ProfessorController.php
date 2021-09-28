<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        try {
            return view('pages.Adm.Professor');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function login()
    {
        try {
            return view('pages.Adm.Professor');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        
       
    }

    public function store(Request $request)
    {
       
    }

    public function show($id)
    {
        try {
                $prof = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/professores/' . $id);
                $prof = json_decode($prof->body());
                $prof = $prof[0];
        
                return view('pages.Professor.index', [
                'Professor' => $prof,
                    'operacao' => 'visualizar'
                ]);
            } catch (Exception $e) {
                    abort(500, $e->getMessage());
            }
    }


    public function edit($id)
    {
        try {
                $prof = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/professores/' . $id);
                $prof = json_decode($prof->body());
                $prof = $prof[0];
        
        
                return view('pages.Professor.index', [
                'prof' => $prof,
                'operacao' => 'editar'
                ]);
            } catch (Exception $e) {
                    abort(500, $e->getMessage());
            }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/professor/' . $id;

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'PRO_LOGIN' => $request->input('login'),
            'PRO_EMAIL' => $request->input('email'),
            'PRO_SENHA' => $request->input('senha'),
            'PRO_CPF' => $request->input('cpf'),
            'PRO_DT_NASCIMENTO' => $request->input('dtnascimento'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Professor atualizado"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('professor.index');
    }

    public function destroy($id)
    {
        Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->delete(env("API_URL") . '/api/professor/' . $id);

        return redirect()->route('professor.index');
    }
}