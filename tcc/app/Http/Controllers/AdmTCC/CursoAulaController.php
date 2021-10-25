<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
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
            $cursos = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/cursos');
            $cursos = json_decode($cursos->body());

            return view('pages.Adm.CursoAulaCrud.CursoAulaCadastrar', [
                'cursos' => $cursos
            ]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $api = env("API_URL") . '/api/aulas';

        if ($request->file('video')) {

            $img = file_get_contents($request->file('video'));
            $img = base64_encode($img);
            $nomeImg =  $request->file('video')->getClientOriginalName();
        } else {
            $img = null;
            $nomeImg = null;
        }

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->post($api, [
            'CURAU_TITULO' => $request->input('titulo'),
            'CURAU_DESCRICAO' => $request->input('descricao'),
            'CURAU_AULA' => $request->input('aula'),
            'CURAU_TEMPO' => $request->input('tempo'),
            'cd_curso' => $request->input('CD_CURSO'),
            'flAtivoSN' => 'S',
            'curau_video' => $request->input('video'),
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - aulas cadastrado"
        ])->throw(function ($resposta, $e) {
             dd($e->getMessage());
        })->json();

        return redirect()->route('aulas.index');
    }

    public function show($id)
    {
        try {
            $cursoaula = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/aulas/' . $id);
            $cursoaula = json_decode($cursoaula->body());
            $cursoaula = $cursoaula[0];

            return view('pages.aulas', [
               'cursoaula' => $cursoaula
            ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $cursoaula = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/aulas/' . $id);
            $cursoaula = json_decode($cursoaula->body());
            $cursoaula = $cursoaula[0];

            $cursos = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/cursos');
            $cursos = json_decode($cursos->body());

            return view('pages.aulas', [
               'cursoaula' => $cursoaula
            ]);

        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/aulas/' . $id;

        if ($request->file('video')) {
            $img = file_get_contents($request->file('video'));
            $img = base64_encode($img);
            $nomeImg =  $request->file('video')->getClientOriginalName();
        }
        else if($request->input('video')){
            $img = $request->input('video');
            $nomeImg = $request->input('nomeImg');
        }
        else{
            $img = null;
            $nomeImg = null;
        }

        $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'CURAU_TITULO' => $request->input('titulo'),
            'CURAU_DESCRICAO' => $request->input('descricao'),
            'CURAU_AULA' => $request->input('aula'),
            'CURAU_TEMPO' => $request->input('tempo'),
            'cd_curso' => $request->input('CD_CURSO'),
            'flAtivoSN' => 'S',
            'curau_video' => $request->input('video'),
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - aulas atualizado"
        ])->throw(function ($resposta, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('aulas.index');
    }

    public function destroy($id)
    {
        Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->delete(env("API_URL") . '/api/aulas/' . $id);

        return redirect()->route('aulas.index');
    }
}