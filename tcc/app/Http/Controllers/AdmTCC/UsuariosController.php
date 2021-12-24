<?php

namespace App\Http\Controllers\AdmTCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsuariosController extends Controller
{
    public function index()
    {
        try {
            $usuarios = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/usuarios');
            $usuarios = json_decode($usuarios->body());
            return view('pages.Adm.Usuarios', [
                    'usuarios' => $usuarios
                ]);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function create()
    {
        try {
            return view('pages.Adm.UsuariosCrud.UsuariosCadastrar');
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

            $usuario = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/usuario/' . $id);
            $usuario = json_decode($usuario->body());
            $usuario = $usuario[0];

            return view('pages.Curso_aula', [
                    'usuario' => $usuario,
                    'operacao' => 'visualizar'
                ]);

            return view('pages.Curso_aula');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }


      
    }


    public function edit($id)
    {
        try {

            $usuario = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->get(env("API_URL") . '/api/usuario/' . $id);
            $usuario = json_decode($usuario->body());
            $usuario = $usuario[0];

            return view('pages.Curso_aula', [
                    'usuario' => $usuario,
                    'operacao' => 'visualizar'
                ]);

            return view('pages.Curso_aula');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $api = env("API_URL") . '/api/usuario/' . $id;

         $resposta = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->put($api, [
            'US_NOME' => $request->input('nome'),
            'US_LOGIN' => $request->input('login'),
            'US_EMAIL' => $request->input('email'),
            'US_SENHA' => $request->input('senha'),
            'US_DT_NASCIMENTO' => $request->input('dtnascimento'),
            'flAtivoSN' => 'S',
            'dsAuditoria' => Auth::user()->NM_USUARIO . " - Usuário atualizado"
        ])->throw(function ($resposta, $e) {
             abort(500, $e->getMessage());
        })->json();

         return redirect()->route('usuario.index');
    }

    public function destroy($id)
    {
        Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->delete(env("API_URL") . '/api/usuario/' . $id);

        return redirect()->route('usuario.index');
    }
    public function login(Request $request){
            $api = env("API_URL") . "/api/login";

            $login = Http::post($api, [
                'usuario' => $request->usuario,
                'senha' => $request->senha
            ]);

            $login = json_decode($login->body());

            if (empty($login->error)) {
                session(['token' => $login->access_token]);
                $credentials = [
                    'US_LOGIN' => $request->usuario,
                    'password' => $request->senha
                ];
                if (Auth::attempt($credentials)) {
                    return redirect()->route("admin.dash");
                }
            } else {
                abort(500, $login->error);
            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index');
    }
}


