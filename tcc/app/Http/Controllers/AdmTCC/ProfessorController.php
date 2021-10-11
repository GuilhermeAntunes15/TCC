<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProfessorController extends Controller
{
    public function index()
    {
        try {
            $professor = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/professores');
            $professor = json_decode($professor->body());
            $professor = $professor ? $professor : [];

            return view('pages.Adm.Professor', ["professor" => $professor]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        try {
            $usuarios = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/usuarios');
            $usuarios = json_decode($usuarios->body());

            return view('pages.Adm.ProfessorCrud.ProfessorCadastrar', ["usuarios" => $usuarios]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $api = env("API_URL") . '/api/professores';

        $professor = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->post($api, [
            'cpf' => $request->input('cpf'),
            'rg' => $request->input('rg'),
            'cd_usuario' => $request->input('cd_usuario'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Professor cadastrado"
        ])->throw(function ($professor, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('professor.index');
    }

    public function show($id)
    {
        try {
                $prof = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/professores/' . $id);
                $prof = json_decode($prof->body());
                $prof = $prof[0];
        
                return view('pages.Adm.ProfessorCrud.ProfessorVisualizar', [
                'professor' => $prof
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

                $usuarios = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/usuarios');
                $usuarios = json_decode($usuarios->body());
        
        
                return view('pages.Adm.ProfessorCrud.ProfessorEditar', [
                'professor' => $prof,
                'usuarios' => $usuarios
                ]);
            } catch (Exception $e) {
                    abort(500, $e->getMessage());
            }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/professor/' . $id;

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'cpf' => $request->input('cpf'),
            'rg' => $request->input('rg'),
            'cd_usuario' => $request->input('CD_USUARIO'),
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