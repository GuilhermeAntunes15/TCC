<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CursoAulaController extends Controller
{
    public function index()
    {
        try {
            return view('pages.Adm.CursoAula');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        try {
            return view('pages.Adm.CursoAulaCrud.CursoAulaCadastrar');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(UsuarioRequest $request)
    {
    }

    public function show($id)
    {
        try {
            $cursoaula = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/Curso_aula/' . $id);
            $cursoaula = json_decode($cursoaula->body());
            $cursoaula = $cursoaula[0];

            return view('pages.Curso_aula', [
               'cursoaula' => $cursoaula,
               'operacao' => 'visualizar'
            ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $cursoaula = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/Curso_aula/' . $id);
            $cursoaula = json_decode($cursoaula->body());
            $cursoaula = $cursoaula[0];

            return view('pages.Curso_aula', [
               'cursoaula' => $cursoaula,
               'operacao' => 'visualizar'
            ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/Curso_aula/' . $id;

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'CURAU_TITULO' => $request->input('titulo'),
            'CURAU_DESCRICAO' => $request->input('descricao'),
            'CURAU_AULA' => $request->input('aula'),
            'CURAU_TEMPO' => $request->input('tempo'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Curso_aula atualizado"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('Curso_aula.index');
    }

    public function destroy($id)
    {
        Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->delete(env("API_URL") . '/api/Curso_aula/' . $id);

        return redirect()->route('Curso_aula.index');
    }
}