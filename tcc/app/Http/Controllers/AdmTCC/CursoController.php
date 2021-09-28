<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CursoController extends Controller
{
    public function index()
    {
        try {
            $cursos = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/cursos');
            $cursos = json_decode($cursos->body());

            return view('pages.Adm.Curso', ['cursos'=>$cursos]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        try {
            return view('pages.Adm.CursoCrud.CursoCadastrar');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $api = env("API_URL") . '/api/cursos';

        $linguagem = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->post($api, [
            'CUR_TITULO' => $request->input('CUR_TITULO'),
            'CUR_DESCRICAO' => $request->input('CUR_DESCRICAO'),
            'CUR_QT_AULA' => $request->input('CUR_QT_AULA'),
            'CUR_REQUERIMENTO_01' => $request->input('CUR_REQUERIMENTO_01'),
            'CUR_REQUERIMENTO_02' => $request->input('CUR_REQUERIMENTO_02'),
            'CUR_REQUERIMENTO_03' => $request->input('CUR_REQUERIMENTO_03'),
            'CUR_REQUERIMENTO_04' => $request->input('CUR_REQUERIMENTO_04'),
            'CUR_REQUERIMENTO_05' => $request->input('CUR_REQUERIMENTO_05'),
            'CUR_DS_AUDITORIA_LOGIN' => Auth::user()->NM_USUARIO . " - Curso criado"
        ])->throw(function ($linguagem, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('curso.index');
    }

    public function show($id)
    {
        try {

            $curso = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/cursos/' . $id);
            $curso = json_decode($curso->body());
            $curso = $curso[0];
        
            return view('pages.Adm.CursoCrud.CursoView', [
                'curso' => $curso
            ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $curso = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/cursos/' . $id);
            $curso = json_decode($curso->body());
            $curso = $curso[0];


            return view('pages.Adm.CursoCrud.CursoEditar', [
                'curso' => $curso
            ]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/curso/' . $id;

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'CUR_TITULO' => $request->input('CUR_TITULO'),
            'CUR_DESCRICACAO' => $request->input('CUR_DESCRICACAO'),
            'CUR_QT_AULA' => $request->input('CUR_QT_AULA'),
            'CUR_REQUERIMENTO_01' => $request->input('CUR_REQUERIMENTO_01'),
            'CUR_REQUERIMENTO_02' => $request->input('CUR_REQUERIMENTO_02'),
            'CUR_REQUERIMENTO_03' => $request->input('CUR_REQUERIMENTO_03'),
            'CUR_REQUERIMENTO_04' => $request->input('CUR_REQUERIMENTO_04'),
            'CUR_REQUERIMENTO_05' => $request->input('CUR_REQUERIMENTO_05'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Curso atualizado"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('curso.index');
    }

    public function destroy($id)
    {
        Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->delete(env("API_URL") . '/api/cursos/' . $id);

        return redirect()->route('curso.index');
    }
}



    

